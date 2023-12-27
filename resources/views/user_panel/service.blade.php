@extends('user_panel.layout.app')
@section('content')

<section class='servicebanner'>
    <div class='container centercontainer'>
        <div class="row">
            <div class="col-lg-6 my-auto">
                <div class='bannercontnet'>
                    <h1><span class='highlight'>{{ $ServiceDetail->banner_heading }}</span></h1>
                    <p>{{ $ServiceDetail->banner_content }}</p>
                    <div class="bannerdetails">
                        <ul>
                            <li><a href='javascript:void();' class='dicuss1' data-bs-toggle="modal" data-bs-target="#discussModal">Let’s Discuss </a> </li>
                            <li><a href='tel:+17372557407' class='dicuss2'>+17372557407 </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="servicebannerimg">
                    <img src="{{ asset($ServiceDetail->first_banner_image)}}" class="img-fluid" alt="dce-image">
                </div>
            </div>
        </div>
    </div>
</section>

<section class='technologies2' data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
        <div class="row">
            <div class="owl-carousel technologies-carousel">
                <div class="item">
                    <img src="{{ asset($HomeTechnologies->image_1) }}" class="t2 img-fluid" alt="dce-image">
                </div>
                <div class="item">
                    <img src="{{ asset($HomeTechnologies->image_2) }}" class="t2 img-fluid" alt="dce-image">
                </div>
                <div class="item">
                    <img src="{{ asset($HomeTechnologies->image_3) }}" class="t2 img-fluid" alt="dce-image">
                </div>
                <div class="item">
                    <img src="{{ asset($HomeTechnologies->image_4) }}" class="t2 img-fluid" alt="dce-image">
                </div>
                <div class="item">
                    <img src="{{ asset($HomeTechnologies->image_5) }}" class="t2 img-fluid" alt="dce-image">
                </div>
                <div class="item">
                    <img src="{{ asset($HomeTechnologies->image_6) }}" class="t2 img-fluid" alt="dce-image">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ideadicuss-section" style=" background: url('{{ asset('user_assets/images/ideadicuss.png') }}') no-repeat center; ">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-9">
                {!! $ServiceDetail->second_banner !!}
                <a href="javascript:void();" class="bluebtn" data-bs-toggle="modal" data-bs-target="#discussModal">Why Not Discuss Your Idea</a>
            </div>
        </div>
    </div>
</section>

<section class="ourwork-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="ourwork-content">
                <h2 class="title">
                    Our <span class="highlight">Work</span>
                </h2>
                <p>
                    Experience a world of design possibilities - with over 100 categories, we have got everything you need
                    to create the perfect web design and beyond. No matter your business need or budget, we are here to
                    help bring your vision to life.
                </p>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 my-auto">
                <div class="custom-tabs nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active custom-title all_work" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane" type="button" role="tab" aria-controls="all-tab-pane" aria-selected="true">all</button>
                    </li>
                    @foreach($SubCategoryItem as $item)
                        <li class="nav-item service_name_li" role="presentation">
                            <input type="hidden" class="service_name" value="{{$item->id}}" name="service_name" id="service_name">
                            <button class="nav-link custom-title" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane" type="button" role="tab" aria-controls="all-tab-pane" aria-selected="true">{{ $item->item_name }}</button>
                        </li>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
                    <div class="row workimages">
                        @foreach($SubCategoryItemImages as $item)
                            <div class="col-lg-3 col-md-6">
                                <div class="window1">
                                    <div class="bigimage" style="background: url({{asset( $item->images )}}) no-repeat;"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('user_panel.cta')

