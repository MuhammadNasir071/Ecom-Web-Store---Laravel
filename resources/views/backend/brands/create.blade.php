@extends('backend.layouts.master-layout')

@section('styles')
@endsection

@section('body')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card p-2">
            <div class="pr-3 pt-3">
                <button class="btn btn-secondary" style="float: right;"><a href="{{route('admin.brands.index')}}" class="giftpoke_back_btn">Back</a></button>
            </div>
            <div class="card-body">
                   {{-- Brands Index start--}}
                    <div id="categories" class="">
                        <h4 class="card-title">Add Brands</h4>
                        <form class="forms-sample add_brands" method="POST">
                            <div class="row">
                                <div class="col col-6">
                                    <div class="form-group">
                                        <label for="name">Brands Title<font color="red">*</font></label>
                                        <input type="text" class="form-control" name="title" id="title" value="{{isset($brands['title']) ? $brands['title'] : ' '}}"/>
                                        @error('title')
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
                            <div class="row">
                                <div class="col col-6">
                                    <img width="200px" id="imagePreview" src="{{ asset('assets/images/placeholder-image.png') }}">
                                    <div class="form-group">
                                        <input id="upload-photo" name="image" type="file" onchange="loadFile(event)">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2 add-button">Create</button>
                            {{-- <button class="btn btn-secondary">Cancel</button> --}}
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
<script src="{{asset('assets/custom/admin/brands/create_brands.js')}}"></script>
<script src="{{asset('assets/custom/admin/brands/delete_brands.js')}}"></script>
@endsection
