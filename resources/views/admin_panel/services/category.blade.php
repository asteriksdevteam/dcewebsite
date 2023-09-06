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
                <h1>Categories</h1>
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
                        <h5 class="mb-4">All Categories</h5>
                        <div style="display: flex; justify-content: end; margin:20px 44px 0 0">
                            <a href="#" class="btn btn-primary cbtn" data-toggle="modal" data-target=".bd-example-modal-lg">Create Categories</a>
                        </div>
                        <hr>
                        <table class="data-table data-table-feature-for-categories">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Category as $item)
                                <tr>
                                    <td>{{ $item->category_name }}</td>
                                    <td>
                                        <a href="{{ url('delete_category/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                        
                                        <button type="button" class="btn btn-warning btn-sm edit_category" 
                                        data-id="{{$item->id}}" data-category_name="{{$item->category_name}}" data-toggle="modal" data-target=".bd-example-modal-lg-edit">Edit</button>    
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
                        <h5 class="modal-title">Add Categories</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('create_category') }}" method="post" class="needs-validation tooltip-label-right" novalidate>
                            @csrf
                            <div class="form-group position-relative error-l-50">
                                <label>Category Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="" required>
                                <div class="invalid-tooltip">
                                    Category Name is required!
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mb-0 testimonails">Submit</button>
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
                        <form action="{{ url('edit_category') }}" method="post" class="needs-validation tooltip-label-right" novalidate>
                            @csrf
                            <div class="form-group position-relative error-l-50">
                                <label>Category Name</label>
                                <input type="hidden" name="edit_category_id" id="edit_category_id">
                                <input type="text" name="edit_category_name" id="edit_category_name" class="form-control" placeholder="" required>
                                <div class="invalid-tooltip">
                                    Category Name is required!
                                </div>
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