<?php

namespace App\DataTables;

use App\Models\HelpCenter;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class HelpCenterDataTable extends DataTable
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
            ->addColumn('status', function($helpCenter){
                $helpCenter_status = HelpCenter::select('is_active')->where('id', $helpCenter->id)->first();
                if($helpCenter_status['is_active'] == '1'){
                    return '<div class="badge badge-success">Active</div>';
                }
                else{
                    return '<div class="badge badge-danger">Inactive</div>';
                }
            })

            ->addColumn('icon', function($helpCenter){
                $helpCenter_icon = HelpCenter::select('icon')->where('id', $helpCenter->id)->first();
                if($helpCenter_icon['icon']){
                    return '<i style="font-size: 20px" class="fa">'."&#".$helpCenter_icon['icon'].' </i>';
                }
            })

        ->addColumn('action',  function($row){
            $btn = '<a href="'.route('admin.helpcenter.show', $row->id).'" data-id="'.$row->id.'" class="view-helpcenter giftpoke_hover_btn pr-2" data-toggle="tooltip" data-placement="buttom" title="View"><i class="ti-eye" style="font-size:17px;"></i></a>';
            $btn = $btn.'<a href="'.route('admin.helpcenter.edit', $row->id).'" data-id="'.$row->id.'" class="edit-helpcenter giftpoke_hover_btn pr-2" data-toggle="tooltip" data-placement="buttom" title="Edit"><i class="ti-pencil" style="font-size:17px;color:gray"></i></a>';
            $btn = $btn.'<a href="javascript:void(0)" data-id="'.$row->id.'" class="delete-helpcenter giftpoke_hover_btn pr-2" data-toggle="tooltip" data-placement="buttom" title="Delete"><i class="ti-trash" style="font-size:17px;color:red"></i></a>';
            return $btn;
        })->rawColumns(['icon', 'status', 'action']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\HelpCenter $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(HelpCenter $model)
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
                    ->setTableId('helpCenterDataTable-table')
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

            Column::make('id'),
            Column::make('name')->addClass('helpCenter_datatable_ellips'),
            Column::make('description')->addClass('helpCenter_datatable_ellips'),
            Column::make('order'),
            Column::computed('icon')
                    ->exportable(false)
                    ->printable(false),
            Column::make('status'),
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
        return 'HelpCenter_' . date('YmdHis');
    }
}
