<nav class="navbar fixed-top">
    <div class="d-flex align-items-center navbar-left">
        <a href="#" class="menu-button d-none d-md-block">
            <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                <rect x="0.48" y="0.5" width="7" height="1" />
                <rect x="0.48" y="7.5" width="7" height="1" />
                <rect x="0.48" y="15.5" width="7" height="1" />
            </svg>
            <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                <rect x="1.56" y="0.5" width="16" height="1" />
                <rect x="1.56" y="7.5" width="16" height="1" />
                <rect x="1.56" y="15.5" width="16" height="1" />
            </svg>
        </a>

        <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                <rect x="0.5" y="0.5" width="25" height="1" />
                <rect x="0.5" y="7.5" width="25" height="1" />
                <rect x="0.5" y="15.5" width="25" height="1" />
            </svg>
        </a>

    </div>


    <img src='{{url('user_assets/images/logo2.png')}}' />

    <div class="navbar-right">
        <div class="header-icons d-inline-block align-middle">

        </div>

        <div class="user d-inline-block">
            <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <span class="name">{{ Auth::user()->name }}</span>
                <span>
                    <img alt="Profile Picture" src="{{url('admin_assets/img/profiles/l-1.jpg')}}" />
                </span>
            </button>

            <div class="dropdown-menu dropdown-menu-right mt-3">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Sign out') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</nav>

<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li class="active">
                    <a href="">
                        <i class="iconsminds-shop-4"></i>
                        <span>Dashboards</span>
                    </a>
                </li>
                <li>
                    <a href="#home">
                        <i class="simple-icon-menu"></i>
                        <span>Home</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sub-menu">
        <div class="scroll">
            <ul class="list-unstyled" data-link="home" id="home">
                <li>
                    <a href="#"><i class="simple-icon-arrow-down"></i> <span class="d-inline-block">All Sections</span> </a>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{ url('home_banner') }}">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Banner</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="{{ url('home_technologies') }}">
                                    <i class="simple-icon-mouse"></i> <span class="d-inline-block">Technologies</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('home_content') }}">
                                    <i class="simple-icon-energy"></i> <span class="d-inline-block">About Content One</span>
                                </a>
                            {{-- </li>
                            <li>
                                <a href="#">
                                    <i class="simple-icon-tag"></i> <span class="d-inline-block">Our Services</span>
                                </a>
                            </li> --}}
                            <li>
                                <a href="{{ url('home_content_second') }}">
                                    <i class="simple-icon-tag"></i> <span class="d-inline-block">About Content Two</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('home_content_third') }}">
                                    <i class="simple-icon-bulb"></i> <span class="d-inline-block">About Content Thirth</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="Pages.Auth.ForgotPassword.html">
                                    <i class="simple-icon-paper-clip"></i> <span class="d-inline-block">Our Work</span>
                                </a>
                            </li> --}}
                            <li>
                                <a href="{{ url('loyal_customers') }}">
                                    <i class="simple-icon-symbol-male"></i> <span class="d-inline-block">Loyal Customers</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('home_content_fourth') }}">
                                    <i class="simple-icon-map"></i> <span class="d-inline-block">About Content Fourth</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('home_testimonials')}}">
                                    <i class="simple-icon-social-github"></i> <span class="d-inline-block">Our Testimonials</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="Pages.Auth.ForgotPassword.html">
                                    <i class="simple-icon-social-spotify"></i> <span class="d-inline-block">Our Packages</span>
                                </a>
                            </li>
                            <li>
                                <a href="Pages.Auth.ForgotPassword.html">
                                    <i class="simple-icon-user-unfollow"></i> <span class="d-inline-block">Last Banner</span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>