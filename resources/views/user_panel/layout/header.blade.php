            <div class="row">
                <div class="news-banner">
                    <div class="news-tag">
                        <h6>Latest News</h6>
                    </div>
                    <div class="news-content">
                        <p><marquee behavior="scroll" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="8">Elevate Your Digital Presence for a Joyful Christmas and a Prosperous New Year! | Unlock Festive Savings and Dive into Digital Magic with Our Mobile App Development | Boost Your Brand's Holiday Spirit and Start the New Year Strong with Our Digital Marketing Services! | Wrap Up Savings and Transform Your Digital Dreams! Enjoy Exclusive Discounts on Development Services this Christmas and New Year!</marquee></p>
                    </div>            
            </div>
            </div>
      
<header class="desktopmenu">
    <div class="container">
        <nav>
            <a href='{{ url('/') }}' class='whitelogo'><img class="logow" src='{{asset('user_assets/images/main-dce-logo.png')}}' alt="dce-image" /></a>
            <a href='{{ url('/') }}' class='logo'><img class="logow" src='{{asset('user_assets/images/main-dce-logo.png')}}' alt="dce-image" /></a>
            <div class="toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </div>
            <div class="collapse-menu">
                <ul>
                    <li><a href='{{ url('/') }}' class="{{ $_SERVER['REQUEST_URI'] === '/' ? 'active' : ''  }}">Home</a></li>
                    <li><a href='{{ url('about-us') }}' class="{{ $_SERVER['REQUEST_URI'] === '/about-us' ? 'active' : ''  }}">About</a></li>
                    <li class="custom-dropdown">
                        <a href="javascript:void();" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#servicesAccordion" aria-expanded="false">our services <i class="fa fa-angle-down"></i></a>
                        <div class="meg-menu collapse" id="servicesAccordion">
                            <div class="container">
                                <div class="row" id="services">
                                    <div class="col-md-3 position-relative">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><a href='{{ url('blog-and-news') }}' class="{{ $_SERVER['REQUEST_URI'] === '/blog-and-news' ? 'active' : ''  }}">Blogs</a></li>
                    <li><a href='{{ url('contact') }}' class="{{ $_SERVER['REQUEST_URI'] === '/contact' ? 'active' : ''  }}">Contact</a></li>
                    <li class="c-country">
                        <select class="js-example-disabled-results HeaderCurrency">
                            
                        </select> 
                    </li>
                    <li><a href="#" class="estimate" data-bs-toggle="modal" data-bs-target="#discussModal">Estimate Project</a></li>
                </ul>
            </div>
            <div class="offcanvas offcanvas-end mobilebar" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <a href='{{ url('/') }}' class='logo2'>
                        <img src='{{asset('user_assets/images/main-dce-logo.png')}}' />
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('about-us') }}">about</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link accordion-button" href="" data-bs-toggle="collapse" data-bs-target="#servicesAccordion" aria-expanded="false">
                                Our Services <i class="fa fa-angle-down"></i>
                            </a>
                            <div id="servicesAccordion" class="mobilemeg-menu collapse">
                                <div class="container">
                                    <div class="row mobile_services">
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('blog-and-news') }}">blog & news</a>
                        </li>
                        <li class="c-country" data-aos="fade-left" data-aos-duration="600">
                            <select class="js-example-disabled-results HeaderCurrency">
                               
                            </select>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('contact') }}">contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link estimate" href="javascript:void();" data-bs-toggle="modal" data-bs-target="#discussModal">estimate project</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
    


