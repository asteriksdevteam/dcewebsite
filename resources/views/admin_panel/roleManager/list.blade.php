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
                            <a href="#" class="btn btn-primary cbtn" data-toggle="modal" data-backdrop="static" data-target="#exampleModalRight">Create Roles & Managers</a>
                        </div>
                        <hr>
                        <table class="data-table data-table-feature-for-roleManager">
                            <thead>
                                <tr>
                                    <th>Role</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($User as $item)
                                <tr>
                                    <td>{{ implode(' | ',$item->roles()->pluck('name')->toArray() ) }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <a href="{{ url("edit_managers/".$item->id) }}" data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-email="{{ $item->email }}" data-roles="{{ $item->roles->first()->id }}" data-roles1="{{ implode(', ',$item->roles()->pluck('id')->toArray()) }}" class="btn btn-sm btn-info btn-active-primary editManagers" id="editManagers">Edit</a>
                                        <a href="{{ url("delete_managers/".$item->id) }}" class="btn btn-sm btn-danger btn-active-primary deleteManagers">Delete</a>
                                        <a href="javascript:void();" data-id="{{ $item->id }}" data-toggle="modal" data-backdrop="static" data-target="#UpdatePassword" class="btn btn-sm btn-warning btn-active-warning editManagersPassword">Update Password</a>
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

<div class="modal fade modal-right" id="exampleModalRight" tabindex="-1" role="dialog" aria-labelledby="exampleModalRight" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Roles / Managers</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="col-12 col-lg-12 mb-5">
                    <form action="#" class="needs-validation tooltip-label-right" novalidate>

                        <div class="form-group position-relative error-l-50">
                            <label>Roles</label>
                            <select class="form-control select2-multiple roles" multiple="multiple" name="roles[]" id="roles">
                                @foreach($Role as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-tooltip-roles text-danger">

                            </div>
                        </div>

                        <div class="form-group position-relative error-l-50">
                            <label>Name</label>
                            <input type="text" name="name" id="name" class="form-control create_name" placeholder="" required>
                            <div class="invalid-tooltip-name text-danger">

                            </div>
                        </div>

                        <div class="form-group position-relative error-l-50">
                            <label>Email</label>
                            <input type="Email" name="email" id="email" class="form-control email" placeholder="" required>
                            <div class="invalid-tooltip-email text-danger">

                            </div>
                        </div>

                        <div class="form-group position-relative error-l-50">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control password" rows="4" required>
                            <div class="invalid-tooltip-password text-danger">

                            </div>
                        </div>

                        <div class="form-group position-relative error-l-50">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control confirm_password" rows="4" required>
                            <div class="invalid-tooltip-confirmPassword text-danger">

                            </div>
                        </div>

                        <button type="button" class="btn btn-primary mb-0 create_roles_managers">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Role Manager</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" class="needs-validation tooltip-label-right" novalidate>

                    <div class="form-group position-relative error-l-50">
                        <label>Roles</label>
                        <input type="hidden" class="edit_id" name="edit_id">
                        <select class="form-control select2-multiple edit_roles" multiple="multiple" name="roles" id="roles">
                            <option disabled selected>Select</option>
                            @foreach($Role as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-tooltip-roles text-danger">

                        </div>
                    </div>

                    <div class="form-group position-relative error-l-50">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control edit_name" placeholder="" required>
                        <div class="invalid-tooltip-name text-danger">

                        </div>
                    </div>

                    <div class="form-group position-relative error-l-50">
                        <label>Email</label>
                        <input disabled type="Email" name="email" id="email" class="form-control edit_email" placeholder="" required>
                        <div class="invalid-tooltip-email text-danger">

                        </div>
                    </div>

                    <button type="button" class="btn btn-primary mb-0 update_roles_managers">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}

<div class="modal fade bd-example-modal-lg" id="UpdatePassword" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Passwords</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" class="needs-validation tooltip-label-right" novalidate>

                    <input type="hidden" class="edit_password_id" name="edit_password_id">
                    <div class="form-group position-relative error-l-50">
                        <label>Update Password</label>
                        <input type="password" name="password" id="password" class="form-control edit_password" required>
                        <div class="invalid-tooltip-edit-password text-danger">

                        </div>
                    </div>

                    <div class="form-group position-relative error-l-50">
                        <label>Update Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control edit_confirm_password" required>
                        <div class="invalid-tooltip-edit-confirmPassword text-danger">

                        </div>
                    </div>

                    <button type="button" class="btn btn-primary mb-0 updatepassword_roles_managers">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection