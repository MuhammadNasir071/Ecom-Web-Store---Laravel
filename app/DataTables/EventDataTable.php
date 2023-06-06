<?php

namespace App\DataTables;

use App\Models\Event;
use App\Models\EventMedia;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EventDataTable extends DataTable
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

            ->addColumn('image', function($event){
                $event_image = EventMedia::select('media_path')->where('event_id', $event->id)->first();
                getThumbnailAndOriginalImage($event_image, 'media_path');
                $thumbnail_image = '<a href="'. url($event_image['original_image']) .'" target="_blank"><img width="100px" src="'. url($event_image['thumb_image']) .'"></a>';
                return $thumbnail_image;
            })

            ->addColumn('status', function($event){
                $event_status = Event::select('is_active')->where('id', $event->id)->first();
                if($event_status['is_active'] == '1'){
                    return '<div class="badge badge-success">Active</div>';
                }
                else{
                    return '<div class="badge badge-danger">Inactive</div>';
                }
            })
            ->addColumn('action',  function($row){
                $btn = '<a href="'.route('admin.events.show', $row->id).'" data-id="'.$row->id.'" class="view-events giftpoke_hover_btn pr-2" data-toggle="tooltip" data-placement="buttom" title="View"><i class="ti-eye" style="font-size:17px;"></i></a>';
                $btn = $btn.'<a href="'.route('admin.events.edit', $row->id).'" data-id="'.$row->id.'" class="edit-events giftpoke_hover_btn pr-2" data-toggle="tooltip" data-placement="buttom" title="Edit"><i class="ti-pencil" style="font-size:17px;color:gray"></i></a>';
                $btn = $btn.'<a href="javascript:void(0)" data-id="'.$row->id.'" class="delete-events giftpoke_hover_btn" data-toggle="tooltip" data-placement="buttom" title="Delete"><i class="ti-trash" style="font-size:17px;color:red"></i></a>';
                return $btn;
        })->rawColumns(['image', 'status', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Event $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Event $model)
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
                    ->setTableId('eventDataTable-table')
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
            Column::make('name'),
            Column::make('start_date'),
            Column::make('end_date'),
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
        return 'Event_' . date('YmdHis');
    }
}
