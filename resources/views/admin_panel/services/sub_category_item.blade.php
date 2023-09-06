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

    #imagePreview img
    {
        width: 100px;
        margin-bottom: 20px;
        margin-right: 20px
    }
    .edit_image_on_work {
        display: inline-flex;
        flex-direction: column;
        text-align: center;
    }
</style>

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Service Works</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
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
                        <h5 class="mb-4">All Service Works</h5>
                        <div style="display: flex; justify-content: end; margin:20px 44px 0 0">
                            <a href="#" class="btn btn-primary cbtn" data-toggle="modal" data-target=".bd-example-modal-lg">Create Service Works</a>
                        </div>
                        <hr>
                        <table class="data-table data-table-feature-for-sub-categories-item">
                            <thead>
                                <tr>
                                    <th>Work Name</th>
                                    <th>Sub Categories Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($SubCategoryItem as $item)
                                    <tr>
                                        <td>{{ $item->item_name }}</td>
                                        <td>{{ $item->SubCategory->sub_category_name }}</td>
                                        <td>
                                            {{-- <a href="" class="btn btn-success btn-sm">Watch Images</a> --}}
                                            <a href="{{ url('delete_sub_category_item/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                            <a href="{{ url('edit_sub_category_item/'.$item->id) }}" 
                                                data-id="{{ $item->id }}" 
                                                data-sub_category_id="{{ $item->sub_category_id }}" 
                                                data-item_name="{{ $item->item_name }}" 
                                                data-toggle="modal" data-target=".bd-example-modal-lg-edit" 
                                                class="btn btn-warning btn-sm edit_sub_category_item">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Service Works</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('create_sub_category_item') }}" method="post" enctype="multipart/form-data" id="exampleFormTopLabels" class="tooltip-right-bottom">
                            @csrf
                            <div class="form-group has-float-label">
                                <input type="text" class="form-control" required name="item_name" id="item_name">
                                <span>Item Name</span>
                            </div>
                            <div class="form-group has-float-label">
                                <input type="file" class="form-control" required name="picture[]" id="picture" multiple>
                                <span>Pictures</span>
                            </div>
                            <div class="form-group has-float-label">
                                <select class="form-control select2-single" name="sub_Category_name" id="sub_Category_name" required data-width="100%">
                                    <option></option>
                                    @foreach($SubCategory as $item)
                                        <option value="{{ $item->id  }}">{{ $item->sub_category_name }}</option>
                                    @endforeach
                                </select>
                                <span>Sub Category</span>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                        <div class="row">
                            <div class="col-md-12" id="imagePreview">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg-edit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Service Works</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('edit_sub_category_work') }}" method="post" enctype="multipart/form-data" class="needs-validation tooltip-label-right" novalidate>
                            @csrf
                            <div class="form-group has-float-label">
                                <input type="hidden" name="id" id="id">
                                <input type="text" class="form-control" required name="edit_item_name" id="edit_item_name">
                                <span>Item Name</span>
                            </div>
                            <div class="form-group has-float-label">
                                <input type="file" class="form-control" name="edit_picture[]" id="edit_picture" multiple>
                                <span>Pictures</span>
                            </div>
                            <div class="form-group has-float-label">
                                <select class="form-control" name="edit_sub_Category_name" id="edit_sub_Category_name" required data-width="100%">
                                    <option></option>
                                    @foreach($SubCategory as $item)
                                        <option value="{{ $item->id }}">{{ $item->sub_category_name }}</option>
                                    @endforeach
                                </select>
                                <span>Sub Category</span>
                            </div>
                            <button class="btn btn-primary" type="submit">Edit</button>
                        </form>
                        <div class="row">
                            <div class="col-md-12 append" id="imagePreview">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection