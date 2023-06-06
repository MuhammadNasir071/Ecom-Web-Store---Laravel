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
        .categoties_span span{
            background-color: #4B49AC;
            color: #ffff;
        }

    </style>
@endsection

@section('body')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card p-2">
            <div class="d-flex justify-content-between align-items-center px-2">
                <div>
                    <button class="btn btn-secondary m-2 p-2" style=><a href="{{route('admin.categories.index')}}" class="giftpoke_back_btn"><i class="fa fa-angle-left pr-1" style="font-size:12px"></i>{{__('Back')}}</a></button>
                </div>
                <div style="margin-left: -7%;">
                    <h3 class="card-title text-center pt-3">{{__('Category')}}</h3>
                </div>
                <div></div>
            </div>
            <div class="card-body">
                   {{-- Categories Index --}}
                    <div id="categories" class="">
                        {{-- @php
                            $html = '';
                            $parentCategory = $category->replicate();
                            while($parentCategory = $parentCategory->allParentCategories) {
                                $html = $parentCategory->name.' =====> '.$html;
                            }
                            if(!is_null($category->allParentCategories)) {
                                $html = $html.$category->name;
                            }
                        @endphp --}}
                        <div class="row pt-3">
                            <div class="col col-4">
                                <img width="300px" height="300px" id="imagePreview" src="{{ !is_null($category[0]['image']) ? url($category[0]['image']) : asset('assets/images/placeholder_image.png') }}">
                            </div>
                            <div class="col col-2">
                                <div class="font-weight-bold p-2">{{__('Category:')}}</div>
                                <div class="font-weight-bold p-2">{{__('Path:')}}</div>
                                <div class="font-weight-bold p-2">{{__('Level:')}}</div>
                                <div class="font-weight-bold p-2">{{__('Is Active:')}}</div>
                            </div>
                            <div class="col col-6">
                                <div class=" p-2">
                                    <span class="pr-2">{{ isset($category[0]['name']) ? $category[0]['name'] : ''}}</span>
                                </div>

                                <div class=" p-2 categoties_span">
                                    <span class="pl-2">{{ isset($category[0]['allParentCategories']['allParentCategories']['allParentCategories']['name']) ? $category[0]['allParentCategories']['allParentCategories']['allParentCategories']['name']. ' >': ' ' }} </span>
                                    <span >{{ isset($category[0]['allParentCategories']['allParentCategories']['name']) ? $category[0]['allParentCategories']['allParentCategories']['name']. ' >': ' ' }} </span>
                                    <span >{{ isset($category[0]['allParentCategories']['name']) ? $category[0]['allParentCategories']['name']. ' > ': ' '}} </span>
                                    <span class="pr-2">{{ isset($category[0]['name']) ? $category[0]['name'] : ''}}</span>
                                </div>
                                
                                <div class=" p-2">
                                    {{ $category[0]['level'] }}
                                </div>
                                
                                <div class=" p-2">
                                    @if(isset($category[0]['is_active']) && $category[0]['is_active'] == 1)
                                        <div class="badge badge-success">{{__('Active')}}</div>
                                    @else 
                                        <div class="badge badge-danger">{{__('Inactive')}}</div>
                                    @endif
                                </div>
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