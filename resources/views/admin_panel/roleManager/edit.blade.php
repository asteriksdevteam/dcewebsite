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
                <h1>All Roles With Managers</h1>
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
                        <h5 class="mb-4">Roles / Managers</h5>
                        <div style="display: flex; justify-content: end; margin:20px 44px 0 0">
                            <a href="{{ url("roles_managers") }}" class="btn btn-primary cbtn">Back</a>
                        </div>
                        <hr>
                        <form action="#"  class="needs-validation tooltip-label-right" novalidate>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group position-relative error-l-50">
                                        <label>Roles</label>
                                        <input type="hidden" value="{{ $User->id }}" class="edit_id" name="edit_id">
                                        <select class="form-control select2-multiple edit_roles" multiple="multiple" name="roles" id="roles">
                                            @foreach($Role as $item)
                                                <option value="{{ $item->id }}" {{ in_array($item->id, $UserSelectedRole) ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-tooltip-roles text-danger">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group position-relative error-l-50">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" value="{{ $User->name }}" class="form-control edit_name" placeholder="" required>
                                        <div class="invalid-tooltip-name text-danger">
                
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group position-relative error-l-50">
                                        <label>Email</label>
                                        <input disabled type="Email" name="email" id="email" value="{{ $User->email }}" class="form-control edit_email" placeholder="" required>
                                        <div class="invalid-tooltip-email text-danger">
                
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn btn-primary mb-0 update_roles_managers">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection