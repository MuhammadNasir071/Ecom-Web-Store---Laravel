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
                        <h4 class="card-title">Brands</h4>
                            <div class="row mb-2">
                                <div class="col col-6 d-flex">
                                    <div class="font-weight-bold p-2">Brands:</div>
                                    <div class=" p-2">{{ $brands->title }}</div>
                                </div>

                                <div class="col col-6 d-flex">
                                    <div class="font-weight-bold p-2">Is Active:</div>
                                    <input type="checkbox" id="is_active" name="is_active" value="1" {{isset($brands['is_active']) && $brands['is_active'] == 1 ? 'checked' : ''}} disabled>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col col-6">
                                    <img width="200px" id="imagePreview" src="{{ !is_null($brands['image']) ? url($brands['image']) : asset('assets/images/placeholder-image.png') }}">
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
