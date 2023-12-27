@extends('user_panel.layout.app')
@section('content')

<section class='homebanner'>
    <div class='container centercontainer'>
        <div class="row">
            <div data-aos="fade-right" data-aos-duration="600" class="col-xl-7 col-lg-6 col-md-6 col-xs-12 my-auto">

                <div class='bannercontnet'>
                    <h1><span class='highlight'>{{ $HomeBanner->heading_banner }}</span></h1>
                    <p>{{ $HomeBanner->content_banner }}</p>

                    <div class="owl-carousel banner-icons">
                        @foreach($HomeBannerImages as $item)
                            <div class="item">
                                <img src="{{asset( $item->images )}}" alt="dce-image" />
                            </div>
                        @endforeach
                    </div>

                    <div class='bannerdetails'>
                        <ul>
                            <li><a href='javascript:void();' class='dicuss1' data-bs-toggle="modal" data-bs-target="#discussModal">Let’s Discuss </a> </li>
                            <li><a href='tel:+17372557407' class='dicuss2'>+17372557407</a> </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div data-aos="fade-left" data-aos-duration="600" class="col-xl-5 col-lg-6 col-md-6 col-xs-12">
                <div class='form form01'>
                    <h4 class='subtitle2'>get in touch.</h4>
                    <form id="" >
                        @csrf
                        <div class='row gx-3'>
                            <div class="col-lg-6" >
                                <input type="text" placeholder='name*' name="contact_name" id="contact_name" class='form-control first_contact_name' required/>
                                
                                <small class="text-danger error-message first-name-error" id="name-error"></small>
                            </div>
                            <div class="col-lg-6" >
                                <input type="email" placeholder='email*' name="contact_email" id="contact_email" class='form-control first_contact_email' required/>
                                
                                <small class="text-danger error-message first-email-error" id="email-error"></small>
                            </div>
                        </div>
                        <div class='row mt-3 gx-3'>
                            <div class="col-lg-6" >
                                <input type="number" data-inputmask="'mask': '0399-99999999'" maxlength="12"  placeholder="Phone*" name="contact_phone" id="contact_phone" class="form-control first_contact_phone" required />
                                
                                <small class="text-danger error-message first-phone-error" id="phone-error"></small>
                            </div>
                            <div class="col-lg-6">
                                <select name="categories" id="categories" class='form-control first_categories'>
                                    <option disabled selected>Select Service*</option>
                                    @foreach($Category as $item)
                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                    @endforeach
                                </select>
                                
                                <small class="text-danger error-message first-categories-error" id="categories-error"></small>
                            </div>
                        </div>
                        <div class='row mt-3 gx-3'>
                            <div class="col-lg-12">
                                <textarea class='form-control first_contact_text' name="contact_text" rows='10' id="contact_text" placeholder='summary*' required></textarea> 
                                
                                <small class="text-danger error-message first-text-error" id="text-error"></small>
                            </div>
                        </div>
                        <button type='button' class='submit first_contact_us'>submit <i class="fa fa-arrow-right angleicon"></i></button>
                    </form>
                        <div class="arrow1"><img data-aos="zoom-in" data-aos-duration="2000" src="{{ asset('user_assets/images/arrow1.png') }}" alt="dce-image"></div>
                        <div class="arrow2"><img data-aos="zoom-in" data-aos-duration="2000" src="{{ asset('user_assets/images/arrow2.png') }}" alt="dce-image"></div>
                        <div class="arrow3"><img data-aos="zoom-in" data-aos-duration="2000" src="{{ asset('user_assets/images/arrow3.png') }}" alt="dce-image"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class='technologies'>
    <div class="container">
        <div class="row">
            <div data-aos="fade-right" data-aos-duration="1000" class="col-lg-5 col-md-5 col-xs-12">
                <h2 class='title'>{{ $HomeTechnologies->heading_technologies }}</h2>
                <p class='para'>{{ $HomeTechnologies->content_technologies }}</p>
            </div>
            <div data-aos="zoom-in" data-aos-duration="1000" class="col-lg-7 col-md-7 col-xs-12 my-auto">
                <div class="row">

                    <div class="col-lg-4 col-6 col-xs-4">
                        <img src="{{ asset($HomeTechnologies->image_1) }}" class="t1 img-fluid" alt="dce-image">
                    </div>
                    <div class="col-lg-4 col-6 col-xs-4">
                        <img src="{{ asset($HomeTechnologies->image_2) }}" class="t1 img-fluid" alt="dce-image">
                    </div>
                    <div class="col-lg-4 col-6 col-xs-4">
                        <img src="{{ asset($HomeTechnologies->image_3) }}" class="t1 img-fluid" alt="dce-image">
                    </div>
                    <div class="col-lg-4 col-6 col-xs-4">
                        <img src="{{ asset($HomeTechnologies->image_4) }}" class="t1 img-fluid" alt="dce-image">
                    </div>
                    <div class="col-lg-4 col-6 col-xs-4">
                        <img src="{{ asset($HomeTechnologies->image_5) }}" class="t1 img-fluid" alt="dce-image">
                    </div>
                    <div class="col-lg-4 col-6 col-xs-4">
                        <img src="{{ asset($HomeTechnologies->image_6) }}" class="t1 img-fluid" alt="dce-image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class='aboutsection' style="background: #fafafa;">
    <div class="container">
        <div class="row">
            <div data-aos="fade-right" data-aos-duration="1000" class="col-lg-6 col-md-6 col-xs-12">
                <div class='aboutcontent'>
                    <div class='about-content1'>
                        {!! $HomeContentOne->content !!}
                    </div>
                </div>
            </div>
            <div data-aos="zoom-out" data-aos-duration="1000" class="col-lg-6 col-md-6 col-xs-12 my-auto">
                <img  src='{{asset($HomeContentOne->image)}}' class='img-fluid imground' alt='' />
            </div>
        </div>
    </div>
