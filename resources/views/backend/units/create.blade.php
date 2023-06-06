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
            <div class="pr-3 pt-3">
                <button class="btn btn-secondary" style="float: right;"><a href="{{route('admin.units.index')}}" class="giftpoke_back_btn">Back</a></button>
            </div>
            <div class="card-body">
                
                   {{-- Categories Index --}}
                    <div id="categories" class="">
                        <h4 class="card-title">Add Unit</h4>
                        
                        <form class="forms-sample add_unit" method="POST">
                            <div class="row">
                                <div class="col col-6">
                                    <div class="form-group">
                                        <label for="name">Unit Name<font color="red">*</font></label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{isset($unit['name']) ? $unit['name'] : ' '}}" placeholder="e.g. kilogram"/>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col col-6">
                                    <div class="form-group">
                                        <label for="code">Unit Code<font color="red">*</font></label>
                                        <input type="text" class="form-control" name="code" id="code" value="{{isset($unit['code']) ? $unit['code'] : ' '}}" placeholder="e.g. kg"/>
                                        @error('code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-6">
                                    <div class="form-group">
                                        <label for="base_unit">Base unit</label>
                                        <input type="number" min="1" class="form-control" name="base_unit" id="base_unit" value="{{isset($unit['base_unit']) ? $unit['base_unit'] : ' '}}"/>
                                        @error('base_unit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col col-6">
                                    <div class="form-group">
                                        <label for="operator">Operator</label>
                                        <select class="select form-control input-field sumoSelect_search operator" id="operator" name="operator">
                                            <option value="">Select an operator if applicable</option>
                                            <option value="*">*</option>
                                            <option value="/">/</option>
                                        </select>
                                        @error('operator')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-6">
                                    <div class="form-group">
                                        <label for="operation_value">Operation Value</label>
                                        <input type="number" min="1" class="form-control" name="operation_value" id="operation_value" value="{{isset($unit['operation_value']) ? $unit['operation_value'] : ' '}}"/>
                                        @error('operation_value')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col col-6 d-flex align-items-center">
                                    <div class="form-group m-0">
                                        <label for="is_active" class="m-0">Is Active?<font color="red">*</font></label>
                                        <input type="checkbox" id="is_active" name="is_active" value="1" checked>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2 add-button">Create</button>
                            {{-- <button class="btn btn-secondary cancel">Cancel</button> --}}
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@stack('scripts')
@endsection

@section('scripts')
<script src="{{asset('assets/custom/admin/units/create_unit.js')}}"></script>
@endsection
