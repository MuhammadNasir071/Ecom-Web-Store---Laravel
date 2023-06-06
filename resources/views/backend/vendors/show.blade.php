@extends('backend.layouts.master-layout')

@section('styles')
    <style>
        .SumoSelect {
            display: block;
            width: auto;
        }
        .SumoSelect .sumoSelect_search{
            padding: 15px 0px 0px 20px;
            border: 1px solid #CED4DA;
            border-radius: 3px;
        }
        #managed_product_vendor #managedVendorProduct_length{
            display: none!important;
        }
        #managed_by_giftpokeProducts #managedGiftpokeProduct_length{
            display: none!important;
        }
        .expandable-table thead tr th {
            background-color: white !important;
            color: black !important;
        }
        .nav-tabs .font-weight-bold a:hover{
            text-decoration: none;
        }
        .nav-tabs .font-weight-bold .active{
            color:#fff!important;
            padding: 8px 10px;
            border-radius: 5px;
            border:2px solid #1c75bc!important;
            background-color:  #1c75bc !important;
        }

    </style>
@endsection

@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="card p-2">
            <div class="d-flex justify-content-between align-items-center px-2">
                <div>
                    <button class="btn btn-secondary m-2 p-2" style=><a href="{{route('admin.vendor.index')}}" class="giftpoke_back_btn"><i class="fa fa-angle-left pr-1" style="font-size:12px"></i>Back</a></button>
                </div>
                <div style="margin-left: -7%;">
                    <h3 class="card-title text-center pt-3">Vendor</h3>
                </div>
                <div></div>
            </div>
            <div class="card-body">
                {{-- Vendor Profile View --}}
                <div id="categories" class="">
                    <h3 class="card-title ">Profile Info</h3>
                    <div class="row pb-4"> 
                        <div class="col col-2">
                            <div class="font-weight-bold p-2">Email:</div>
                            <div class="font-weight-bold p-2">Vender ID:</div>
                            <div class="font-weight-bold p-2">First Name:</div>
                            <div class="font-weight-bold p-2">Last Name:</div>
                            <div class="font-weight-bold p-2">Status:</div>
                            <div class="font-weight-bold p-2">Country:</div>
                            <div class="font-weight-bold p-2">State:</div>
                            <div class="font-weight-bold p-2">City:</div>
                            <div class="font-weight-bold p-2">Address:</div>
                        </div>
                        <div class="col col-4">
                            <div class=" p-2"> {{isset($vendors['email']) ? $vendors['email'] : ''}}</div>
                            <div class=" p-2"> {{isset($vendors['username']) ? $vendors['username'] : ''}}</div>
                            <div class=" p-2"> {{isset($vendors['first_name']) ? $vendors['first_name'] : ''}}</div>
                            <div class=" p-2"> {{isset($vendors['last_name']) ? $vendors['last_name'] : ''}}</div>
                            <div class=" p-2">
                                @if(isset($vendors['status']) && $vendors['status'] == 'active')
                                    <div class="badge badge-success">Active</div>
                                @else 
                                    <div class="badge badge-danger">Inactive</div>
                                @endif
                            </div> 
                            <div class=" p-2"> {{isset($country['name']) ? $country['name'] : ''}}</div>
                            <div class=" p-2"> {{isset($state['name']) ? $state['name'] : ''}}</div>
                            <div class=" p-2"> {{isset($vendors['city']) ? $vendors['city'] : ''}}</div>
                            <div class=" p-2"> {{isset($vendors['address']) ? $vendors['address'] : ''}}</div>
                        </div>
                        <div class="col col-4">
                            <div style="max-width:300px;height:300px">
                                <img style="width:300px;height:300px" id="imagePreview" src="{{ !is_null($vendors['profile_picture']) ? url($vendors['profile_picture']) : asset('assets/images/placeholder_image.png') }}">
                            </div>
                        </div>
                    </div>

                    {{-- Vendor Business Info --}}
                    <h3 class="card-title ">Business Info</h3>
                    <div class="row">
                        <div class="col col-3">
                            <div class="font-weight-bold p-2">Company/Store Name:</div>
                            <div class="font-weight-bold p-2">Company URL:</div>
                            <div class="font-weight-bold p-2">Business Type:</div>
                        </div>
                        <div class="col col-6">
                            <div class="p-2"> {{isset($vendors['company_name']) ? $vendors['company_name'] : ''}}</div>
                            <div class="p-2"> {{isset($vendors['company_url']) ? $vendors['company_url'] : ''}}</div>
                            <div class="p-2"> {{isset($vendors['job_title']) ? $vendors['job_title'] : ''}}</div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div><br>

        {{-- Vendor's all products section start--}}
        <div class="row">
            <div class="col-md-12  mb-0">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="active px-5 py-3 font-weight-bold">
                            <a class="active" data-toggle="tab" href="#vendor_all_products">All Products</a>
                        </li>
                        <li class="px-5 py-3 font-weight-bold ">
                            <a data-toggle="tab" data-vendor_id="{{$vendors->id}}" id="managed_product_vendors_view" href="#managed_product_vendor">
                                Products Managed by {{isset($vendors->first_name) ? $vendors->first_name : 'Vendor '}} {{isset($vendors->last_name) ? $vendors->last_name : ''}}</a>
                        </li>
                        <li class="px-5 py-3 font-weight-bold ">
                            <a data-toggle="tab" href="#managed_by_giftpokeProducts">Products Managed by GiftPoke</a>
                        </li>
                    </ul>

                    <div class="tab-content border-0">
                        {{-- All VENDOR PRODUCTS --}}
                        <div id="vendor_all_products" class="tab-pane fade in active show">
                            <div id="vendorProducts" class="all_gift_pock_table">
                                <h3 class="card-title ml-3">{{__('All Products')}}</h3>
                                <div>
                                    <a href="{{route('admin.products.create')}}" class="btn btn-primary ml-2" style="float: right;width: 140px;">{{__('Add Product')}}</a>
                                </div>
                                {{ $dataTable->table() }}
                            </div>
                        </div>
    
                        {{-- PRODUCTS MANAGED BY VENDOR --}}
                        <div id="managed_product_vendor" class="tab-pane fade">
                            <h3 class="card-title ml-3">Products Managed by {{isset($vendors->first_name) ? $vendors->first_name : 'Vendor '}} 
                                {{isset($vendors->last_name) ? $vendors->last_name : ''}}</h3>
                            <table id="managedVendorProduct" class="display expandable-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Sku</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($managed_by_vendorProducts as $manageVendorProduct)
                                    <tr>
                                        <td><img src="{{url($manageVendorProduct['media'][0]['product_image'])}}" alt="" style="width:38px;height:38px;border-radius:50%"></td>
                                        <td>{{$manageVendorProduct->id}}</td>
                                        <td>{{$manageVendorProduct->name}}</td>
                                        <td>{{$manageVendorProduct->sku}}</td>
                                        <td>{{$manageVendorProduct->price}}</td>
                                        <td>{{$manageVendorProduct->quantity}}</td>
                                        <td>
                                            <a href="{{route('admin.products.show', $manageVendorProduct->id)}}" data-id="{{$manageVendorProduct->id}}" class="view-products giftpoke_hover_btn pr-2" data-toggle="tooltip" data-placement="buttom" title="View"><i class="ti-eye" style="font-size:17px;"></i></a>
                                            <a href="{{route('admin.products.edit', $manageVendorProduct->id)}}" data-id="{{$manageVendorProduct->id}}" class="edit-products giftpoke_hover_btn pr-2" data-toggle="tooltip" data-placement="buttom" title="Edit"><i class="ti-pencil" style="font-size:17px;color:gray"></i></a>
                                            <a href="javascript:void(0)" data-id="{{$manageVendorProduct->id}}" class="delete-products giftpoke_hover_btn" data-toggle="tooltip" data-placement="buttom" title="Delete"><i class="ti-trash" style="font-size:17px;color:red"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
    
                        {{-- PRODUCTS MANAGED BY GIFTPOKE --}}
                        <div id="managed_by_giftpokeProducts" class="tab-pane fade">
                            <h3 class="card-title ml-3">Products Managed by GiftPoke</h3>
                            <table id="managedGiftpokeProduct" class="display expandable-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Sku</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($managed_by_giftpokeProducts as $manageVendorProduct)
                                    <tr>
                                        <td><img src="{{url($manageVendorProduct['media'][0]['product_image'])}}" alt="" style="width:38px;height:38px;border-radius:50%"></td>
                                        <td>{{$manageVendorProduct->id}}</td>
                                        <td>{{$manageVendorProduct->name}}</td>
                                        <td>{{$manageVendorProduct->sku}}</td>
                                        <td>{{$manageVendorProduct->price}}</td>
                                        <td>{{$manageVendorProduct->quantity}}</td>
                                        <td>
                                            <a href="{{route('admin.products.show', $manageVendorProduct->id)}}" data-id="{{$manageVendorProduct->id}}" class="view-products giftpoke_hover_btn pr-2" data-toggle="tooltip" data-placement="buttom" title="View"><i class="ti-eye" style="font-size:17px;"></i></a>
                                            <a href="{{route('admin.products.edit', $manageVendorProduct->id)}}" data-id="{{$manageVendorProduct->id}}" class="edit-products giftpoke_hover_btn pr-2" data-toggle="tooltip" data-placement="buttom" title="Edit"><i class="ti-pencil" style="font-size:17px;color:gray"></i></a>
                                            <a href="javascript:void(0)" data-id="{{$manageVendorProduct->id}}" class="delete-products giftpoke_hover_btn" data-toggle="tooltip" data-placement="buttom" title="Delete"><i class="ti-trash" style="font-size:17px;color:red"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stack('scripts')
@endsection

@section('scripts')
{{ $dataTable->scripts() }}
<script>
    $(document).ready( function () {
        $('#managedVendorProduct').DataTable();
    });
    $(document).ready( function () {
        $('#managedGiftpokeProduct').DataTable();
    });
</script>
<script src="{{asset('assets/custom/admin/products/delete_products.js')}}"></script>

@endsection
