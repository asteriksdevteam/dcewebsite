@extends('admin_panel.layout.app')
@section('content')

<style>
    .cbtn
    {
        width:fit-content;
    }
    .mcardd
    {
        box-shadow: none;
    }
    .mcardd img 
    {
        width: 155px;
        display: block;
        position: relative;
        margin: auto;
    }
    .cth
    {
        max-width: 100px !important;
        max-height: 50px !important;
    }
    .service-img
    {
        width: 100px;
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
                <h1>Service</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Library</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12 mb-4">
                @if(session()->has('message'))
                    <div class="alert alert-danger rounded">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success rounded">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-4">All Services</h5>
                        <div style="display: flex; justify-content: end; margin:20px 44px 0 0">
                            <a href="#" class="btn btn-primary cbtn" data-toggle="modal" data-backdrop="static" data-target="#exampleModalRight">Create Services</a>
                        </div>
                        <hr>
                        <table class="data-table data-table-feature-for-services">
                            <thead>
                                <tr>
                                    <th style="width:250px">Name</th>
                                    <th style="width:313px">Description</th>
                                    <th class="cth">Images</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($OurServicesHome as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{!! $item->description !!}</td>
                                        <td> <img src="{{ asset($item->image) }}" class="service-img" alt="dce-image" srcset=""></td>
                                        <td>
                                            <a href="{{ url('delete_our_services/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                            
                                            <button type="button" class="btn btn-warning btn-sm edit_Services" 
                                            data-id="{{$item->id}}" data-name="{{$item->name}}" data-description="{{$item->description}}" data-image="{{$item->image}}" 
                                            data-toggle="modal" data-target=".bd-example-modal-lg-edit">Edit</button>  
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="exampleModalRight" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalRight" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Services For Home Page</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="col-12 col-lg-12 mb-5">
                            <form action="{{ url('create_service_for_home_page') }}" enctype="multipart/form-data" method="post" class="needs-validation tooltip-label-right" novalidate>
                                @csrf
                                <div class="form-group position-relative error-l-50">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="" required>
                                    <div class="invalid-tooltip">
                                        Name is required!
                                    </div>
                                </div>

                                <div class="form-group position-relative error-l-50">
                                    <label>Description</label>
                                    <textarea class="textarea_tinyMice @error('text') is-invalid @enderror" name="description" rows="7" required>
                                    </textarea>
                                    
                                    <div class="invalid-tooltip">
                                        Description is required!
                                    </div>
                                </div>


                                <div class="form-group position-relative error-l-50">
                                    <label>Images</label>
                                    <input type="file" placeholder="" name="images" id="images" class="form-control" required>
                                    <div class="invalid-tooltip">
                                        Images is required!
                                    </div>
                                </div>

                                <section>
                                    <div class="row justify-content-left mt-3 mb-3">
                                        <div class="col-lg-12 col-md-6 col-xs-12">
                                            <div class="card mcard" id="images_show">
                                                <img src="" alt="dce-image" srcset="">
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <button type="submit" class="btn btn-primary mb-0 testimonails">Submit</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg-edit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Services For Home Page</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('update_service_for_home_page') }}" enctype="multipart/form-data" method="post" class="needs-validation tooltip-label-right" novalidate>
                            @csrf
                            <div class="form-group position-relative error-l-50">
                                <label>Name</label>
                                <input type="hidden" name="edit_service_id" id="edit_service_id" class="form-control edit_service_id" required>
                                <input type="text" name="service_name" id="edit_service_name" class="form-control edit_service_name" required>
                                <div class="invalid-tooltip">
                                    Name is required!
                                </div>
                            </div>

                            <div class="form-group position-relative error-l-50">
                                <label>Description</label>
                                <textarea type="text" name="service_description" id="edit_service_description"  class="textarea_tinyMice form-control edit_service_description" required></textarea>
                                <div class="invalid-tooltip">
                                    Description is required!
                                </div>
                            </div>


                            <div class="form-group position-relative error-l-50">
                                <label>Images</label>
                                <input type="file" placeholder="" name="images" id="edit_images" class="form-control">
                                <div class="invalid-tooltip">
                                    Images is required!
                                </div>
                            </div>

                            <section>
                                <div class="row justify-content-left mt-3 mb-3">
                                    <div class="col-lg-12 col-md-6 col-xs-12">
                                        <div class="card mcard" id="edit_images_show">
                                            <img src="" alt="dce-image" srcset="" id="edit_image_display" width="10%">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <button type="submit" class="btn btn-primary mb-0 testimonails">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection