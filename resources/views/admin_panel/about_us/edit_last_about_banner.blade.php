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

                <h1>Last Banner Section</h1>
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
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <h5 class="mb-4">Last Banner Data </h5>
                        <form method="post" action="{{ url('update_last_about_banner') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $LastAboutBanner->id }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Banner Heading</label>
                                <input type="text" value="{{ $LastAboutBanner->heading }}" class="form-control @error('banner_heading') is-invalid @enderror" name="banner_heading" placeholder="Banner Heading">

                                @error('banner_heading')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Banner Text</label>
                                <textarea name="banner_content" class="form-control @error('banner_content') is-invalid @enderror" id="" cols="30" rows="10">{{ $LastAboutBanner->content }}</textarea>

                                @error('banner_content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Banner Image</label>
                                <input type="file" value="" class="form-control @error('banner_image') is-invalid @enderror" name="banner_image" id="last_banner_image" placeholder="Banner Heading">

                                @error('banner_image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <section>
                                <div class="row justify-content-left mt-3 mb-3">
                                    <div class="col-lg-12 col-md-6 col-xs-12">
                                        <div class="card mcard" id="show_last_banner_image">
                                            <img src="{{ asset($LastAboutBanner->image) }}" alt="dce-image" srcset="">
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <button type="submit" class="btn btn-primary mb-0">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection