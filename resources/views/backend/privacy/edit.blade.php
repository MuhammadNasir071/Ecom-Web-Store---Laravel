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
            <form class="forms-sample" id="privacy_update_form"  data-id="{{ $privacy->id }}">
                <div class="card p-2">
                    <div class="d-flex justify-content-between align-items-center px-2">
                        <div>
                            <button class="btn btn-secondary m-2 p-2" style=><a href="{{route('admin.privacy.index')}}" class="giftpoke_back_btn"><i class="fa fa-angle-left pr-1" style="font-size:12px"></i>Back</a></button>
                        </div>
                        <div style="margin-left: -7%;">
                            <h3 class="card-title text-center pt-3">Edit Privacy</h3>
                        </div>
                        <div></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="name">Name<font color="red">*</font></label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{isset($privacy['name']) ? $privacy['name'] : ''}}"/>
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
                                    <input type="checkbox" id="is_active" name="is_active" value="1" {{isset($privacy['is_active']) && $privacy['is_active'] == 1 ? 'checked' : ''}}>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row" id="privacy-parent-div">
                            @if (is_null($parentPrivacy->allParentPrivacies))
                                @php
                                    $tempPrivacys = $privacies->where('level', 0);
                                @endphp
                                <div class="col col-6 privacy-div">
                                    <div class="form-group">
                                        <label for="parent_privacy">{{__('Parent Privacy')}}</label>
                                        <select class="select form-control input-field sumoSelect_search parent_privacy" data-level="0"  id="parent_privacy" name="parent_privacy">
                                            <option value="0">{{__("Select a privacy if it's child")}}</option>
                                            @if(isset($tempPrivacies) && $tempPrivacies->count() > 0)
                                                @foreach($tempPrivacys as $rootPrivacy)
                                                    <option value="{{$rootPrivacy['id']}}" {{ !is_null($parentPrivacy['id']) && $parentPrivacy['id'] == $rootPrivacy['id'] ? 'selected' : '' }}>{{$rootPrivacy['name']}}</option>
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
                            @endif
                            @php
                                $html = '';
                            @endphp
                            @while ($parentPrivacy = $parentPrivacy->allParentPrivacies)
                                @php
                                    $tempPrivacy = $privacies->where('parent_id', $parentPrivacy->parent_id)->where('level', $parentPrivacy->level);
                                    $dropdown = '<div class="col col-6 privacy-div"><div class="form-group">
                                            <label for="parent_privacy">Parent privacy</label>
                                            <select class="select form-control input-field sumoSelect_search parent_privacy" data-level="'.$parentPrivacy['level'].'"  id="parent_privacy" name="parent_privacy">
                                                <option value="0">Select a privacy if it\'s child</option>';
                                                if(isset($tempPrivacy) && $tempPrivacy->count() > 0)
                                                {
                                                    foreach($tempPrivacy as $rootPrivacy)
                                                    {
                                                        $dropdown .= '<option value="'.$rootPrivacy['id'].'"'. (!is_null($parentPrivacy['id']) && $parentPrivacy['id'] == $rootPrivacy['id'] ? 'selected' : '').'>'.$rootPrivacy['name'].'</option>';
                                                    }
                                                }
                                            $dropdown .= '</select>
                                        </div>
                                    </div>';
                                    $html = $dropdown.$html;
                                @endphp
                            @endwhile
                            {!! $html !!}
                        </div>

                        <button type="submit" class="btn btn-primary mr-2" id="update_privacy_button">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@section('scripts')
    <script src="{{asset('assets/custom/admin/privacy/create_privacy.js')}}"></script>
@endsection

@endsection
