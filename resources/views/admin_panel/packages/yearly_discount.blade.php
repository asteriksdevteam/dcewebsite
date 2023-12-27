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
                <h1>Packages</h1>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                @if(session()->has('success'))
                                    <div class="alert alert-success rounded">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                @if(session()->has('message'))
                                    <div class="alert alert-danger rounded">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <h5 class="mb-4">Update Packages Discount</h5>
                                <hr>
                                <form method="post" action="{{ url('store_yearly_discount') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Yearly Discount On Packages: (<span class="text-danger">write only 2 numbers</span>)</label>
                                        <input type="hidden" name="id" id="id" value="{{ $YearlyDiscount->id }}">
                                        <input type="number" value="{{ $YearlyDiscount->yearly_discount }}" class="form-control yearly_discount @error('yearly_discount') is-invalid @enderror" name="yearly_discount" id="yearly_discount" required oninput="this.value = this.value.slice(0, 2);">
                                        @error('yearly_discount')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary mb-0">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection