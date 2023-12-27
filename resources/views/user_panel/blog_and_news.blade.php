@extends('user_panel.layout.app')
@section('content')

<style>
    .search-field
    {
        width: 400px;
        border-radius: 0px;
        font-family: 'Poppins', sans-serif;
        text-transform: capitalize;
        border-color: #1C3879 !important;
        border-width:2px !important;
    }
    .search-field:focus
    {
        border-radius: 0px;
        box-shadow: none !important;
        outline: none !important;
        border-color: #1C3879 !important;
    }
    .search-field::placeholder
    {
        color:#000;
    }
    .select-field
    {
        width: 400px;
        border-radius: 0px;
        font-family: 'Poppins', sans-serif;
        float: right;
        text-transform: capitalize;
        border-color: #1C3879 !important;
        border-width:2px !important;
    }
    .select-field:focus
    {
        border-radius: 0px;
        box-shadow: none !important;
        outline: none !important;
        border-color: #1C3879 !important;
    }
    .input-searchf 
    {
        position: relative;
        width: fit-content;
    }
    .input-searchf::placeholder
    {
        color:#000;
    }
    .input-searchf i 
    {
        position: absolute;
        right: 8px;
        top: 11px;
    }
</style>

<section class='blogbanner-section'>
    <div class='container centercontainer'>
        <div class="row">
            <div>
                <div class='bannercontnet'>
                    <h1><span class='highlight'>Blogs</span></h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class='blogtestimonial-section'>
    <div class="container">
        <div class='row mt-5'>
            <div class='owl-carousel testim-carousel blogtestimonial'>
                @foreach($recentBlogs as $item)
                <div class='item'>
                    <div class='row mb-5'>
                        <div class="col-lg-6 col-md-6 col-xs-12 ">
                            <div class='blog-leftimage'>
                                <img src="{{ asset($item->blog_image_thumb)}}" class="blogbannerimg" alt="dce-image" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-12 my-auto">
                            <div class='blogtestimonial-content'>
                                <p class='para'>{{ Carbon\Carbon::parse($item->date)->format('M d, Y') }} / <span class='highlight'>Admin</span></p>
                                <!--<h2 class='title' style="text-transform: capitalize">{{ $item->blog_name }}</h2>-->
                                <a href="{{ url('blog-detail/'.$item->slug) }}" style="text-decoration: none;text-transform: capitalize;color: #1c3879;"><h2 class='title'>{{ $item->blog_name }}</h2></a>
                                <p class='para' >{{ $item->blog_short_description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class='blogsection'>
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6 col-md-6">
                <div class="input-searchf">
                    <input type="text" class="form-control search-field blogeSearch" placeholder="search">
                    <i class="fa fa-search"></i>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <select class="form-control select-field form-select search_category" id="search_category" >
                    <option value="{{ $categoryIds }}">All Blogs</option>
                    @foreach($Category as $item)
                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @php
            $blogCount = 0;
        @endphp
        <div class="row searchResults">
            @foreach($Blog as $item)
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class='blogcard'>
                        
                        <div class='blogcard-header'>
                            <img src="{{ asset($item->blog_image_thumb)}}" alt="dce-image" />
                        </div>
                        <div class='blogcard-content'>
                            <p class='para mt-2'>{{ Carbon\Carbon::parse($item->date)->format('M d, Y') }} / <span class='highlight'>Admin</span></p>
                            <a href="{{ url('blog-detail/'.$item->slug) }}" style="text-decoration: none"><h3><span class='highlight'>{{ Illuminate\Support\Str::limit($item->blog_name, 40) }}</span></h3></a>
                            <p class='paras' style="text-align: justify">{{ Illuminate\Support\Str::limit($item->blog_short_description, 100) }}</p>
                        </div>
                        
                    </div>
                </div>
                @php
                    $blogCount++;
                @endphp
            @endforeach
            <div class="col-12 text-center">
                <button class="mx-auto d-block estimate btn-sm loadMoreBlogs" data-count="{{ $blogCount }}">Load More</button>
            </div>
        </div>
    </div>
</section>

@endsection