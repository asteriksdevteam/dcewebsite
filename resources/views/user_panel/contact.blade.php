@extends('user_panel.layout.app')
@section('content')

<section class='contactbanner'>
    <div class='container centercontainer'>
        <div class="row">
            <div class="col-lg-12">
                <div class='bannercontnet'>
                    <h1><span class='highlight'>Contact Us Right Now! <br/> Your project Take the next step</span></h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class='contactsection1'>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                    <div class='form1 mt-4'>
                        <h2 class='title'><span class='highlight'>Get in touch.</span></h2>
                        <form id="">
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
                                    <input type="number" placeholder='phone*' max="11" name="contact_phone" id="contact_phone" class='form-control first_contact_phone' required/>
                                    
                                    <small class="text-danger error-message first-phone-error" id="phone-error"></small>
                                </div>
                                <div class="col-lg-6">
                                    <select name="categories" id="categories" class='form-control first_categories'>
                                        <option disabled selected>Select</option>
                                        @foreach($Category as $item)
                                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                        @endforeach
                                    </select>
                                    
                                    <small class="text-danger error-message first-categories-error" id="categories-error"></small>
                                </div>
                            </div>
                            <div class='row mt-3 gx-3'>
                                <div class="col-lg-12">
                                    <textarea class='form-control first_contact_text' name="contact_text" rows='10' id="contact_text" placeholder='summery*' required></textarea> 
                                    
                                    <small class="text-danger error-message first-text-error" id="text-error"></small>
                                </div>
                            </div>
                            <button type='button' class='submit first_contact_us'>submit <i class="fa fa-arrow-right angleicon"></i> </button>
                        </form>
                        <div class='arrow1'><img src="{{ asset('user_assets/images/arrow1.png') }}" alt="dce-image" /></div>
                        <div class='arrow2'><img src="{{ asset('user_assets/images/arrow2.png') }}" alt="dce-image" /></div>
                        <div class='arrow3'><img src="{{ asset('user_assets/images/arrow3.png') }}" alt="dce-image" /></div>
                    </div>
            </div>
            <div class="col-lg-6 my-auto">
                <div class='ctlist'>
                    {!! $OfficeAddress->office_detail !!}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="map-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 my-auto">
                <h2 class="title mb-4">Location</h2>
                <p>Located in Austin, Digi Content Experts proudly offers top-tier digital marketing solutions to clients worldwide. Our central location is a testament to our global reach and commitment. Equipped with modern facilities and a collaborative workspace, we're positioned not just geographically, but at the forefront of digital innovation. Whether you're nearby or across the globe, our services ensure we're always within reach. Let's collaborate and take your digital presence to the next level.</p>
            </div>
            <div class="col-md-8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1023.7089272834232!2d-97.75575986975316!3d30.34149411496158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8644cae2f96fffff%3A0xeb7209fa2a453ee9!2s5900%20Balcones%20Dr%20Suite%20100%2C%20Austin%2C%20TX%2078731%2C%20USA!5e0!3m2!1sen!2s!4v1696928357949!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                    <img src="{{asset($item->images)}}" class='ly1' alt="dce-image" />
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class='contactbanner2'>
    <div class="container">
        <div class='row justify-content-center text-center'>
            <div class="col-lg-8">
                <h2 class='title'>Business Mission Or Essence</h2>
                <p class='para'>We believe in study of mission is very important. Research on the history of the Website Design Company to get details and explain in clear words, what the Website Design Company is all about?</p>
            </div>
        </div>
        <div class="row">
            <img src="{{ asset('user_assets/images/cbanner2.png')}}" alt="dce-image" />
        </div>
    </div>
</section>

@endsection