@extends('backend.layouts.master-layout')

@section('styles')
@endsection

@section('body')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card p-2">
            <div class="d-flex justify-content-between align-items-center px-2">
                <div>
                    <button class="btn btn-secondary m-2 p-2" style=><a href="{{route('admin.events.index')}}" class="giftpoke_back_btn"><i class="fa fa-angle-left pr-1" style="font-size:12px"></i>Back</a></button>
                </div>
                <div style="margin-left: -7%;">
                    <h3 class="card-title text-center pt-3">Event</h3>
                </div>
                <div></div>
            </div>
            <div class="card-body">
                {{-- banners Index --}}
                <div id="events" class="">
                    <div class="row mt-3">
                        <div class="col col-4 d-flex">
                            <img id="imagePreview" width="300px" src="{{ !is_null($event_image[0]['media_path']) ? url($event_image[0]['media_path']) : asset('assets/images/placeholder_image.png') }}">
                        </div>
                        <div class="col col-2">
                            <div class="font-weight-bold p-2">Name: </div>
                            <div class="font-weight-bold p-2">Status: </div>
                            <div class="font-weight-bold p-2">State Date:</div>
                            <div class="font-weight-bold p-2">End Date:</div>
                        </div>
                        <div class="col col-6 ">
                            <div class=" p-2">{{ isset($event->name) ? $event->name : '' }}</div>
                            <div class=" p-2">
                                @if(isset($event['is_active']) && $event['is_active'] == 1 )
                                    <div class="badge badge-success">Active</div>
                                @else
                                    <div class="badge badge-danger">Inactive</div>
                                @endif
                            </div>
                            <div class=" p-2">{{ isset($event->start_date) ? $event->start_date : '' }}</div>
                            <div class=" p-2">{{ isset($event->end_date) ? $event->end_date : '' }}</div>
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
