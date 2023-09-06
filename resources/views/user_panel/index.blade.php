@extends('user_panel.layout.app')
@section('content')

<section class='homebanner'>
    <div class='container centercontainer'>
        <div class="row">
            <div class="col-xl-7 col-lg-6 col-md-6 col-xs-12 my-auto">

                <div class='bannercontnet'>
                    <h1><span class='highlight'>{{ $HomeBanner->heading_banner }}</span></h1>
                    <p>{{ $HomeBanner->content_banner }}</p>

                    <div class="owl-carousel banner-icons">
                        @foreach($HomeBannerImages as $item)
                            <div class="item">
                                <img src="{{url( $item->images )}}" alt="" />
                            </div>
                        @endforeach
                    </div>

                    <div class='bannerdetails'>
                        <ul>
                            <li><a href='#' class='dicuss1'>Let’s Discuss </a> </li>
                            <li><a href='#' class='dicuss2'>(312) 971-3134 </a> </li>
                        </ul>
                    </div>

                </div>
                
            </div>
            <div class="col-xl-5 col-lg-6 col-md-6 col-xs-12">
                <div class='form'>
                    <h4 class='subtitle2'>get in touch.</h4>
                    <form>
                        @csrf
                        <div class='row gx-3'>
                            <div class="col-lg-6" >
                                <input type="text" placeholder='name*' name="contact_name" id="contact_name" class='form-control' required/>
                            </div>
                            <div class="col-lg-6" >
                                <input type="text" placeholder='email*' name="contact_email" id="contact_email" class='form-control' required/>
                            </div>
                        </div>
                        <div class='row mt-3 gx-3'>
                            <div class="col-lg-6" >
                                <input type="text" placeholder='phone*' name="contact_phone" id="contact_phone" class='form-control' required/>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder='subject*' name="contact_subject" id="contact_subject" class='form-control' required/>
                            </div>
                        </div>
                        <div class='row mt-3 gx-3'>
                            <div class="col-lg-12">
                                <textarea class='form-control' name="contact_text" rows='10' id="contact_text" placeholder='messages*' required></textarea> 
                            </div>
                        </div>
                        <button type='button' class='submit contact_us'>submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class='technologies'>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-xs-12">
                <h2 class='title'>{{ $HomeTechnologies->heading_technologies }}</h2>
                <p class='para'>{{ $HomeTechnologies->content_technologies }}</p>
            </div>
            <div class="col-lg-7 col-md-7 col-xs-12">
                <div class="row">

                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <img src="{{ url($HomeTechnologies->image_1) }}" class="t1" alt="">
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <img src="{{ url($HomeTechnologies->image_2) }}" class="t1" alt="">
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <img src="{{ url($HomeTechnologies->image_3) }}" class="t1" alt="">
                    </div>
                </div>
                <div class='row mt-5'>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <img src="{{ url($HomeTechnologies->image_3) }}" class="t1" alt="">
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <img src="{{ url($HomeTechnologies->image_4) }}" class="t1" alt="">
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <img src="{{ url($HomeTechnologies->image_5) }}" class="t1" alt="">
                    </div>
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
                        {!! $HomeContentOne->content !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12 my-auto">
                <img  src='{{url($HomeContentOne->image)}}' class='img-fluid' alt='' />
            </div>
        </div>
    </div>
</section>

<section class="ourservices2-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row mb-4">
                    <h3 class="title">Our<br><span class="highlight">Services</span></h3>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-xs-12 m20">
                        <ul class="nav flex-column ourservices2-tabs" role="tablist">
                           
                            @foreach($OurServicesHome as $item)
                                <li class="nav-item OnClickToGetService">
                                    <input type="hidden" class="getname" name="getname" id="getname" value="{{ $item->id }}">
                                    <a class="nav-link" id="CustomWebsiteDevelopment-tab" data-bs-toggle="tab" data-bs-target="#CustomWebsiteDevelopment" role="tab" aria-controls="CustomWebsiteDevelopment" aria-selected="true">{{ $item->name }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12 mpad m20">
                        <img src="{{ url($OurServicesHomeFirst->image) }}" id="tabImg" class="service2img" width="290" height="518" alt="">
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="bluediv" style="height:32em;">
                            {!! $OurServicesHomeFirst->description !!}
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
            <div class='col-lg-6 col-md-6 col-xs-12'>
                {!! $HomeContentSecond->content !!}
            </div>
            <div class='col-lg-6 col-md-6 col-xs-12' class='my-auto'>
                <div class='whyus-conten1'>
                    <div class='d-flex'>
                        <div class='whyus-leftcontent'>
                            <div class='whyus-leftimg'><img src="{{url($HomeContentSecond->image_one)}}" class='service1-icon' alt="" /></div>
                        </div>
                        <div class='whyus-rightcontent'>
                            <h6 class='smalltitle'>{{ $HomeContentSecond->heading_one }}</h6>
                            <p>{{ $HomeContentSecond->content_one }}</p>
                        </div>
                    </div>
                </div>
                <div class='whyus-conten1'>
                    <div class='d-flex'>
                        <div class='whyus-leftcontent'>
                            <div class='whyus-leftimg'><img src="{{url($HomeContentSecond->image_second)}}" class='service1-icon' alt="" /></div>
                        </div>
                        <div class='whyus-rightcontent'>
                            <h6 class='smalltitle'>{{ $HomeContentSecond->heading_second }}</h6>
                            <p>{{ $HomeContentSecond->content_second }} </p>
                        </div>
                    </div>
                </div>
                <div class='whyus-conten1'>
                    <div class='d-flex'>
                        <div class='whyus-leftcontent'>
                            <div class='whyus-leftimg'><img src="{{url($HomeContentSecond->image_third)}}" class='service1-icon' alt="" /></div>
                        </div>
                        <div class='whyus-rightcontent'>
                            <h6 class='smalltitle'>{{ $HomeContentSecond->heading_third }}</h6>
                            <p>{{ $HomeContentSecond->content_third	 }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class='ourservice1-section'>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class='service1-col'>
                    <div class='card'>
                        <img src="{{url($HomeContentThird->image1)}}" class='service1-icon' alt="" />
                        <h3 class='subtitle'>{{ $HomeContentThird->heading1 }}</h3>
                        <p>{{ $HomeContentThird->content1 }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class='service1-col'>
                    <div class='card'>
                        <img src="{{url($HomeContentThird->image2)}}" class='service1-icon' alt="" />
                        <h3 class='subtitle'>{{ $HomeContentThird->heading2 }}</h3>
                        <p>{{ $HomeContentThird->content2 }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class='service1-col'>
                    <div class='card'>
                        <img src="{{url($HomeContentThird->image3)}}" class='service1-icon' alt="" />
                        <h3 class='subtitle'>{{ $HomeContentThird->heading3 }}</h3>
                        <p>{{ $HomeContentThird->content3 }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 div-md-6 div-xs-12">
                <div class='service1-col'>
                    <div class='card'>
                        <img src="{{url($HomeContentThird->image4)}}" class='service1-icon' alt="" />
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
                                <div class="window">
                                    <img src="{{url( $item->images )}}" style="width: 300px; height: 200px;" alt="">
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
    <div class="container">
    <div class='row justify-content-center text-center'>
        <h2 class='title'>{{ $LoyalCustomers->heading }}</h2>
        <p class='para'>{{ $LoyalCustomers->content }}</p>
    </div>
        <div class='row mt-4'>

            <div class="owl-carousel ourloyalcarousel">
                @foreach($LoyalCustomersImages as $item)
                <div class='item'>
                    <img src="{{url($item->images)}}" class='ly1' alt="" />
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class='ourservice2-section'>
    <div class="container">
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
                        <div class='service2-colimg'><img src="{{url($HomeContentFourth->image1)}}" class='service1-icon' alt="" /></div>
                        <p>{{ $HomeContentFourth->heading1 }}</p>
                    </div>
                </div>                    
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12" class='m20'>
                <div class='service2-col'>
                    <div class='card'>
                        <div class='service2-colimg'><img src="{{url($HomeContentFourth->image2)}}" class='service1-icon' alt="" /></div>
                        <p>{{ $HomeContentFourth->heading2 }}</p>
                    </div>
                </div>                    
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12" class='m20'>
                <div class='service2-col'>
                        <div class='card'>
                            <div class='service2-colimg'><img src="{{url($HomeContentFourth->image3)}}" class='service1-icon' alt="" /></div>
                            <p>{{ $HomeContentFourth->heading3 }}</p>
                        </div>
                    
                </div>                    
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class='service2-col'>
                    <div class='card'>
                        <div class='service2-colimg'><img src="{{url($HomeContentFourth->image4)}}" class='service1-icon' alt="" /></div>
                        <p>{{ $HomeContentFourth->heading4 }}</p>
                    </div>
                </div>                    
            </div>
        </div>
        <div class='row mt-4'>
            <div class="col-lg-3 col-md-6 col-xs-12" class='m20'>
                <div class='service2-col'>
                    <div class='card'>
                        <div class='service2-colimg'><img src="{{url($HomeContentFourth->image5)}}" class='service1-icon' alt="" /></div>
                        <p>{{ $HomeContentFourth->heading5 }}</p>
                    </div>
                </div>                    
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12" class='m20'>
                <div class='service2-col'>
                    <div class='card'>
                        <div class='service2-colimg'><img src="{{url($HomeContentFourth->image6)}}" class='service1-icon' alt="" /></div>
                        <p>{{ $HomeContentFourth->heading6 }}</p>
                    </div>
                </div>                    
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12" class='m20'>
                <div class='service2-col'>
                    <div class='card'>
                        <div class='service2-colimg'><img src="{{url($HomeContentFourth->image7)}}" class='service1-icon' alt="" /></div>
                        <p>{{ $HomeContentFourth->heading7 }}</p>
                    </div>
                </div>                    
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class='service2-col'>
                    <div class='card'>
                        <div class='service2-colimg'><img src="{{url($HomeContentFourth->image8)}}" class='service1-icon' alt="" /></div>
                        <p>{{ $HomeContentFourth->heading8 }}</p>
                </div>
                </div>                    
            </div>
        </div>
    </div>
</section>

<section class='testimoinal-section'>
    <div class="container">
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
                                    <img src="{{url($item->image)}}" alt="" />
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-6 col-xs-12" class='my-auto'>
                                <div class='testimonial-content'>
                                    <h3>{{ $item->name }}</h3>
                                    <p class='textlabel'>{{ $item->designation }}</p>
                                    <img src="{{url('user_assets/images/quote.png')}}" class='testi-quote' alt="" />
                                    <p>{{ $item->comment }}</p>                            
                                    <img src="{{url('user_assets/images/quote.png')}}" class='testi-quote2' alt="" />
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
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="ourpricing-leftcontent">
                    <h2 class="title">Our <span class="highlight">Packages</span></h2>
                    <p class="para">Choose the package that suits you</p></div>
            </div>
            <div class="justify-content-center col-lg-12 col-md-12 col-12">
                <div class="pricing-rightcontent">
                    <div class="d-flex">
                        <div><h3 class="smalltitle">Monthly</h3></div>
                        <div>
                            <label class="toggle-switch"><input id="priceToggle" type="checkbox" /><span class="slider"></span></label>
                        </div>
                        <div>
                            <h3 class="smalltitle">Yearly <span class="pricingtags">20% discount</span></h3>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class='row mt-3'>
            <ul class="pricing-tabs nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                 <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">web design</button>
                </li>
                <li class="nav-item" role="presentation">
                 <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">ecommerce</button>
                </li>
                <li class="nav-item" role="presentation">
                 <button class="nav-link" id="pills-branding-tab" data-bs-toggle="pill" data-bs-target="#pills-branding" type="button" role="tab" aria-controls="pills-branding" aria-selected="false">branding</button>
                </li>
                <li class="nav-item" role="presentation">
                 <button class="nav-link" id="pills-logodesign-tab" data-bs-toggle="pill" data-bs-target="#pills-logodesign" type="button" role="tab" aria-controls="pills-logodesign" aria-selected="false">logo design</button>
                </li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" id="react-aria5774606214-:r1:-tabpane-webdesign" aria-labelledby="react-aria5774606214-:r1:-tab-webdesign" class="fade tab-pane active show">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="pricingbox">
                                    <div class="pricingheader">
                                        <h3 class="subtitle">free</h3>
                                        <h3 class="subtitle">$0</h3>
                                        <p>Description of the tier list will go here, copy should be concise and impactful.</p>
                                    </div>
                                    <div class="pricingbody">
                                        <ul>
                                            <li><img src="/assets/images/Checkicon2.png" alt="" /> Amazing feature one</li>
                                            <li><img src="/assets/images/Checkicon2.png" alt="" /> Wonderful feature two</li>
                                            <li><img src="/assets/images/Checkicon2.png" alt="" /> Priceless feature three</li>
                                        </ul>
                                        <div class="dlink"><a class="orderbtn" href="#">try for free</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="seconddiv card">
                                <div class="pricingbox">
                                    <div class="pricingheader">
                                        <h3 class="subtitle">Pro</h3>
                                        <h3 class="subtitle">$12 <sub>/month</sub></h3>
                                        <p>Description of the tier list will go here, copy should be concise and impactful.</p>
                                    </div>
                                    <div class="pricingbody">
                                        <ul>
                                            <p>Everything in the Free plan, plus</p>
                                            <li><img src="/assets/images/Checkicon2.png" alt="" /> Amazing feature one</li>
                                            <li><img src="/assets/images/Checkicon2.png" alt="" /> Wonderful feature two</li>
                                            <li><img src="/assets/images/Checkicon2.png" alt="" /> Priceless feature three</li>
                                            <li><img src="/assets/images/Checkicon2.png" alt="" /> Splended feature four</li>
                                            <li><img src="/assets/images/Checkicon2.png" alt="" /> Delightful feature five</li>
                                        </ul>
                                        <div class="dlink"><a class="orderbtn orderbtn1" href="#">Subscribe Now</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="seconddiv card">
                                <div class="pricingbox">
                                    <div class="pricingheader">
                                        <h3 class="subtitle">
                                            Enterprise

                                            Custom <sub>yearly billing only</sub>
                                        </h3>
                                        <h3 class="subtitle">$0</h3>
                                        <p>Description of the tier list will go here, copy should be concise and impactful.</p>
                                    </div>
                                    <div class="pricingbody">
                                        <ul>
                                            <p>Everything in the Pro plan, plus</p>
                                            <li><img src="/assets/images/Checkicon2.png" alt="" /> Amazing feature one</li>
                                            <li><img src="/assets/images/Checkicon2.png" alt="" /> Wonderful feature two</li>
                                            <li><img src="/assets/images/Checkicon2.png" alt="" /> Priceless feature three</li>
                                        </ul>
                                        <div class="dlink"><a class="orderbtn" href="#">Contact Sales</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" id="react-aria5774606214-:r1:-tabpane-eCommerce" aria-labelledby="react-aria5774606214-:r1:-tab-eCommerce" class="fade tab-pane"><div class="row"></div></div>
                <div role="tabpanel" id="react-aria5774606214-:r1:-tabpane-Branding" aria-labelledby="react-aria5774606214-:r1:-tab-Branding" class="fade tab-pane"><div class="row"></div></div>
                <div role="tabpanel" id="react-aria5774606214-:r1:-tabpane-Logo Design" aria-labelledby="react-aria5774606214-:r1:-tab-Logo Design" class="fade tab-pane"><div class="row"></div></div>
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
                        <span><a href='#'>Let’s Discuss</a></span>
                        <div class='ardiv-icon'>
                            <i class="fa fa-ardiv-right"></i>
                        </div>
                    </div>
                    <div class='d2'>
                        <span><a href='#'>(321) 925-685</a></span>
                        <div class='ardiv-icon'>
                            <i class="fa fa-ardiv-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-xs-12 order1">
                <div class='call-actionimage'>
                    <img src="{{url('user_assets/images/cta.png')}}" alt="" />
                </div>
            </div>
            <div class='arrow1'><img src="{{url('user_assets/images/arrow1.png')}}" alt="" /></div>
            <div class='arrow2'><img src="{{url('user_assets/images/arrow2.png')}}" alt="" /></div>
            <div class='arrow3'><img src="{{url('user_assets/images/arrow3.png')}}" alt="" /></div>
        </div>
    </div>
</section>

@endsection