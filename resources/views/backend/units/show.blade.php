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
            <div class="card-body">
                   {{-- Categories Index --}}
                    <div id="categories" class="">
                        <h4 class="card-title">Unit</h4>
                            <div class="row mb-2">
                                <div class="col col-6 d-flex">
                                    <div class="font-weight-bold p-2">Name:</div>
                                    <div class=" p-2">{{ $unit->name }}</div>
                                </div>

                                <div class="col col-6 d-flex">
                                    <div class="font-weight-bold p-2">Code:</div>
                                    <div class=" p-2">{{ $unit->code }}</div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col col-6 d-flex">
                                    <div class="font-weight-bold p-2">Base Unit:</div>
                                    <div class=" p-2">{{ $unit->base_unit ?? 'Not Specified' }}</div>
                                </div>

                                <div class="col col-6 d-flex">
                                    <div class="font-weight-bold p-2">Operator:</div>
                                    <div class=" p-2">{{ $unit->operator ?? 'Not Specified' }}</div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col col-6 d-flex">
                                    <div class="font-weight-bold p-2">Operation Value:</div>
                                    <div class=" p-2">{{ $unit->operation_value ?? 'Not Specified' }}</div>
                                </div>
                                <div class="col col-6 d-flex">
                                    <div class="font-weight-bold p-2">Is Active:</div>
                                    <input type="checkbox" id="is_active" name="is_active" value="1" {{isset($unit['is_active']) && $unit['is_active'] == 1 ? 'checked' : ''}} disabled>
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
