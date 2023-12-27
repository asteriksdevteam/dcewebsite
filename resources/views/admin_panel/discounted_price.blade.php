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

                <h1>Discounted Offer</h1>
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
                        <h5 class="mb-4">Discounted Offer</h5>
                        <form method="post" action="{{ url('update_discounted_offer') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $DiscountedOffer->id }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" value="{{ $DiscountedOffer->name }}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name">

                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Price</label>
                                <input type="text" value="{{ $DiscountedOffer->price }}" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="price">

                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="" cols="30" rows="5">{{ $DiscountedOffer->description }}</textarea>

                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Image</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="discountImage"> 
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div>

                            <button type="submit" class="btn btn-primary mb-0">Update</button>
                        </form>

                        <section>
                            <div class="row justify-content-left mt-3 mb-3">
                                <div class="col-lg-12 col-md-6 col-xs-12">
                                    <div class="card mcard" id="showDiscountImage">
                                        <img src="{{ asset($DiscountedOffer->image) }}" alt="dce-image" srcset="">
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