</section>

<section class="ourservices2-section">
    <div class="container">
        <div class="row">
            <div data-aos="zoom-out" data-aos-duration="1000"  class="col-lg-12">
                <!-- <div class="row mb-4">
                    <h3 class="title">Our<br><span class="highlight">Services</span></h3>
                </div> -->
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-xs-12 m20">

                        <h3 class="title mb-5">Our<br><span class="highlight">Services</span></h3>

                        <ul class="nav flex-column ourservices2-tabs" role="tablist">
                            @foreach($OurServicesHome as $key => $item)
                                <li class="nav-item OnClickToGetService">
                                    <input type="hidden" class="getname" name="getname" id="getname" value="{{ $item->id }}">
                                    <a class="nav-link {{ $key === 0 ? 'active' : '' }}" id="CustomWebsiteDevelopment-tab" data-bs-toggle="tab" data-bs-target="#CustomWebsiteDevelopment" role="tab" aria-controls="CustomWebsiteDevelopment" aria-selected="true">{{ $item->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-12 mpad m20">
                        @if(!$OurServicesHome->isEmpty())
                            <img src="{{ asset($OurServicesHomeFirst->image) }}" id="tabImg" class="service2img" width="290" height="518" alt="dce-image">
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-5 col-xs-12">
                        <div class="bluediv">
                            <div class="bluediv-inner">
                                @if(!$OurServicesHome->isEmpty())
                                    <p id="tabDescription" class="para text-white">{!! $OurServicesHomeFirst->description !!}</p>
                                @endif
                                
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="left">
                                    <div class="dlink">
                                        <a href="httpS://www.digicontentexperts.com/service/seo" class="discuss">Let’s Discuss</a>
                                    </div>
                                </div>
                                <div class="right">
                                    <i class="fa fa-arrow-right angleicon2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class='whyus-section'>
    <div class="container">
        <div class="row">
            <div data-aos="zoom-out" data-aos-duration="1000" class='col-lg-6 col-md-6 col-xs-12'>
                {!! $HomeContentSecond->content !!}
            </div>
            <div class='col-lg-6 col-md-6 col-xs-12' class='my-auto'>
                <div data-aos="fade-left" data-aos-duration="1000" class='whyus-conten1'>
                    <div class='d-flex align-items-center mobile-flex'>
                        <div class='whyus-leftcontent'>
                            <div class='whyus-leftimg'><img src="{{asset($HomeContentSecond->image_one)}}" class='service1-icon' alt="dce-image" /></div>
                        </div>
                        <div class='whyus-rightcontent'>
                            <h6 class='smalltitle'>{{ $HomeContentSecond->heading_one }}</h6>
                            <p>{{ $HomeContentSecond->content_one }}</p>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-left" data-aos-duration="1100" class='whyus-conten1'>
                    <div class='d-flex align-items-center mobile-flex'>
                        <div class='whyus-leftcontent'>
                            <div class='whyus-leftimg'><img src="{{asset($HomeContentSecond->image_second)}}" class='service1-icon' alt="dce-image" /></div>
                        </div>
                        <div class='whyus-rightcontent'>
                            <h6 class='smalltitle'>{{ $HomeContentSecond->heading_second }}</h6>
                            <p>{{ $HomeContentSecond->content_second }} </p>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-left" data-aos-duration="1200" class='whyus-conten1'>
                    <div class='d-flex align-items-center mobile-flex'>
                        <div class='whyus-leftcontent'>
                            <div class='whyus-leftimg'><img src="{{asset($HomeContentSecond->image_third)}}" class='service1-icon' alt="dce-image" /></div>
                        </div>
                        <div class='whyus-rightcontent'>
                            <h6 class='smalltitle'>{{ $HomeContentSecond->heading_third }}</h6>
                            <p>{{ $HomeContentSecond->content_third     }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('user_panel.cta')

<section class='ourservice1-section'>
    <div class="container">
        <div class="row">
            <div data-aos="fade-up" data-aos-duration="1000" class="col-lg-3 col-md-6 col-xs-12">
                <div class='service1-col'>
                    <div class='card'>
                        <img src="{{asset($HomeContentThird->image1)}}" class='service1-icon' alt="dce-image" />
                        <h3 class='subtitle'>{{ $HomeContentThird->heading1 }}</h3>
                        <p>{{ $HomeContentThird->content1 }}</p>
                    </div>
                </div>
            </div>
            <div data-aos="fade-down" data-aos-duration="1000" class="col-lg-3 col-md-6 col-xs-12">
                <div class='service1-col'>
                    <div class='card'>
                        <img src="{{asset($HomeContentThird->image2)}}" class='service1-icon' alt="dce-image" />
                        <h3 class='subtitle'>{{ $HomeContentThird->heading2 }}</h3>
                        <p>{{ $HomeContentThird->content2 }}</p>
                    </div>
                </div>
            </div>
            <div data-aos="fade-up" data-aos-duration="1000" class="col-lg-3 col-md-6 col-xs-12">
                <div class='service1-col'>
                    <div class='card'>
                        <img src="{{asset($HomeContentThird->image3)}}" class='service1-icon' alt="dce-image" />
                        <h3 class='subtitle'>{{ $HomeContentThird->heading3 }}</h3>
                        <p>{{ $HomeContentThird->content3 }}</p>
                    </div>
                </div>
            </div>
            <div data-aos="fade-down" data-aos-duration="1000" class="col-lg-3 col-md-6 col-xs-12">
                <div class='service1-col'>
                    <div class='card'>
                        <img src="{{asset($HomeContentThird->image4)}}" class='service1-icon' alt="dce-image" />
                        <h3 class='subtitle'>{{ $HomeContentThird->heading4 }}</h3>
                        <p>{{ $HomeContentThird->content4 }}</p>
                    </div>
                </div>
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
                    Digi Content Experts develops, designs, and launches stunning websites and powerful digital marketing campaigns for our clients. We do this because we have a great web design and digital marketing staff, a clear approach, and an unmatched passion for our job.
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
                            <div data-aos="zoom-in" data-aos-duration="1000" class="col-lg-3 col-md-6">
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

<section class='ourloyal-section'>
    <div data-aos="zoom-in-up" data-aos-duration="1000" class="container">
    <div class='row justify-content-center text-center'>
        <h2 class='title'>{{ $LoyalCustomers->heading }}</h2>
        <p class='para'>{{ $LoyalCustomers->content }}</p>
    </div>
        <div class='row mt-4'>

            <div class="owl-carousel ourloyalcarousel">
                @foreach($LoyalCustomersImages as $item)
                <div class='item'>
                    <img src="{{asset($item->images)}}" class='ly1' alt="dce-image" />
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class='ourservice2-section'>
    <div data-aos="zoom-in-up" data-aos-duration="1000" class="container">
        <div class='row justify-content-center text-center'>
            <div class="col-lg-9">
                <h2 class='title'>{{ $HomeContentFourth->heading }}</h2>
                <p class='para'>{{ $HomeContentFourth->content }}</p>
            </div>
        </div>
        <div class='row mt-4'>
            <div class="col-lg-3 col-md-6 col-xs-12 m20">
                <div class='service2-col'>
                    <div class='card'>
                        <div class='service2-colimg'><img src="{{asset($HomeContentFourth->image1)}}" class='service1-icon' alt="dce-image" /></div>
                        <p>{{ $HomeContentFourth->heading1 }}</p>
                    </div>
                </div>                    
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12" class='m20'>
                <div class='service2-col'>
                    <div class='card'>
                        <div class='service2-colimg'><img src="{{asset($HomeContentFourth->image2)}}" class='service1-icon' alt="dce-image" /></div>
                        <p>{{ $HomeContentFourth->heading2 }}</p>
                    </div>
                </div>                    
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12" class='m20'>
                <div class='service2-col'>
                        <div class='card'>
                            <div class='service2-colimg'><img src="{{asset($HomeContentFourth->image3)}}" class='service1-icon' alt="dce-image" /></div>
                            <p>{{ $HomeContentFourth->heading3 }}</p>
                        </div>
                    
                </div>                    
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class='service2-col'>
                    <div class='card'>
                        <div class='service2-colimg'><img src="{{asset($HomeContentFourth->image4)}}" class='service1-icon' alt="dce-image" /></div>
                        <p>{{ $HomeContentFourth->heading4 }}</p>
                    </div>
                </div>                    
            </div>
        </div>
        <div class='row mt-4'>
            <div class="col-lg-3 col-md-6 col-xs-12" class='m20'>
                <div class='service2-col'>
                    <div class='card'>
                        <div class='service2-colimg'><img src="{{asset($HomeContentFourth->image5)}}" class='service1-icon' alt="dce-image" /></div>
                        <p>{{ $HomeContentFourth->heading5 }}</p>
                    </div>
                </div>                    
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12" class='m20'>
                <div class='service2-col'>
                    <div class='card'>
                        <div class='service2-colimg'><img src="{{asset($HomeContentFourth->image6)}}" class='service1-icon' alt="dce-image" /></div>
                        <p>{{ $HomeContentFourth->heading6 }}</p>
                    </div>
                </div>                    
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12" class='m20'>
                <div class='service2-col'>
                    <div class='card'>
                        <div class='service2-colimg'><img src="{{asset($HomeContentFourth->image7)}}" class='service1-icon' alt="dce-image" /></div>
                        <p>{{ $HomeContentFourth->heading7 }}</p>
                    </div>
                </div>                    
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class='service2-col'>
                    <div class='card'>
                        <div class='service2-colimg'><img src="{{asset($HomeContentFourth->image8)}}" class='service1-icon' alt="dce-image" /></div>
                        <p>{{ $HomeContentFourth->heading8 }}</p>
                </div>
                </div>                    
            </div>
        </div>
    </div>
</section>

<section class='testimoinal-section'>
    <div  data-aos="zoom-in-up" data-aos-duration="1000" class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 class='title'>Our <br/><span class='highlight'>Testimonials</span></h2>
            </div>
        </div>
        <div class='row mt-5'>
            <div class='owl-carousel testim-carousel testimonialcarousel'>
                @foreach($Testimonails as $item)
                    <div class='item'>
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-xs-12">
                                <div class='testi-leftimage'>
                                    <img src="{{asset($item->image)}}" alt="dce-image" />
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-6 col-xs-12" class='my-auto'>
                                <div class='testimonial-content'>
                                    <h3>{{ $item->name }}</h3>
                                    <p class='textlabel'>{{ $item->designation }}</p>
                                    <img src="{{asset('user_assets/images/quote.png')}}" class='testi-quote' alt="dce-image" />
                                    <p>{{ $item->comment }}</p>                            
                                    <img src="{{asset('user_assets/images/quote.png')}}" class='testi-quote2' alt="dce-image" />
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class='pricing-section'>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="ourpricing-leftcontent">
                    <h2 class="title">We’ve got a <span class="highlight">Perfect Pricing <br/> plans</span> that’s for you</h2>
                </div>
                <div class="row justify-content-center col-lg-12 col-md-12 col-12 mb-3">
                    <div class="pricing-rightcontent">
                        <div class="d-flex">
                            <div><h3 class="smalltitle">Monthly</h3></div>
                            <div>
                                <label class="toggle-switch">
                                    <input id="priceToggle" type="checkbox" class="HomeYearlyCheckBox"/>
                                    <span class="slider"></span>
                                </label>
                            </div>
                            <div>
                                <h3 class="smalltitle">Yearly <span class="pricingtags">{{ $YearlyDiscount->yearly_discount }}% discount</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='row mt-3'>
                <ul class="pricing-tabs nav nav-pills mb-3" id="pills-tab" role="tablist">
                    @foreach($FourSubCategory as $key => $item)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $key == 0 ? 'active' : '' }} homepagepackages" style="font-size: 15px" data-id="{{  $item->id }}" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{ $item->sub_category_name }}</button>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" id="react-aria5774606214-:r1:-tabpane-webdesign" aria-labelledby="react-aria5774606214-:r1:-tab-webdesign" class="fade tab-pane active show">
                        <div class="row homeappendpackage">
                            @if(count($FourSubCategory[0]->Packages) != 0)
                                <input type="hidden" value="{{ $FourSubCategory[0]->Packages[0]->subcategory }}" id="hiddenfieldofsubcategory" class="hiddenfieldofsubcategory">
                                @foreach($FourSubCategory[0]->Packages as $key => $item)
                                    <input type="hidden" value="{{ $item->subcategory }}" id="hiddenfieldofid" class="hiddenfieldofid">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="{{ $key == 1 ? 'seconddiv' : '' }} card prcing-card">
                                            <div class="pricingbox">
                                                <div class="pricingheader">
                                                    <h3 class="subtitle pheading">{{ $item->name }}</h3>
                                                    <div class="d-flex align-items-center"><div><sub><del> {{ $item->PackagesPrices->Currency->symbol }}{{ $item->PackagesPrices->country_cut_price }}</del></sub></div><div><sup><h3 class="subtitle prc">{{ $item->PackagesPrices->Currency->symbol }}{{ $item->PackagesPrices->country_actual_price }}</h3></sup></div></div>
                                                    <p class="{{ $key == 1 ? 'text-white' : '' }}">{{ Illuminate\Support\Str::limit($item->discription, 100) }}</p>
                                                </div>
                                                <div class="pricing-wrapper">
                                                    <div class="pricingbody">
                                                        {!! $item->Package_list !!}
                                                    </div>
                                                    <div class="dlink"><a class="orderbtn" href="javascript:void();">get started</a></div>
                                                    <div class="pricingbody-footer">
                                                        <div class="row m-0">
                                                            <div class="col-lg-6 col-6">
                                                                <p>Share your idea?</p>
                                                                <a href="tel:+17372557407">+17372557407</a>
                                                            </div>
                                                            <div class="col-lg-6 col-6">
                                                                <div class="pricingbody-rightdiv float-end text-end">
                                                                    <p>Want to Discuss?</p>
                                                                    <a href="javascript:void();">Live Chat Now</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div role="tabpanel" id="react-aria5774606214-:r1:-tabpane-eCommerce" aria-labelledby="react-aria5774606214-:r1:-tab-eCommerce" class="fade tab-pane"><div class="row"></div></div>
                    <div role="tabpanel" id="react-aria5774606214-:r1:-tabpane-Branding" aria-labelledby="react-aria5774606214-:r1:-tab-Branding" class="fade tab-pane"><div class="row"></div></div>
                    <div role="tabpanel" id="react-aria5774606214-:r1:-tabpane-Logo Design" aria-labelledby="react-aria5774606214-:r1:-tab-Logo Design" class="fade tab-pane"><div class="row"></div></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class='calltoaction'>
    <div class="container">
        <div class='row callwrapper'>
            <div class="col-lg-7 col-md-7 col-xs-12 my-auto order2">
                <h2 class='title'>Websites That Deliver ROI – On Time and On Budget</h2>
                <div class='d-flex'>
                    <div class='d1'>
                        <span><a href='javascript:void();' data-bs-toggle="modal" data-bs-target="#discussModal">Let’s Discuss <i class="fa fa-arrow-right angleicon"></i> </a></span>
                        <div class='ardiv-icon'>
                             <i class="fa fa-ardiv-right"></i> 
                        </div>
                    </div>
                    <div class='d2'>
                        <span><a href='tel:+17372557407'>+17372557407 <i class="fa fa-arrow-right angleicon"></i></a></span>
                        <div class='ardiv-icon'>
                            <i class="fa fa-ardiv-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-xs-12 order1">
                <div class='call-actionimage'>
                    <img src="{{asset('user_assets/images/cta.png')}}" alt="dce-image" />
                </div>
            </div>
            <div class='arrow1'><img src="{{asset('user_assets/images/arrow1.png')}}" alt="dce-image" /></div>
            <div class='arrow2'><img src="{{asset('user_assets/images/arrow2.png')}}" alt="dce-image" /></div>
            <div class='arrow3'><img src="{{asset('user_assets/images/arrow3.png')}}" alt="dce-image" /></div>
        </div>
    </div>
</section>

@endsection