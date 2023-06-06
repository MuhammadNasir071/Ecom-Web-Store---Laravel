@extends('backend.layouts.master-layout')

@section('styles')
@endsection

@section('body')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card p-2">
            <div class="card-body">
                   {{-- Units Index --}}
                    <div id="bannerDataTable" class="">
                        <h4 class="card-title">Banners</h4>
                        <div>
                            <a href="{{ route('admin.banner.create') }}" class="btn btn-primary ml-2" style="float: right;width: 140px;">Add Banner</a>
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
<script src="{{asset('assets/custom/admin/banners/delete_banner.js')}}"></script>
@endsection
