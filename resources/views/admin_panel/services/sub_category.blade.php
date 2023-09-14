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
                <h1>Sub Categories</h1>
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
                        <h5 class="mb-4">All Sub Categories</h5>
                        <div style="display: flex; justify-content: end; margin:20px 44px 0 0">
                            <a href="#" class="btn btn-primary cbtn" data-toggle="modal" data-target=".bd-example-modal-lg">Create Sub Categories</a>
                        </div>
                        <hr>
                        <table class="data-table data-table-feature-for-sub-categories">
                            <thead>
                                <tr>
                                    <th>Sub Categories Name</th>
                                    <th>Categories Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($SubCategory as $item)
                                <tr>
                                    <td>{{ $item->sub_category_name }}</td>
                                    <td>{{ $item->Category->category_name }}</td>
                                    <td>
                                        <a href="{{ url('delete_sub_category/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                        
                                        <button type="button" class="btn btn-warning btn-sm edit_sub_category" 
                                        data-id="{{$item->id}}" data-slug="{{ $item->slug }}" data-category_name="{{$item->category_id}}" data-sub_category_name="{{ $item->sub_category_name }}" data-toggle="modal" data-target=".bd-example-modal-lg-edit">Edit</button>    
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
                        <h5 class="modal-title">Add Sub Categories</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('create_sub_category') }}" method="post" id="exampleFormTopLabels" class="tooltip-right-bottom">
                            @csrf
                            <div class="form-group has-float-label">
                                <input type="text" class="form-control" required name="sub_category_name" id="sub_category_name">
                                <span>Sub Category</span>
                            </div>

                            <br>

                            <div class="form-group has-float-label">
                                <input type="text" name="slug" id="slug" maxlength="30" required class="form-control" value="{{ old('slug') }}">
                                <span>Slug</span>                    
                            </div>
                            <p id="error" style="color: red;"></p> 

                            <br>

                            <div class="form-group has-float-label">
                                <select class="form-control select2-single" name="Category_name" id="Category_name" required data-width="100%">
                                    <option></option>
                                    @foreach($Category as $item)
                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                    @endforeach
                                </select>
                                <span>Category</span>
                            </div>

                            <button class="btn btn-primary" type="submit">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg-edit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Categories</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('edit_sub_category') }}" method="post" class="needs-validation tooltip-label-right" novalidate>
                            @csrf
                            <input type="hidden" name="id" id="id">

                            <div class="form-group has-float-label">
                                <input type="text" class="form-control" required name="edit_sub_category_name" id="edit_sub_category_name">
                                <span>Sub Category</span>
                            </div>

                            <br>

                            <div class="form-group has-float-label">
                                <input type="text" name="slug" id="edit_slug" maxlength="30" required class="form-control" value="{{ old('slug') }}">
                                <span>Slug</span>                    
                            </div>
                            <p id="error" style="color: red;"></p> 

                            <br>

                            <div class="form-group has-float-label">
                                <select class="form-control" name="edit_Category_name" id="edit_Category_name">
                                    @foreach($Category as $item)
                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                    @endforeach
                                </select>
                                <span>Sub Category</span>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mb-0 testimonails">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection