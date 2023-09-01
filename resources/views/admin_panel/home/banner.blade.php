@extends('admin_panel.layout.app');
@section('content')

<style>
   .mcard 
   {
        margin-bottom: 32px;
        position: relative;
        padding: 30px;
    }
    .mcard img 
    {
        width: 100px;
        display: block;
        margin: auto;
    }
    .garbage 
    {
        position: absolute;
        bottom: 16px;
        right: 14px;
    }
    .garbage i
    {
        font-size: 20px;
    }

</style>

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <h1>Home Banner</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>


            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <h5 class="mb-4">Banner Data</h5>
                        <form method="post" action="{{ url('update_home_banner') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $HomeBanner->id }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Banner Heading</label>
                                <input type="text" value="{{ $HomeBanner->heading_banner }}" class="form-control @error('heading_banner') is-invalid @enderror" name="heading_banner" placeholder="Banner Heading">

                                @error('heading_banner')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Banner Text</label>
                                <textarea name="content_banner" class="form-control @error('content_banner') is-invalid @enderror" id="" cols="30" rows="10">{{ $HomeBanner->content_banner }}</textarea>

                                @error('content_banner')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Banner Slider Images</label>
                                <input type="file" name="images[]" class="form-control @error('images') is-invalid @enderror" multiple>
                                @error('images')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div>

                            <button type="submit" class="btn btn-primary mb-0">Update</button>
                        </form>

                        <section>
                            <div class="container">
                                <div class="row justify-content-center">
                                    @foreach($HomeBannerImages as $item)
                                        <div class="col-lg-3 col-md-6 col-xs-12">
                                            <div class="card mcard">
                                                <img src="{{ $item->images }}" alt="">
                                                <a href="javascript:void(0);" class="getHomePageSliderIdLink">
                                                    <input type="hidden" value="{{ $item->id }}" name="getHomePageSliderId" id="getHomePageSliderId" class="getHomePageSliderId">
                                                    <div class="garbage">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection