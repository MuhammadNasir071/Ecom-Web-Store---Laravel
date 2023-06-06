@extends('backend.layouts.master-layout')

@section('styles')
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <form class="forms-sample" id="banner_update_form"  data-id="{{ $banner->id }}">
                <div class="card p-2">
                    <div class="d-flex justify-content-between align-items-center px-2">
                        <div>
                            <button class="btn btn-secondary m-2 p-2" style=><a href="{{route('admin.banner.index')}}" class="giftpoke_back_btn"><i class="fa fa-angle-left pr-1" style="font-size:12px"></i>Back</a></button>
                        </div>
                        <div style="margin-left: -7%;">
                            <h3 class="card-title text-center pt-3">Edit Banner</h3>
                        </div>
                        <div></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="name">Banner Name<font color="red">*</font></label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{isset($banner['banner_name']) ? $banner['banner_name'] : ''}}"/>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <label for="order">Order<font color="red">*</font></label>
                                    <input type="number" class="form-control" min="0" name="order" id="order" value="{{isset($banner['order']) ? $banner['order'] : ''}}"/>
                                    @error('order')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-3 d-flex align-items-center">
                                <div class="form-group m-0">
                                    <label for="is_active" class="m-0">Is Active?<font color="red">*</font></label>
                                    <input type="checkbox" id="is_active" name="is_active" value="1" {{isset($banner['is_active']) && $banner['is_active'] == 1 ? 'checked' : ''}}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-6">
                                <img width='200px' id="imagePreview" src="{{ !is_null($banner['path']) ? url($banner['path']) : asset('assets/images/placeholder_image.png') }}">
                                <div class="form-group">
                                    <input id="upload-photo" name="image" type="file" onchange="loadFile(event)" style="margin-top: 15px;">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2 update_banner_button">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@section('scripts')
    <script src="{{ asset('assets/custom/admin/banners/create_banner.js') }}"></script>
@endsection

@endsection
