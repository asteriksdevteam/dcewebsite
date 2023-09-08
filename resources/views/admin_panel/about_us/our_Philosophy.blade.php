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
                        <h5 class="mb-4">Our Philosophy</h5>
                        <form method="post" action="{{ url('update_our_philosophy') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $OurPhilosophy->id }}">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">First Heading</label>
                                        <input type="text" value="{{ $OurPhilosophy->first_heading }}" id="first_heading" class="form-control @error('first_heading') is-invalid @enderror" name="first_heading">
        
                                        @error('first_heading')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror                                
                                    </div>
        
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">First Content</label>
                                        <textarea name="first_content" class="form-control @error('first_content') is-invalid @enderror" rows="4" class="form-control">{{ $OurPhilosophy->first_content }}</textarea>
        
                                        @error('first_content')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Second Heading</label>
                                        <input type="text" value="{{ $OurPhilosophy->second_heading }}" id="second_heading" class="form-control @error('second_heading') is-invalid @enderror" name="second_heading">
        
                                        @error('second_heading')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror                                
                                    </div>
        
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Second Content</label>
                                        <textarea name="second_content" rows="4" class="form-control @error('second_content') is-invalid @enderror">{{ $OurPhilosophy->second_content }}</textarea>
        
                                        @error('second_content')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Third Heading</label>
                                        <input type="text" value="{{ $OurPhilosophy->third_heading }}" id="third_heading" class="form-control @error('third_heading') is-invalid @enderror" name="third_heading">
        
                                        @error('third_heading')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror                                
                                    </div>
        
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Third Content</label>
                                        <textarea name="third_content" class="form-control @error('third_content') is-invalid @enderror" rows="4">{{ $OurPhilosophy->third_content }}</textarea>
        
                                        @error('third_content')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Fourth Heading</label>
                                        <input type="text" value="{{ $OurPhilosophy->fourth_heading }}" id="fourth_heading" class="form-control @error('fourth_heading') is-invalid @enderror" name="fourth_heading">
        
                                        @error('fourth_heading')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror                                
                                    </div>
        
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Fourth Content</label>
                                        <textarea name="fourth_content" rows="4" class="form-control @error('fourth_content') is-invalid @enderror">{{ $OurPhilosophy->fourth_content }}</textarea>
        
                                        @error('fourth_content')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Fifth Heading</label>
                                        <input type="text" value="{{ $OurPhilosophy->fifth_heading }}" id="fifth_heading" class="form-control @error('fifth_heading') is-invalid @enderror" name="fifth_heading">
        
                                        @error('fifth_heading')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror                                
                                    </div>
        
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Fifth Content</label>
                                        <textarea name="fifth_content" class="form-control @error('fifth_content') is-invalid @enderror" rows="4">{{ $OurPhilosophy->fifth_content }}</textarea>
        
                                        @error('fifth_content')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Sixth Heading</label>
                                        <input type="text" value="{{ $OurPhilosophy->sixth_heading }}" id="sixth_heading" class="form-control @error('sixth_heading') is-invalid @enderror" name="sixth_heading">
        
                                        @error('sixth_heading')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror                                
                                    </div>
        
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Second Content</label>
                                        <textarea name="sixth_content" rows="4" class="form-control @error('sixth_content') is-invalid @enderror">{{ $OurPhilosophy->sixth_content }}</textarea>
        
                                        @error('sixth_content')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <input type="file" value="" id="insert_philosophy_Image" class="form-control @error('insert_philosophy_Image') is-invalid @enderror" name="insert_philosophy_Image">

                                @error('insert_philosophy_Image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>
                            <button type="submit" class="btn btn-primary mb-0">Update</button>
                        </form>

                        <section>
                            <div class="row justify-content-left mt-3 mb-3">
                                <div class="col-lg-12 col-md-6 col-xs-12">
                                    <div class="card mcard" id="philosophy_Image">
                                        <img src="{{ $OurPhilosophy->image }}" alt="" srcset="">
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