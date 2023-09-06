@extends('admin_panel.layout.app');
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
        max-width: 300px !important;
    }
</style>

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Testimonails</h1>
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
                        <h5 class="mb-4">All Testimonails</h5>
                        <div style="display: flex; justify-content: end; margin:20px 44px 0 0">
                            <a href="#" class="btn btn-primary cbtn" data-toggle="modal" data-backdrop="static" data-target="#exampleModalRight">Create Testimonials</a>
                        </div>
                        <hr>
                        <table class="data-table data-table-feature-for-testimonials">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th class="cth">Images</th>
                                    <th>Comments</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Testimonails as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->designation }}</td>
                                        <td>{{ $item->comment }}</td>
                                        <td>
                                            <section>
                                                <div class="row justify-content-left mt-3 mb-3">
                                                    <div class="col-lg-12 col-md-6 col-xs-12">
                                                        <div class="card mcardd" id="">
                                                            <img src="{{ $item->image }}" alt="" srcset="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </td>
                                        <td>
                                            <a href="{{ url('delete_testimonials/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                            
                                            <button type="button" class="btn btn-warning btn-sm edit_testimonials" 
                                            data-id="{{$item->id}}" data-name="{{$item->name}}" data-designation="{{$item->designation}}" 
                                            data-comment="{{$item->comment}}" data-image="{{$item->image}}" 
                                            data-toggle="modal" data-target=".bd-example-modal-lg">Edit</button>    
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade modal-right" id="exampleModalRight" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalRight" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Testimonials</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="col-12 col-lg-12 mb-5">
                            <form class="needs-validation tooltip-label-right" novalidate>

                                <div class="form-group position-relative error-l-50">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="" required>
                                    <div class="invalid-tooltip">
                                        Name is required!
                                    </div>
                                </div>

                                <div class="form-group position-relative error-l-50">
                                    <label>Designation</label>
                                    <input type="text" name="designation" id="designation" class="form-control" placeholder="" required>
                                    <div class="invalid-tooltip">
                                        Designation is required!
                                    </div>
                                </div>

                                <div class="form-group position-relative error-l-50">
                                    <label>Comments</label>
                                    <textarea placeholder="" name="comments" id="comments" class="form-control" rows="4" required></textarea>
                                    <div class="invalid-tooltip">
                                        Comment is required!
                                    </div>
                                </div>

                                <div class="form-group position-relative error-l-50">
                                    <label>Images</label>
                                    <input type="file" placeholder="" name="testimonial_images" id="testimonial_images" class="form-control" required>
                                    <div class="invalid-tooltip">
                                        Images is required!
                                    </div>
                                </div>

                                <section>
                                    <div class="row justify-content-left mt-3 mb-3">
                                        <div class="col-lg-12 col-md-6 col-xs-12">
                                            <div class="card mcard" id="testimonial_images_show">
                                                <img src="" alt="" srcset="">
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

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Testimonials</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('update_testimonails') }}" method="post" enctype="multipart/form-data" class="needs-validation tooltip-label-right" novalidate>
                            @csrf
                            <div class="form-group position-relative error-l-50">
                                <label>Name</label>
                                <input type="hidden" name="edit_id" id="edit_id">
                                <input type="text" name="name" id="edit_name" class="form-control" placeholder="" required>
                                <div class="invalid-tooltip">
                                    Name is required!
                                </div>
                            </div>

                            <div class="form-group position-relative error-l-50">
                                <label>Designation</label>
                                <input type="text" name="designation" id="edit_designation" class="form-control" placeholder="" required>
                                <div class="invalid-tooltip">
                                    Designation is required!
                                </div>
                            </div>

                            <div class="form-group position-relative error-l-50">
                                <label>Comments</label>
                                <textarea placeholder="" name="comments" id="edit_comments" class="form-control" rows="8" required></textarea>
                                <div class="invalid-tooltip">
                                    Comment is required!
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" placeholder="" name="edit_testimonial_images" id="edit_testimonial_images" class="form-control">
                            </div>

                            <section>
                                <div class="row justify-content-left mt-3 mb-3">
                                    <div class="col-lg-12 col-md-6 col-xs-12">
                                        <div class="card mcard" id="edit_testimonial_images_show">
                                            <img id="testimonialImage" src="" alt="" srcset="" width="20%">
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