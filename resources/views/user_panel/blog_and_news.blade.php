@extends('user_panel.layout.app')
@section('content')

<section class='blogbanner-section'>
    <div class='container centerdiv'>
        <div class="row">
            <div>
                <div class='bannercontnet'>
                    <h1><span class='highlight'>WE ARE USAs TOP RATED WEBSITE DESIGN COMPANY</span></h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class='blogtestimonial-section'>
    <div class="container">
        <div class='row mt-5'>
            <div class='owl-carousel testim-carousel blogtestimonial'>
                <div class='item'>
                    <div class='row mb-5'>
                        <div class="col-lg-6 col-md-6 col-xs-12 ">
                            <div class='blog-leftimage'>
                                <img src="{{ url('user_assets/images/blogtestimage1.png')}}" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-12 my-auto">
                            <div class='blogtestimonial-content'>
                                <p class='para'>3/April/2023, <span class='highlight'>Admin</span></p>
                                <h2 class='title'>Business Mission Or Essence</h2>
                                <p class='para'>We believe in study of mission is very important. Research on the history of the Website Design Company to get details and explain in clear words, what the Website Design Company is all about?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='item'>
                    <div class='row mb-5'>
                        <div class="col-lg-6 col-md-6 col-xs-12 ">
                            <div class='blog-leftimage'>
                                <img src="{{ url('user_assets/images/blogtestimage1.png')}}" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-12 my-auto">
                            <div class='blogtestimonial-content'>
                                <p class='para'>3/April/2023, <span class='highlight'>Admin</span></p>
                                <h2 class='title'>Business Mission Or Essence</h2>
                                <p class='para'>We believe in study of mission is very important. Research on the history of the Website Design Company to get details and explain in clear words, what the Website Design Company is all about?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='item'>
                    <div class='row mb-5'>
                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <div class='blog-leftimage'>
                                <img src="{{ url('user_assets/images/blogtestimage1.png')}}" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-12 my-auto">
                            <div class='blogtestimonial-content'>
                                <p class='para'>3/April/2023, <span class='highlight'>Admin</span></p>
                                <h2 class='title'>Business Mission Or Essence</h2>
                                <p class='para'>We believe in study of mission is very important. Research on the history of the Website Design Company to get details and explain in clear words, what the Website Design Company is all about?</p>
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
</section>

<section class='blogsection'>
    <div class="container">
        <div class="row">
            @foreach($Blog as $item)
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class='blogcard'>
                        
                        <div class='blogcard-header'>
                            <img src="{{ url($item->blog_image_thumb)}}" alt="" />
                        </div>
                        <div class='blogcard-content'>
                            <p class='para mt-2'>3/April/2023, <span class='highlight'>Admin</span></p>
                            <a href="{{ url('blog_detail/'.$item->slug) }}"><h3><span class='highlight'>{{ $item->blog_name }}</span></h3></a>
                            <p class='paras'>{{ $item->blog_short_description }} </p>
                        </div>
                        
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection