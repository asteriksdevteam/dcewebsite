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
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <h5 class="mb-4">Our Philosophy</h5>
                        <form method="post" action="{{ url('update_counter') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $AboutCounter->id }}">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Counter 1</label>
                                        <input type="number" value="{{ $AboutCounter->counter1 }}" id="counter1" class="form-control @error('counter1') is-invalid @enderror" name="counter1">
        
                                        @error('counter1')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror                                
                                    </div>
        
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Counter 1 Name</label>
                                        <input type="text" value="{{ $AboutCounter->counter1_name }}" name="counter1_name" class="form-control @error('counter1_name') is-invalid @enderror" class="form-control">
        
                                        @error('counter1_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Counter 2</label>
                                        <input type="number" value="{{ $AboutCounter->counter2 }}" id="counter2" class="form-control @error('counter2') is-invalid @enderror" name="counter2">
        
                                        @error('counter2')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror                                
                                    </div>
        
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Counter 2 Name</label>
                                        <input type="text" value="{{ $AboutCounter->counter2_name }}" name="counter2_name" class="form-control @error('counter2_name') is-invalid @enderror" class="form-control">
        
                                        @error('counter2_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Counter 3</label>
                                        <input type="number" value="{{ $AboutCounter->counter3 }}" id="counter3" class="form-control @error('counter3') is-invalid @enderror" name="counter3">
        
                                        @error('counter3')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror                                
                                    </div>
        
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Counter 3 Name</label>
                                        <input type="text" value="{{ $AboutCounter->counter3_name }}" name="counter3_name" class="form-control @error('counter3_name') is-invalid @enderror" class="form-control">
        
                                        @error('counter3_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Counter 4</label>
                                        <input type="number" value="{{ $AboutCounter->counter4 }}" id="counter4" class="form-control @error('counter4') is-invalid @enderror" name="counter4">
        
                                        @error('counter4')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror                                
                                    </div>
        
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Counter 4 Name</label>
                                        <input type="text" value="{{ $AboutCounter->counter4_name }}" name="counter4_name" class="form-control @error('counter4_name') is-invalid @enderror" class="form-control">
        
                                        @error('counter4_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <input type="file" value="" id="counter_Image" class="form-control @error('counter_Image') is-invalid @enderror" name="counter_Image">

                                @error('counter_Image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>
                            <button type="submit" class="btn btn-primary mb-0">Update</button>
                        </form>

                        <section>
                            <div class="row justify-content-left mt-3 mb-3">
                                <div class="col-lg-12 col-md-6 col-xs-12">
                                    <div class="card mcard" id="show_counter_Image">
                                        <img src="{{ asset($AboutCounter->counter_image) }}" alt="dce-image" srcset="">
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