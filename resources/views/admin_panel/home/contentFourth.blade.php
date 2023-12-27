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
                <h1>Content Section</h1>
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
                        <h5 class="mb-4">Fourth Content Section Data</h5>
                        <form method="post" action="{{ url('update_home_content_fourth') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $HomeContentFourth->id }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Banner Heading</label>
                                <input type="text" value="{{ $HomeContentFourth->heading }}" class="form-control @error('heading') is-invalid @enderror" name="heading" placeholder="Banner Heading">

                                @error('heading')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Banner Text</label>
                                <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="" cols="30" rows="10">{{ $HomeContentFourth->content }}</textarea>

                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-xs-12">

                                        <label for="exampleInputPassword1">Section 1</label>

                                        <input type="text" name="heading1" id="heading1"class="form-control" value="{{ $HomeContentFourth->heading1 }}">
                                        @error('heading1')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <input type="file" name="image1" id="fourth_Content_Section_Data1" class="form-control mt-3 @error('image') is-invalid @enderror">

                                        <section>
                                            <div class="row justify-content-left mt-3 mb-3">
                                                <div class="col-lg-12 col-md-6 col-xs-12">
                                                    <div class="card mcard" id="image_fourth_Content_Section_Data1">
                                                        <img src="{{ asset($HomeContentFourth->image1) }}" alt="dce-image" srcset="">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-xs-12">

                                        <label for="exampleInputPassword1">Section 2</label>

                                        <input type="text" name="heading2" id="heading2"class="form-control" value="{{ $HomeContentFourth->heading2 }}">
                                        @error('heading2')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <input type="file" name="image2" id="fourth_Content_Section_Data2" class="form-control mt-3 @error('image') is-invalid @enderror">

                                        <section>
                                            <div class="row justify-content-left mt-3 mb-3">
                                                <div class="col-lg-12 col-md-6 col-xs-12">
                                                    <div class="card mcard" id="image_fourth_Content_Section_Data2">
                                                        <img src="{{ asset($HomeContentFourth->image2) }}" alt="dce-image" srcset="">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-xs-12">

                                        <label for="exampleInputPassword1">Section 3</label>

                                        <input type="text" name="heading3" id="heading3"class="form-control" value="{{ $HomeContentFourth->heading3 }}">
                                        @error('heading3')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <input type="file" name="image3" id="fourth_Content_Section_Data3" class="form-control mt-3 @error('image') is-invalid @enderror">

                                        <section>
                                            <div class="row justify-content-left mt-3 mb-3">
                                                <div class="col-lg-12 col-md-6 col-xs-12">
                                                    <div class="card mcard" id="image_fourth_Content_Section_Data3">
                                                        <img src="{{ asset($HomeContentFourth->image3) }}" alt="dce-image" srcset="">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-xs-12">

                                        <label for="exampleInputPassword1">Section 4</label>

                                        <input type="text" name="heading4" id="heading4"class="form-control" value="{{ $HomeContentFourth->heading4 }}">
                                        @error('heading4')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <input type="file" name="image4" id="fourth_Content_Section_Data4" class="form-control mt-3 @error('image') is-invalid @enderror">

                                        <section>
                                            <div class="row justify-content-left mt-3 mb-3">
                                                <div class="col-lg-12 col-md-6 col-xs-12">
                                                    <div class="card mcard" id="image_fourth_Content_Section_Data4">
                                                        <img src="{{ asset($HomeContentFourth->image4) }}" alt="dce-image" srcset="">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                <br>
                                <hr>
                                <br>
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-xs-12">

                                        <label for="exampleInputPassword1">Section 5</label>

                                        <input type="text" name="heading5" id="heading5"class="form-control" value="{{ $HomeContentFourth->heading5 }}">
                                        @error('heading5')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <input type="file" name="image5" id="fourth_Content_Section_Data5" class="form-control mt-3 @error('image') is-invalid @enderror">

                                        <section>
                                            <div class="row justify-content-left mt-3 mb-3">
                                                <div class="col-lg-12 col-md-6 col-xs-12">
                                                    <div class="card mcard" id="image_fourth_Content_Section_Data5">
                                                        <img src="{{ asset($HomeContentFourth->image5) }}" alt="dce-image" srcset="">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-xs-12">

                                        <label for="exampleInputPassword1">Section 6</label>

                                        <input type="text" name="heading6" id="heading6"class="form-control" value="{{ $HomeContentFourth->heading6 }}">
                                        @error('heading6')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <input type="file" name="image6" id="fourth_Content_Section_Data6" class="form-control mt-3 @error('image') is-invalid @enderror">

                                        <section>
                                            <div class="row justify-content-left mt-3 mb-3">
                                                <div class="col-lg-12 col-md-6 col-xs-12">
                                                    <div class="card mcard" id="image_fourth_Content_Section_Data6">
                                                        <img src="{{ asset($HomeContentFourth->image6) }}" alt="dce-image" srcset="">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-xs-12">

                                        <label for="exampleInputPassword1">Section 7</label>

                                        <input type="text" name="heading7" id="heading7"class="form-control" value="{{ $HomeContentFourth->heading7 }}">
                                        @error('heading7')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <input type="file" name="image7" id="fourth_Content_Section_Data7" class="form-control mt-3 @error('image') is-invalid @enderror">

                                        <section>
                                            <div class="row justify-content-left mt-3 mb-3">
                                                <div class="col-lg-12 col-md-6 col-xs-12">
                                                    <div class="card mcard" id="image_fourth_Content_Section_Data7">
                                                        <img src="{{ asset($HomeContentFourth->image7) }}" alt="dce-image" srcset="">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-xs-12">

                                        <label for="exampleInputPassword1">Section 8</label>

                                        <input type="text" name="heading8" id="heading8"class="form-control" value="{{ $HomeContentFourth->heading8 }}">
                                        @error('heading8')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <input type="file" name="image8" id="fourth_Content_Section_Data8" class="form-control mt-3 @error('image') is-invalid @enderror">

                                        <section>
                                            <div class="row justify-content-left mt-3 mb-3">
                                                <div class="col-lg-12 col-md-6 col-xs-12">
                                                    <div class="card mcard" id="image_fourth_Content_Section_Data8">
                                                        <img src="{{ asset($HomeContentFourth->image8) }}" alt="dce-image" srcset="">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
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