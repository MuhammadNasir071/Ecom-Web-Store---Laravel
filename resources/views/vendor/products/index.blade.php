@extends('vendor.layouts.master-layout')

@section('styles')
@endsection

@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="card p-2">
            <div class="card-body">
                {{-- All Products Index --}}
                <div id="vendorProducts" class="all_gift_pock_table">
                    <h4 class="card-title">{{__('Products')}}</h4>
                    <div>
                        <a href="{{route('admin.products.create')}}" class="btn btn-primary ml-2" style="float: right;width: 140px;">{{__('Add Product')}}</a>
                    </div>

                    {{$dataTable->table()}}

                </div>
            </div>
        </div>
    </div>
</div>
@stack('scripts')
@endsection

@section('vendor_scripts')
{{$dataTable->scripts()}}
@endsection
