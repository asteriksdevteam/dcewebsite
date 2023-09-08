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

                <h1>About Section</h1>
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
                        <h5 class="mb-4">WHO WE ARE?</h5>
                        <form method="post" action="{{ url('update_who_we_are') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $WhoWeAre->id }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">About Content</label>
                                <textarea name="about_content" class=" @error('about_content') is-invalid @enderror" id="ckEditorClassic">{{ $WhoWeAre->about_content }}</textarea>

                                @error('about_content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">About Image</label>
                                <input type="file" value="" id="about_image_who_we_are" class="form-control @error('about_image_who_we_are') is-invalid @enderror" name="about_image_who_we_are">

                                @error('about_image_who_we_are')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>
                            <button type="submit" class="btn btn-primary mb-0">Update</button>
                        </form>

                        <section>
                            <div class="row justify-content-left mt-3 mb-3">
                                <div class="col-lg-12 col-md-6 col-xs-12">
                                    <div class="card mcard" id="who_we_are_Image">
                                        <img src="{{ $WhoWeAre->image }}" alt="" srcset="">
                                    </div>
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