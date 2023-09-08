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
                        <h5 class="mb-4">All Service Works</h5>
                        <div style="display: flex; justify-content: end; margin:20px 44px 0 0">
                            <a href="{{ url('service_details') }}" class="btn btn-primary cbtn"><i class="simple-icon-arrow-left"></i> <span class="d-inline-block"> Back</span></a>
                        </div>
                        <form method="post" action="{{ url('create_service_detail') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Categories</label>

                                <select name="sub_category" id="sub_category" class="form-control" value="{{ old('sub_category') }}">
                                    <option value="" disabled selected>Select</option>
                                    @foreach($SubCategory as $item)
                                        <option value="{{ $item->id }}">{{ $item->sub_category_name }}</option>
                                    @endforeach
                                </select>

                                @error('sub_category')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <br>
                            <h2>Add Banner Details</h2>
                            <hr>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Banner Heading</label>

                                <input type="text" name="banner_heading" id="banner_heading" class="form-control" value="{{ old('banner_heading') }}">

                                @error('banner_heading')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Banner Content</label>

                                <textarea name="banner_content" id="banner_content" class="form-control" rows="5" value="{{ old('banner_content') }}"></textarea>

                                @error('banner_content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h2>Add Our Process</h2>
                                </div>
                                <div class="col-lg-6 text-right" >
                                    <h6><a href="javascript:void();" class="add_more">+ Add More Process</a></h6>
                                </div>
                            </div>
                            <hr>

                            <div class="col-lg-12 col-md-12 mb-4">
                                <h5 class="card-title">Bordered Table</h5>
    
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Process Heading</th>
                                            <th scope="col">Process Content</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="append">
                                        <tr>
                                            <th scope="row">1</th>
                                            <input type="hidden" class="row_number" name="row_number" id="row_number" value="1">
                                            <td>
                                                <input type="text" name="process_heading[]" id="process_heading" class="form-control" value="">

                                                @error('process_heading')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                            </td>
                                            <td>
                                                <textarea name="process_content[]" id="process_content" class="form-control" rows="5" value=""></textarea>

                                                @error('process_content')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                            </td>
                                            <td><a href="javascript:void(0);" class="btn btn-danger btn-sm remove" data-id="1">Remove</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <br>
                            <h2>Add Content Details</h2>
                            <hr>

                            <div class="form-group">
                                <label for="exampleInputEmail1">About Content</label>
                                <textarea name="about_content" id="ckEditorClassic" class="form-control" rows="5" value="{{ old('about_content') }}"></textarea>
                                @error('about_content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">About Image</label>
                                <input type="file" name="banner_image_service_detail" id="banner_image_service_detail"  value="{{ old('banner_image_service_detail') }}" class="form-control banner_image_service_detail">
                                @error('banner_image_service_detail')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <section>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-3 col-md-6 col-xs-12">
                                            <div class="card mcard banner_image_service_detail_display" id="banner_image_service_detail_display">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <button type="submit" class="btn btn-primary mb-0">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection