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
                <h1>Service Details</h1>
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
                        <h5 class="mb-4">List Of Service Details</h5>
                        <div style="display: flex; justify-content: end; margin:20px 44px 0 0">
                            <a href="{{ url('add_service_detail') }}" class="btn btn-primary cbtn">Create Service Detail</a>
                        </div>
                        <hr>
                        <table class="data-table data-table-feature-for-categories">
                            <thead>
                                <tr>
                                    <th>Sub Category Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ServiceDetail as $item)
                                <tr>
                                    <td>{{ $item->SubCategory->sub_category_name }}</td>
                                    <td>
                                        <a href="{{ url('delete_our_services/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                        
                                        <button type="button" class="btn btn-warning btn-sm edit_Services" 
                                        data-id="{{$item->id}}" data-toggle="modal" data-target=".bd-example-modal-lg">Edit</button>  
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection