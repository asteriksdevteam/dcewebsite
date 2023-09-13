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
                        <form action="#" class='mt-4'>
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
                                    <textarea class='form-control' name="contact_text" rows='5' id="contact_text" placeholder='messages*' required></textarea> 
                                </div>
                            </div>
                            <button type='button' class='submit contact_us'>submit</button>
                        </form>
                        <div class='arrow1'><img src="/assets/images/arrow1.png" alt="" /></div>
                        <div class='arrow2'><img src="/assets/images/arrow2.png" alt="" /></div>
                        <div class='arrow3'><img src="/assets/images/arrow3.png" alt="" /></div>
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

<section class='contactbanner2'>
    <div class="container">
        <div class='row justify-content-center text-center'>
            <div class="col-lg-8">
                <h2 class='title'>Business Mission Or Essence</h2>
                <p class='para'>We believe in study of mission is very important. Research on the history of the Website Design Company to get details and explain in clear words, what the Website Design Company is all about?</p>
            </div>
        </div>
        <div class="row">
            <img src="{{ url('user_assets/images/cbanner2.png')}}" alt="" />
        </div>
    </div>
</section>

@endsection