<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'Laravel')</title>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        
        <title>@yield('title', 'Giftpoke')</title>

        {{-- Theme css libraury --}}
        @include('backend.css_includes.theme_css')
        
        @yield('styles')
    </head>

    <body>
        <div class="container-scroller">            
            @yield('login_body')
        </div>
       

        {{-- Theme scripts libraury --}}
        <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
        <!-- inject:js -->
        <script src="{{asset('assets/js/off-canvas.js')}}"></script>
        <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
        <script src="{{asset('assets/js/template.js')}}"></script>
        <script src="{{asset('assets/js/settings.js')}}"></script>
        <script src="{{asset('assets/js/todolist.js')}}"></script>
        <script src="{{asset('assets/js/jQuery.js')}}"></script>
        <!-- endinject -->
        <!-- End Theme scripts libraury-->

        @yield('scripts')
        @include('vendor.javascript_includes.vendor_auth_script');
    </body>
</html>