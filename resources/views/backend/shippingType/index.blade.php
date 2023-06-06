@extends('backend.layouts.master-layout')

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/custom/admin/page/admin_profile_settings.css')}}">
@endsection

@section('body')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card p-2">
            <div class="card-body">
                   {{-- Shipping type Index --}}
                    <div id="shippingtypes" class="">
                        <h4 class="card-title">Shipping Types</h4>
                        <div>
                            <a href="{{ route('admin.shippingtype.create') }}" class="btn btn-primary ml-2" style="float: right;width: 170px;">Add Shipping Type</a>
                        </div>

                        {{$dataTable->table()}}

                    </div>
            </div>
        </div>
    </div>
</div>
@stack('scripts')
@endsection

@section('scripts')
{{$dataTable->scripts()}}
<script src="{{asset('assets/custom/admin/shipping_type/delete_shipping_type.js')}}"></script>
@endsection
