@extends('user_panel.layout.app')
<!--<img src="{{ asset($Blog->blog_image)}}" alt="" style="display:none;">-->

@section('content')

<style>
    #social-links ul
    {
        margin:0px;
        padding:0px 0px 0px 27px;
    }
    #social-links ul li {
    position: relative;
    display: inline;
    margin-right: 20px;
    padding: 13px 13px 5px 0;
}
    #social-links ul li:before
    {
        content:'';
        position: absolute;
        top:0;
        right:0;
        border:1px solid #EAEAEA;
        width: 1px;
        height:100%;
    }
    #social-links ul li:last-child:before
    {
        display: none;
    }
    #social-links ul li a 
    {
        text-decoration: none;
        color: #1C3879;
        font-size: 26px;
    }
    .f1
    {
        position: relative;
        padding:0px;
        border: 1px solid #EAEAEA;
    }
    #social-links ul li:last-child
    {
        margin-right: 0px;
        padding-right:0px;
    }
    @media(max-width:1024px)
    {
        #social-links ul {
            margin: 0px;
            padding: 0px 0px 0px 17px;
        }
        #social-links ul li
        {
            margin-right:8px;
        }
        #social-links ul li a
        {
            font-size: 22px;
        }
    }
    @media(max-width:576px)
    {
        #social-links ul 
        {
            padding: 0px 0px 0px 12px;
        }
    }
</style>

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
                <img src='{{ asset($Blog->blog_image)}}' class='img-fluid blogimg' alt='Thumbnail'/>
            </div>
        </div>
        <div class='row mt-4'>
            <div class="col-lg-8">
                <div class='detials-txt'>
                    <div class='row mt-3'>
                        <div class="col-lg-9 col-md-8 col-6">
                            <div class='d-flex align-items-center'>
                                <div class='detials-txt1'>
                                    <img src='{{ asset('user_assets/images/img1.png')}}' class='img-fluid mikaimgae' alt='mikaimgae'/>
                                </div>
                                <div class='detials-txt2'>
                                    <h5>Admin</h5>

                                    <p>{{ $Blog->date }}</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class='d-flex align-items-center scialdiv'>
                                <div class='f1'>
                                    {!! $shareComponent !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class='para'>{!! $Blog->blog_description !!}</p>
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
                            <img src='{{ asset($item->blog_image_thumb)}}' class='img-fluid' alt='blog_image_thumb'/>
                            <div class='card-body'>
                                <p class='mt-4'>{{ Carbon\Carbon::parse($item->date)->format('M d, Y') }} /<span class='highlight'>Admin</span></p>
                                <a href="{{ url('blog-detail/'.$item->slug) }}" style="text-decoration: none;text-transform: capitalize;color: #1c3879;"><h3 class='subtitle'><span class='highlight'>{{ Illuminate\Support\Str::limit($item->blog_name, 30) }}</span></h3></a>
                                <p>{{ Illuminate\Support\Str::limit($item->blog_short_description, 100) }}</p>
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
                    {!! $BlogFeed->blog_feed !!}
                </div>
            </div>
        </div>
        <div class='row blog-gray mt-4'>
            <div class='row mb-3'>
                <div class='article-heading'>
                    <h2 class='title'><span class='highlight'>Category Wise Blogs</span></h2>
                </div>
            </div>
            @foreach($BlogCategoryWise as $item)
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class='blogcard1'>
                    <div class='blogcard1-header'>
                        <img src='{{ asset($item->blog_image_thumb)}}' class='img-fluid' alt='blog_image_thumb'/>
                    </div>
                    <div class='blogcard1-content'>
                        <p class='para mt-2'>{{ Carbon\Carbon::parse($item->date)->format('M d, Y') }} /<span class='highlight'>Admin</span></p>
                        <a href="{{ url('blog-detail/'.$item->slug) }}" style="text-decoration: none;text-transform: capitalize;color: #1c3879;"><h3><span class='highlight'>{{ Illuminate\Support\Str::limit($item->blog_name, 30) }}</span></h3></a> 
                        <p class='paras'>{{ Illuminate\Support\Str::limit($item->blog_short_description, 100) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
</section>

@endsection