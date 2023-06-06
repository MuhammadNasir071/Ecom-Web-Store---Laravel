@extends('backend.layouts.master-layout')

@section('styles')
@endsection

@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="card p-2">
            <div class="card-body">
                   {{-- faq Index --}}
                    <div id="faqDataTable" class="all_gift_pock_table">
                    <h4 class="card-title">FAQs</h4>
                    <div>
                        <a href="{{ route('admin.faq.create') }}" class="btn btn-primary ml-2" style="float: right;width: 140px;">Add FAQ</a>
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
<script src="{{asset('assets/custom/admin/faq/delete_faq.js')}}"></script>
@endsection
