@extends('backend.layouts.master-layout')

@section('styles')
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <form class="forms-sample" id="faq_update_form"  data-id="{{ $faq->id }}">
                <div class="card p-2">
                    <div class="d-flex justify-content-between align-items-center px-2">
                        <div>
                            <button class="btn btn-secondary m-2 p-2" style=><a href="{{route('admin.faq.index')}}" class="giftpoke_back_btn"><i class="fa fa-angle-left pr-1" style="font-size:12px"></i>Back</a></button>
                        </div>
                        <div style="margin-left: -7%;">
                            <h3 class="card-title text-center pt-3">Edit FAQs</h3>
                        </div>
                        <div></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-8">
                                <div class="form-group">
                                    <label for="question">Question<font color="red">*</font></label>
                                    <input type="text" class="form-control" name="question" id="question" value="{{isset($faq['question']) ? $faq['question'] : ''}}"/>
                                    @error('question')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-2">
                                <div class="form-group">
                                    <label for="order">Order<font color="red">*</font></label>
                                    <input type="number" class="form-control faqs_order" min="0" name="order" id="order" value="{{isset($faq['order']) ? $faq['order'] : ''}}"/>
                                    @error('order')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-2 d-flex align-items-center">
                                <div class="form-group m-0">
                                    <label for="is_active" class="m-0">Is Active?<font color="red">*</font></label>
                                    <input type="checkbox" id="is_active" name="is_active" value="1" {{isset($faq['is_active']) && $faq['is_active'] == 1 ? 'checked' : ''}}>
                                </div>
                            </div>
                            <div class="col col-12">
                                <div class="form-group">
                                    <label for="answer">Answer<font color="red">*</font></label>
                                    <textarea type="text" class="form-control" rows="4" name="answer" id="answer" value="{{isset($faq['answer']) ? $faq['answer'] : ' '}}">{{isset($faq['answer']) ? $faq['answer'] : ' '}}</textarea>
                                    @error('answer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary mr-2" id="update_faq_button">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@section('scripts')
    <script src="{{asset('assets/custom/admin/faq/create_faq.js')}}"></script>
@endsection

@endsection
