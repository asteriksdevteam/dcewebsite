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
    .tox-notifications-container 
    {
        display: none;
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
                                <h5 class="mb-4">Create Packages</h5>
                                <div style="display: flex; justify-content: end; margin:20px 44px 0 0">
                                    <a href="{{ url('packages') }}" class="btn btn-outline-primary cbtn">
                                        <span class="d-inline-block"> Back</span> 
                                        <i class="simple-icon-arrow-right"></i> 
                                    </a>
                                </div>
                                <hr>
                                <form method="post" action="{{ url('store_package') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Subcategory</label>
                                        <select name="subcategory" id="subcategory" class="form-control subcategory @error('subcategory') is-invalid @enderror" required>
                                            <option disabled selected value="">Select</option>
                                            @foreach($SubCategory as $item)
                                                <option value="{{ $item->id }}">{{ $item->sub_category_name }}</option>
                                            @endforeach
                                        </select>        
                                        @error('subcategory')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><h6 class="text-danger">If you want a personalized package, please check it.</h6></label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" style="transform: scale(1.2);" id="customize_packages" name="customize_packages" class="@error('customize_packages') is-invalid @enderror">
                                        @error('want_pricing_or_not')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                    
                                    <div class="customize_packages_div_two">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Package Type</label>
                                            <select name="package_type" id="package_type" class="form-control package_type @error('package_type') is-invalid @enderror" required>
                                                <option disabled selected>Select</option>
                                                <option value="basic" id="package_type_basic">Basic</option>
                                                <option value="intermediate" id="package_type_intermediate">Intermediate</option>
                                                <option value="advance" id="package_type_advance">Advance</option>
                                                <option value="others">Others</option>
                                            </select>        
                                            @error('package_type')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Package Name</label>
                                            <input type="text" class="form-control name @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="name" required>
            
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Package Description</label>
                                            <textarea rows="5" class="form-control discription @error('discription') is-invalid @enderror" name="discription" id="discription" required>{{ old('discription') }}</textarea>
                                        
                                            @error('discription')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror 
                                        </div>
                                    </div>
                                    <div class="customize_packages_div_one">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Package List</label>
                                            <textarea name="Package_list" class="textarea_tinyMice @error('Package_list') is-invalid @enderror" required>{{ old('Package_list') }}</textarea>
            
                                            @error('Package_list')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror 
                                        </div>
                                    </div>
                                    <br>
                                    <div class="customize_packages_div_two">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><h6 class="text-danger">If you donot want pricing in this package please check it.</h6></label>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="checkbox" style="transform: scale(1.2);" id="want_pricing_or_not" name="want_pricing_or_not" class="@error('want_pricing_or_not') is-invalid @enderror">{{ old('want_pricing_or_not') }}</textarea>
                                            @error('want_pricing_or_not')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror 
                                        </div>
                                        <br>
                                        @foreach($Currency as $item)
                                            <div class="row currency-fields">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Currency</label>
                                                        <input disabled type="text" value="{{ $item->name }}" class="form-control" name="" id="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Cut Price</label>
                                                        <input type="number" class="form-control price" name="price_{{ $item->name }}" id="price" value="{{ old('price_' . $item->name) }}" required>
                        
                                                        @error('price_' . $item->name)
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Actual Price</label>
                                                        <input type="number" class="form-control actual_price" name="actual_price_{{ $item->name }}" data-val="{{ $item->name }}" id="actual_price" value="{{ old('actual_price_' . $item->name) }}" required>
                        
                                                        @error('actual_price_' . $item->name)
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Yearly Price</label>
                                                        <input disabled type="number" class="form-control yearly_price yearly_price_{{ $item->name }}" name="yearly_price_{{ $item->name }}" id="yearly_price" value="{{ old('yearly_price_' . $item->name) }}" required>
                        
                                                        @error('yearly_price')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror 
                                                    </div>
                                                </div>
    
                                            </div>
                                        @endforeach
                                    </div>


                                    <button type="submit" class="btn btn-outline-primary mb-0">Create</button>
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