<?php

namespace App\DataTables;

use App\Models\Brand;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BrandsDataTable extends DataTable
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
            ->addColumn('action',  function($row){
                $btn = '<a href="'.route('admin.brands.show', $row->id).'" data-id="'.$row->id.'" class="view-brands pr-2"><i class="fa fa-eye" style="font-size:17px;"></i></a>';
                $btn = $btn.'<a href="'.route('admin.brands.edit', $row->id).'" data-id="'.$row->id.'" class="edit-brands pr-2"><i class="fa fa-pencil" style="font-size:17px;color:gray"></i></a>';
                $btn = $btn.'<a href="javascript:void(0)" data-id="'.$row->id.'" class="delete-brands"><i class="fa fa-trash" style="font-size:17px;color:red"></i></a>';
                return $btn;
         });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Brand $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Brand $model)
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
                    ->setTableId('brands-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0)
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
            Column::make('title'),
            Column::make('is_active'),
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
        return 'Brands_' . date('YmdHis');
    }
}
