@extends('user_panel.layout.app')
@section('content')
<section class='blogbanner-section'>
    <div class='container centercontainer'>
        <div class="row">
            <div class="col-lg-12">
                <div class='bannercontnet'>
                    <h1><span class='highlight'>{{ $Blog->blog_name }}</span></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class='blogdetailssection'>
    <div class="container">
        <div class='row justify-content-center'>
            <div class="col-lg-12">
                <img src='{{ url($Blog->blog_image)}}' class='img-fluid' alt=''/>
            </div>
        </div>
        <div class='row mt-4'>
            <div class="col-lg-8">
                <div class='detials-txt'>
                    <div class='row mt-3'>
                        <div class="col-lg-9">
                            <div class='d-flex align-items-center'>
                                <div class='detials-txt1'>
                                    <img src='{{ url('user_assets/images/img1.png')}}' class='img-fluid mikaimgae' alt=''/>
                                </div>
                                <div class='detials-txt2'>
                                    <h5>Mika MAtikainen</h5>
                                    <p>Apr 15, 2020 · 4 min read</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            {{-- <div class='d-flex align-items-center scialdiv'>
                                <div class='f1'>
                                    <img src='{{ url('user_assets/images/facebook.png')}}' alt='' />
                                </div>
                                <div class='tw'>
                                    <img src='{{ url('user_assets/images/twitter.png')}}' alt='' />
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <p class='para'>{{ $Blog->blog_description }}</p>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class='row mb-3'>
                    <div class='article-heading'>
                        <h2 class='title'><span class='highlight'>Recent Blogs</span></h2>
                    </div>
                </div>
                @foreach($RecentBlog as $item)
                    <div class='row article1'>
                        <div class='card p-0'>
                            <img src='{{ url($item->blog_image_thumb)}}' class='img-fluid' alt=''/>
                            <div class='card-body'>
                                <p class='mt-4'>3/April/2023, <span class='highlight'>Admin</span></p>
                                <h3 class='subtitle'><span class='highlight'>{{ Illuminate\Support\Str::limit($item->blog_name, 30) }}</span></h3>
                                <p>{{ Illuminate\Support\Str::limit($item->blog_short_description, 30) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class='row mb-3'>
                    <div class='article-heading'>
                        <h2 class='title'><span class='highlight'>Twitter Feed</span></h2>
                    </div>
                </div>
                <div class="row">
                    <div class='twitterfeed'>
                        <div class="card">
                            <div class="row">
                                <div class="col-lg-3" lg={3}>
                                    <div class='detials-txt1'>
                                        <img src='{{ url('user_assets/images/img1.png')}}' class='img-fluid mikaimgae' alt=''/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                     <div class='detials-txt2'>
                                        <h5 class='m-0'>Mika MAtikainen</h5>
                                        <p>@MikaMAtikainen</p>
                                    </div>
                                </div>
                                <div class="col-lg-3" lg={3}>
                                    <div class='detials-txt3'>
                                        <img src='{{ url('user_assets/images/grtwitter.png')}}' class='twitterfeed-sm' alt='' />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-xs-12" >
                                    <img src='{{ url('user_assets/images/blog8.png')}}' class='img-fluid bg6' alt=''/>
                                </div>
                                <div class="col-lg-5 col-md-5 col-xs-12" >
                                    <p>We believe in study of mission is very important. Research on the history ...</p>
                                    <a href='#'> asrteriksdigital.com </a>
                                </div>
                            </div>
                            <div class='row mt-3'>
                            <div class="col-lg-5 col-md-5 col-xs-12" >
                                    <img src='{{ url('user_assets/images/lg.png')}}' class='img-fluid blg6' alt=''/>
                                </div>
                                <div class="col-lg-7 col-md-7 col-xs-12">
                                    <p class='float-right'>3/April/2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='row blog-gray mt-4'>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class='blogcard1'>
                    <div class='blogcard1-header'>
                        <img src="assets/images/blog4.png" class='img-fluid' alt="" />
                    </div>
                    <div class='blogcard1-content'>
                        <p class='para mt-2'>3/April/2023, <span class='highlight'>Admin</span></p>
                        <h3><span class='highlight'>Business Mission Or Essen</span></h3>
                        <p class='paras'>We believe in study of mission is very important. Research on the history </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class='blogcard1'>
                    <div class='blogcard1-header'>
                        <img src="assets/images/blog7.png" class='img-fluid' alt="" />
                    </div>
                    <div class='blogcard1-content'>
                        <p class='para mt-2'>3/April/2023, <span class='highlight'>Admin</span></p>
                        <h3><span class='highlight'>Business Mission Or Essen</span></h3>
                        <p class='paras'>We believe in study of mission is very important. Research on the history </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class='blogcard1'>
                    <div class='blogcard1-header'>
                        <img src="assets/images/blog6.png" class='img-fluid' alt="" />
                    </div>
                    <div class='blogcard-content'>
                        <p class='para mt-2'>3/April/2023, <span class='highlight'>Admin</span></p>
                        <h3><span class='highlight'>Business Mission Or Essen</span></h3>
                        <p class='paras'>We believe in study of mission is very important. Research on the history </p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>

@endsection