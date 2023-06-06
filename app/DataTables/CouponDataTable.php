<?php

namespace App\DataTables;

use App\Models\Coupon;
use App\Models\couponMedia;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CouponDataTable extends DataTable
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

            ->addColumn('status', function($coupon){
                $coupon_status = Coupon::select('is_active')->where('id', $coupon->id)->first();
                if($coupon_status['is_active'] == '1'){
                    return '<div class="badge badge-success">Active</div>';
                }
                else{
                    return '<div class="badge badge-danger">Inactive</div>';
                }
            })
            ->addColumn('action',  function($row){
                $btn = '<a href="'.route('admin.coupons.show', $row->id).'" data-id="'.$row->id.'" class="view-coupons giftpoke_hover_btn pr-2" data-toggle="tooltip" data-placement="buttom" title="View"><i class="ti-eye" style="font-size:17px;"></i></a>';
                $btn = $btn.'<a href="'.route('admin.coupons.edit', $row->id).'" data-id="'.$row->id.'" class="edit-coupons giftpoke_hover_btn pr-2" data-toggle="tooltip" data-placement="buttom" title="Edit"><i class="ti-pencil" style="font-size:17px;color:gray"></i></a>';
                $btn = $btn.'<a href="javascript:void(0)" data-id="'.$row->id.'" class="delete-coupons giftpoke_hover_btn" data-toggle="tooltip" data-placement="buttom" title="Delete"><i class="ti-trash" style="font-size:17px;color:red"></i></a>';
                return $btn;
        })->rawColumns(['status', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Coupon $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Coupon $model)
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
                    ->setTableId('couponDataTable-table')
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
            Column::make('name'),
            Column::make('code'),
            Column::make('discount'),
            Column::make('max_uses'),
            Column::make('starts_at'),
            Column::make('expires_at'),
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
        return 'Coupon_' . date('YmdHis');
    }
}
