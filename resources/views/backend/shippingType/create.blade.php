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
                    <h3 class="card-title text-center pt-3">Add Shipping Type</h3>
                </div>
                <div></div>
            </div>
            <div class="card-body">
                   {{-- Brands Index start--}}
                    <div id="shipping_type" class="">
                        <form class="forms-sample" method="POST" id="add_shipping_type">
                            <div class="row">
                                <div class="col col-6">
                                    <div class="form-group">
                                        <label for="name">Name<font color="red">*</font></label>
                                        <input type="text" class="form-control" name="name" id="name"/>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col col-1 d-flex align-items-center"></div>
                                <div class="col col-5 d-flex align-items-center">
                                    <div class="form-group">
                                        <label for="is_active" class="m-0">Is Active?<font color="red">*</font></label>
                                        <input type="checkbox" id="is_active" name="is_active" value="1" checked>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-6">
                                    <div class="form-group">
                                        <label for="shipping_cost">Shipping Cost<font color="red">* </font> ($)</label>
                                        <input type="number" class="form-control" name="shipping_cost" min="0" id="shipping_cost"/>
                                        @error('shipping_cost')
                                            <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col col-6">
                                    <div class="form-group">
                                        <label for="min_shipping_days">Min Shipping Days<font color="red">*</font></label>
                                        <input type="number" class="form-control shipping_days_validation" name="min_shipping_days" min="0" id="min_shipping_days"/>
                                        @error('min_shipping_days')
                                            <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-6">
                                    <div class="form-group">
                                        <label for="max_shipping_days">Max Shipping Days<font color="red">*</font></label>
                                        <input type="number" class="form-control shipping_days_validation" name="max_shipping_days" min="0" id="max_shipping_days"/>
                                        @error('max_shipping_days')
                                            <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" id="add-shipping_type_button" class="btn btn-primary mr-2">Create</button>
                            {{-- <button class="btn btn-secondary text-white">Cancel</button> --}}
                        </form>
                    </div>
                {{-- Brands Index end--}}
            </div>
        </div>
    </div>
</div>
@stack('scripts')
@endsection

@section('scripts')
<script src="{{asset('assets/custom/admin/shipping_type/create_shipping_type.js')}}"></script>
<script src="{{asset('assets/custom/admin/shipping_type/delete_shipping_type.js')}}"></script>
@endsection
