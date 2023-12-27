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
    .select2
    {
    width: 100% !important;
    height: 50px;
    }
    .select2-container .select2-selection--multiple
    {
        min-height: 40px !important;
        border: 1px solid #d7d7d7 !important;
        border-radius: 0.1rem !important;
    }

</style>

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Meta Tags</h1>
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
        <div class="row mb-4">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">Pages</h5>
                        <div style="display: flex; justify-content: end; margin:20px 44px 0 0">
                            <a href="" class="btn btn-outline-primary cbtn" data-toggle="modal" data-target=".bd-example-modal-lg-create">Create</a>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Page</th>
                                    <th scope="col">Meta Title</th>
                                    <th scope="col">Meta Description</th>
                                    <th scope="col">Meta Keyword</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($MetaTag as $item)
                                    <tr>
                                        <td>{{ $item->page }}</td>
                                        <td>{{ $item->meta_title }}</td>
                                        <td>{{ $item->meta_keyword }}</td>
                                        <td>{{ $item->meta_description }}</td>
                                        <td>
                                            <a href="{{ url('delete_meta_tag/'.$item->id) }}" class="btn btn-outline-danger btn-sm">Delete</a>
                                            <a href="{{ url('edit_meta_tag/'.$item->id) }}" data-id="{{$item->id}}" data-page="{{ $item->page }}" data-meta_title="{{ $item->meta_title }}" data-meta_keyword="{{ $item->meta_keyword }}" data-meta_description="{{ $item->meta_description }}" class="btn btn-outline-warning btn-sm edit_tag">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg-create" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Tags</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('create_meta_tag') }}" method="post" class="needs-validation tooltip-label-right" novalidate>
                            @csrf

                            <div class="form-group position-relative error-l-50">
                                <label>Select Page</label>
                                <select name="page" id="page" class="form-control" required>
                                    <option disabled selected>Select</option>
                                    @foreach($pages_only as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>

                                <div class="invalid-tooltip">
                                    Page is required!
                                </div>
                            </div>

                            <div class="form-group position-relative error-l-50">
                                <label>Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" id="meta_title" required>
                                <div class="invalid-tooltip">
                                    Meta Title is required!
                                </div>
                            </div>

                            <div class="form-group position-relative error-l-50">
                                <label>Meta Keyword</label>
                                <select id="meta_keyword" class="form-control" multiple="multiple" name="meta_keyword[]" required>

                                </select>
                                <div class="invalid-tooltip">
                                    Meta Title is required!
                                </div>
                            </div>

                            <div class="form-group position-relative error-l-50">
                                <label>Meta Description</label>
                                <textarea type="text" class="form-control" rows="4" name="meta_description" id="meta_description" required></textarea>
                                <div class="invalid-tooltip">
                                    Meta Description is required!
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