<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{route('vendor.dashboard')}}"><img src="{{asset('assets/images/gift_poke_logo.png')}}" class="ml-4 mr-2" style="" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{route('vendor.dashboard')}}"><img src="{{asset('assets/images/gifter_logo.png')}}" class="ml-0 mr-2 mt-2" style="height:35px; width:30px" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="icon-menu"></span>
        </button>
        
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img src="{{!empty(auth()->user()->profile_picture) ? url(auth()->user()->profile_picture)  : default_profile_photo_url(auth()->user()->first_name.' '.auth()->user()->last_name)}}" alt="profile"/>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{route('vendor.account.settings')}}"><i class="ti-settings text-primary"></i>Settings</a>
                    <a href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="ti-power-off text-primary"></i>Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>
