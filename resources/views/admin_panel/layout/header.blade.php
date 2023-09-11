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
                <li class="{{ $_SERVER['REQUEST_URI'] === '/dashboard' ? 'active' : '' }}" >
                    <a href="{{ url('dashboard') }}">
                        <i class="iconsminds-shop-4"></i>
                        <span>Dashboards</span>
                    </a>
                </li>
                <li class="{{$_SERVER['REQUEST_URI'] === '/home_testimonials' || $_SERVER['REQUEST_URI'] === '/home_content_fourth' || $_SERVER['REQUEST_URI'] === '/loyal_customers' || $_SERVER['REQUEST_URI'] === '/home_content_third' || $_SERVER['REQUEST_URI'] === '/home_content_second' || $_SERVER['REQUEST_URI'] === '/home_our_service' || $_SERVER['REQUEST_URI'] === '/home_banner' || $_SERVER['REQUEST_URI'] === '/home_technologies' || $_SERVER['REQUEST_URI'] === '/home_content' ? 'active' : '' }}" >
                    <a href="#home">
                        <i class="simple-icon-screen-desktop"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="{{ $_SERVER['REQUEST_URI'] === '/category' || $_SERVER['REQUEST_URI'] === '/sub_categories' || $_SERVER['REQUEST_URI'] === '/sub_categories_item' || $_SERVER['REQUEST_URI'] === '/service_details' ? 'active' : '' }}">
                    <a href="#services">
                        <i class="simple-icon-globe"></i>
                        <span>Services</span>
                    </a>
                </li>
                <li class="{{ $_SERVER['REQUEST_URI'] === '/edit_last_about_banner' || $_SERVER['REQUEST_URI'] === '/asked_question' || $_SERVER['REQUEST_URI'] === '/all_about_us_banner' || $_SERVER['REQUEST_URI'] === '/who_we_are' || $_SERVER['REQUEST_URI'] === '/mission_vision' || $_SERVER['REQUEST_URI'] === '/our_Philosophy' ? 'active' : '' }}">
                    <a href="#about_us">
                        <i class="simple-icon-organization"></i>
                        <span>About Us </span>
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
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/home_banner' ? 'active' : '' }}">
                                <a href="{{ url('home_banner') }}">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Banner</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/home_technologies' ? 'active' : '' }}">
                                <a href="{{ url('home_technologies') }}">
                                    <i class="simple-icon-mouse"></i> <span class="d-inline-block">Technologies</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/home_content' ? 'active' : '' }}">
                                <a href="{{ url('home_content') }}">
                                    <i class="simple-icon-energy"></i> <span class="d-inline-block">About Content One</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/home_our_service' ? 'active' : '' }}">
                                <a href="{{ url('home_our_service') }}">
                                    <i class="simple-icon-tag"></i> <span class="d-inline-block">Our Services</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/home_content_second' ? 'active' : '' }}">
                                <a href="{{ url('home_content_second') }}">
                                    <i class="simple-icon-tag"></i> <span class="d-inline-block">About Content Two</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/home_content_third' ? 'active' : '' }}">
                                <a href="{{ url('home_content_third') }}">
                                    <i class="simple-icon-bulb"></i> <span class="d-inline-block">About Content Thirth</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="Pages.Auth.ForgotPassword.html">
                                    <i class="simple-icon-paper-clip"></i> <span class="d-inline-block">Our Work</span>
                                </a>
                            </li> --}}
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/loyal_customers' ? 'active' : '' }}">
                                <a href="{{ url('loyal_customers') }}">
                                    <i class="simple-icon-symbol-male"></i> <span class="d-inline-block">Loyal Customers</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/home_content_fourth' ? 'active' : '' }}">
                                <a href="{{ url('home_content_fourth') }}">
                                    <i class="simple-icon-map"></i> <span class="d-inline-block">About Content Fourth</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/home_testimonials' ? 'active' : '' }}">
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
            <ul class="list-unstyled" data-link="services" id="services">
                <li>
                    <a href="#"><i class="simple-icon-arrow-down"></i> <span class="d-inline-block">All Sections</span> </a>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/category' ? 'active' : '' }}">
                                <a href="{{ url('category') }}">
                                    <i class="simple-icon-doc"></i> <span class="d-inline-block">Categories</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/sub_categories' ? 'active' : '' }}">
                                <a href="{{ url('sub_categories') }}">
                                    <i class="simple-icon-docs"></i> <span class="d-inline-block">Sub Categories</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/sub_categories_item' ? 'active' : '' }}">
                                <a href="{{ url('sub_categories_item') }}">
                                    <i class="simple-icon-book-open"></i> <span class="d-inline-block">Service Work</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/service_details' ? 'active' : '' }}">
                                <a href="{{ url('service_details') }}">
                                    <i class="simple-icon-link"></i> <span class="d-inline-block">Service Details</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="list-unstyled" data-link="about_us" id="about_us">
                <li>
                    <a href="#"><i class="simple-icon-arrow-down"></i> <span class="d-inline-block">All Sections</span> </a>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/all_about_us_banner' ? 'active' : '' }}" >
                                <a href="{{ url('all_about_us_banner') }}">
                                    <i class="simple-icon-chemistry"></i> <span class="d-inline-block">Banner Section</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/who_we_are' ? 'active' : '' }}" >
                                <a href="{{ url('who_we_are') }}">
                                    <i class="simple-icon-hourglass"></i> <span class="d-inline-block">Who We Are</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/mission_vision' ? 'active' : '' }}" >
                                <a href="{{ url('mission_vision') }}">
                                    <i class="simple-icon-bell"></i> <span class="d-inline-block">Mission Vision</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/our_Philosophy' ? 'active' : '' }}" >
                                <a href="{{ url('our_Philosophy') }}">
                                    <i class="simple-icon-puzzle"></i> <span class="d-inline-block">Our Philosophy</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/asked_question' ? 'active' : '' }}">
                                <a href="{{ url('asked_question') }}">
                                    <i class="simple-icon-question"></i> <span class="d-inline-block">Asked Question’s</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/edit_last_about_banner' ? 'active' : '' }}">
                                <a href="{{ url('edit_last_about_banner') }}">
                                    <i class="simple-icon-ban"></i> <span class="d-inline-block">Edit Last Banner</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>