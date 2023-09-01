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
                 <h1>Home Content 1</h1>
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
                        <h5 class="mb-4">Content 1 Data</h5>
                        <form method="post" action="{{ url('update_home_content_one') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $HomeContentOne->id }}">

                            <div class="form-group">
                                <textarea name="content" id="ckEditorClassic">{{ $HomeContentOne->content }}</textarea>

                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div>

                            <br>
                            <div class="form-group">
                                <label for="exampleInputPassword1"> Images </label>
                                <input type="file" name="image" id="HomeContentOne1" class="form-control @error('image_1') is-invalid @enderror">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div> 

                            <section>
                                <div class="row justify-content-left mt-3 mb-3">
                                    <div class="col-lg-3 col-md-6 col-xs-12">
                                        <div class="card mcard" id="HomeContentOne">
                                            <img src="{{ $HomeContentOne->image }}" alt="" srcset="">
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