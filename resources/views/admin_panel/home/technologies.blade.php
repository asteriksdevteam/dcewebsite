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
                <h1>Home Technologies</h1>
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
                        <h5 class="mb-4">Technologies Data</h5>
                        <form method="post" action="{{ url('update_home_technologies') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $HomeTechnologies->id }}">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Technologies Heading</label>
                                <input type="text" value="{{ $HomeTechnologies->heading_technologies }}" class="form-control @error('heading_technologies') is-invalid @enderror" name="heading_technologies" placeholder="Technologies Heading">

                                @error('heading_technologies')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Technologies Text</label>
                                <textarea name="content_technologies" class="form-control @error('content_technologies') is-invalid @enderror" id="" cols="30" rows="10">{{ $HomeTechnologies->content_technologies }}</textarea>

                                @error('content_technologies')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Technologies Images 1</label>
                                        <input type="file" name="image_1" id="imageInput1" class="form-control @error('image_1') is-invalid @enderror">
                                        @error('image_1')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
        
                                    <section>
                                        <div class="row justify-content-left mt-3 mb-3">
                                            <div class="col-lg-12 col-md-6 col-xs-12">
                                                <div class="card mcard" id="imageContainer1">
                                                    <img src="{{ asset($HomeTechnologies->image_1) }}" alt="dce-image" srcset="">
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
    
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Technologies Images 2</label>
                                        <input type="file" name="image_2" id="imageInput2" class="form-control @error('image_2') is-invalid @enderror">
                                        @error('image_2')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
    
                                    <section>
                                        <div class="row justify-content-left mt-3 mb-3">
                                            <div class="col-lg-12 col-md-6 col-xs-12">
                                                <div class="card mcard" id="imageContainer2">
                                                    <img src="{{ asset($HomeTechnologies->image_2) }}" alt="dce-image" srcset="">
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
    
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Technologies Images 3</label>
                                        <input type="file" name="image_3" id="imageInput3" class="form-control @error('image_3') is-invalid @enderror">
                                        @error('image_3')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
    
                                    <section>
                                        <div class="row justify-content-left mt-3 mb-3">
                                            <div class="col-lg-12 col-md-6 col-xs-12">
                                                <div class="card mcard" id="imageContainer3">
                                                    <img src="{{ asset($HomeTechnologies->image_3) }}" alt="dce-image" srcset="">
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Technologies Images 4</label>
                                        <input type="file" name="image_4" id="imageInput4" class="form-control @error('image_4') is-invalid @enderror">
                                        @error('image_4')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>

                                    <section>
                                        <div class="row justify-content-left mt-3 mb-3">
                                            <div class="col-lg-12 col-md-6 col-xs-12">
                                                <div class="card mcard" id="imageContainer4">
                                                    <img src="{{ asset($HomeTechnologies->image_4) }}" alt="dce-image" srcset="">
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Technologies Images 5</label>
                                        <input type="file" name="image_5" id="imageInput5" class="form-control @error('image_5') is-invalid @enderror">
                                        @error('image_5')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>

                                    <section>
                                        <div class="row justify-content-left mt-3 mb-3">
                                            <div class="col-lg-12 col-md-6 col-xs-12">
                                                <div class="card mcard" id="imageContainer5">
                                                    <img src="{{ asset($HomeTechnologies->image_5) }}" alt="dce-image" srcset="">
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Technologies Images 6</label>
                                        <input type="file" name="image_6" id="imageInput6" class="form-control @error('image_6') is-invalid @enderror">
                                        @error('image_6')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>

                                    <section>
                                        <div class="row justify-content-left mt-3 mb-3">
                                            <div class="col-lg-12 col-md-6 col-xs-12">
                                                <div class="card mcard" id="imageContainer6">
                                                    <img src="{{ asset($HomeTechnologies->image_6) }}" alt="dce-image" srcset="">
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mb-0">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection