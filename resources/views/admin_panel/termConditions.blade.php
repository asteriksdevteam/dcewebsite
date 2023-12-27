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

                <h1>Terms & Conditions</h1>
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
                        <h5 class="mb-4">Terms & Conditions</h5>
                        <form method="post" action="{{ url('update_terms_condition') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $TermsCondition->id }}">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Heading</label>
                                <input type="text" value="{{ $TermsCondition->heading }}" class="form-control @error('heading') is-invalid @enderror" name="heading">

                                @error('heading')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Text</label>
                                <textarea class="textarea_tinyMice @error('text') is-invalid @enderror" name="text" rows="5">{{ $TermsCondition->text }}
                                </textarea>

                                @error('text')
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