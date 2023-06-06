@extends('backend.layouts.master-layout')

@section('styles')
@endsection

@section('body')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card p-2">
            <div class="card-body">
                {{-- faq Index --}}
                <div id="helpCenter" class="">
                    <h4 class="card-title">Help Center</h4>
                    <div class="row">
                        <div class="col col-2" >
                            <div class="font-weight-bold p-2">Name:</div>
                            <div class="font-weight-bold p-2">Order:</div>
                            <div class="font-weight-bold p-2">Icon:</div>
                            <div class="font-weight-bold p-2">Status:</div>

                        </div>
                        <div class="col col-9">
                            <div class=" p-2">{{ isset($helpCenter->name) ? $helpCenter->name : ''}}</div>
                            <div class=" p-2">{{ isset($helpCenter->order) ? $helpCenter->order : ''}}</div>
                            <div class=" p-2"><i style="font-size: 20px" class="fa">&#{{$helpCenter->icon}}</i></div>
                            <div class=" p-2">
                                @if(isset($helpCenter['is_active']) && $helpCenter['is_active'] == 1  )
                                    <div class="badge badge-success">Active</div>
                                @else
                                    <div class="badge badge-danger">Inactive</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col ">
                            <div class="font-weight-bold p-2">Description:</div>
                            <div class=" p-2">{{ isset($helpCenter->description) ? $helpCenter->description : ''}}</div>
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
