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
        <form class="forms-sample" id="add_privacy_form">
            <div class="card p-2">
                <div class="d-flex justify-content-between align-items-center px-2">
                    <div>
                        <button class="btn btn-secondary m-2 p-2" style=><a href="{{route('admin.privacy.index')}}" class="giftpoke_back_btn"><i class="fa fa-angle-left pr-1" style="font-size:12px"></i>Back</a></button>
                    </div>
                    <div style="margin-left: -7%;">
                        <h3 class="card-title text-center pt-3">Add Privacy</h3>
                    </div>
                    <div></div>
                </div>
                <div class="card-body">
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
                        <div class="col col-3 d-flex align-items-center">
                            <div class="form-group m-0">
                                <label for="is_active" class="m-0">Is Active?<font color="red">*</font></label>
                                <input type="checkbox" id="is_active" name="is_active" checked>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="privacy-parent-div">
                        <div class="col col-6 privacy-div">
                            <div class="form-group">
                                <label for="parent_privacy">{{__('Parent Privacy')}}</label>
                                <select class="select form-control input-field sumoSelect_search parent_privacy ingoreMultipleSelections" data-level="0"  id="parent_privacy" name="parent_privacy" data-ignore="1">
                                    <option value="0">{{__("Select a privacy if it's child")}}</option>
                                    @if(isset($privacies) && count($privacies) > 0)
                                        @foreach($privacies as $privacy)
                                            <option value="{{$privacy['id']}}">{{$privacy['name']}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('parent_privacy')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" id="add_privacy_button">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stack('scripts')
@endsection

@section('scripts')
<script src="{{asset('assets/custom/admin/privacy/create_privacy.js')}}"></script>
@endsection
