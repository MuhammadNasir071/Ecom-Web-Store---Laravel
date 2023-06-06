<?php

namespace App\DataTables;

use App\Models\Banner;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BannerDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)

            ->addColumn('image', function($banner){
                $banner_image = Banner::select('path')->where('id', $banner->id)->first();
                getThumbnailAndOriginalImage($banner_image, 'path');
                $thumbnail_image = '<a href="'. url($banner_image['original_image']) .'" target="_blank"><img width="100px" src="'. url($banner_image['thumb_image']) .'"></a>';
                return $thumbnail_image;
            })

            ->addColumn('status', function($banner){
                $banner_status = Banner::select('is_active')->where('id', $banner->id)->first();
                if($banner_status['is_active'] == '1'){
                    return '<div class="badge badge-success">Active</div>';
                }
                else{
                    return '<div class="badge badge-danger">Inactive</div>';
                }
            })

            ->addColumn('action',  function($row){
                $btn = '<a href="'.route('admin.banner.show', $row->id).'" data-id="'.$row->id.'" class="view-banner giftpoke_hover_btn pr-2" data-toggle="tooltip" data-placement="buttom" title="View"><i class="ti-eye" style="font-size:17px;"></i></a>';
                $btn = $btn.'<a href="'.route('admin.banner.edit', $row->id).'" data-id="'.$row->id.'" class="edit-banner giftpoke_hover_btn pr-2" data-toggle="tooltip" data-placement="buttom" title="Edit"><i class="ti-pencil" style="font-size:17px;color:gray"></i></a>';
                $btn = $btn.'<a href="javascript:void(0)" data-id="'.$row->id.'" class="delete-banner giftpoke_hover_btn pr-2" data-toggle="tooltip" data-placement="buttom" title="Delete"><i class="ti-trash" style="font-size:17px;color:red"></i></a>';
                return $btn;
         })->rawColumns(['image', 'status', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Banner $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Banner $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('bannerDataTable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('image')
                ->exportable(false)
                ->printable(false),
            Column::make('id'),
            Column::make('banner_name'),
            Column::make('order'),
            Column::computed('status')
                  ->exportable(false)
                  ->printable(false)
                  ->addClass('text-center'),

            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Banner_' . date('YmdHis');
    }
}
