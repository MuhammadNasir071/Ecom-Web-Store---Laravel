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

    </style>
@endsection

@section('body')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card p-2">
            <div class="d-flex justify-content-between align-items-center px-2">
                <div>
                    <button class="btn btn-secondary m-2 p-2" style=><a href="{{route('admin.shippingtype.index')}}" class="giftpoke_back_btn"><i class="fa fa-angle-left pr-1" style="font-size:12px"></i>Back</a></button>
                </div>
                <div style="margin-left: -7%;">
                    <h3 class="card-title text-center pt-3">Shipping Type</h3>
                </div>
                <div></div>
            </div>
            <div class="card-body">
                   {{-- Categories Index --}}
                    <div id="shippingtype" class="">
                            <div class="row">
                                <div class="col col-6 d-flex">
                                    <div class="font-weight-bold p-2">Name:</div>
                                    <div class=" p-2">{{ $shippingType->name }}</div>
                                </div>
                                <div class="col col-6 d-flex">
                                    <div class="font-weight-bold p-2">Status:</div>
                                    <div class=" p-2">
                                        @if(isset($shippingType['is_active']) && $shippingType['is_active'] == 1)
                                            <div class="badge badge-success">Active</div>
                                        @else 
                                            <div class="badge badge-danger">Inactive</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col col-6 d-flex">
                                    <div class="font-weight-bold p-2">Shipping Cost:</div>
                                    <div class=" p-2">{{ $shippingType['shipping_cost'] }}</div>
                                </div>
                                <div class="col col-6 d-flex">
                                    <div class="font-weight-bold p-2">Min Shipping Days:</div>
                                    <div class=" p-2">{{ $shippingType['min_shipping_days'] }}</div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col col-6 d-flex">
                                    <div class="font-weight-bold p-2">Max Shipping Days:</div>
                                    <div class=" p-2">{{ $shippingType['max_shipping_days'] }}</div>
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
@endsection
