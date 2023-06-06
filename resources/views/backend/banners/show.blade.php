@extends('backend.layouts.master-layout')

@section('styles')
@endsection

@section('body')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card p-2">
            <div class="card-body">
                {{-- banners Index --}}
                <div id="banners" class="">
                    <h4 class="card-title">Banner</h4>
                    <div class="row mb-4">
                        <div class="col col-4 d-flex">
                            <div class="font-weight-bold p-2">Name:</div>
                            <div class=" p-2">{{ isset($banner->banner_name) ? $banner->banner_name : ''}}</div>
                        </div>
                        <div class="col col-4 d-flex">
                            <div class="font-weight-bold p-2">Order:</div>
                            <div class=" p-2">{{ isset($banner->order) ? $banner->order : '' }}</div>
                        </div>
                        <div class="col col-4 d-flex">
                            <div class="font-weight-bold p-2">Is Active:</div>
                            @if(isset($banner['is_active']) && $banner['is_active'] == 1)
                                <div class="badge badge-success mt-2" style="width: 25%;height: 27px;">Active</div>
                            @else
                                <div class="badge badge-danger mt-2" style="width: 25%;height: 27px;">Inactive</div>
                            @endif
                        </div>
                    </div>
                    <div class="row" >
                        <div class="font-weight-bold pl-4 pb-1">Banner Image:</div>
                        <div class="col col-12 ml-4 mr-5 p-0" style="">
                            <img id="imagePreview" src="{{ !is_null($banner['path']) ? url($banner['path']) : asset('assets/images/placeholder-image.png') }}" style="width: 96%; height:300px">
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
