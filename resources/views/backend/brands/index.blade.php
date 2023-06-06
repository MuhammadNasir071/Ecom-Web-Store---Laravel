@extends('backend.layouts.master-layout')

@section('styles')
@endsection

@section('body')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card p-2">
            <div class="card-body">
                   {{-- Categories Index --}}
                    <div id="brands" class="">
                        <h4 class="card-title">Brands</h4>
                        <div>
                            <a href="{{ route('admin.brands.create') }}" class="btn btn-primary ml-2" style="float: right;width: 140px;">Add Brand</a>
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
<script src="{{asset('assets/custom/admin/brands/delete_brands.js')}}"></script>
@endsection
