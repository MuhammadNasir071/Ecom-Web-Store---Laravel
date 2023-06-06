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
    <div class="col-md-12">
        <form id="add_vendors" class="forms-sample" method="POST">
            <div class="card p-2">
                <div class="d-flex justify-content-between align-items-center px-2">
                    <div>
                        <button class="btn btn-secondary m-2 p-2" style=><a href="{{route('admin.vendor.index')}}" class="giftpoke_back_btn"><i class="fa fa-angle-left pr-1" style="font-size:12px"></i>Back</a></button>
                    </div>
                    <div style="margin-left: -7%;">
                        <h3 class="card-title text-center pt-3">Add Vendors</h3>
                    </div>
                    <div></div>
                </div>
                <div class="card-body">
                    <div id="vendor" class="vendor_form">
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="first_name">First Name<font color="red">*</font></label>
                                    <input type="text" class="form-control" name="first_name" id="first_name"/>
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="last_name">Last Name<font color="red">*</font></label>
                                    <input type="text" class="form-control" name="last_name" id="last_name"/>
                                    @error('last_name')
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
                                    <label for="email">Email<font color="red">*</font></label>
                                    <input type="email" class="form-control" name="email" id="email"/>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="phone_number">Phone</label>
                                    <input type="text" class="form-control" name="phone_number" id="phone_number"/>
                                    @error('phone_number')
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
                                    <label for="country">Country</label>
                                    <select class="select form-control input-field sumoSelect_search"  id="country" name="country">
                                        @if(isset($countries) && count($countries) > 0)
                                            @foreach($countries as $country)
                                                <option value="{{$country['id']}}">{{$country['name']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>  
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="states">State</label>
                                    <select class="select form-control input-field"  id="states" name="states" style="color: black;">
                                        @if(isset($states) && count($states) > 0)
                                            @foreach($states as $state)
                                            <option value="{{$state['id']}}">{{$state['name']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('states')
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
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" name="city" id="city" />
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>  
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <label for="fax">FAX No. </label>
                                    <input type="text" class="form-control" name="fax" id="fax"/>
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <label for="zip_code">Zip Code</label>
                                    <input type="text" class="form-control" name="zip_code" id="zip_code"/>
                                    @error('zip_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea type="text" placeholder="Enter your address" class="form-control" rows="4" name="address" id="address"> </textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-6">
                                <img width="170px" id="imagePreview" src="{{ asset('assets/images/placeholder_image.png') }}">
                                <div class="form-group">
                                    <input id="upload-photo" name="image" type="file" onchange="loadFile(event)" style="margin-top: 15px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card p-2">
                <div class="card-body">
                    <h5 class="card-title">Business Info</h5>
                    <div id="vendor" class="vendor_form">
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="company_name">Company / Store Name</label>
                                    <input type="text" class="form-control" name="company_name" id="company_name" />
                                </div>  
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="company_url">Company URL</label>
                                    <input type="text" class="form-control" name="company_url" id="company_url"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="job_title">Business Type</label>
                                    <select class="select form-control input-field sumoSelect_search"  id="business_type" name="business_type" required>
                                        @if(isset($business_types) && count($business_types) > 0)
                                            @foreach($business_types as $business_type)
                                                <option value="{{$business_type['id']}}">{{$business_type['title']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>  
                            </div>
                        </div>
                        <div class="pt-4">
                            <button type="submit" id="add_vendor_button" class="btn btn-primary mr-2">Create</button>
                            {{-- <button class="btn text-white btn-secondary">Cancel</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stack('scripts')
@endsection

@section('scripts')
<script src="{{asset('assets/custom/admin/vendors/create_vendor.js')}}"></script>
@endsection
