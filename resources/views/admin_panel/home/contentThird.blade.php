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
                        <h5 class="mb-4">Third Content Section Data</h5>
                        <form method="post" action="{{ url('update_home_content_third') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $HomeContentThird->id }}">
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-xs-12">

                                        <label for="exampleInputPassword1">Section 1</label>

                                        <input type="text" name="heading1" id="heading1"class="form-control" value="{{ $HomeContentThird->heading1 }}">
                                        @error('heading1')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                        
                                        <textarea name="content1" id="content1" cols="30" rows="10" class="form-control mt-3">{{ $HomeContentThird->content1 }}</textarea>
                                        @error('content1')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <input type="file" name="image1" id="third_Content_Section_Data1" class="form-control mt-3 @error('image') is-invalid @enderror">

                                        <section>
                                            <div class="row justify-content-left mt-3 mb-3">
                                                <div class="col-lg-12 col-md-6 col-xs-12">
                                                    <div class="card mcard" id="image_third_Content_Section_Data1">
                                                        <img src="{{ asset($HomeContentThird->image1) }}" alt="dce-image" srcset="">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                    </div>

                                    <div class="col-lg-6 col-md-6 col-xs-12">

                                        <label for="exampleInputPassword1">Section 2</label>

                                        <input type="text" name="heading2" id="heading2"class="form-control" value="{{ $HomeContentThird->heading2 }}">
                                        @error('heading2')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <textarea name="content2" id="content2" cols="30" rows="10" class="form-control mt-3">{{ $HomeContentThird->content2 }}</textarea>
                                        @error('content2')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <input type="file" name="image2" id="third_Content_Section_Data2" class="form-control mt-3 @error('image') is-invalid @enderror">

                                        <section>
                                            <div class="row justify-content-left mt-3 mb-3">
                                                <div class="col-lg-12 col-md-6 col-xs-12">
                                                    <div class="card mcard" id="image_third_Content_Section_Data2">
                                                        <img src="{{ asset($HomeContentThird->image2) }}" alt="dce-image" srcset="">
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
                                    <div class="col-lg-6 col-md-6 col-xs-12">

                                        <label for="exampleInputPassword1">Section 3</label>

                                        <input type="text" name="heading3" id="heading3"class="form-control" value="{{ $HomeContentThird->heading3 }}">
                                        @error('content3')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <textarea name="content3" id="content3" cols="30" rows="10" class="form-control mt-3">{{ $HomeContentThird->content3 }}</textarea>
                                        @error('content3')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <input type="file" name="image3" id="third_Content_Section_Data3" class="form-control mt-3 @error('image') is-invalid @enderror">

                                        <section>
                                            <div class="row justify-content-left mt-3 mb-3">
                                                <div class="col-lg-12 col-md-6 col-xs-12">
                                                    <div class="card mcard" id="image_third_Content_Section_Data3">
                                                        <img src="{{ asset($HomeContentThird->image3) }}" alt="dce-image" srcset="">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-xs-12">

                                        <label for="exampleInputPassword1">Section 4</label>

                                        <input type="text" name="heading4" id="heading4"class="form-control" value="{{ $HomeContentThird->heading4 }}">
                                        @error('heading4')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <textarea name="content4" id="content4" cols="30" rows="10" class="form-control mt-3">{{ $HomeContentThird->content4 }}</textarea>
                                        @error('content4')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 

                                        <input type="file" name="image4" id="third_Content_Section_Data4" class="form-control mt-3 @error('image') is-invalid @enderror">

                                        <section>
                                            <div class="row justify-content-left mt-3 mb-3">
                                                <div class="col-lg-12 col-md-6 col-xs-12">
                                                    <div class="card mcard" id="image_third_Content_Section_Data4">
                                                        <img src="{{ asset($HomeContentThird->image4) }}" alt="dce-image" srcset="">
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