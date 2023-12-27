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
        max-width: 300px !important;
    }
</style>

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Packages</h1>
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
                        <h5 class="mb-4">List Of Packages</h5>
                        <div style="display: flex; justify-content: end; margin:20px 44px 0 0">
                            <a href="{{ url('create_packeage') }}" class="btn btn-outline-primary cbtn">
                                <span class="d-inline-block"> Create Packages</span> 
                                <i class="simple-icon-arrow-right"></i> 
                            </a>
                        </div>
                        <hr>
                        <table class="data-table data-table-feature-for-packages">
                            <thead>
                                <tr>
                                    <th>Sub Categories</th>
                                    <th>Package Types</th>
                                    <th>Package Names</th>
                                    <th>Package Actual Prices</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Packages as $item)
                                    <tr>
                                        <td>{{ $item->SubCategory->sub_category_name }}</td>
                                        
                                        @if($item->package_type !="")
                                            <td>{{ ucfirst($item->package_type) }}</td>
                                        @else
                                            <td class="text-danger">Custimize Packages</td>
                                        @endif

                                        @if($item->name !="")
                                            <td>{{ ucfirst($item->name) }}</td>
                                        @else
                                            <td class="text-danger">Custimize Packages</td>
                                        @endif
                                        
                                        <td>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Country Name</th>
                                                    <th>Actual Price</th>
                                                    <th>Yearly Price</th>
                                                </tr>
                                                @if(count($item->PackagesPricesForAdmin) === 0)
                                                    <tr>
                                                        <td><small class="text-danger">Custom Price</small></td>
                                                        <td><small class="text-danger">Custom Price</small></td>
                                                        <td><small class="text-danger">Custom Price</small></td>
                                                    </tr>
                                                @endif
                                                @foreach($item->PackagesPricesForAdmin as $itemPackagesPricesForAdmin)
                                                    <tr>
                                                        <td><small>{{ $itemPackagesPricesForAdmin->country_name }}</small></td>
                                                        <td><small>{{ $itemPackagesPricesForAdmin->country_actual_price }}</small></td>
                                                        <td><small>{{ $itemPackagesPricesForAdmin->country_actual_yearly_price }}</small></td>
                                                    </tr>
                                                @endforeach
                                                
                                            </table>
                                            {{-- {{ $item->PackagesPricesForAdmin }} --}}
                                        </td>
                                        
                                        <td>
                                            <a href="{{ url('delete_packages/'.$item->id) }}" class="btn btn-outline-danger btn-sm">Delete</a>
                                            <a href="{{ url('edit_packages/'.$item->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Question Answer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ url('add_question_asnwer') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Add Question</label>
                                <input type="text" name="question" id="question" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Add Answer</label>
                                <textarea name="answer" id="answer" class="form-control" rows="5" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mb-0">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg-edit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Question Answer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ url('add_question_asnwer') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Edit Question</label>
                                <input type="hidden" name="edit_id" id="edit_id" class="form-control" required>
                                <input type="text" name="edit_question" id="edit_question" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Edit Answer</label>
                                <textarea name="edit_answer" id="edit_answer" class="form-control" rows="5" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mb-0">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</main>

@endsection
