<section class='our-process'>
    <div class="container">
        <div class="row">
            <h2 class='title'>Our <span class='highlight'>Process</span></h2>
            <p class='para'>{{ $ServiceDetail->process_content }}</p>
        </div>
        <div class='row mt-4'>
            @foreach ($ServiceDetailProcess as $key => $item)
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class='whyus-conten1 process-conten1'>
                        <h1 class='mb-3 processlabel'>0{{ ++$key }}</h1>
                        <div class='d-flex'>
                            <div class='whyus-leftcontent'>
                                <div class='whyus-leftimg'><img src="{{ asset($item->image) }}" alt="dce-image"></div>
                            </div>
                            <div class='whyus-rightcontent'>
                                <h6 class='smalltitle'>{{ $item->heading }}</h6>
                                <p>{{ $item->content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center text-center mt-5">
            <div class="our-process-btn">
                <a href="#" class="bluebtn" data-bs-toggle="modal" data-bs-target="#discussModal">Request a Free Quote</a>
                <a href="#" class="bluebtn bluebtn1" data-bs-toggle="modal" data-bs-target="#discussModal">Share Your Idea</a>
            </div>
        </div>
        
    </div>
</section>

<section class="testimonial2-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="testimonial2-box">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-8">
                            <h3 class="testi-heading">{{ $ServiceTestimonial->testimonial_heading_1 }}</h3>
                            <p class="testimonial2-content">{{ $ServiceTestimonial->testimonial_content_1 }}</p>
                            <h5 class="testimonial2-label">{{ $ServiceTestimonial->testimonial_name_1 }}</h5>
                            <p class="testimonial2-labeltxt">{{ $ServiceTestimonial->testimonial_designation_1 }}</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-4">
                            <div class="testimonial2-img">
                                <img src="{{ asset($ServiceTestimonial->testimonial_image_1) }}" class="img-fluid blogimg" alt="dce-image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="testimonial2-box">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-8">
                            <h3 class="testi-heading">{{ $ServiceTestimonial->testimonial_heading_2 }}</h3>
                            <p class="testimonial2-content">{{ $ServiceTestimonial->testimonial_content_2 }}</p>
                            <h5 class="testimonial2-label">{{ $ServiceTestimonial->testimonial_name_2 }}</h5>
                            <p class="testimonial2-labeltxt">{{ $ServiceTestimonial->testimonial_designation_2 }}</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-4">
                            <div class="testimonial2-img">
                                <img src="{{ asset($ServiceTestimonial->testimonial_image_2) }}" class="img-fluid blogimg" alt="dce-image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4 mobile6">
                <div class="testimonial2-box">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-8">
                            <h3 class="testi-heading">{{ $ServiceTestimonial->testimonial_heading_3 }}</h3>
                            <p class="testimonial2-content">{{ $ServiceTestimonial->testimonial_content_3 }}</p>
                            <h5 class="testimonial2-label">{{ $ServiceTestimonial->testimonial_name_3 }}</h5>
                            <p class="testimonial2-labeltxt">{{ $ServiceTestimonial->testimonial_designation_3 }}</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-4">
                            <div class="testimonial2-img">
                                <img src="{{ asset($ServiceTestimonial->testimonial_image_3) }}" class="img-fluid blogimg" alt="dce-image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4 mobile6">
                <div class="testimonial2-box">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-8">
                            <h3 class="testi-heading">{{ $ServiceTestimonial->testimonial_heading_4 }}</h3>
                            <p class="testimonial2-content">{{ $ServiceTestimonial->testimonial_content_4 }}</p>
                            <h5 class="testimonial2-label">{{ $ServiceTestimonial->testimonial_name_4 }}</h5>
                            <p class="testimonial2-labeltxt">{{ $ServiceTestimonial->testimonial_designation_4 }}</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-4">
                            <div class="testimonial2-img">
                                <img src="{{ asset($ServiceTestimonial->testimonial_image_4) }}" class="img-fluid blogimg" alt="dce-image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class='bluebanner-section mp'> 
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-xs-12 my-auto">
                {{-- {{ dd($HomeTechnologies->info_banner_heading) }} --}}
                <div class='bluebanner-content'>
                    <h2 class='title text-white'>{{ $ServiceDetail->info_banner_heading }}</h2>
                    <p class='para text-white mt-4 mb-5 pb-1'>{{ $ServiceDetail->info_banner_content }}</p>
                    <div class='dlink'>
                        <a href='{{ $ServiceDetail->info_banner_button_link }}' class='whitebtn'>Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-xs-12">
                <div class='bluebanner-img'>
                    <img src='{{ asset($ServiceDetail->info_banner_image)}}' alt="dce_img" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class='aboutsection'>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class='aboutcontent'>
                    <div class='about-content1'>
                        {!! $ServiceDetail->about_content !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12 my-auto">
                <img  src='{{ asset($ServiceDetail->banner_image_service_detail)}}' class='img-fluid blogimg' alt="dce_img" />
            </div>
        </div>
    </div>
</section>


<section class='pricing-section'>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="ourpricing-leftcontent">
                        <h2 class="title">Our <span class="highlight">Packages</span></h2>
                        <p class="para">Choose the package that suits you</p></div>
                    </div>
                    <div class="justify-content-center col-lg-12 col-md-12 col-12">
                        <div class="pricing-rightcontent">
                            <div class="d-flex">
                                @if(count($Packages) !== 0)
                                    @if($Packages[0]->PackagesPrices != null)
                                        <div><h3 class="smalltitle">Monthly</h3></div>
                                        <div>
                                            <label class="toggle-switch">
                                                <input id="priceToggle" type="checkbox" class="yearlyCheckBox" value="on"/>
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                        <div>
                                            <h3 class="smalltitle">Yearly <span class="pricingtags">{{ $YearlyDiscount->yearly_discount }}% discount</span></h3>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row mt-3'>
                    @if(count($Packages) !== 0)
                        @if($Packages[0]->package_type != "others")
                            <ul class="pricing-tabs nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <input type="hidden" class="SubCategoryId" value="{{ $SubCategoryId }}" name="SubCategoryId" id="SubCategoryId">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link getTabValue active basic" id="basic" data-tab="basic" data-basic="basic" id="pills-basic-tab" data-bs-toggle="pill" data-bs-target="#pills-basic" type="button" role="tab" aria-controls="pills-basic" aria-selected="true">basic</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link getTabValue intermediate" data-tab="intermediate" data-intermediate="intermediate" id="pills-advance-tab" data-bs-toggle="pill" data-bs-target="#pills-advance" type="button" role="tab" aria-controls="pills-advance" aria-selected="false">intermediate</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link getTabValue advance" data-tab="advance" data-advance="advance" id="pills-intermediate-tab" data-bs-toggle="pill" data-bs-target="#pills-intermediate" type="button" role="tab" aria-controls="pills-intermediate" aria-selected="false">advance</button>
                                </li>
                            </ul>
                        @else
                            <ul class="pricing-tabs nav nav-pills mb-3" id="pills-tab" role="tablist" style="display: none">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link getTabValue active others" data-tab="others" data-others="others" id="pills-intermediate-tab" data-bs-toggle="pill" data-bs-target="#pills-intermediate" type="button" role="tab" aria-controls="pills-intermediate" aria-selected="false">Others</button>
                                </li>
                            </ul>
                        @endif
                    @endif
                <div class="tab-content">
                    <div role="tabpanel" id="react-aria5774606214-:r1:-tabpane-webdesign" aria-labelledby="react-aria5774606214-:r1:-tab-webdesign" class="fade tab-pane active show">
                        @if(count($Packages) !== 0)
                            <div class="row appendpackage">
                            @foreach($Packages as $key => $item)
                                <input type="hidden" value="{{ $item->subcategory }}" id="hiddenfieldofsubcategory" class="hiddenfieldofsubcategory">
                                <input type="hidden" value="{{ $item->id }}" id="hiddenfieldofid" class="hiddenfieldofid">
                                <div class="col-lg-4 col-md-6">
                                    <div class="{{ $key == 1 ? 'seconddiv' : '' }} card prcing-card">
                                        <div class="pricingbox">
                                            <div class="pricingheader">
                                                <h3 class="subtitle pheading">{{ $item->name }}</h3>
                                                @if($item->PackagesPrices == null)
                                                    <div class="d-flex align-items-center"><div><sup><h3 class="subtitle prc">Custom Price</h3></sup></div></div>
                                                @else
                                                    <div class="d-flex align-items-center"><div><sub><del>{{ $item->PackagesPrices->Currency->symbol }}{{ $item->PackagesPrices->country_cut_price }}</del></sub></div><div><sup><h3 class="subtitle prc">{{ $item->PackagesPrices->Currency->symbol }}{{ $item->PackagesPrices->country_actual_price }}</h3></sup></div></div>
                                                @endif
                                                <p class="{{ $key == 1 ? 'text-white' : '' }}">{{ $item->discription }}</p>
                                            </div>
                                            <div class="pricing-wrapper">
                                                <div class="pricingbody">
                                                    {!! $item->Package_list !!}
                                                </div>
                                                <div class="dlink"><a class="orderbtn get_start_button" href="javascript:void();" data-package_id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#modalforpackages">get started</a></div>
                                                <div class="pricingbody-footer">
                                                    <div class="row m-0">
                                                        <div class="col-lg-6 col-6">
                                                            <p>Share your idea?</p>
                                                            <a href="tel:+17372557407">+17372557407</a>
                                                        </div>
                                                        <div class="col-lg-6 col-6">
                                                            <div class="pricingbody-rightdiv float-end text-end">
                                                                <p>Want to Discuss?</p>
                                                                <a href="#">Live Chat Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @else
                            <h1 class="d-flex justify-content-center">No Packages are uploaded</h1>
                        @endif
                    </div>
                    <div role="tabpanel" id="react-aria5774606214-:r1:-tabpane-eCommerce" aria-labelledby="react-aria5774606214-:r1:-tab-eCommerce" class="fade tab-pane"><div class="row"></div></div>
                    <div role="tabpanel" id="react-aria5774606214-:r1:-tabpane-Branding" aria-labelledby="react-aria5774606214-:r1:-tab-Branding" class="fade tab-pane"><div class="row"></div></div>
                    <div role="tabpanel" id="react-aria5774606214-:r1:-tabpane-Logo Design" aria-labelledby="react-aria5774606214-:r1:-tab-Logo Design" class="fade tab-pane"><div class="row"></div></div>
                </div>
                
            </div>
            </div>
    </section>


@include('user_panel.feedback')

<div class="modal fade promo-mdalheader" id="modalforpackages" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                    <input type="hidden" class="set_package_id" name="package_id">
                                    <input type="hidden" class="set_header_currency" name="set_header_currency">
                                    <input type="hidden" class="set_yearly_or_monthly" name="set_yearly_or_monthly">
                                    <input type="text" placeholder='Name*' name="package_name" id="package_name" class='form-control package_name' required/>
                                    <small class="text-danger error-message name-error" id="name-error"></small>
                                </div>
                                <div class="col-lg-6" >
                                    <input type="email" placeholder='Email*' name="package_email" id="package_email" class='form-control package_email' required/>
                                    <small class="text-danger error-message email-error" id="email-error"></small>
                                </div>
                            </div>
                            <div class='row mt-3 gx-3'>
                                <div class="col-lg-6" >
                                    <input type="number" placeholder='Phone*' max="11" name="package_phone" id="package_phone" class='form-control package_phone' required/>
                                    <small class="text-danger error-message phone-error" id="phone-error"></small>
                                </div>
                                <div class="col-lg-6">
                                    <select name="package_categories" id="package_categories" class='form-control package_categories'>
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
                                    <textarea class='form-control package_text' name="package_text" rows='10' id="package_text" placeholder='Summary*' required></textarea> 
                                    <small class="text-danger error-message text-error" id="text-error"></small>
                                </div>
                            </div>
                            <button type='button' class='submit perchasePackage'>submit <i class="fa fa-arrow-right angleicon"></i></button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection