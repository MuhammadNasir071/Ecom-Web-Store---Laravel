@extends('backend.layouts.master-layout')

@section('styles')
@endsection

@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="card p-2">
            <div class="card-body">
                   {{-- privacy Index --}}
                    <div id="privacyDataTable" class="">
                    <h4 class="card-title">Privacy</h4>
                    <div>
                        <a href="{{ route('admin.privacy.create') }}" class="btn btn-primary ml-2" style="float: right;width: 140px;">Add Privacy</a>
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
<script src="{{asset('assets/custom/admin/privacy/delete_privacy.js')}}"></script>
@endsection
