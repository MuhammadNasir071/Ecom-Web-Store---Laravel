@extends('backend.layouts.master-layout')

@section('styles')
    <style>
        .privacies_span span{
            background-color: #4B49AC;
            color: #ffff;
        }
    </style>
@endsection

@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="card p-2">
            <div class="card-body">
                {{-- privacy Index --}}
                <div id="privacy" class="">
                    <h4 class="card-title">Privacy</h4>
                    <div class="row mb-4">
                        <div class="col col-2 ">
                            <div class="font-weight-bold p-2">Name:</div>
                            <div class="font-weight-bold p-2">Path:</div>
                            <div class="font-weight-bold p-2">Level:</div>
                            <div class="font-weight-bold p-2">Status:</div>
                        </div>
                        <div class="col col-6">
                            <div class=" p-2">{{ isset($privacy[0]['name']) ? $privacy[0]['name'] : ''}}</div>

                            <div class=" p-2 privacies_span">
                                <span class="pl-2">{{ isset($privacy[0]['allParentPrivacies']['allParentPrivacies']['allParentPrivacies']['name']) ? $privacy[0]['allParentPrivacies']['allParentPrivacies']['allParentPrivacies']['name']. ' >': ' ' }} </span>
                                <span >{{ isset($privacy[0]['allParentPrivacies']['allParentPrivacies']['name']) ? $privacy[0]['allParentPrivacies']['allParentPrivacies']['name']. ' >': ' ' }} </span>
                                <span >{{ isset($privacy[0]['allParentPrivacies']['name']) ? $privacy[0]['allParentPrivacies']['name']. ' > ': ' '}} </span>
                                <span class="pr-2">{{ isset($privacy[0]['name']) ? $privacy[0]['name'] : ''}}</span>
                            </div>

                            <div class=" p-2">{{ isset($privacy[0]['level']) ? $privacy[0]['level'] : ''}}</div>
                            <div class=" p-2">
                                @if(isset($privacy[0]['is_active']) && $privacy[0]['is_active'] == 1 )
                                    <div class="badge badge-success">Active</div>
                                @else
                                    <div class="badge badge-danger">Inactive</div>
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