<!-- Modal -->
<!--<div class="modal fade" id="discussModal" tabindex="-1" aria-labelledby="discussModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header dheader">-->
<!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <div class="form mform">-->
<!--                    <h4 class="subtitle2">get in touch.</h4>-->
<!--                    <form id="contactus">-->
<!--                        @csrf-->
<!--                        <div class='row gx-3'>-->
<!--                            <div class="col-lg-6" >-->
<!--                                <input type="text" placeholder='name*' name="contact_name" id="contact_name" class='form-control contact_name' required/>-->
<!--                                <small class="text-danger error-message name-error" id="name-error"></small>-->
<!--                            </div>-->
<!--                            <div class="col-lg-6" >-->
<!--                                <input type="email" placeholder='email*' name="contact_email" id="contact_email" class='form-control contact_email' required/>-->
<!--                                <small class="text-danger error-message email-error" id="email-error"></small>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class='row mt-3 gx-3'>-->
<!--                            <div class="col-lg-6" >-->
<!--                                <input type="number" placeholder='phone*' max="11" name="contact_phone" id="contact_phone" class='form-control contact_phone' required/>-->
<!--                                <small class="text-danger error-message phone-error" id="phone-error"></small>-->
<!--                            </div>-->
<!--                            <div class="col-lg-6">-->
<!--                                <select name="categories" id="categories" class='form-control categories'>-->
<!--                                    <option disabled selected>Select</option>-->
<!--                                    @foreach($Category as $item)-->
<!--                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>-->
<!--                                    @endforeach-->
<!--                                </select>-->
<!--                                <small class="text-danger error-message categories-error" id="categories-error"></small>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class='row mt-3 gx-3'>-->
<!--                            <div class="col-lg-12">-->
<!--                                <textarea class='form-control contact_text' name="contact_text" rows='10' id="contact_text" placeholder='summery*' required></textarea> -->
<!--                                <small class="text-danger error-message text-error" id="text-error"></small>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <button type='button' class='submit contact_us'>submit</button>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

  <div class="modal fade promo-mdalheader" id="discussModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style=" background:url('{{asset('user_assets/images/modal-bg.png')}}') no-repeat center;">
        <div class="modal-header">
          <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
         <div class="close-icon" data-bs-dismiss="modal" aria-label="Close">
            <i class="fa-solid fa-circle-xmark"></i>
         </div>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6 my-auto">
                    
                    <h3 class="text-white">Connect Today, Conquer Digital Tomorrow.</h3>
                    <p class="text-white">Connect with digital experts to amplify your online presence. Elevate your brand, drive results, and make your vision come alive. Reach out now.</p>

                </div>
                <div class="col-md-6">
                    <div class="form mform">
                    <!--<h4 class="subtitle2">get in touch.</h4>-->
                    <form id="contactus">
                        @csrf
                        <div class='row gx-3'>
                            <div class="col-lg-6" >
                                <input type="text" placeholder='Name*' name="contact_name" id="contact_name" class='form-control contact_name' required/>
                                <small class="text-danger error-message name-error" id="name-error"></small>
                            </div>
                            <div class="col-lg-6" >
                                <input type="email" placeholder='Email*' name="contact_email" id="contact_email" class='form-control contact_email' required/>
                                <small class="text-danger error-message email-error" id="email-error"></small>
                            </div>
                        </div>
                        <div class='row mt-3 gx-3'>
                            <div class="col-lg-6" >
                                <input type="number" placeholder='Phone*' max="11" name="contact_phone" id="contact_phone" class='form-control contact_phone' required/>
                                <small class="text-danger error-message phone-error" id="phone-error"></small>
                            </div>
                            <div class="col-lg-6">
                                <select name="categories" id="categories" class='form-control categories'>
                                    <option disabled selected>Select</option>
                                    @foreach($Category as $item)
                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                    @endforeach
                                </select>
                                <small class="text-danger error-message categories-error" id="categories-error"></small>
                            </div>
                        </div>
                        <div class='row mt-3 gx-3'>
                            <div class="col-lg-12">
                                <textarea class='form-control contact_text' name="contact_text" rows='10' id="contact_text" placeholder='Summary*' required></textarea> 
                                <small class="text-danger error-message text-error" id="text-error"></small>
                            </div>
                        </div>
                        <button type='button' class='submit contact_us'>submit <i class="fa fa-arrow-right angleicon"></i></button>
                    </form>
                </div>
                </div>
            </div>
        </div>
        
      </div>
    </div>
  </div>
