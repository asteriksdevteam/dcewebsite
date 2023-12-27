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

    <img src='{{asset('user_assets/images/main-dce-logo.png')}}' width="134px" height="64px"  alt="logo"/>

    <div class="navbar-right">
        <div class="header-icons d-inline-block align-middle">

        </div>

        <div class="user d-inline-block">
            <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <span class="name">{{ Auth::user()->name }}</span>
                <span>
                    <img alt="Profile Picture" src="{{asset('admin_assets/img/profiles/l-1.jpg')}}" />
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

                @if(auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Home Manager'))
                    <li class="{{$_SERVER['REQUEST_URI'] === '/home_testimonials' || $_SERVER['REQUEST_URI'] === '/home_content_fourth' || $_SERVER['REQUEST_URI'] === '/loyal_customers' || $_SERVER['REQUEST_URI'] === '/home_content_third' || $_SERVER['REQUEST_URI'] === '/home_content_second' || $_SERVER['REQUEST_URI'] === '/home_our_service' || $_SERVER['REQUEST_URI'] === '/home_banner' || $_SERVER['REQUEST_URI'] === '/home_technologies' || $_SERVER['REQUEST_URI'] === '/home_content' ? 'active' : '' }}" >
                        <a href="#home">
                            <i class="simple-icon-screen-desktop"></i>
                            <span>Home</span>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Services-Manager'))
                    <li class="{{ $_SERVER['REQUEST_URI'] === '/category' || $_SERVER['REQUEST_URI'] === '/add_service_detail' || $_SERVER['REQUEST_URI'] === '/sub_categories' || $_SERVER['REQUEST_URI'] === '/sub_categories_item' || $_SERVER['REQUEST_URI'] === '/service_details' ? 'active' : '' }}">
                        <a href="#services">
                            <i class="simple-icon-globe"></i>
                            <span>Services</span>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('About-us-Manager'))
                    <li class="{{ $_SERVER['REQUEST_URI'] === '/edit_last_about_banner' || $_SERVER['REQUEST_URI'] === '/counters' || $_SERVER['REQUEST_URI'] === '/asked_question' || $_SERVER['REQUEST_URI'] === '/all_about_us_banner' || $_SERVER['REQUEST_URI'] === '/who_we_are' || $_SERVER['REQUEST_URI'] === '/mission_vision' || $_SERVER['REQUEST_URI'] === '/our_Philosophy' ? 'active' : '' }}">
                        <a href="#about_us">
                            <i class="simple-icon-organization"></i>
                            <span>About Us </span>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Blogs Manager'))
                    <li class="{{ $_SERVER['REQUEST_URI'] === '/blogs' || $_SERVER['REQUEST_URI'] === '/blogs_feed' || $_SERVER['REQUEST_URI'] === '/create_blog' || $_SERVER['REQUEST_URI'] === '/edit_blog/{id}' ? 'active' : '' }}">
                        <a href="#blogs">
                            <i class="simple-icon-social-github"></i>
                            <span>Blogs</span>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Contact us Manager'))
                    <li class="{{ $_SERVER['REQUEST_URI'] === '/edit_contact_us' ? 'active' : '' }}">
                        <a href="{{ url('edit_contact_us') }}">
                            <i class="iconsminds-double-circle"></i>
                            <span>Contact Us</span>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Meta Tags Manager'))
                    <li class="{{ $_SERVER['REQUEST_URI'] === '/add_meta_tags' ? 'active' : '' }}">
                        <a href="{{ url('add_meta_tags') }}">
                            <i class="simple-icon-tag"></i>
                            <span>Meta Tags</span>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Packages Manager'))
                    <li class="{{$_SERVER['REQUEST_URI'] === '/packages_currency'  || $_SERVER['REQUEST_URI'] === '/packages' || $_SERVER['REQUEST_URI'] === '/create_packeage' || $_SERVER['REQUEST_URI'] === '/yearly_discount' ? 'active' : '' }}">
                        <a href="#packages">
                            <i class="iconsminds-money-bag"></i>
                            <span>Packages</span>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Discounted Offer Manager'))
                    <li class="{{ $_SERVER['REQUEST_URI'] === '/discounted_offer' ? 'active' : '' }}">
                        <a href="{{ url('discounted_offer') }}">
                            <i class="iconsminds-mail-money"></i>
                            <span>Discounted Offer  </span>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Other Pages Manager'))
                    <li class="{{ $_SERVER['REQUEST_URI'] === '/leads' || $_SERVER['REQUEST_URI'] === '/package_user' || $_SERVER['REQUEST_URI'] === '/termConditions' || $_SERVER['REQUEST_URI'] === '/contact_us_user' || $_SERVER['REQUEST_URI'] === '/privacyPolicay' || $_SERVER['REQUEST_URI'] === '/footerContent' ? 'active' : '' }}">
                        <a href="#otherPages">
                            <i class="simple-icon-settings"></i>
                            <span>Other Pages</span>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Roles Managers'))
                    <li class="{{ $_SERVER['REQUEST_URI'] === '/roles_managers' ? 'active' : '' }}">
                        <a href="{{ url('roles_managers') }}">
                            <i class="iconsminds-management"></i>
                            <span>Roles / Managers</span>
                        </a>
                    </li>
                @endif
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
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/service_details'|| $_SERVER['REQUEST_URI'] === '/add_service_detail' ? 'active' : '' }}">
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
                                    <i class="simple-icon-puzzle"></i> <span class="d-inline-block">Core Values</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/counters' ? 'active' : '' }}" >
                                <a href="{{ url('counters') }}">
                                    <i class="simple-icon-target"></i> <span class="d-inline-block">Counters</span>
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
            <ul class="list-unstyled" data-link="packages" id="packages">
                <li>
                    <a href="#"><i class="simple-icon-arrow-down"></i> <span class="d-inline-block">All Sections</span> </a>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/packages' || $_SERVER['REQUEST_URI'] === '/create_packeage' ? 'active' : '' }}" >
                                <a href="{{ url('packages') }}">
                                    <i class="simple-icon-chemistry"></i> <span class="d-inline-block">All Packages</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/yearly_discount' ? 'active' : '' }}" >
                                <a href="{{ url('yearly_discount') }}">
                                    <i class="simple-icon-hourglass"></i> <span class="d-inline-block">Discount yearly prices</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/packages_currency' ? 'active' : '' }}" >
                                <a href="{{ url('packages_currency') }}">
                                    <i class="simple-icon-globe"></i> <span class="d-inline-block">Currency</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="list-unstyled" data-link="otherPages" id="otherPages">
                <li>
                    <a href="#"><i class="simple-icon-arrow-down"></i> <span class="d-inline-block">All Sections</span> </a>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/termConditions' ? 'active' : '' }}" >
                                <a href="{{ url('termConditions') }}">
                                    <i class="simple-icon-star"></i> <span class="d-inline-block">Terms & Conditions</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/privacyPolicay' ? 'active' : '' }}" >
                                <a href="{{ url('privacyPolicay') }}">
                                    <i class="simple-icon-target"></i> <span class="d-inline-block">Privacy & Policy</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/footerContent' ? 'active' : '' }}" >
                                <a href="{{ url('footerContent') }}">
                                    <i class="simple-icon-compass"></i> <span class="d-inline-block">Footer Content</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/contact_us_user' ? 'active' : '' }}" >
                                <a href="{{ url('contact_us_user') }}">
                                    <i class="simple-icon-screen-desktop"></i> <span class="d-inline-block">User Leads</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/package_user' ? 'active' : '' }}" >
                                <a href="{{ url('package_user') }}">
                                    <i class="simple-icon-shuffle"></i> <span class="d-inline-block">Packages Leads</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/leads' ? 'active' : '' }}" >
                                <a href="{{ url('leads') }}">
                                    <i class="simple-icon-hourglass"></i> <span class="d-inline-block">Social Leads</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="list-unstyled" data-link="blogs" id="blogs">
                <li>
                    <a href="#"><i class="simple-icon-arrow-down"></i> <span class="d-inline-block">All Sections</span> </a>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/blogs' ? 'active' : '' }}" >
                                <a href="{{ url('blogs') }}">
                                    <i class="simple-icon-star"></i> <span class="d-inline-block">All Blogs</span>
                                </a>
                            </li>
                            <li class="{{ $_SERVER['REQUEST_URI'] === '/blogs_feed' ? 'active' : '' }}" >
                                <a href="{{ url('blogs_feed') }}">
                                    <i class="simple-icon-shuffle"></i> <span class="d-inline-block">Blog Feed</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>