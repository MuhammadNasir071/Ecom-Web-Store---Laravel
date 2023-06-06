@extends('backend.layouts.master-layout')

@section('styles')
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <form class="forms-sample" id="helpCenter_update_form"  data-id="{{ $helpcenter->id }}">
                <div class="card p-2">
                    <div class="d-flex justify-content-between align-items-center px-2">
                        <div>
                            <button class="btn btn-secondary m-2 p-2" style=><a href="{{route('admin.helpcenter.index')}}" class="giftpoke_back_btn"><i class="fa fa-angle-left pr-1" style="font-size:12px"></i>Back</a></button>
                        </div>
                        <div style="margin-left: -7%;">
                            <h3 class="card-title text-center pt-3">Edit Query</h3>
                        </div>
                        <div></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="name">Name<font color="red">*</font></label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{isset($helpcenter['name']) ? $helpcenter['name'] : ''}}"/>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-2 d-flex align-items-center">
                                <div class="form-group m-0">
                                    <label for="is_active" class="m-0">Is Active?<font color="red">*</font></label>
                                    <input type="checkbox" id="is_active" name="is_active" value="1" {{isset($helpcenter['is_active']) && $helpcenter['is_active'] == 1 ? 'checked' : ''}}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="queryIcon">Icon<font color="red">*</font></label>
                                    <select class="selectpicker form-control fa" id="queryIcon" name="queryIcon">
                                        <option value='xf2b9;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2b9;' ? 'selected="selected"' :''}}> &#xf2b9; address-book</option>
                                        <option value='xf2ba;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2ba;' ? 'selected="selected"' :''}}> &#xf2ba; address-book-o</option>
                                        <option value='xf2bb;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2bb;' ? 'selected="selected"' :''}}>&#xf2bb; address-card</option>
                                        <option value='xf2bc;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2bc;' ? 'selected="selected"' :''}}>&#xf2bc; address-card-o</option>
                                        <option value='xf042;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf042;' ? 'selected="selected"' :''}}>&#xf042; adjust</option>
                                        <option value='xf170;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf170;' ? 'selected="selected"' :''}}>&#xf170; adn</option>
                                        <option value='xf037;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf037;' ? 'selected="selected"' :''}}>&#xf037; align-center</option>
                                        <option value='xf039;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf039;' ? 'selected="selected"' :''}}>&#xf039; align-justify</option>
                                        <option value='xf036;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf036;' ? 'selected="selected"' :''}}>&#xf036; align-left</option>
                                        <option value='xf038;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf038;' ? 'selected="selected"' :''}}>&#xf038; align-right</option>
                                        <option value='xf270;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf270;' ? 'selected="selected"' :''}}>&#xf270; amazon</option>
                                        <option value='xf0f9;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0f9;' ? 'selected="selected"' :''}}>&#xf0f9; ambulance</option>
                                        <option value='xf2a3;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2a3;' ? 'selected="selected"' :''}}>&#xf2a3; american-sign-language-interpreting</option>
                                        <option value='xf13d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf13d;' ? 'selected="selected"' :''}}>&#xf13d; anchor</option>
                                        <option value='xf17b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf17b;' ? 'selected="selected"' :''}}>&#xf17b; android</option>
                                        <option value='xf209;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf209;' ? 'selected="selected"' :''}}>&#xf209; angellist</option>
                                        <option value='xf103;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf103;' ? 'selected="selected"' :''}}>&#xf103; angle-double-down</option>
                                        <option value='xf100;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf100;' ? 'selected="selected"' :''}}>&#xf100; angle-double-left</option>
                                        <option value='xf101;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf101;' ? 'selected="selected"' :''}}>&#xf101; angle-double-right</option>
                                        <option value='xf102;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf102;' ? 'selected="selected"' :''}}>&#xf102; angle-double-up</option>
                                        <option value='xf107;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf107;' ? 'selected="selected"' :''}}>&#xf107; angle-down</option>
                                        <option value='xf104;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf104;' ? 'selected="selected"' :''}}>&#xf104; angle-left</option>
                                        <option value='xf105;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf105;' ? 'selected="selected"' :''}}>&#xf105; angle-right</option>
                                        <option value='xf106;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf106;' ? 'selected="selected"' :''}}>&#xf106; angle-up</option>
                                        <option value='xf179;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf179;' ? 'selected="selected"' :''}}>&#xf179; apple</option>
                                        <option value='xf187;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf187;' ? 'selected="selected"' :''}}>&#xf187; archive</option>
                                        <option value='xf1fe;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1fe;' ? 'selected="selected"' :''}}>&#xf1fe; area-chart</option>
                                        <option value='xf0ab;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0ab;' ? 'selected="selected"' :''}}>&#xf0ab; arrow-circle-down</option>
                                        <option value='xf0a8;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0a8;' ? 'selected="selected"' :''}}>&#xf0a8; arrow-circle-left</option>
                                        <option value='xf01a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf01a;' ? 'selected="selected"' :''}}>&#xf01a; arrow-circle-o-down</option>
                                        <option value='xf190;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf190;' ? 'selected="selected"' :''}}>&#xf190; arrow-circle-o-left</option>
                                        <option value='xf18e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf18e;' ? 'selected="selected"' :''}}>&#xf18e; arrow-circle-o-right</option>
                                        <option value='xf01b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf01b;' ? 'selected="selected"' :''}}>&#xf01b; arrow-circle-o-up</option>
                                        <option value='xf0a9;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0a9;' ? 'selected="selected"' :''}}>&#xf0a9; arrow-circle-right</option>
                                        <option value='xf0aa;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0aa;' ? 'selected="selected"' :''}}>&#xf0aa; arrow-circle-up</option>
                                        <option value='xf063;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf063;' ? 'selected="selected"' :''}}>&#xf063; arrow-down</option>
                                        <option value='xf060;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf060;' ? 'selected="selected"' :''}}>&#xf060; arrow-left</option>
                                        <option value='xf061;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf061;' ? 'selected="selected"' :''}}>&#xf061; arrow-right</option>
                                        <option value='xf062;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf062;' ? 'selected="selected"' :''}}>&#xf062; arrow-up</option>
                                        <option value='xf047;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf047;' ? 'selected="selected"' :''}}>&#xf047; arrows</option>
                                        <option value='xf0b2;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0b2;' ? 'selected="selected"' :''}}>&#xf0b2; arrows-alt</option>
                                        <option value='xf07e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf07e;' ? 'selected="selected"' :''}}>&#xf07e; arrows-h</option>
                                        <option value='xf07d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf07d;' ? 'selected="selected"' :''}}>&#xf07d; arrows-v</option>
                                        <option value='xf2a3;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2a3;' ? 'selected="selected"' :''}}>&#xf2a3; asl-interpreting</option>
                                        <option value='xf2a2;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2a2;' ? 'selected="selected"' :''}}>&#xf2a2; assistive-listening-systems</option>
                                        <option value='xf069;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf069;' ? 'selected="selected"' :''}}>&#xf069; asterisk</option>
                                        <option value='xf1fa;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1fa;' ? 'selected="selected"' :''}}>&#xf1fa; at</option>
                                        <option value='xf29e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf29e;' ? 'selected="selected"' :''}}>&#xf29e; audio-description</option>
                                        <option value='xf1b9;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1b9;' ? 'selected="selected"' :''}}>&#xf1b9; automobile</option>
                                        <option value='xf04a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf04a;' ? 'selected="selected"' :''}}>&#xf04a; backward</option>
                                        <option value='xf24e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf24e;' ? 'selected="selected"' :''}}>&#xf24e; balance-scale</option>
                                        <option value='xf05e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf05e;' ? 'selected="selected"' :''}}>&#xf05e; ban</option>
                                        <option value='xf19c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf19c;' ? 'selected="selected"' :''}}>&#xf2d5; bandcamp</option>
                                        <option value='xf19c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf19c;' ? 'selected="selected"' :''}}>&#xf19c; bank</option>
                                        <option value='xf080;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf080;' ? 'selected="selected"' :''}}>&#xf080; bar-chart</option>
                                        <option value='xf080;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf080;' ? 'selected="selected"' :''}}>&#xf080; bar-chart-o</option>
                                        <option value='xf02a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf02a;' ? 'selected="selected"' :''}}>&#xf02a; barcode</option>
                                        <option value='xf0c9;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0c9;' ? 'selected="selected"' :''}}>&#xf0c9; bars</option>
                                        <option value='xf2cd;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2cd;' ? 'selected="selected"' :''}}>&#xf2cd; bath</option>
                                        <option value='xf2cd;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2cd;' ? 'selected="selected"' :''}}>&#xf2cd; bathtub</option>
                                        <option value='xf240;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf240;' ? 'selected="selected"' :''}}>&#xf240; battery</option>
                                        <option value='xf244;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf244;' ? 'selected="selected"' :''}}>&#xf244; battery-0</option>
                                        <option value='xf243;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf243;' ? 'selected="selected"' :''}}>&#xf243; battery-1</option>
                                        <option value='xf242;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf242;' ? 'selected="selected"' :''}}>&#xf242; battery-2</option>
                                        <option value='xf241;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf241;' ? 'selected="selected"' :''}}>&#xf241; battery-3</option>
                                        <option value='xf240;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf240;' ? 'selected="selected"' :''}}>&#xf240; battery-4</option>
                                        <option value='xf244;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf244;' ? 'selected="selected"' :''}}>&#xf244; battery-empty</option>
                                        <option value='xf240;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf240;' ? 'selected="selected"' :''}}>&#xf240; battery-full</option>
                                        <option value='xf242;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf242;' ? 'selected="selected"' :''}}>&#xf242; battery-half</option>
                                        <option value='xf243;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf243;' ? 'selected="selected"' :''}}>&#xf243; battery-quarter</option>
                                        <option value='xf241;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf241;' ? 'selected="selected"' :''}}>&#xf241; battery-three-quarters</option>
                                        <option value='xf236;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf236;' ? 'selected="selected"' :''}}>&#xf236; bed</option>
                                        <option value='xf0fc;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0fc;' ? 'selected="selected"' :''}}>&#xf0fc; beer</option>
                                        <option value='xf1b4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1b4;' ? 'selected="selected"' :''}}>&#xf1b4; behance</option>
                                        <option value='xf1b5;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1b5;' ? 'selected="selected"' :''}}>&#xf1b5; behance-square</option>
                                        <option value='xf0f3;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0f3;' ? 'selected="selected"' :''}}>&#xf0f3; bell</option>
                                        <option value='xf0a2;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0a2;' ? 'selected="selected"' :''}}>&#xf0a2; bell-o</option>
                                        <option value='xf1f6;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1f6;' ? 'selected="selected"' :''}}>&#xf1f6; bell-slash</option>
                                        <option value='xf1f7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1f7;' ? 'selected="selected"' :''}}>&#xf1f7; bell-slash-o</option>
                                        <option value='xf206;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf206;' ? 'selected="selected"' :''}}>&#xf206; bicycle</option>
                                        <option value='xf1e5;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1e5;' ? 'selected="selected"' :''}}>&#xf1e5; binoculars</option>
                                        <option value='xf1fd;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1fd;' ? 'selected="selected"' :''}}>&#xf1fd; birthday-cake</option>
                                        <option value='xf171;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf171;' ? 'selected="selected"' :''}}>&#xf171; bitbucket</option>
                                        <option value='xf172;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf172;' ? 'selected="selected"' :''}}>&#xf172; bitbucket-square</option>
                                        <option value='xf15a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf15a;' ? 'selected="selected"' :''}}>&#xf15a; bitcoin</option>
                                        <option value='xf27e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf27e;' ? 'selected="selected"' :''}}>&#xf27e; black-tie</option>
                                        <option value='xf29d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf29d;' ? 'selected="selected"' :''}}>&#xf29d; blind</option>
                                        <option value='xf293;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf293;' ? 'selected="selected"' :''}}>&#xf293; bluetooth</option>
                                        <option value='xf294;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf294;' ? 'selected="selected"' :''}}>&#xf294; bluetooth-b</option>
                                        <option value='xf032;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf032;' ? 'selected="selected"' :''}}>&#xf032; bold</option>
                                        <option value='xf0e7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0e7;' ? 'selected="selected"' :''}}>&#xf0e7; bolt</option>
                                        <option value='xf1e2;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1e2;' ? 'selected="selected"' :''}}>&#xf1e2; bomb</option>
                                        <option value='xf02d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf02d;' ? 'selected="selected"' :''}}>&#xf02d; book</option>
                                        <option value='xf02e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf02e;' ? 'selected="selected"' :''}}>&#xf02e; bookmark</option>
                                        <option value='xf097;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf097;' ? 'selected="selected"' :''}}>&#xf097; bookmark-o</option>
                                        <option value='xf2a1;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2a1;' ? 'selected="selected"' :''}}>&#xf2a1; braille</option>
                                        <option value='xf0b1;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0b1;' ? 'selected="selected"' :''}}>&#xf0b1; briefcase</option>
                                        <option value='xf15a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf15a;' ? 'selected="selected"' :''}}>&#xf15a; btc</option>
                                        <option value='xf188;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf188;' ? 'selected="selected"' :''}}>&#xf188; bug</option>
                                        <option value='xf1ad;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1ad;' ? 'selected="selected"' :''}}>&#xf1ad; building</option>
                                        <option value='xf0f7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0f7;' ? 'selected="selected"' :''}}>&#xf0f7; building-o</option>
                                        <option value='xf0a1;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0a1;' ? 'selected="selected"' :''}}>&#xf0a1; bullhorn</option>
                                        <option value='xf140;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf140;' ? 'selected="selected"' :''}}>&#xf140; bullseye</option>
                                        <option value='xf207;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf207;' ? 'selected="selected"' :''}}>&#xf207; bus</option>
                                        <option value='xf20d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf20d;' ? 'selected="selected"' :''}}>&#xf20d; buysellads</option>
                                        <option value='xf1ba;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1ba;' ? 'selected="selected"' :''}}>&#xf1ba; cab</option>
                                        <option value='xf1ec;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1ec;' ? 'selected="selected"' :''}}>&#xf1ec; calculator</option>
                                        <option value='xf073;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf073;' ? 'selected="selected"' :''}}>&#xf073; calendar</option>
                                        <option value='xf274;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf274;' ? 'selected="selected"' :''}}>&#xf274; calendar-check-o</option>
                                        <option value='xf272;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf272;' ? 'selected="selected"' :''}}>&#xf272; calendar-minus-o</option>
                                        <option value='xf133;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf133;' ? 'selected="selected"' :''}}>&#xf133; calendar-o</option>
                                        <option value='xf271;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf271;' ? 'selected="selected"' :''}}>&#xf271; calendar-plus-o</option>
                                        <option value='xf273;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf273;' ? 'selected="selected"' :''}}>&#xf273; calendar-times-o</option>
                                        <option value='xf030;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf030;' ? 'selected="selected"' :''}}>&#xf030; camera</option>
                                        <option value='xf083;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf083;' ? 'selected="selected"' :''}}>&#xf083; camera-retro</option>
                                        <option value='xf1b9;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1b9;' ? 'selected="selected"' :''}}>&#xf1b9; car</option>
                                        <option value='xf0d7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0d7;' ? 'selected="selected"' :''}}>&#xf0d7; caret-down</option>
                                        <option value='xf0d9;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0d9;' ? 'selected="selected"' :''}}>&#xf0d9; caret-left</option>
                                        <option value='xf0da;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0da;' ? 'selected="selected"' :''}}>&#xf0da; caret-right</option>
                                        <option value='xf150;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf150;' ? 'selected="selected"' :''}}>&#xf150; caret-square-o-down</option>
                                        <option value='xf191;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf191;' ? 'selected="selected"' :''}}>&#xf191; caret-square-o-left</option>
                                        <option value='xf152;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf152;' ? 'selected="selected"' :''}}>&#xf152; caret-square-o-right</option>
                                        <option value='xf151;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf151;' ? 'selected="selected"' :''}}>&#xf151; caret-square-o-up</option>
                                        <option value='xf0d8;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0d8;' ? 'selected="selected"' :''}}>&#xf0d8; caret-up</option>
                                        <option value='xf218;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf218;' ? 'selected="selected"' :''}}>&#xf218; cart-arrow-down</option>
                                        <option value='xf217;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf217;' ? 'selected="selected"' :''}}>&#xf217; cart-plus</option>
                                        <option value='xf20a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf20a;' ? 'selected="selected"' :''}}>&#xf20a; cc</option>
                                        <option value='xf1f3;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1f3;' ? 'selected="selected"' :''}}>&#xf1f3; cc-amex</option>
                                        <option value='xf24c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf24c;' ? 'selected="selected"' :''}}>&#xf24c; cc-diners-club</option>
                                        <option value='xf1f2;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1f2;' ? 'selected="selected"' :''}}>&#xf1f2; cc-discover</option>
                                        <option value='xf24b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf24b;' ? 'selected="selected"' :''}}>&#xf24b; cc-jcb</option>
                                        <option value='xf1f1;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1f1;' ? 'selected="selected"' :''}}>&#xf1f1; cc-mastercard</option>
                                        <option value='xf1f4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1f4;' ? 'selected="selected"' :''}}>&#xf1f4; cc-paypal</option>
                                        <option value='xf1f5;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1f5;' ? 'selected="selected"' :''}}>&#xf1f5; cc-stripe</option>
                                        <option value='xf1f0;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1f0;' ? 'selected="selected"' :''}}>&#xf1f0; cc-visa</option>
                                        <option value='xf0a3;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0a3;' ? 'selected="selected"' :''}}>&#xf0a3; certificate</option>
                                        <option value='xf0c1;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0c1;' ? 'selected="selected"' :''}}>&#xf0c1; chain</option>
                                        <option value='xf127;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf127;' ? 'selected="selected"' :''}}>&#xf127; chain-broken</option>
                                        <option value='xf00c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf00c;' ? 'selected="selected"' :''}}>&#xf00c; check</option>
                                        <option value='xf058;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf058;' ? 'selected="selected"' :''}}>&#xf058; check-circle</option>
                                        <option value='xf05d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf05d;' ? 'selected="selected"' :''}}>&#xf05d; check-circle-o</option>
                                        <option value='xf14a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf14a;' ? 'selected="selected"' :''}}>&#xf14a; check-square</option>
                                        <option value='xf046;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf046;' ? 'selected="selected"' :''}}>&#xf046; check-square-o</option>
                                        <option value='xf13a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf13a;' ? 'selected="selected"' :''}}>&#xf13a; chevron-circle-down</option>
                                        <option value='xf137;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf137;' ? 'selected="selected"' :''}}>&#xf137; chevron-circle-left</option>
                                        <option value='xf138;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf138;' ? 'selected="selected"' :''}}>&#xf138; chevron-circle-right</option>
                                        <option value='xf139;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf139;' ? 'selected="selected"' :''}}>&#xf139; chevron-circle-up</option>
                                        <option value='xf078;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf078;' ? 'selected="selected"' :''}}>&#xf078; chevron-down</option>
                                        <option value='xf053;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf053;' ? 'selected="selected"' :''}}>&#xf053; chevron-left</option>
                                        <option value='xf054;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf054;' ? 'selected="selected"' :''}}>&#xf054; chevron-right</option>
                                        <option value='xf077;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf077;' ? 'selected="selected"' :''}}>&#xf077; chevron-up</option>
                                        <option value='xf1ae;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1ae;' ? 'selected="selected"' :''}}>&#xf1ae; child</option>
                                        <option value='xf268;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf268;' ? 'selected="selected"' :''}}>&#xf268; chrome</option>
                                        <option value='xf111;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf111;' ? 'selected="selected"' :''}}>&#xf111; circle</option>
                                        <option value='xf10c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf10c;' ? 'selected="selected"' :''}}>&#xf10c; circle-o</option>
                                        <option value='xf1ce;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1ce;' ? 'selected="selected"' :''}}>&#xf1ce; circle-o-notch</option>
                                        <option value='xf1db;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1db;' ? 'selected="selected"' :''}}>&#xf1db; circle-thin</option>
                                        <option value='xf0ea;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0ea;' ? 'selected="selected"' :''}}>&#xf0ea; clipboard</option>
                                        <option value='xf017;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf017;' ? 'selected="selected"' :''}}>&#xf017; clock-o</option>
                                        <option value='xf24d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf24d;' ? 'selected="selected"' :''}}>&#xf24d; clone</option>
                                        <option value='xf00d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf00d;' ? 'selected="selected"' :''}}>&#xf00d; close</option>
                                        <option value='xf0c2;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0c2;' ? 'selected="selected"' :''}}>&#xf0c2; cloud</option>
                                        <option value='xf0ed;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0ed;' ? 'selected="selected"' :''}}>&#xf0ed; cloud-download</option>
                                        <option value='xf0ee;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0ee;' ? 'selected="selected"' :''}}>&#xf0ee; cloud-upload</option>
                                        <option value='xf157;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf157;' ? 'selected="selected"' :''}}>&#xf157; cny</option>
                                        <option value='xf121;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf121;' ? 'selected="selected"' :''}}>&#xf121; code</option>
                                        <option value='xf126;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf126;' ? 'selected="selected"' :''}}>&#xf126; code-fork</option>
                                        <option value='xf1cb;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1cb;' ? 'selected="selected"' :''}}>&#xf1cb; codepen</option>
                                        <option value='xf284;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf284;' ? 'selected="selected"' :''}}>&#xf284; codiepie</option>
                                        <option value='xf0f4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0f4;' ? 'selected="selected"' :''}}>&#xf0f4; coffee</option>
                                        <option value='xf013;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf013;' ? 'selected="selected"' :''}}>&#xf013; cog</option>
                                        <option value='xf085;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf085;' ? 'selected="selected"' :''}}>&#xf085; cogs</option>
                                        <option value='xf0db;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0db;' ? 'selected="selected"' :''}}>&#xf0db; columns</option>
                                        <option value='xf075;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf075;' ? 'selected="selected"' :''}}>&#xf075; comment</option>
                                        <option value='xf0e5;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0e5;' ? 'selected="selected"' :''}}>&#xf0e5; comment-o</option>
                                        <option value='xf27a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf27a;' ? 'selected="selected"' :''}}>&#xf27a; commenting</option>
                                        <option value='xf27b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf27b;' ? 'selected="selected"' :''}}>&#xf27b; commenting-o</option>
                                        <option value='xf086;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf086;' ? 'selected="selected"' :''}}>&#xf086; comments</option>
                                        <option value='xf0e6;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0e6;' ? 'selected="selected"' :''}}>&#xf0e6; comments-o</option>
                                        <option value='xf14e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf14e;' ? 'selected="selected"' :''}}>&#xf14e; compass</option>
                                        <option value='xf066;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf066;' ? 'selected="selected"' :''}}>&#xf066; compress</option>
                                        <option value='xf20e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf20e;' ? 'selected="selected"' :''}}>&#xf20e; connectdevelop</option>
                                        <option value='xf26d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf26d;' ? 'selected="selected"' :''}}>&#xf26d; contao</option>
                                        <option value='xf0c5;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0c5;' ? 'selected="selected"' :''}}>&#xf0c5; copy</option>
                                        <option value='xf1f9;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1f9;' ? 'selected="selected"' :''}}>&#xf1f9; copyright</option>
                                        <option value='xf25e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf25e;' ? 'selected="selected"' :''}}>&#xf25e; creative-commons</option>
                                        <option value='xf09d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf09d;' ? 'selected="selected"' :''}}>&#xf09d; credit-card</option>
                                        <option value='xf283;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf283;' ? 'selected="selected"' :''}}>&#xf283; credit-card-alt</option>
                                        <option value='xf125;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf125;' ? 'selected="selected"' :''}}>&#xf125; crop</option>
                                        <option value='xf05b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf05b;' ? 'selected="selected"' :''}}>&#xf05b; crosshairs</option>
                                        <option value='xf13c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf13c;' ? 'selected="selected"' :''}}>&#xf13c; css3</option>
                                        <option value='xf1b2;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1b2;' ? 'selected="selected"' :''}}>&#xf1b2; cube</option>
                                        <option value='xf1b3;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1b3;' ? 'selected="selected"' :''}}>&#xf1b3; cubes</option>
                                        <option value='xf0c4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0c4;' ? 'selected="selected"' :''}}>&#xf0c4; cut</option>
                                        <option value='xf0f5;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0f5;' ? 'selected="selected"' :''}}>&#xf0f5; cutlery</option>
                                        <option value='xf0e4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0e4;' ? 'selected="selected"' :''}}>&#xf0e4; dashboard</option>
                                        <option value='xf210;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf210;' ? 'selected="selected"' :''}}>&#xf210; dashcube</option>
                                        <option value='xf1c0;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1c0;' ? 'selected="selected"' :''}}>&#xf1c0; database</option>
                                        <option value='xf2a4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2a4;' ? 'selected="selected"' :''}}>&#xf2a4; deaf</option>
                                        <option value='xf2a4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2a4;' ? 'selected="selected"' :''}}>&#xf2a4; deafness</option>
                                        <option value='xf03b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf03b;' ? 'selected="selected"' :''}}>&#xf03b; dedent</option>
                                        <option value='xf1a5;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1a5;' ? 'selected="selected"' :''}}>&#xf1a5; delicious</option>
                                        <option value='xf108;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf108;' ? 'selected="selected"' :''}}>&#xf108; desktop</option>
                                        <option value='xf1bd;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1bd;' ? 'selected="selected"' :''}}>&#xf1bd; deviantart</option>
                                        <option value='xf219;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf219;' ? 'selected="selected"' :''}}>&#xf219; diamond</option>
                                        <option value='xf1a6;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1a6;' ? 'selected="selected"' :''}}>&#xf1a6; digg</option>
                                        <option value='xf155;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf155;' ? 'selected="selected"' :''}}>&#xf155; dollar</option>
                                        <option value='xf192;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf192;' ? 'selected="selected"' :''}}>&#xf192; dot-circle-o</option>
                                        <option value='xf019;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf019;' ? 'selected="selected"' :''}}>&#xf019; download</option>
                                        <option value='xf17d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf17d;' ? 'selected="selected"' :''}}>&#xf17d; dribbble</option>
                                        <option value='xf2c2;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2c2;' ? 'selected="selected"' :''}}>&#xf2c2; drivers-license</option>
                                        <option value='xf2c3;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2c3;' ? 'selected="selected"' :''}}>&#xf2c3; drivers-license-o</option>
                                        <option value='xf16b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf16b;' ? 'selected="selected"' :''}}>&#xf16b; dropbox</option>
                                        <option value='xf1a9;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1a9;' ? 'selected="selected"' :''}}>&#xf1a9; drupal</option>
                                        <option value='xf282;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf282;' ? 'selected="selected"' :''}}>&#xf282; edge</option>
                                        <option value='xf044;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf044;' ? 'selected="selected"' :''}}>&#xf044; edit</option>
                                        <option value='xf2da;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2da;' ? 'selected="selected"' :''}}>&#xf2da; eercast</option>
                                        <option value='xf052;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf052;' ? 'selected="selected"' :''}}>&#xf052; eject</option>
                                        <option value='xf141;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf141;' ? 'selected="selected"' :''}}>&#xf141; ellipsis-h</option>
                                        <option value='xf142;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf142;' ? 'selected="selected"' :''}}>&#xf142; ellipsis-v</option>
                                        <option value='xf1d1;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1d1;' ? 'selected="selected"' :''}}>&#xf1d1; empire</option>
                                        <option value='xf0e0;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0e0;' ? 'selected="selected"' :''}}>&#xf0e0; envelope</option>
                                        <option value='xf003;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf003;' ? 'selected="selected"' :''}}>&#xf003; envelope-o</option>
                                        <option value='xf2b6;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2b6;' ? 'selected="selected"' :''}}>&#xf2b6; envelope-open</option>
                                        <option value='xf2b7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2b7;' ? 'selected="selected"' :''}}>&#xf2b7; envelope-open-o</option>
                                        <option value='xf199;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf199;' ? 'selected="selected"' :''}}>&#xf199; envelope-square</option>
                                        <option value='xf299;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf299;' ? 'selected="selected"' :''}}>&#xf299; envira</option>
                                        <option value='xf12d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf12d;' ? 'selected="selected"' :''}}>&#xf12d; eraser</option>
                                        <option value='xf2d7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2d7;' ? 'selected="selected"' :''}}>&#xf2d7; etsy</option>
                                        <option value='xf153;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf153;' ? 'selected="selected"' :''}}>&#xf153; eur</option>
                                        <option value='xf153;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf153;' ? 'selected="selected"' :''}}>&#xf153; euro</option>
                                        <option value='xf0ec;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0ec;' ? 'selected="selected"' :''}}>&#xf0ec; exchange</option>
                                        <option value='xf12a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf12a;' ? 'selected="selected"' :''}}>&#xf12a; exclamation</option>
                                        <option value='xf06a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf06a;' ? 'selected="selected"' :''}}>&#xf06a; exclamation-circle</option>
                                        <option value='xf071;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf071;' ? 'selected="selected"' :''}}>&#xf071; exclamation-triangle</option>
                                        <option value='xf065;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf065;' ? 'selected="selected"' :''}}>&#xf065; expand</option>
                                        <option value='xf23e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf23e;' ? 'selected="selected"' :''}}>&#xf23e; expeditedssl</option>
                                        <option value='xf08e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf08e;' ? 'selected="selected"' :''}}>&#xf08e; external-link</option>
                                        <option value='xf14c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf14c;' ? 'selected="selected"' :''}}>&#xf14c; external-link-square</option>
                                        <option value='xf06e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf06e;' ? 'selected="selected"' :''}}>&#xf06e; eye</option>
                                        <option value='xf070;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf070;' ? 'selected="selected"' :''}}>&#xf070; eye-slash</option>
                                        <option value='xf1fb;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1fb;' ? 'selected="selected"' :''}}>&#xf1fb; eyedropper</option>
                                        <option value='xf2b4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2b4;' ? 'selected="selected"' :''}}>&#xf2b4; fa</option>
                                        <option value='xf09a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf09a;' ? 'selected="selected"' :''}}>&#xf09a; facebook</option>
                                        <option value='xf09a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf09a;' ? 'selected="selected"' :''}}>&#xf09a; facebook-f</option>
                                        <option value='xf230;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf230;' ? 'selected="selected"' :''}}>&#xf230; facebook-official</option>
                                        <option value='xf082;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf082;' ? 'selected="selected"' :''}}>&#xf082; facebook-square</option>
                                        <option value='xf049;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf049;' ? 'selected="selected"' :''}}>&#xf049; fast-backward</option>
                                        <option value='xf050;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf050;' ? 'selected="selected"' :''}}>&#xf050; fast-forward</option>
                                        <option value='xf1ac;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1ac;' ? 'selected="selected"' :''}}>&#xf1ac; fax</option>
                                        <option value='xf09e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf09e;' ? 'selected="selected"' :''}}>&#xf09e; feed</option>
                                        <option value='xf182;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf182;' ? 'selected="selected"' :''}}>&#xf182; female</option>
                                        <option value='xf0fb;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0fb;' ? 'selected="selected"' :''}}>&#xf0fb; fighter-jet</option>
                                        <option value='xf15b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf15b;' ? 'selected="selected"' :''}}>&#xf15b; file</option>
                                        <option value='xf1c6;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1c6;' ? 'selected="selected"' :''}}>&#xf1c6; file-archive-o</option>
                                        <option value='xf1c7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1c7;' ? 'selected="selected"' :''}}>&#xf1c7; file-audio-o</option>
                                        <option value='xf1c9;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1c9;' ? 'selected="selected"' :''}}>&#xf1c9; file-code-o</option>
                                        <option value='xf1c3;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1c3;' ? 'selected="selected"' :''}}>&#xf1c3; file-excel-o</option>
                                        <option value='xf1c5;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1c5;' ? 'selected="selected"' :''}}>&#xf1c5; file-image-o</option>
                                        <option value='xf1c8;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1c8;' ? 'selected="selected"' :''}}>&#xf1c8; file-movie-o</option>
                                        <option value='xf016;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf016;' ? 'selected="selected"' :''}}>&#xf016; file-o</option>
                                        <option value='xf1c1;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1c1;' ? 'selected="selected"' :''}}>&#xf1c1; file-pdf-o</option>
                                        <option value='xf1c5;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1c5;' ? 'selected="selected"' :''}}>&#xf1c5; file-photo-o</option>
                                        <option value='xf1c5;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1c5;' ? 'selected="selected"' :''}}>&#xf1c5; file-picture-o</option>
                                        <option value='xf1c4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1c4;' ? 'selected="selected"' :''}}>&#xf1c4; file-powerpoint-o</option>
                                        <option value='xf1c7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1c7;' ? 'selected="selected"' :''}}>&#xf1c7; file-sound-o</option>
                                        <option value='xf15c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf15c;' ? 'selected="selected"' :''}}>&#xf15c; file-text</option>
                                        <option value='xf0f6;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0f6;' ? 'selected="selected"' :''}}>&#xf0f6; file-text-o</option>
                                        <option value='xf1c8;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1c8;' ? 'selected="selected"' :''}}>&#xf1c8; file-video-o</option>
                                        <option value='xf1c2;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1c2;' ? 'selected="selected"' :''}}>&#xf1c2; file-word-o</option>
                                        <option value='xf1c6;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1c6;' ? 'selected="selected"' :''}}>&#xf1c6; file-zip-o</option>
                                        <option value='xf0c5;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0c5;' ? 'selected="selected"' :''}}>&#xf0c5; files-o</option>
                                        <option value='xf008;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf008;' ? 'selected="selected"' :''}}>&#xf008; film</option>
                                        <option value='xf0b0;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0b0;' ? 'selected="selected"' :''}}>&#xf0b0; filter</option>
                                        <option value='xf06d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf06d;' ? 'selected="selected"' :''}}>&#xf06d; fire</option>
                                        <option value='xf134;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf134;' ? 'selected="selected"' :''}}>&#xf134; fire-extinguisher</option>
                                        <option value='xf269;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf269;' ? 'selected="selected"' :''}}>&#xf269; firefox</option>
                                        <option value='xf2b0;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2b0;' ? 'selected="selected"' :''}}>&#xf2b0; first-order</option>
                                        <option value='xf024;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf024;' ? 'selected="selected"' :''}}>&#xf024; flag</option>
                                        <option value='xf11e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf11e;' ? 'selected="selected"' :''}}>&#xf11e; flag-checkered</option>
                                        <option value='xf11d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf11d;' ? 'selected="selected"' :''}}>&#xf11d; flag-o</option>
                                        <option value='xf0e7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0e7;' ? 'selected="selected"' :''}}>&#xf0e7; flash</option>
                                        <option value='xf0c3;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0c3;' ? 'selected="selected"' :''}}>&#xf0c3; flask</option>
                                        <option value='xf16e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf16e;' ? 'selected="selected"' :''}}>&#xf16e; flickr</option>
                                        <option value='xf0c7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0c7;' ? 'selected="selected"' :''}}>&#xf0c7; floppy-o</option>
                                        <option value='xf07b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf07b;' ? 'selected="selected"' :''}}>&#xf07b; folder</option>
                                        <option value='xf114;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf114;' ? 'selected="selected"' :''}}>&#xf114; folder-o</option>
                                        <option value='xf07c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf07c;' ? 'selected="selected"' :''}}>&#xf07c; folder-open</option>
                                        <option value='xf115;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf115;' ? 'selected="selected"' :''}}>&#xf115; folder-open-o</option>
                                        <option value='xf031;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf031;' ? 'selected="selected"' :''}}>&#xf031; font</option>
                                        <option value='xf2b4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2b4;' ? 'selected="selected"' :''}}>&#xf2b4; font-awesome</option>
                                        <option value='xf280;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf280;' ? 'selected="selected"' :''}}>&#xf280; fonticons</option>
                                        <option value='xf286;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf286;' ? 'selected="selected"' :''}}>&#xf286; fort-awesome</option>
                                        <option value='xf211;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf211;' ? 'selected="selected"' :''}}>&#xf211; forumbee</option>
                                        <option value='xf04e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf04e;' ? 'selected="selected"' :''}}>&#xf04e; forward</option>
                                        <option value='xf180;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf180;' ? 'selected="selected"' :''}}>&#xf180; foursquare</option>
                                        <option value='xf2c5;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2c5;' ? 'selected="selected"' :''}}>&#xf2c5; free-code-camp</option>
                                        <option value='xf119;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf119;' ? 'selected="selected"' :''}}>&#xf119; frown-o</option>
                                        <option value='xf1e3;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1e3;' ? 'selected="selected"' :''}}>&#xf1e3; futbol-o</option>
                                        <option value='xf11b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf11b;' ? 'selected="selected"' :''}}>&#xf11b; gamepad</option>
                                        <option value='xf0e3;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0e3;' ? 'selected="selected"' :''}}>&#xf0e3; gavel</option>
                                        <option value='xf154;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf154;' ? 'selected="selected"' :''}}>&#xf154; gbp</option>
                                        <option value='xf1d1;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1d1;' ? 'selected="selected"' :''}}>&#xf1d1; ge</option>
                                        <option value='xf013;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf013;' ? 'selected="selected"' :''}}>&#xf013; gear</option>
                                        <option value='xf085;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf085;' ? 'selected="selected"' :''}}>&#xf085; gears</option>
                                        <option value='xf22d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf22d;' ? 'selected="selected"' :''}}>&#xf22d; genderless</option>
                                        <option value='xf265;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf265;' ? 'selected="selected"' :''}}>&#xf265; get-pocket</option>
                                        <option value='xf260;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf260;' ? 'selected="selected"' :''}}>&#xf260; gg</option>
                                        <option value='xf261;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf261;' ? 'selected="selected"' :''}}>&#xf261; gg-circle</option>
                                        <option value='xf06b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf06b;' ? 'selected="selected"' :''}}>&#xf06b; gift</option>
                                        <option value='xf1d3;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1d3;' ? 'selected="selected"' :''}}>&#xf1d3; git</option>
                                        <option value='xf1d2;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1d2;' ? 'selected="selected"' :''}}>&#xf1d2; git-square</option>
                                        <option value='xf09b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf09b;' ? 'selected="selected"' :''}}>&#xf09b; github</option>
                                        <option value='xf113;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf113;' ? 'selected="selected"' :''}}>&#xf113; github-alt</option>
                                        <option value='xf092;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf092;' ? 'selected="selected"' :''}}>&#xf092; github-square</option>
                                        <option value='xf296;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf296;' ? 'selected="selected"' :''}}>&#xf296; gitlab</option>
                                        <option value='xf184;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf184;' ? 'selected="selected"' :''}}>&#xf184; gittip</option>
                                        <option value='xf000;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf000;' ? 'selected="selected"' :''}}>&#xf000; glass</option>
                                        <option value='xf2a5;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2a5;' ? 'selected="selected"' :''}}>&#xf2a5; glide</option>
                                        <option value='xf2a6;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2a6;' ? 'selected="selected"' :''}}>&#xf2a6; glide-g</option>
                                        <option value='xf0ac;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0ac;' ? 'selected="selected"' :''}}>&#xf0ac; globe</option>
                                        <option value='xf1a0;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1a0;' ? 'selected="selected"' :''}}>&#xf1a0; google</option>
                                        <option value='xf0d5;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0d5;' ? 'selected="selected"' :''}}>&#xf0d5; google-plus</option>
                                        <option value='xf2b3;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2b3;' ? 'selected="selected"' :''}}>&#xf2b3; google-plus-circle</option>
                                        <option value='xf2b3;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2b3;' ? 'selected="selected"' :''}}>&#xf2b3; google-plus-official</option>
                                        <option value='xf0d4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0d4;' ? 'selected="selected"' :''}}>&#xf0d4; google-plus-square</option>
                                        <option value='xf1ee;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1ee;' ? 'selected="selected"' :''}}>&#xf1ee; google-wallet</option>
                                        <option value='xf19d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf19d;' ? 'selected="selected"' :''}}>&#xf19d; graduation-cap</option>
                                        <option value='xf184;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf184;' ? 'selected="selected"' :''}}>&#xf184; gratipay</option>
                                        <option value='xf2d6;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2d6;' ? 'selected="selected"' :''}}>&#xf2d6; grav</option>
                                        <option value='xf0c0;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0c0;' ? 'selected="selected"' :''}}>&#xf0c0; group</option>
                                        <option value='xf0fd;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0fd;' ? 'selected="selected"' :''}}>&#xf0fd; h-square</option>
                                        <option value='xf1d4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1d4;' ? 'selected="selected"' :''}}>&#xf1d4; hacker-news</option>
                                        <option value='xf255;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf255;' ? 'selected="selected"' :''}}>&#xf255; hand-grab-o</option>
                                        <option value='xf258;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf258;' ? 'selected="selected"' :''}}>&#xf258; hand-lizard-o</option>
                                        <option value='xf0a7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0a7;' ? 'selected="selected"' :''}}>&#xf0a7; hand-o-down</option>
                                        <option value='xf0a5;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0a5;' ? 'selected="selected"' :''}}>&#xf0a5; hand-o-left</option>
                                        <option value='xf0a4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0a4;' ? 'selected="selected"' :''}}>&#xf0a4; hand-o-right</option>
                                        <option value='xf0a6;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0a6;' ? 'selected="selected"' :''}}>&#xf0a6; hand-o-up</option>
                                        <option value='xf25b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf25b;' ? 'selected="selected"' :''}}>&#xf25b; hand-peace-o</option>
                                        <option value='xf25a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf25a;' ? 'selected="selected"' :''}}>&#xf25a; hand-pointer-o</option>
                                        <option value='xf255;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf255;' ? 'selected="selected"' :''}}>&#xf255; hand-rock-o</option>
                                        <option value='xf257;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf257;' ? 'selected="selected"' :''}}>&#xf257; hand-scissors-o</option>
                                        <option value='xf259;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf259;' ? 'selected="selected"' :''}}>&#xf259; hand-spock-o</option>
                                        <option value='xf256;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf256;' ? 'selected="selected"' :''}}>&#xf256; hand-stop-o</option>
                                        <option value='xf2b5;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2b5;' ? 'selected="selected"' :''}}>&#xf2b5; handshake-o</option>
                                        <option value='xf2a4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2a4;' ? 'selected="selected"' :''}}>&#xf2a4; hard-of-hearing</option>
                                        <option value='xf292;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf292;' ? 'selected="selected"' :''}}>&#xf292; hashtag</option>
                                        <option value='xf0a0;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0a0;' ? 'selected="selected"' :''}}>&#xf0a0; hdd-o</option>
                                        <option value='xf1dc;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1dc;' ? 'selected="selected"' :''}}>&#xf1dc; header</option>
                                        <option value='xf025;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf025;' ? 'selected="selected"' :''}}>&#xf025; headphones</option>
                                        <option value='xf004;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf004;' ? 'selected="selected"' :''}}>&#xf004; heart</option>
                                        <option value='xf08a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf08a;' ? 'selected="selected"' :''}}>&#xf08a; heart-o</option>
                                        <option value='xf21e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf21e;' ? 'selected="selected"' :''}}>&#xf21e; heartbeat</option>
                                        <option value='xf1da;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1da;' ? 'selected="selected"' :''}}>&#xf1da; history</option>
                                        <option value='xf015;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf015;' ? 'selected="selected"' :''}}>&#xf015; home</option>
                                        <option value='xf0f8;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0f8;' ? 'selected="selected"' :''}}>&#xf0f8; hospital-o</option>
                                        <option value='xf236;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf236;' ? 'selected="selected"' :''}}>&#xf236; hotel</option>
                                        <option value='xf254;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf254;' ? 'selected="selected"' :''}}>&#xf254; hourglass</option>
                                        <option value='xf251;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf251;' ? 'selected="selected"' :''}}>&#xf251; hourglass-1</option>
                                        <option value='xf252;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf252;' ? 'selected="selected"' :''}}>&#xf252; hourglass-2</option>
                                        <option value='xf253;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf253;' ? 'selected="selected"' :''}}>&#xf253; hourglass-3</option>
                                        <option value='xf253;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf253;' ? 'selected="selected"' :''}}>&#xf253; hourglass-end</option>
                                        <option value='xf252;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf252;' ? 'selected="selected"' :''}}>&#xf252; hourglass-half</option>
                                        <option value='xf250;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf250;' ? 'selected="selected"' :''}}>&#xf250; hourglass-o</option>
                                        <option value='xf251;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf251;' ? 'selected="selected"' :''}}>&#xf251; hourglass-start</option>
                                        <option value='xf27c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf27c;' ? 'selected="selected"' :''}}>&#xf27c; houzz</option>
                                        <option value='xf13b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf13b;' ? 'selected="selected"' :''}}>&#xf13b; html5</option>
                                        <option value='xf246;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf246;' ? 'selected="selected"' :''}}>&#xf246; i-cursor</option>
                                        <option value='xf2c1;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2c1;' ? 'selected="selected"' :''}}>&#xf2c1; id-badge</option>
                                        <option value='xf2c2;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2c2;' ? 'selected="selected"' :''}}>&#xf2c2; id-card</option>
                                        <option value='xf2c3;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2c3;' ? 'selected="selected"' :''}}>&#xf2c3; id-card-o</option>
                                        <option value='xf20b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf20b;' ? 'selected="selected"' :''}}>&#xf20b; ils</option>
                                        <option value='xf03e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf03e;' ? 'selected="selected"' :''}}>&#xf03e; image</option>
                                        <option value='xf2d8;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2d8;' ? 'selected="selected"' :''}}>&#xf2d8; imdb</option>
                                        <option value='xf01c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf01c;' ? 'selected="selected"' :''}}>&#xf01c; inbox</option>
                                        <option value='xf03c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf03c;' ? 'selected="selected"' :''}}>&#xf03c; indent</option>
                                        <option value='xf275;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf275;' ? 'selected="selected"' :''}}>&#xf275; industry</option>
                                        <option value='xf129;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf129;' ? 'selected="selected"' :''}}>&#xf129; info</option>
                                        <option value='xf05a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf05a;' ? 'selected="selected"' :''}}>&#xf05a; info-circle</option>
                                        <option value='xf156;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf156;' ? 'selected="selected"' :''}}>&#xf156; inr</option>
                                        <option value='xf16d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf16d;' ? 'selected="selected"' :''}}>&#xf16d; instagram</option>
                                        <option value='xf19c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf19c;' ? 'selected="selected"' :''}}>&#xf19c; institution</option>
                                        <option value='xf26b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf26b;' ? 'selected="selected"' :''}}>&#xf26b; internet-explorer</option>
                                        <option value='xf224;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf224;' ? 'selected="selected"' :''}}>&#xf224; intersex</option>
                                        <option value='xf208;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf208;' ? 'selected="selected"' :''}}>&#xf208; ioxhost</option>
                                        <option value='xf033;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf033;' ? 'selected="selected"' :''}}>&#xf033; italic</option>
                                        <option value='xf1aa;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1aa;' ? 'selected="selected"' :''}}>&#xf1aa; joomla</option>
                                        <option value='xf157;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf157;' ? 'selected="selected"' :''}}>&#xf157; jpy</option>
                                        <option value='xf1cc;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1cc;' ? 'selected="selected"' :''}}>&#xf1cc; jsfiddle</option>
                                        <option value='xf084;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf084;' ? 'selected="selected"' :''}}>&#xf084; key</option>
                                        <option value='xf11c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf11c;' ? 'selected="selected"' :''}}>&#xf11c; keyboard-o</option>
                                        <option value='xf159;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf159;' ? 'selected="selected"' :''}}>&#xf159; krw</option>
                                        <option value='xf1ab;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1ab;' ? 'selected="selected"' :''}}>&#xf1ab; language</option>
                                        <option value='xf109;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf109;' ? 'selected="selected"' :''}}>&#xf109; laptop</option>
                                        <option value='xf202;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf202;' ? 'selected="selected"' :''}}>&#xf202; lastfm</option>
                                        <option value='xf203;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf203;' ? 'selected="selected"' :''}}>&#xf203; lastfm-square</option>
                                        <option value='xf06c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf06c;' ? 'selected="selected"' :''}}>&#xf06c; leaf</option>
                                        <option value='xf212;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf212;' ? 'selected="selected"' :''}}>&#xf212; leanpub</option>
                                        <option value='xf0e3;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0e3;' ? 'selected="selected"' :''}}>&#xf0e3; legal</option>
                                        <option value='xf094;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf094;' ? 'selected="selected"' :''}}>&#xf094; lemon-o</option>
                                        <option value='xf149;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf149;' ? 'selected="selected"' :''}}>&#xf149; level-down</option>
                                        <option value='xf1cd;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1cd;' ? 'selected="selected"' :''}}>&#xf1cd; life-saver</option>
                                        <option value='xf0eb;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0eb;' ? 'selected="selected"' :''}}>&#xf0eb; lightbulb-o</option>
                                        <option value='xf0c1;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0c1;' ? 'selected="selected"' :''}}>&#xf0c1; link</option>
                                        <option value='xf0e1;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0e1;' ? 'selected="selected"' :''}}>&#xf0e1; linkedin</option>
                                        <option value='xf08c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf08c;' ? 'selected="selected"' :''}}>&#xf08c; linkedin-square</option>
                                        <option value='xf2b8;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2b8;' ? 'selected="selected"' :''}}>&#xf2b8; linode</option>
                                        <option value='xf17c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf17c;' ? 'selected="selected"' :''}}>&#xf17c; linux</option>
                                        <option value='xf03a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf03a;' ? 'selected="selected"' :''}}>&#xf03a; list</option>
                                        <option value='xf022;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf022;' ? 'selected="selected"' :''}}>&#xf022; list-alt</option>
                                        <option value='xf0cb;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0cb;' ? 'selected="selected"' :''}}>&#xf0cb; list-ol</option>
                                        <option value='xf0ca;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0ca;' ? 'selected="selected"' :''}}>&#xf0ca; list-ul</option>
                                        <option value='xf124;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf124;' ? 'selected="selected"' :''}}>&#xf124; location-arrow</option>
                                        <option value='xf023;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf023;' ? 'selected="selected"' :''}}>&#xf023; lock</option>
                                        <option value='xf175;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf175;' ? 'selected="selected"' :''}}>&#xf175; long-arrow-down</option>
                                        <option value='xf177;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf177;' ? 'selected="selected"' :''}}>&#xf177; long-arrow-left</option>
                                        <option value='xf178;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf178;' ? 'selected="selected"' :''}}>&#xf178; long-arrow-right</option>
                                        <option value='xf176;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf176;' ? 'selected="selected"' :''}}>&#xf176; long-arrow-up</option>
                                        <option value='xf2a8;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2a8;' ? 'selected="selected"' :''}}>&#xf2a8; low-vision</option>
                                        <option value='xf0d0;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0d0;' ? 'selected="selected"' :''}}>&#xf0d0; magic</option>
                                        <option value='xf076;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf076;' ? 'selected="selected"' :''}}>&#xf076; magnet</option>
                                        <option value='xf064;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf064;' ? 'selected="selected"' :''}}>&#xf064; mail-forward</option>
                                        <option value='xf112;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf112;' ? 'selected="selected"' :''}}>&#xf112; mail-reply</option>
                                        <option value='xf122;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf122;' ? 'selected="selected"' :''}}>&#xf122; mail-reply-all</option>
                                        <option value='xf183;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf183;' ? 'selected="selected"' :''}}>&#xf183; male</option>
                                        <option value='xf279;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf279;' ? 'selected="selected"' :''}}>&#xf279; map</option>
                                        <option value='xf041;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf041;' ? 'selected="selected"' :''}}>&#xf041; map-marker</option>
                                        <option value='xf278;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf278;' ? 'selected="selected"' :''}}>&#xf278; map-o</option>
                                        <option value='xf276;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf276;' ? 'selected="selected"' :''}}>&#xf276; map-pin</option>
                                        <option value='xf277;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf277;' ? 'selected="selected"' :''}}>&#xf277; map-signs</option>
                                        <option value='xf222;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf222;' ? 'selected="selected"' :''}}>&#xf222; mars</option>
                                        <option value='xf227;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf227;' ? 'selected="selected"' :''}}>&#xf227; mars-double</option>
                                        <option value='xf229;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf229;' ? 'selected="selected"' :''}}>&#xf229; mars-stroke</option>
                                        <option value='xf22b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf22b;' ? 'selected="selected"' :''}}>&#xf22b; mars-stroke-h</option>
                                        <option value='xf22a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf22a;' ? 'selected="selected"' :''}}>&#xf22a; mars-stroke-v</option>
                                        <option value='xf136;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf136;' ? 'selected="selected"' :''}}>&#xf136; maxcdn</option>
                                        <option value='xf20c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf20c;' ? 'selected="selected"' :''}}>&#xf20c; meanpath</option>
                                        <option value='xf23a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf23a;' ? 'selected="selected"' :''}}>&#xf23a; medium</option>
                                        <option value='xf0fa;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0fa;' ? 'selected="selected"' :''}}>&#xf0fa; medkit</option>
                                        <option value='xf2e0;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2e0;' ? 'selected="selected"' :''}}>&#xf2e0; meetup</option>
                                        <option value='xf11a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf11a;' ? 'selected="selected"' :''}}>&#xf11a; meh-o</option>
                                        <option value='xf223;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf223;' ? 'selected="selected"' :''}}>&#xf223; mercury</option>
                                        <option value='xf2db;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2db;' ? 'selected="selected"' :''}}>&#xf2db; microchip</option>
                                        <option value='xf130;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf130;' ? 'selected="selected"' :''}}>&#xf130; microphone</option>
                                        <option value='xf131;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf131;' ? 'selected="selected"' :''}}>&#xf131; microphone-slash</option>
                                        <option value='xf068;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf068;' ? 'selected="selected"' :''}}>&#xf068; minus</option>
                                        <option value='xf056;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf056;' ? 'selected="selected"' :''}}>&#xf056; minus-circle</option>
                                        <option value='xf146;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf146;' ? 'selected="selected"' :''}}>&#xf146; minus-square</option>
                                        <option value='xf147;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf147;' ? 'selected="selected"' :''}}>&#xf147; minus-square-o</option>
                                        <option value='xf289;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf289;' ? 'selected="selected"' :''}}>&#xf289; mixcloud</option>
                                        <option value='xf10b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf10b;' ? 'selected="selected"' :''}}>&#xf10b; mobile</option>
                                        <option value='xf10b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf10b;' ? 'selected="selected"' :''}}>&#xf10b; mobile-phone</option>
                                        <option value='xf285;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf285;' ? 'selected="selected"' :''}}>&#xf285; modx</option>
                                        <option value='xf0d6;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0d6;' ? 'selected="selected"' :''}}>&#xf0d6; money</option>
                                        <option value='xf186;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf186;' ? 'selected="selected"' :''}}>&#xf186; moon-o</option>
                                        <option value='xf19d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf19d;' ? 'selected="selected"' :''}}>&#xf19d; mortar-board</option>
                                        <option value='xf21c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf21c;' ? 'selected="selected"' :''}}>&#xf21c; motorcycle</option>
                                        <option value='xf245;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf245;' ? 'selected="selected"' :''}}>&#xf245; mouse-pointer</option>
                                        <option value='xf001;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf001;' ? 'selected="selected"' :''}}>&#xf001; music</option>
                                        <option value='xf0c9;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0c9;' ? 'selected="selected"' :''}}>&#xf0c9; navicon</option>
                                        <option value='xf22c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf22c;' ? 'selected="selected"' :''}}>&#xf22c; neuter</option>
                                        <option value='xf1ea;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1ea;' ? 'selected="selected"' :''}}>&#xf1ea; newspaper-o</option>
                                        <option value='xf247;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf247;' ? 'selected="selected"' :''}}>&#xf247; object-group</option>
                                        <option value='xf248;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf248;' ? 'selected="selected"' :''}}>&#xf248; object-ungroup</option>
                                        <option value='xf263;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf263;' ? 'selected="selected"' :''}}>&#xf263; odnoklassniki</option>
                                        <option value='xf264;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf264;' ? 'selected="selected"' :''}}>&#xf264; odnoklassniki-square</option>
                                        <option value='xf23d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf23d;' ? 'selected="selected"' :''}}>&#xf23d; opencart</option>
                                        <option value='xf19b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf19b;' ? 'selected="selected"' :''}}>&#xf19b; openid</option>
                                        <option value='xf26a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf26a;' ? 'selected="selected"' :''}}>&#xf26a; opera</option>
                                        <option value='xf23c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf23c;' ? 'selected="selected"' :''}}>&#xf23c; optin-monster</option>
                                        <option value='xf03b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf03b;' ? 'selected="selected"' :''}}>&#xf03b; outdent</option>
                                        <option value='xf18c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf18c;' ? 'selected="selected"' :''}}>&#xf18c; pagelines</option>
                                        <option value='xf1fc;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1fc;' ? 'selected="selected"' :''}}>&#xf1fc; paint-brush</option>
                                        <option value='xf1d8;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1d8;' ? 'selected="selected"' :''}}>&#xf1d8; paper-plane</option>
                                        <option value='xf1d9;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1d9;' ? 'selected="selected"' :''}}>&#xf1d9; paper-plane-o</option>
                                        <option value='xf0c6;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0c6;' ? 'selected="selected"' :''}}>&#xf0c6; paperclip</option>
                                        <option value='xf1dd;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1dd;' ? 'selected="selected"' :''}}>&#xf1dd; paragraph</option>
                                        <option value='xf0ea;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0ea;' ? 'selected="selected"' :''}}>&#xf0ea; paste</option>
                                        <option value='xf04c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf04c;' ? 'selected="selected"' :''}}>&#xf04c; pause</option>
                                        <option value='xf28b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf28b;' ? 'selected="selected"' :''}}>&#xf28b; pause-circle</option>
                                        <option value='xf28c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf28c;' ? 'selected="selected"' :''}}>&#xf28c; pause-circle-o</option>
                                        <option value='xf1b0;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1b0;' ? 'selected="selected"' :''}}>&#xf1b0; paw</option>
                                        <option value='xf1ed;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1ed;' ? 'selected="selected"' :''}}>&#xf1ed; paypal</option>
                                        <option value='xf040;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf040;' ? 'selected="selected"' :''}}>&#xf040; pencil</option>
                                        <option value='xf14b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf14b;' ? 'selected="selected"' :''}}>&#xf14b; pencil-square</option>
                                        <option value='xf044;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf044;' ? 'selected="selected"' :''}}>&#xf044; pencil-square-o</option>
                                        <option value='xf295;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf295;' ? 'selected="selected"' :''}}>&#xf295; percent</option>
                                        <option value='xf095;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf095;' ? 'selected="selected"' :''}}>&#xf095; phone</option>
                                        <option value='xf098;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf098;' ? 'selected="selected"' :''}}>&#xf098; phone-square</option>
                                        <option value='xf03e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf03e;' ? 'selected="selected"' :''}}>&#xf03e; photo</option>
                                        <option value='xf03e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf03e;' ? 'selected="selected"' :''}}>&#xf03e; picture-o</option>
                                        <option value='xf200;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf200;' ? 'selected="selected"' :''}}>&#xf200; pie-chart</option>
                                        <option value='xf2ae;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2ae;' ? 'selected="selected"' :''}}>&#xf2ae; pied-piper</option>
                                        <option value='xf1a8;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1a8;' ? 'selected="selected"' :''}}>&#xf1a8; pied-piper-alt</option>
                                        <option value='xf1a7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1a7;' ? 'selected="selected"' :''}}>&#xf1a7; pied-piper-pp</option>
                                        <option value='xf0d2;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0d2;' ? 'selected="selected"' :''}}>&#xf0d2; pinterest</option>
                                        <option value='xf231;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf231;' ? 'selected="selected"' :''}}>&#xf231; pinterest-p</option>
                                        <option value='xf0d3;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0d3;' ? 'selected="selected"' :''}}>&#xf0d3; pinterest-square</option>
                                        <option value='xf072;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf072;' ? 'selected="selected"' :''}}>&#xf072; plane</option>
                                        <option value='xf04b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf04b;' ? 'selected="selected"' :''}}>&#xf04b; play</option>
                                        <option value='xf144;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf144;' ? 'selected="selected"' :''}}>&#xf144; play-circle</option>
                                        <option value='xf01d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf01d;' ? 'selected="selected"' :''}}>&#xf01d; play-circle-o</option>
                                        <option value='xf1e6;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1e6;' ? 'selected="selected"' :''}}>&#xf1e6; plug</option>
                                        <option value='xf067;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf067;' ? 'selected="selected"' :''}}>&#xf067; plus</option>
                                        <option value='xf055;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf055;' ? 'selected="selected"' :''}}>&#xf055; plus-circle</option>
                                        <option value='xf0fe;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0fe;' ? 'selected="selected"' :''}}>&#xf0fe; plus-square</option>
                                        <option value='xf196;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf196;' ? 'selected="selected"' :''}}>&#xf196; plus-square-o</option>
                                        <option value='xf2ce;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2ce;' ? 'selected="selected"' :''}}>&#xf2ce; podcast</option>
                                        <option value='xf011;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf011;' ? 'selected="selected"' :''}}>&#xf011; power-off</option>
                                        <option value='xf02f;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf02f;' ? 'selected="selected"' :''}}>&#xf02f; print</option>
                                        <option value='xf288;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf288;' ? 'selected="selected"' :''}}>&#xf288; product-hunt</option>
                                        <option value='xf12e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf12e;' ? 'selected="selected"' :''}}>&#xf12e; puzzle-piece</option>
                                        <option value='xf1d6;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1d6;' ? 'selected="selected"' :''}}>&#xf1d6; qq</option>
                                        <option value='xf029;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf029;' ? 'selected="selected"' :''}}>&#xf029; qrcode</option>
                                        <option value='xf128;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf128;' ? 'selected="selected"' :''}}>&#xf128; question</option>
                                        <option value='xf059;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf059;' ? 'selected="selected"' :''}}>&#xf059; question-circle</option>
                                        <option value='xf29c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf29c;' ? 'selected="selected"' :''}}>&#xf29c; question-circle-o</option>
                                        <option value='xf2c4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2c4;' ? 'selected="selected"' :''}}>&#xf2c4; quora</option>
                                        <option value='xf10d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf10d;' ? 'selected="selected"' :''}}>&#xf10d; quote-left</option>
                                        <option value='xf10e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf10e;' ? 'selected="selected"' :''}}>&#xf10e; quote-right</option>
                                        <option value='xf1d0;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1d0;' ? 'selected="selected"' :''}}>&#xf1d0; ra</option>
                                        <option value='xf074;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf074;' ? 'selected="selected"' :''}}>&#xf074; random</option>
                                        <option value='xf2d9;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2d9;' ? 'selected="selected"' :''}}>&#xf2d9; ravelry</option>
                                        <option value='xf1d0;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1d0;' ? 'selected="selected"' :''}}>&#xf1d0; rebel</option>
                                        <option value='xf1b8;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1b8;' ? 'selected="selected"' :''}}>&#xf1b8; recycle</option>
                                        <option value='xf1a1;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1a1;' ? 'selected="selected"' :''}}>&#xf1a1; reddit</option>
                                        <option value='xf281;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf281;' ? 'selected="selected"' :''}}>&#xf281; reddit-alien</option>
                                        <option value='xf1a2;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1a2;' ? 'selected="selected"' :''}}>&#xf1a2; reddit-square</option>
                                        <option value='xf021;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf021;' ? 'selected="selected"' :''}}>&#xf021; refresh</option>
                                        <option value='xf25d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf25d;' ? 'selected="selected"' :''}}>&#xf25d; registered</option>
                                        <option value='xf00d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf00d;' ? 'selected="selected"' :''}}>&#xf00d; remove</option>
                                        <option value='xf18b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf18b;' ? 'selected="selected"' :''}}>&#xf18b; renren</option>
                                        <option value='xf0c9;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0c9;' ? 'selected="selected"' :''}}>&#xf0c9; reorder</option>
                                        <option value='xf01e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf01e;' ? 'selected="selected"' :''}}>&#xf01e; repeat</option>
                                        <option value='xf112;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf112;' ? 'selected="selected"' :''}}>&#xf112; reply</option>
                                        <option value='xf122;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf122;' ? 'selected="selected"' :''}}>&#xf122; reply-all</option>
                                        <option value='xf1d0;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1d0;' ? 'selected="selected"' :''}}>&#xf1d0; resistance</option>
                                        <option value='xf079;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf079;' ? 'selected="selected"' :''}}>&#xf079; retweet</option>
                                        <option value='xf157;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf157;' ? 'selected="selected"' :''}}>&#xf157; rmb</option>
                                        <option value='xf018;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf018;' ? 'selected="selected"' :''}}>&#xf018; road</option>
                                        <option value='xf135;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf135;' ? 'selected="selected"' :''}}>&#xf135; rocket</option>
                                        <option value='xf0e2;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0e2;' ? 'selected="selected"' :''}}>&#xf0e2; rotate-left</option>
                                        <option value='xf01e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf01e;' ? 'selected="selected"' :''}}>&#xf01e; rotate-right</option>
                                        <option value='xf158;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf158;' ? 'selected="selected"' :''}}>&#xf158; rouble</option>
                                        <option value='xf09e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf09e;' ? 'selected="selected"' :''}}>&#xf09e; rss</option>
                                        <option value='xf143;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf143;' ? 'selected="selected"' :''}}>&#xf143; rss-square</option>
                                        <option value='xf158;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf158;' ? 'selected="selected"' :''}}>&#xf158; rub</option>
                                        <option value='xf158;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf158;' ? 'selected="selected"' :''}}>&#xf158; ruble</option>
                                        <option value='xf156;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf156;' ? 'selected="selected"' :''}}>&#xf156; rupee</option>
                                        <option value='xf2cd;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2cd;' ? 'selected="selected"' :''}}>&#xf2cd; s15</option>
                                        <option value='xf267;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf267;' ? 'selected="selected"' :''}}>&#xf267; safari</option>
                                        <option value='xf0c7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0c7;' ? 'selected="selected"' :''}}>&#xf0c7; save</option>
                                        <option value='xf0c4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0c4;' ? 'selected="selected"' :''}}>&#xf0c4; scissors</option>
                                        <option value='xf28a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf28a;' ? 'selected="selected"' :''}}>&#xf28a; scribd</option>
                                        <option value='xf002;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf002;' ? 'selected="selected"' :''}}>&#xf002; search</option>
                                        <option value='xf010;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf010;' ? 'selected="selected"' :''}}>&#xf010; search-minus</option>
                                        <option value='xf00e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf00e;' ? 'selected="selected"' :''}}>&#xf00e; search-plus</option>
                                        <option value='xf213;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf213;' ? 'selected="selected"' :''}}>&#xf213; sellsy</option>
                                        <option value='xf1d8;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1d8;' ? 'selected="selected"' :''}}>&#xf1d8; send</option>
                                        <option value='xf1d9;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1d9;' ? 'selected="selected"' :''}}>&#xf1d9; send-o</option>
                                        <option value='xf233;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf233;' ? 'selected="selected"' :''}}>&#xf233; server</option>
                                        <option value='xf064;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf064;' ? 'selected="selected"' :''}}>&#xf064; share</option>
                                        <option value='xf1e0;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1e0;' ? 'selected="selected"' :''}}>&#xf1e0; share-alt</option>
                                        <option value='xf1e1;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1e1;' ? 'selected="selected"' :''}}>&#xf1e1; share-alt-square</option>
                                        <option value='xf14d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf14d;' ? 'selected="selected"' :''}}>&#xf14d; share-square</option>
                                        <option value='xf045;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf045;' ? 'selected="selected"' :''}}>&#xf045; share-square-o</option>
                                        <option value='xf20b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf20b;' ? 'selected="selected"' :''}}>&#xf20b; shekel</option>
                                        <option value='xf20b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf20b;' ? 'selected="selected"' :''}}>&#xf20b; sheqel</option>
                                        <option value='xf132;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf132;' ? 'selected="selected"' :''}}>&#xf132; shield</option>
                                        <option value='xf21a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf21a;' ? 'selected="selected"' :''}}>&#xf21a; ship</option>
                                        <option value='xf214;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf214;' ? 'selected="selected"' :''}}>&#xf214; shirtsinbulk</option>
                                        <option value='xf290;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf290;' ? 'selected="selected"' :''}}>&#xf290; shopping-bag</option>
                                        <option value='xf291;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf291;' ? 'selected="selected"' :''}}>&#xf291; shopping-basket</option>
                                        <option value='xf07a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf07a;' ? 'selected="selected"' :''}}>&#xf07a; shopping-cart</option>
                                        <option value='xf2cc;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2cc;' ? 'selected="selected"' :''}}>&#xf2cc; shower</option>
                                        <option value='xf090;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf090;' ? 'selected="selected"' :''}}>&#xf090; sign-in</option>
                                        <option value='xf2a7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2a7;' ? 'selected="selected"' :''}}>&#xf2a7; sign-language</option>
                                        <option value='xf08b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf08b;' ? 'selected="selected"' :''}}>&#xf08b; sign-out</option>
                                        <option value='xf012;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf012;' ? 'selected="selected"' :''}}>&#xf012; signal</option>
                                        <option value='xf2a7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2a7;' ? 'selected="selected"' :''}}>&#xf2a7; signing</option>
                                        <option value='xf215;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf215;' ? 'selected="selected"' :''}}>&#xf215; simplybuilt</option>
                                        <option value='xf0e8;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0e8;' ? 'selected="selected"' :''}}>&#xf0e8; sitemap</option>
                                        <option value='xf216;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf216;' ? 'selected="selected"' :''}}>&#xf216; skyatlas</option>
                                        <option value='xf17e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf17e;' ? 'selected="selected"' :''}}>&#xf17e; skype</option>
                                        <option value='xf198;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf198;' ? 'selected="selected"' :''}}>&#xf198; slack</option>
                                        <option value='xf1de;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1de;' ? 'selected="selected"' :''}}>&#xf1de; sliders</option>
                                        <option value='xf1e7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1e7;' ? 'selected="selected"' :''}}>&#xf1e7; slideshare</option>
                                        <option value='xf118;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf118;' ? 'selected="selected"' :''}}>&#xf118; smile-o</option>
                                        <option value='xf2ab;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2ab;' ? 'selected="selected"' :''}}>&#xf2ab; snapchat</option>
                                        <option value='xf2ac;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2ac;' ? 'selected="selected"' :''}}>&#xf2ac; snapchat-ghost</option>
                                        <option value='xf2ad;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2ad;' ? 'selected="selected"' :''}}>&#xf2ad; snapchat-square</option>
                                        <option value='xf2dc;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2dc;' ? 'selected="selected"' :''}}>&#xf2dc; snowflake-o</option>
                                        <option value='xf1e3;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1e3;' ? 'selected="selected"' :''}}>&#xf1e3; soccer-ball-o</option>
                                        <option value='xf0dc;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0dc;' ? 'selected="selected"' :''}}>&#xf0dc; sort</option>
                                        <option value='xf15d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf15d;' ? 'selected="selected"' :''}}>&#xf15d; sort-alpha-asc</option>
                                        <option value='xf15e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf15e;' ? 'selected="selected"' :''}}>&#xf15e; sort-alpha-desc</option>
                                        <option value='xf160;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf160;' ? 'selected="selected"' :''}}>&#xf160; sort-amount-asc</option>
                                        <option value='xf161;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf161;' ? 'selected="selected"' :''}}>&#xf161; sort-amount-desc</option>
                                        <option value='xf0de;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0de;' ? 'selected="selected"' :''}}>&#xf0de; sort-asc</option>
                                        <option value='xf0dd;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0dd;' ? 'selected="selected"' :''}}>&#xf0dd; sort-desc</option>
                                        <option value='xf0dd;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0dd;' ? 'selected="selected"' :''}}>&#xf0dd; sort-down</option>
                                        <option value='xf162;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf162;' ? 'selected="selected"' :''}}>&#xf162; sort-numeric-asc</option>
                                        <option value='xf163;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf163;' ? 'selected="selected"' :''}}>&#xf163; sort-numeric-desc</option>
                                        <option value='xf0de;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0de;' ? 'selected="selected"' :''}}>&#xf0de; sort-up</option>
                                        <option value='xf1be;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1be;' ? 'selected="selected"' :''}}>&#xf1be; soundcloud</option>
                                        <option value='xf197;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf197;' ? 'selected="selected"' :''}}>&#xf197; space-shuttle</option>
                                        <option value='xf110;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf110;' ? 'selected="selected"' :''}}>&#xf110; spinner</option>
                                        <option value='xf1b1;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1b1;' ? 'selected="selected"' :''}}>&#xf1b1; spoon</option>
                                        <option value='xf1bc;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1bc;' ? 'selected="selected"' :''}}>&#xf1bc; spotify</option>
                                        <option value='xf0c8;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0c8;' ? 'selected="selected"' :''}}>&#xf0c8; square</option>
                                        <option value='xf096;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf096;' ? 'selected="selected"' :''}}>&#xf096; square-o</option>
                                        <option value='xf18d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf18d;' ? 'selected="selected"' :''}}>&#xf18d; stack-exchange</option>
                                        <option value='xf16c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf16c;' ? 'selected="selected"' :''}}>&#xf16c; stack-overflow</option>
                                        <option value='xf005;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf005;' ? 'selected="selected"' :''}}>&#xf005; star</option>
                                        <option value='xf089;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf089;' ? 'selected="selected"' :''}}>&#xf089; star-half</option>
                                        <option value='xf123;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf123;' ? 'selected="selected"' :''}}>&#xf123; star-half-empty</option>
                                        <option value='xf123;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf123;' ? 'selected="selected"' :''}}>&#xf123; star-half-full</option>
                                        <option value='xf123;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf123;' ? 'selected="selected"' :''}}>&#xf123; star-half-o</option>
                                        <option value='xf006;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf006;' ? 'selected="selected"' :''}}>&#xf006; star-o</option>
                                        <option value='xf006;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf006;' ? 'selected="selected"' :''}}>&#xf006; steam</option>
                                        <option value='xf1b7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1b7;' ? 'selected="selected"' :''}}>&#xf1b7; steam-square</option>
                                        <option value='xf048;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf048;' ? 'selected="selected"' :''}}>&#xf048; step-backward</option>
                                        <option value='xf051;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf051;' ? 'selected="selected"' :''}}>&#xf051; step-forward</option>
                                        <option value='xf0f1;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0f1;' ? 'selected="selected"' :''}}>&#xf0f1; stethoscope</option>
                                        <option value='xf249;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf249;' ? 'selected="selected"' :''}}>&#xf249; sticky-note</option>
                                        <option value='xf24a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf24a;' ? 'selected="selected"' :''}}>&#xf24a; sticky-note-o</option>
                                        <option value='xf04d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf04d;' ? 'selected="selected"' :''}}>&#xf04d; stop</option>
                                        <option value='xf28d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf28d;' ? 'selected="selected"' :''}}>&#xf28d; stop-circle</option>
                                        <option value='xf28e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf28e;' ? 'selected="selected"' :''}}>&#xf28e; stop-circle-o</option>
                                        <option value='xf21d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf21d;' ? 'selected="selected"' :''}}>&#xf21d; street-view</option>
                                        <option value='xf0cc;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0cc;' ? 'selected="selected"' :''}}>&#xf0cc; strikethrough</option>
                                        <option value='xf1a4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1a4;' ? 'selected="selected"' :''}}>&#xf1a4; stumbleupon</option>
                                        <option value='xf1a3;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1a3;' ? 'selected="selected"' :''}}>&#xf1a3; stumbleupon-circle</option>
                                        <option value='xf12c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf12c;' ? 'selected="selected"' :''}}>&#xf12c; subscript</option>
                                        <option value='xf239;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf239;' ? 'selected="selected"' :''}}>&#xf239; subway</option>
                                        <option value='xf0f2;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0f2;' ? 'selected="selected"' :''}}>&#xf0f2; suitcase</option>
                                        <option value='xf185;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf185;' ? 'selected="selected"' :''}}>&#xf185; sun-o</option>
                                        <option value='xf2dd;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2dd;' ? 'selected="selected"' :''}}>&#xf2dd; superpowers</option>
                                        <option value='xf12b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf12b;' ? 'selected="selected"' :''}}>&#xf12b; superscript</option>
                                        <option value='xf1cd;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1cd;' ? 'selected="selected"' :''}}>&#xf1cd; support</option>
                                        <option value='xf0ce;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0ce;' ? 'selected="selected"' :''}}>&#xf0ce; table</option>
                                        <option value='xf10a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf10a;' ? 'selected="selected"' :''}}>&#xf10a; tablet</option>
                                        <option value='xf0e4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0e4;' ? 'selected="selected"' :''}}>&#xf0e4; tachometer</option>
                                        <option value='xf02b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf02b;' ? 'selected="selected"' :''}}>&#xf02b; tag</option>
                                        <option value='xf02c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf02c;' ? 'selected="selected"' :''}}>&#xf02c; tags</option>
                                        <option value='xf0ae;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0ae;' ? 'selected="selected"' :''}}>&#xf0ae; tasks</option>
                                        <option value='xf1ba;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1ba;' ? 'selected="selected"' :''}}>&#xf1ba; taxi</option>
                                        <option value='xf2c6;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2c6;' ? 'selected="selected"' :''}}>&#xf2c6; telegram</option>
                                        <option value='xf26c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf26c;' ? 'selected="selected"' :''}}>&#xf26c; television</option>
                                        <option value='xf1d5;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1d5;' ? 'selected="selected"' :''}}>&#xf1d5; tencent-weibo</option>
                                        <option value='xf120;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf120;' ? 'selected="selected"' :''}}>&#xf120; terminal</option>
                                        <option value='xf034;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf034;' ? 'selected="selected"' :''}}>&#xf034; text-height</option>
                                        <option value='xf035;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf035;' ? 'selected="selected"' :''}}>&#xf035; text-width</option>
                                        <option value='xf00a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf00a;' ? 'selected="selected"' :''}}>&#xf00a; th</option>
                                        <option value='xf009;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf009;' ? 'selected="selected"' :''}}>&#xf009; th-large</option>
                                        <option value='xf00b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf00b;' ? 'selected="selected"' :''}}>&#xf00b; th-list</option>
                                        <option value='xf2b2;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2b2;' ? 'selected="selected"' :''}}>&#xf2b2; themeisle</option>
                                        <option value='xf2c7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2c7;' ? 'selected="selected"' :''}}>&#xf2c7; thermometer</option>
                                        <option value='xf2cb;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2cb;' ? 'selected="selected"' :''}}>&#xf2cb; thermometer-0</option>
                                        <option value='xf2ca;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2ca;' ? 'selected="selected"' :''}}>&#xf2ca; thermometer-1</option>
                                        <option value='xf2c9;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2c9;' ? 'selected="selected"' :''}}>&#xf2c9; thermometer-2</option>
                                        <option value='xf2c8;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2c8;' ? 'selected="selected"' :''}}>&#xf2c8; thermometer-3</option>
                                        <option value='xf2c7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2c7;' ? 'selected="selected"' :''}}>&#xf2c7; thermometer-4</option>
                                        <option value='xf2cb;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2cb;' ? 'selected="selected"' :''}}>&#xf2cb; thermometer-empty</option>
                                        <option value='xf2c7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2c7;' ? 'selected="selected"' :''}}>&#xf2c7; thermometer-full</option>
                                        <option value='xf2c9;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2c9;' ? 'selected="selected"' :''}}>&#xf2c9; thermometer-half</option>
                                        <option value='xf2ca;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2ca;' ? 'selected="selected"' :''}}>&#xf2ca; thermometer-quarter</option>
                                        <option value='xf2c8;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2c8;' ? 'selected="selected"' :''}}>&#xf2c8; thermometer-three-quarters</option>
                                        <option value='xf08d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf08d;' ? 'selected="selected"' :''}}>&#xf08d; thumb-tack</option>
                                        <option value='xf165;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf165;' ? 'selected="selected"' :''}}>&#xf165; thumbs-down</option>
                                        <option value='xf088;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf088;' ? 'selected="selected"' :''}}>&#xf088; thumbs-o-down</option>
                                        <option value='xf087;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf087;' ? 'selected="selected"' :''}}>&#xf087; thumbs-o-up</option>
                                        <option value='xf164;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf164;' ? 'selected="selected"' :''}}>&#xf164; thumbs-up</option>
                                        <option value='xf145;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf145;' ? 'selected="selected"' :''}}>&#xf145; ticket</option>
                                        <option value='xf00d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf00d;' ? 'selected="selected"' :''}}>&#xf00d; times</option>
                                        <option value='xf057;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf057;' ? 'selected="selected"' :''}}>&#xf057; times-circle</option>
                                        <option value='xf05c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf05c;' ? 'selected="selected"' :''}}>&#xf05c; times-circle-o</option>
                                        <option value='xf2d3;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2d3;' ? 'selected="selected"' :''}}>&#xf2d3; times-rectangle</option>
                                        <option value='xf2d4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2d4;' ? 'selected="selected"' :''}}>&#xf2d4; times-rectangle-o</option>
                                        <option value='xf043;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf043;' ? 'selected="selected"' :''}}>&#xf043; tint</option>
                                        <option value='xf150;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf150;' ? 'selected="selected"' :''}}>&#xf150; toggle-down</option>
                                        <option value='xf191;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf191;' ? 'selected="selected"' :''}}>&#xf191; toggle-left</option>
                                        <option value='xf204;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf204;' ? 'selected="selected"' :''}}>&#xf204; toggle-off</option>
                                        <option value='xf205;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf205;' ? 'selected="selected"' :''}}>&#xf205; toggle-on</option>
                                        <option value='xf152;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf152;' ? 'selected="selected"' :''}}>&#xf152; toggle-right</option>
                                        <option value='xf151;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf151;' ? 'selected="selected"' :''}}>&#xf151; toggle-up</option>
                                        <option value='xf25c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf25c;' ? 'selected="selected"' :''}}>&#xf25c; trademark</option>
                                        <option value='xf238;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf238;' ? 'selected="selected"' :''}}>&#xf238; train</option>
                                        <option value='xf224;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf224;' ? 'selected="selected"' :''}}>&#xf224; transgender</option>
                                        <option value='xf225;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf225;' ? 'selected="selected"' :''}}>&#xf225; transgender-alt</option>
                                        <option value='xf1f8;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1f8;' ? 'selected="selected"' :''}}>&#xf1f8; trash</option>
                                        <option value='xf014;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf014;' ? 'selected="selected"' :''}}>&#xf014; trash-o</option>
                                        <option value='xf1bb;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1bb;' ? 'selected="selected"' :''}}>&#xf1bb; tree</option>
                                        <option value='xf181;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf181;' ? 'selected="selected"' :''}}>&#xf181; trello</option>
                                        <option value='xf262;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf262;' ? 'selected="selected"' :''}}>&#xf262; tripadvisor</option>
                                        <option value='xf091;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf091;' ? 'selected="selected"' :''}}>&#xf091; trophy</option>
                                        <option value='xf0d1;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0d1;' ? 'selected="selected"' :''}}>&#xf0d1; truck</option>
                                        <option value='xf195;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf195;' ? 'selected="selected"' :''}}>&#xf195; try</option>
                                        <option value='xf1e4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1e4;' ? 'selected="selected"' :''}}>&#xf1e4; tty</option>
                                        <option value='xf173;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf173;' ? 'selected="selected"' :''}}>&#xf173; tumblr</option>
                                        <option value='xf174;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf174;' ? 'selected="selected"' :''}}>&#xf174; tumblr-square</option>
                                        <option value='xf195;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf195;' ? 'selected="selected"' :''}}>&#xf195; turkish-lira</option>
                                        <option value='xf26c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf26c;' ? 'selected="selected"' :''}}>&#xf26c; tv</option>
                                        <option value='xf1e8;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1e8;' ? 'selected="selected"' :''}}>&#xf1e8; twitch</option>
                                        <option value='xf099;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf099;' ? 'selected="selected"' :''}}>&#xf099; twitter</option>
                                        <option value='xf081;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf081;' ? 'selected="selected"' :''}}>&#xf081; twitter-square</option>
                                        <option value='xf0e9;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0e9;' ? 'selected="selected"' :''}}>&#xf0e9; umbrella</option>
                                        <option value='xf0cd;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0cd;' ? 'selected="selected"' :''}}>&#xf0cd; underline</option>
                                        <option value='xf0e2;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0e2;' ? 'selected="selected"' :''}}>&#xf0e2; undo</option>
                                        <option value='xf29a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf29a;' ? 'selected="selected"' :''}}>&#xf29a; universal-access</option>
                                        <option value='xf19c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf19c;' ? 'selected="selected"' :''}}>&#xf19c; university</option>
                                        <option value='xf127;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf127;' ? 'selected="selected"' :''}}>&#xf127; unlink</option>
                                        <option value='xf09c;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf09c;' ? 'selected="selected"' :''}}>&#xf09c; unlock</option>
                                        <option value='xf13e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf13e;' ? 'selected="selected"' :''}}>&#xf13e; unlock-alt</option>
                                        <option value='xf0dc;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0dc;' ? 'selected="selected"' :''}}>&#xf0dc; unsorted</option>
                                        <option value='xf093;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf093;' ? 'selected="selected"' :''}}>&#xf093; upload</option>
                                        <option value='xf287;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf287;' ? 'selected="selected"' :''}}>&#xf287; usb</option>
                                        <option value='xf155;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf155;' ? 'selected="selected"' :''}}>&#xf155; usd</option>
                                        <option value='xf007;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf007;' ? 'selected="selected"' :''}}>&#xf007; user</option>
                                        <option value='xf2bd;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2bd;' ? 'selected="selected"' :''}}>&#xf2bd; user-circle</option>
                                        <option value='xf2be; {{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2be;' ? 'selected="selected"' :''}}'>&#xf2be; user-circle-o</option>
                                        <option value='xf0f0;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0f0;' ? 'selected="selected"' :''}}>&#xf0f0; user-md</option>
                                        <option value='xf2c0;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2c0;' ? 'selected="selected"' :''}}>&#xf2c0; user-o</option>
                                        <option value='xf234;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf234;' ? 'selected="selected"' :''}}>&#xf234; user-plus</option>
                                        <option value='xf21b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf21b;' ? 'selected="selected"' :''}}>&#xf21b; user-secret</option>
                                        <option value='xf235;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf235;' ? 'selected="selected"' :''}}>&#xf235; user-times</option>
                                        <option value='xf0c0;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0c0;' ? 'selected="selected"' :''}}>&#xf0c0; users</option>
                                        <option value='xf2bb;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2bb;' ? 'selected="selected"' :''}}>&#xf2bb; vcard</option>
                                        <option value='xf2bc;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2bc;' ? 'selected="selected"' :''}}>&#xf2bc; vcard-o</option>
                                        <option value='xf221;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf221;' ? 'selected="selected"' :''}}>&#xf221; venus</option>
                                        <option value='xf226;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf226;' ? 'selected="selected"' :''}}>&#xf226; venus-double</option>
                                        <option value='xf228;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf228;' ? 'selected="selected"' :''}}>&#xf228; venus-mars</option>
                                        <option value='xf237;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf237;' ? 'selected="selected"' :''}}>&#xf237; viacoin</option>
                                        <option value='xf2a9;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2a9;' ? 'selected="selected"' :''}}>&#xf2a9; viadeo</option>
                                        <option value='xf2aa;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2aa;' ? 'selected="selected"' :''}}>&#xf2aa; viadeo-square</option>
                                        <option value='xf03d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf03d;' ? 'selected="selected"' :''}}>&#xf03d; video-camera</option>
                                        <option value='xf27d;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf27d;' ? 'selected="selected"' :''}}>&#xf27d; vimeo</option>
                                        <option value='xf194;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf194;' ? 'selected="selected"' :''}}>&#xf194; vimeo-square</option>
                                        <option value='xf1ca;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1ca;' ? 'selected="selected"' :''}}>&#xf1ca; vine</option>
                                        <option value='xf189;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf189;' ? 'selected="selected"' :''}}>&#xf189; vk</option>
                                        <option value='xf2a0;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2a0;' ? 'selected="selected"' :''}}>&#xf2a0; volume-control-phone</option>
                                        <option value='xf027;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf027;' ? 'selected="selected"' :''}}>&#xf027; volume-down</option>
                                        <option value='xf026;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf026;' ? 'selected="selected"' :''}}>&#xf026; volume-off</option>
                                        <option value='xf028;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf028;' ? 'selected="selected"' :''}}>&#xf028; volume-up</option>
                                        <option value='xf071;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf071;' ? 'selected="selected"' :''}}>&#xf071; warning</option>
                                        <option value='xf1d7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1d7;' ? 'selected="selected"' :''}}>&#xf1d7; wechat</option>
                                        <option value='xf18a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf18a;' ? 'selected="selected"' :''}}>&#xf18a; weibo</option>
                                        <option value='xf1d7;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1d7;' ? 'selected="selected"' :''}}>&#xf1d7; weixin</option>
                                        <option value='xf232;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf232;' ? 'selected="selected"' :''}}>&#xf232; whatsapp</option>
                                        <option value='xf193;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf193;' ? 'selected="selected"' :''}}>&#xf193; wheelchair</option>
                                        <option value='xf29b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf29b;' ? 'selected="selected"' :''}}>&#xf29b; wheelchair-alt</option>
                                        <option value='xf1eb;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1eb;' ? 'selected="selected"' :''}}>&#xf1eb; wifi</option>
                                        <option value='xf266;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf266;' ? 'selected="selected"' :''}}>&#xf266; wikipedia-w</option>
                                        <option value='xf2d3;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2d3;' ? 'selected="selected"' :''}}>&#xf2d3; window-close</option>
                                        <option value='xf2d4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2d4;' ? 'selected="selected"' :''}}>&#xf2d4; window-close-o</option>
                                        <option value='xf2d0;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2d0;' ? 'selected="selected"' :''}}>&#xf2d0; window-maximize</option>
                                        <option value='xf2d1;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2d1;' ? 'selected="selected"' :''}}>&#xf2d1; window-minimize</option>
                                        <option value='xf2d2;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2d2;' ? 'selected="selected"' :''}}>&#xf2d2; window-restore</option>
                                        <option value='xf17a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf17a;' ? 'selected="selected"' :''}}>&#xf17a; windows</option>
                                        <option value='xf159;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf159;' ? 'selected="selected"' :''}}>&#xf159; won</option>
                                        <option value='xf19a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf19a;' ? 'selected="selected"' :''}}>&#xf19a; wordpress</option>
                                        <option value='xf297;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf297;' ? 'selected="selected"' :''}}>&#xf297; wpbeginner</option>
                                        <option value='xf2de;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2de;' ? 'selected="selected"' :''}}>&#xf2de; wpexplorer</option>
                                        <option value='xf298;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf298;' ? 'selected="selected"' :''}}>&#xf298; wpforms</option>
                                        <option value='xf0ad;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf0ad;' ? 'selected="selected"' :''}}>&#xf0ad; wrench</option>
                                        <option value='xf168;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf168;' ? 'selected="selected"' :''}}>&#xf168; xing</option>
                                        <option value='xf169;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf169;' ? 'selected="selected"' :''}}>&#xf169; xing-square</option>
                                        <option value='xf23b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf23b;' ? 'selected="selected"' :''}}>&#xf23b; y-combinator</option>
                                        <option value='xf1d4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1d4;' ? 'selected="selected"' :''}}>&#xf1d4; y-combinator-square</option>
                                        <option value='xf19e;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf19e;' ? 'selected="selected"' :''}}>&#xf19e; yahoo</option>
                                        <option value='xf23b;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf23b;' ? 'selected="selected"' :''}}>&#xf23b; yc</option>
                                        <option value='xf1d4;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1d4;' ? 'selected="selected"' :''}}>&#xf1d4; yc-square</option>
                                        <option value='xf1e9;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf1e9;' ? 'selected="selected"' :''}}>&#xf1e9; yelp</option>
                                        <option value='xf157;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf157;' ? 'selected="selected"' :''}}>&#xf157; yen</option>
                                        <option value='xf2b1;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf2b1;' ? 'selected="selected"' :''}}>&#xf2b1; yoast</option>
                                        <option value='xf167;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf167;' ? 'selected="selected"' :''}}>&#xf167; youtube</option>
                                        <option value='xf16a;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf16a;' ? 'selected="selected"' :''}}>&#xf16a; youtube-play</option>
                                        <option value='xf166;'{{isset($helpcenter['icon']) && $helpcenter['icon'] == 'xf166;' ? 'selected="selected"' :''}}>&#xf166; youtube-square</option>
                                    </select>
                                    @error('queryIcon')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="order">Order<font color="red">*</font></label>
                                    <input type="number" class="form-control helpCenter_order" min="0" name="order" id="order" value="{{isset($helpcenter['order']) ? $helpcenter['order'] : ''}}"/>
                                    @error('order')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-12">
                                <div class="form-group">
                                    <label for="description">Description<font color="red">*</font></label>
                                    <textarea  rows="4" class="form-control" name="description" id="description" value="{{isset($helpcenter['description']) ? $helpcenter['description'] : ' '}}">{{isset($helpcenter['description']) ? $helpcenter['description'] : ' '}}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary mr-2" id="update_helpCenter_button">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@section('scripts')
    <script src="{{asset('assets/custom/admin/help_Center/create_helpCenter.js')}}"></script>
@endsection

@endsection
