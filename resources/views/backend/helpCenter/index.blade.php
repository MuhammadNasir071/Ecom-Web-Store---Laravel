@extends('backend.layouts.master-layout')

@section('styles')
@endsection

@section('body')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card p-2">
            <div class="card-body">
                   {{-- helpCenter Index --}}
                    <div id="HelpCenterDataTable" class="all_gift_pock_table">
                    <h4 class="card-title">Help Center</h4>
                    <div>
                        <a href="{{ route('admin.helpcenter.create') }}" class="btn btn-primary ml-2" style="float: right;width: 140px;">Add Query</a>
                    </div>

                    {{$dataTable->table()}}

                </div>
            </div>
        </div>
    </div>
</div>
@stack('scripts')
@endsection

@section('scripts')
{{$dataTable->scripts()}}
<script src="{{asset('assets/custom/admin/help_Center/delete_helpCenter.js')}}"></script>
@endsection
