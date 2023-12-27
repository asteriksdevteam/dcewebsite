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
    .dataTables_empty{
        display: none;
    }
</style>

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Currency</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
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
                        <h5 class="mb-4">Add Currency Here</h5>
                        <form method="post" action="" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Flag Image</label>
                                        <input type="hidden" name="id" class="form-control currncy_id" id="id">
                                        <input type="file" name="currncy_flag" class="form-control currncy_flag" id="currncy_flag" required>
                                    </div>

                                    <section>
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-3 col-md-6 col-xs-12">
                                                    <div class="card mcard show_currncy_flag">
                                                        <img src="" alt="dce-image" class="show_for_edit_currency_image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <span class="text-danger error-message currncy-flag" id="currncy-flag"></span>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Currency Name</label>
                                        <input type="text" name="currncy_name" class="form-control currncy_name" id="currncy_name" required>
                                    </div>
                                    <span class="text-danger error-message currncy-name" id="currncy-name"></span>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Currency Symbol</label>
                                        <input type="text" name="currncy_symbol" class="form-control currncy_symbol" id="currncy_symbol" required>
                                    </div>
                                    <span class="text-danger error-message currncy-symbol" id="currncy-symbol"></span>
                                </div>
                            </div>
                            <br>
                            <button type="button" class="btn btn-primary mb-0 currency_button">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-4">All Currency</h5>
                        <table class="data-table data-table-feature-for-currency">
                            <thead>
                                <tr>
                                    <th>Currency Image</th>
                                    <th>Currency Name</th>
                                    <th>Currency Symbol</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="display_currency">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
















