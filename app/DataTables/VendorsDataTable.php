<?php

namespace App\DataTables;

use App\Models\User;
use App\Models\Role;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorsDataTable extends DataTable
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
            ->addColumn('image', function($user){
                $profile_pic = User::select('profile_picture')->where('id', $user->id)->first();
                if($profile_pic['profile_picture']){
                    getThumbnailAndOriginalImage($profile_pic, 'profile_picture');
                    $thumbnail_image = '<a href="' . url($profile_pic['original_image']) .'" target="_blank"><img width="100px" src="'. url($profile_pic['thumb_image']) .'"></a>';
                    return $thumbnail_image;
                }
                else{
                    $default_pic = default_profile_photo_url($user['first_name']. ' '. $user['last_name']);
                    return '<img width="100px" src="'. $default_pic .'">';
                }
            })
            ->addColumn('status', function($user){
                $account_status = User::select('status')->where('id', $user->id)->first();
                if($account_status['status'] == 'active'){
                    return '<div class="badge badge-success">Active</div>';
                }
                else{
                    return '<div class="badge badge-danger">Inactive</div>';
                }
            })

            ->addColumn('action',  function($row){
                $btn = '<a href="'.route('admin.vendor.show', $row->id).'" data-id="'.$row->id.'" class="view-vendor giftpoke_hover_btn pr-2" data-toggle="tooltip" data-placement="buttom" title="View"><i class="ti-eye" style="font-size:17px;"></i></a>';
                $btn = $btn.'<a href="'.route('admin.vendor.edit', $row->id).'" data-id="'.$row->id.'" class="edit-vendor giftpoke_hover_btn pr-2" data-toggle="tooltip" data-placement="buttom" title="Edit"><i class="ti-pencil" style="font-size:17px;color:gray"></i></a>';
                return $btn;
            })->rawColumns(['image', 'status', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        $role = Role::whereId(2)->first();
        return $role->users()->select('users.id', 'profile_picture', 'username', 'first_name', 'last_name', 'email', 'status');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('allVendors-table')
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
            Column::computed('image')
                  ->exportable(false)
                  ->printable(false),

            Column::make('first_name'),
            Column::make('last_name'),
            Column::make('email'),

            Column::computed('status')
                  ->exportable(false)
                  ->printable(false)
                  ->addClass('text-center'),

            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(10)
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
        return 'User_' . date('YmdHis');
    }
}
