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
    .tox-notifications-container 
    {
        display: none;
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
                        <h5 class="mb-4">Edit Service Details</h5>
                        <div style="display: flex; justify-content: end; margin:20px 44px 0 0">
                            <a href="{{ url('service_details') }}" class="btn btn-primary cbtn"><i class="simple-icon-arrow-left"></i> <span class="d-inline-block"> Back</span></a>
                        </div>
                        <form method="post" action="{{ url('update_service_details') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="{{$EditServiceDetail->id}}">
                                <label for="exampleInputEmail1">Sub Categories</label>

                                <select name="sub_category" id="edit_service_detal_sub_category" class="form-control edit_service_detal_sub_category" value="{{ old('sub_category') }}">
                                    <option value="" disabled selected>Select</option>
                                    @foreach($SubCategory as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $EditServiceDetail->sub_category ? "selected" : ""}}>{{ $item->sub_category_name }}</option>
                                    @endforeach
                                </select>

                                @error('sub_category')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>
                            
                            <br>
                            <h2>Add Meta Tags</h2>
                            <hr>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" value="{{ $EditServiceDetail->meta_title }}" id="meta_title" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Meta Keyword</label>
                                <select id="meta_keyword" class="form-control" multiple="multiple" name="meta_keyword[]" required>
                                    @foreach($explode_meta_keyword as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Meta Description</label>
                                <textarea type="text" name="meta_description" rows="5" class="form-control" id="meta_description" required>{{ $EditServiceDetail->meta_description }}</textarea>
                            </div>

                            <br>
                            <h2>Add Second Banner Details</h2>
                            <hr>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Second Banner</label>
                                
                                <textarea name="second_banner" class="textarea_tinyMice @error('second_banner') is-invalid @enderror" rows="5" value="{{ old('second_banner') }}">{{ $EditServiceDetail->second_banner }}</textarea>
                                @error('second_banner')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>
                            <br>
                            <h2>Edit Banner Details</h2>
                            <hr>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Banner Heading</label>

                                <input type="text" name="banner_heading" id="banner_heading" class="form-control" value="{{ $EditServiceDetail->banner_heading }}">

                                @error('banner_heading')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Banner Content</label>

                                <textarea name="banner_content" id="banner_content" class="form-control" rows="5">{{ $EditServiceDetail->banner_content }}</textarea>

                                @error('banner_content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Banner Image</label>

                                <input type="file" name="first_banner_image" id="first_banner_image" class="form-control" value="{{ old('first_banner_image') }}">

                                @error('first_banner_image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <section>
                                <div class="row justify-content-start">
                                    <div class="col-lg-2 col-md-3 col-xs-12">
                                        <div class="card mcard first_banner_image_service_detail_display" id="first_banner_image_service_detail_display">
                                            <img src="{{ asset($EditServiceDetail->first_banner_image) }}">
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h2>Edit Our Process</h2>
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
                                            <th scope="col">Image</th>
                                            <th scope="col">Process Heading</th>
                                            <th scope="col">Process Content</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="append">
                                        @foreach($EditServiceDetail->ServiceDetailProcess as $key => $item)
                                            <tr>
                                                <th scope="row">{{ ++$key }}</th>
                                                <input type="hidden" class="row_number" name="row_number" id="row_number" value="{{ ++$key}}">
                                                <input type="hidden" class="process_id" name="process_id[]" id="process_id" value="{{ $item->id }}">
                                                <td>
                                                    <input type="file" name="process_image[]" id="process_image" class="form-control" value="">
    
                                                    @error('process_image')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror 

                                                    <br>

                                                    <section>
                                                        <div class="container">
                                                            <div class="row justify-content-center">
                                                                <div class="col-lg-3 col-md-6 col-xs-12">
                                                                    <div class="card mcard" id="">
                                                                        <img src="{{ asset($item->image) }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </td>
                                                <td>
                                                    <input type="text" name="process_heading[]" id="process_heading" class="form-control" value="{{ $item->heading }}">

                                                    @error('process_heading')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror 
                                                </td>
                                                <td>
                                                    <textarea name="process_content[]" id="process_content" class="form-control" rows="5" value="">{{ $item->content }}</textarea>

                                                    @error('process_content')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror 
                                                </td>
                                                <td><a href="javascript:void(0);" class="btn btn-danger btn-sm remove" data-id="1" data-data_id="{{ $item->id }}">Remove</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Process Paragraph</label>

                                <textarea name="process_paragraph" id="process_paragraph" class="form-control" rows="5" value="{{ old('process_paragraph') }}">{{ $EditServiceDetail->process_content }}</textarea>

                                @error('process_paragraph')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <br>
                            <h2>Info Banner</h2>
                            <hr>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Info Heading</label>

                                <input type="text" value="{{ $EditServiceDetail->info_banner_heading }}" name="info_banner_heading" id="info_banner_heading" class="form-control" value="{{ old('info_banner_heading') }}">

                                @error('info_banner_heading')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Info Content</label>

                                <textarea name="info_banner_content" id="info_banner_content" class="form-control" rows="5" value="{{ old('info_banner_content') }}">{{ $EditServiceDetail->info_banner_content }}</textarea>

                                @error('info_banner_content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Info Link</label>

                                <input type="text" value="{{ $EditServiceDetail->info_banner_button_link }}" name="info_banner_button_link" id="info_banner_button_link" class="form-control" rows="5" value="{{ old('info_banner_button_link') }}">

                                @error('info_banner_button_link')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Info Image</label>

                                <input type="file" name="info_banner_image" id="info_banner_image" class="form-control" value="{{ old('info_banner_image') }}">

                                @error('info_banner_image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <section>
                                <div class="row justify-content-start">
                                    <div class="col-lg-2 col-md-3 col-xs-12">
                                        <div class="card mcard info_banner_image_service_detail_display" id="info_banner_image_service_detail_display">
                                            <img src="{{ asset($EditServiceDetail->info_banner_image) }}">
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <br>
                            <h2>Edit Content Details</h2>
                            <hr>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">About Content</label>
                                
                                <textarea name="about_content" class="textarea_tinyMice @error('about_content') is-invalid @enderror" rows="5" value="{{ old('about_content') }}">{{ $EditServiceDetail->about_content }}</textarea>
                                @error('about_content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">About Image</label>
                                <input type="file" name="banner_image_service_detail" id="banner_image_service_detail" class="form-control banner_image_service_detail">
                                @error('banner_image_service_detail')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                                
                            </div>

                            <section>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-3 col-md-6 col-xs-12">
                                            <div class="card mcard banner_image_service_detail_display" id="banner_image_service_detail_display">
                                                <img src="{{ asset($EditServiceDetail->banner_image_service_detail) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <br>
                                <h2>Add Testimonial 2</h2>
                            <hr>

                            <div class="col-lg-12 col-md-12 mb-4">    
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Heading</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Designation</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Content</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <input type="hidden" class="row_number" name="row_number" id="row_number" value="1">
                                            <td>
                                                <input type="text" name="testimonial_heading_1" id="testimonial_heading_1" class="form-control" value="{{ $EditServiceDetail->ServiceDetailTestimonails->testimonial_heading_1 }}">
 
                                                @error('testimonial_heading_1')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                            </td>
                                            <td>
                                                <input type="text" name="testimonial_name_1" id="testimonial_name_1" class="form-control" value="{{ $EditServiceDetail->ServiceDetailTestimonails->testimonial_name_1 }}">

                                                @error('testimonial_name_1')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                            </td>
                                            <td>
                                                <input type="text" name="testimonial_designation_1" id="testimonial_designation_1" class="form-control" value="{{ $EditServiceDetail->ServiceDetailTestimonails->testimonial_designation_1 }}">

                                                @error('testimonial_designation_1')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                            </td>
                                            <td>
                                                <input type="file" name="testimonial_image_1" id="testimonial_image_1" class="form-control" value="">

                                                @error('testimonial_image_1')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 

                                                <br>

                                                <section>
                                                    <div class="container">
                                                        <div class="row justify-content-center">
                                                            <div class="col-lg-3 col-md-6 col-xs-12">
                                                                <div class="card mcard services_testimonial_image_1" id="services_testimonial_image_1">
                                                                    <img src="{{ asset($EditServiceDetail->ServiceDetailTestimonails->testimonial_image_1) }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </td>
                                            <td>
                                                <textarea name="testimonial_content_1" id="testimonial_content_1" class="form-control" rows="5" value="">{{ $EditServiceDetail->ServiceDetailTestimonails->testimonial_content_1 }}</textarea>

                                                @error('testimonial_content_1')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <input type="hidden" class="row_number" name="row_number" id="row_number" value="1">
                                            <td>
                                                <input type="text" name="testimonial_heading_2" id="testimonial_heading_2" class="form-control" value="{{ $EditServiceDetail->ServiceDetailTestimonails->testimonial_heading_2 }}">

                                                @error('testimonial_heading_2')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                            </td>
                                            <td>
                                                <input type="text" name="testimonial_name_2" id="testimonial_name_2" class="form-control" value="{{ $EditServiceDetail->ServiceDetailTestimonails->testimonial_name_2 }}">

                                                @error('testimonial_name_2')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                            </td>
                                            <td>
                                                <input type="text" name="testimonial_designation_2" id="testimonial_designation_2" class="form-control" value="{{ $EditServiceDetail->ServiceDetailTestimonails->testimonial_designation_2 }}">

                                                @error('testimonial_designation_2')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                            </td>
                                            <td>
                                                <input type="file" name="testimonial_image_2" id="testimonial_image_2" class="form-control" value="">

                                                @error('testimonial_image_2')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                                <br>
                                                <section>
                                                    <div class="container">
                                                        <div class="row justify-content-center">
                                                            <div class="col-lg-3 col-md-6 col-xs-12">
                                                                <div class="card mcard services_testimonial_image_2" id="services_testimonial_image_2">
                                                                    <img src="{{ asset($EditServiceDetail->ServiceDetailTestimonails->testimonial_image_2) }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </td>
                                            <td>
                                                <textarea name="testimonial_content_2" id="testimonial_content_2" class="form-control" rows="5" value="">{{ $EditServiceDetail->ServiceDetailTestimonails->testimonial_content_2 }}</textarea>

                                                @error('testimonial_content_2')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <input type="hidden" class="row_number" name="row_number" id="row_number" value="1">
                                            <td>
                                                <input type="text" name="testimonial_heading_3" id="testimonial_heading_3" class="form-control" value="{{ $EditServiceDetail->ServiceDetailTestimonails->testimonial_heading_3 }}">

                                                @error('testimonial_heading_3')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                            </td>
                                            <td>
                                                <input type="text" name="testimonial_name_3" id="testimonial_name_3" class="form-control" value="{{ $EditServiceDetail->ServiceDetailTestimonails->testimonial_name_3 }}">

                                                @error('testimonial_name_3')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                            </td>
                                            <td>
                                                <input type="text" name="testimonial_designation_3" id="testimonial_designation_3" class="form-control" value="{{ $EditServiceDetail->ServiceDetailTestimonails->testimonial_designation_3 }}">

                                                @error('testimonial_designation_3')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                            </td>
                                            <td>
                                                <input type="file" name="testimonial_image_3" id="testimonial_image_3" class="form-control" value="{{ $EditServiceDetail->ServiceDetailTestimonails->testimonial_image_3 }}">

                                                @error('testimonial_image_3')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                                <br>
                                                <section>
                                                    <div class="container">
                                                        <div class="row justify-content-center">
                                                            <div class="col-lg-3 col-md-6 col-xs-12">
                                                                <div class="card mcard services_testimonial_image_3" id="services_testimonial_image_3">
                                                                    <img src="{{ asset($EditServiceDetail->ServiceDetailTestimonails->testimonial_image_3) }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </td>
                                            <td>
                                                <textarea name="testimonial_content_3" id="testimonial_content_3" class="form-control" rows="5" value="">{{ $EditServiceDetail->ServiceDetailTestimonails->testimonial_content_3 }}</textarea>

                                                @error('testimonial_content_3')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <input type="hidden" class="row_number" name="row_number" id="row_number" value="1">
                                            <td>
                                                <input type="text" name="testimonial_heading_4" id="testimonial_heading_4" class="form-control" value="{{ $EditServiceDetail->ServiceDetailTestimonails->testimonial_heading_4 }}">

                                                @error('testimonial_heading_4')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                            </td>
                                            <td>
                                                <input type="text" name="testimonial_name_4" id="testimonial_name_4" class="form-control" value="{{ $EditServiceDetail->ServiceDetailTestimonails->testimonial_name_4 }}">

                                                @error('testimonial_name_4')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                            </td>
                                            <td>
                                                <input type="text" name="testimonial_designation_4" id="testimonial_designation_4" class="form-control" value="{{ $EditServiceDetail->ServiceDetailTestimonails->testimonial_designation_4 }}">

                                                @error('testimonial_designation_4')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                            </td>
                                            <td>
                                                <input type="file" name="testimonial_image_4" id="testimonial_image_4" class="form-control" value="">

                                                @error('testimonial_image_4')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                                <br>
                                                <section>
                                                    <div class="container">
                                                        <div class="row justify-content-center">
                                                            <div class="col-lg-3 col-md-6 col-xs-12">
                                                                <div class="card mcard services_testimonial_image_4" id="services_testimonial_image_4">
                                                                    <img src="{{ asset($EditServiceDetail->ServiceDetailTestimonails->testimonial_image_4) }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </td>
                                            <td>
                                                <textarea name="testimonial_content_4" id="testimonial_content_4" class="form-control" rows="5" value="">{{ $EditServiceDetail->ServiceDetailTestimonails->testimonial_content_4 }}</textarea>

                                                @error('testimonial_content_4')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <button type="submit" class="btn btn-primary mb-0">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection