@extends('backend.layouts.master-layout')

@section('styles')
@endsection

@section('body')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card p-2">
            <div class="card-body">
                {{-- faq Index --}}
                <div id="faqs" class="">
                    <h4 class="card-title">FAQs</h4>
                    <div class="row">
                        <div class="col d-flex" style="background-color:rgb(231, 234, 236); border-radius:7px 7px 0px 0px">
                            <div class="font-weight-bold p-2">Question:</div>
                            <div class=" p-2">{{ isset($faq->question) ? $faq->question . '?': ''}}</div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col d-flex"  style="background-color:rgb(233, 245, 248); border-radius:0px 0px 7px 7px">
                            <div class="font-weight-bold p-2">Answer:</div>
                            <div class=" ml-2" style="padding: 10px;">{{ isset($faq->answer) ? $faq->answer : ''}}</div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col col-2 d-flex">
                            <div class="font-weight-bold p-2">Order:</div>
                            <div class=" p-2">{{ isset($faq->order) ? $faq->order : ''}}</div>
                        </div>
                        <div class="col col-2 d-flex">
                            <div class="font-weight-bold p-2">Status:</div>
                            <div class="p-2">
                                @if(isset($faq['is_active']) && $faq['is_active'] == 1  )
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
