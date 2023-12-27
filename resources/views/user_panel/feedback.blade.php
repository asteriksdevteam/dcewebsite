<section class='contact-section'>  
    <div class="container">
        <div class="row">
            <div data-aos="fade-right" data-aos-duration="1000" class="col-lg-6 col-md-6 col-xs-12 my-auto m20">
                <div>
                    <h3 class="blackhighlight">Contact Digi Content Experts Right Now!</h3>
                    <h2 class="title mt-2"><span class="highlight">Turn Your Business<br/> Sales Up</span></h2>
                    <p class='para mt-4'>We can help you with our Digital Marketing Services, IT Consulting Services, Hosting Services, Content Services, web design, development Services, and more. Ready to elevate your digital presence online? Tell us your business needs now! Let's Talk !</p>
                </div>

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
                                <textarea class='form-control first_contact_text' name="contact_text" rows='10' id="contact_text" placeholder='summary*' required></textarea> 
                                
                                <small class="text-danger error-message first-text-error" id="text-error"></small>
                            </div>
                        </div>
                        <button type='button' class='submit first_contact_us'>submit  <i class="fa fa-arrow-right angleicon"></i></button>
                    </form>
                    <div class='arrow1'><img src="{{asset('user_assets/images/arrow1.png')}}" alt="dce-image" /></div>
                    <div class='arrow2'><img src="{{asset('user_assets/images/arrow2.png')}}" alt="dce-image" /></div>
                    <div class='arrow3'><img src="{{asset('user_assets/images/arrow3.png')}}" alt="dce-image" /></div>
                </div>
            </div>
            <div data-aos="fade-left" data-aos-duration="1000" class="col-lg-6 col-md-6 col-xs-12">
                <img src="{{asset('user_assets/images/contactimage.png')}}" class='cimage-section' alt="dce-image" />
            </div>
        </div>
    </div>
</section>