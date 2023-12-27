@extends('admin_panel.layout.app')
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
         .tox-notifications-container 
    {
        display: none;
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
                        <h5 class="mb-4">Second Content Section Data</h5>
                        <form method="post" action="{{ url('update_home_content_second') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $HomeContentSecond->id }}">

                            <div class="form-group">
                                <textarea class="textarea_tinyMice @error('text') is-invalid @enderror" name="content">{{ $HomeContentSecond->content }}</textarea>
                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div>

                            <div class="form-group">
                                
                                <div class="row">
            
                                    <div class="col-lg-4 col-md-6 col-xs-12">

                                        <label for="exampleInputPassword1">Section 1</label>

                                        <input type="text" name="heading1" id="heading1"class="form-control" value="{{ $HomeContentSecond->heading_one }}">
                                        @error('heading1')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <textarea name="content1" id="content1" cols="30" rows="10" class="form-control mt-3">{{ $HomeContentSecond->content_one }}</textarea>
                                        @error('content1')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <input type="file" name="image1" id="Second_Content_Section_Data1" class="form-control mt-3 @error('image') is-invalid @enderror">

                                        <section>
                                            <div class="row justify-content-left mt-3 mb-3">
                                                <div class="col-lg-12 col-md-6 col-xs-12">
                                                    <div class="card mcard" id="image_Second_Content_Section_Data1">
                                                        <img src="{{ asset($HomeContentSecond->image_one) }}" alt="dce-image" srcset="">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                    </div>
                                    <div class="col-lg-4 col-md-6 col-xs-12">

                                        <label for="exampleInputPassword1">Section 2</label>

                                        <input type="text" name="heading2" id="heading2"class="form-control" value="{{ $HomeContentSecond->heading_second }}">
                                        @error('heading2')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <textarea name="content2" id="content2" cols="30" rows="10" class="form-control mt-3">{{ $HomeContentSecond->content_second }}</textarea>
                                        @error('content2')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <input type="file" name="image2" id="Second_Content_Section_Data2" class="form-control mt-3 @error('image') is-invalid @enderror">

                                        <section>
                                            <div class="row justify-content-left mt-3 mb-3">
                                                <div class="col-lg-12 col-md-6 col-xs-12">
                                                    <div class="card mcard" id="image_Second_Content_Section_Data2">
                                                        <img src="{{ asset($HomeContentSecond->image_second) }}" alt="dce-image" srcset="">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                    </div>
                                    <div class="col-lg-4 col-md-6 col-xs-12">

                                        <label for="exampleInputPassword1">Section 3</label>

                                        <input type="text" name="heading3" id="heading3" class="form-control" value="{{ $HomeContentSecond->heading_third }}">
                                        @error('heading3')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <textarea name="content3" id="content3" cols="30" rows="10" class="form-control mt-3">{{ $HomeContentSecond->content_third }}</textarea>
                                        @error('content3')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <input type="file" name="image3" id="Second_Content_Section_Data3" class="form-control mt-3 @error('image') is-invalid @enderror">

                                        <section>
                                            <div class="row justify-content-left mt-3 mb-3">
                                                <div class="col-lg-12 col-md-6 col-xs-12">
                                                    <div class="card mcard" id="image_Second_Content_Section_Data3">
                                                        <img src="{{ asset($HomeContentSecond->image_third) }}" alt="dce-image" srcset="">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                    </div>

                                </div>
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror 
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