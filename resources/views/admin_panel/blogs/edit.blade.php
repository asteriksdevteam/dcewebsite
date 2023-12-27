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
        max-width: 100px !important;
        max-height: 50px !important;
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
                <h1>Blogs</h1>
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
                        <h5 class="mb-4">Edit Blogs</h5>
                        <div style="display: flex; justify-content: end; margin:20px 44px 0 0">
                            <a href="{{ url('blogs') }}" class="btn btn-primary cbtn">Back</a>
                        </div>
                        <hr>
                        <div class="col-12 col-lg-12 mb-5">
                            <form action="{{ url('update_blog') }}" enctype="multipart/form-data" method="post" onsubmit="return validateDropdown();">
                                @csrf
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="id" id="id" value="{{ $Blog->id }}">
                                        <div class="form-group has-float-label">
                                            <select class="form-control" name="blog_Category" id="blog_Category" required>
                                                <option disabled selected>Select</option>
                                                @foreach($Category as $item)
                                                    <option value="{{ $item->id }}" {{ $Blog->category == $item->id ? 'selected' : '' }}>{{ $item->category_name }}</option>
                                                @endforeach
                                            </select>
                                            <span>Sub Category</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-float-label">
                                            <input type="text" value="{{ $Blog->meta_title }}" name="edit_meta_title" class="form-control" id="edit_meta_title">
                                            <span>Meta Title</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-float-label">
                                            <select id="meta_keyword" class="form-control" multiple="multiple" name="edit_meta_keyword[]" required>
                                                @foreach($keywordList as $item)
                                                    <OPtion value="{{ $item }}">{{ $item }}</OPtion>
                                                @endforeach
                                            </select>
                                            <span>Meta Keyword</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-float-label">
                                            <textarea type="text" name="edit_meta_description" rows="5" class="form-control" id="edit_meta_description" required>{{ $Blog->meta_description }}</textarea>
                                            <span>Meta Description</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-float-label">
                                            <input type="text" name="slug" value="{{ $Blog->slug }}" class="form-control @error('slug') is-invalid @enderror" id="slug" required>
                                            <span>Blog Slug</span>
                                        </div>
                                        @error('slug')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                        <p id="error" style="color: red;"></p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-float-label">
                                            <input type="text" name="edit_blog_name" class="form-control" id="edit_blog_name" required value="{{ $Blog->blog_name }}">
                                            <span>Blog Name</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-float-label">
                                            <input type="file" name="edit_blog_images" class="form-control" id="edit_edit_blog_images">
                                            <span>Blog Image</span>
                                        </div>
                                        <section>
                                            <hr>
                                            <div class="row justify-content-left mt-3 mb-3">
                                                <div class="col-lg-3 col-md-2 col-xs-12">
                                                    <div class="card mcard" id="edit_blog_images_show">
                                                        <img src="{{ asset($Blog->blog_image) }}" width="100px" alt="dce-image" srcset="">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </section>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-float-label">
                                            <input type="file" name="edit_blog_image_thumb" class="form-control" id="edit_blog_image_thumb">
                                            <span>Blog Thumb Image</span>
                                        </div>
                                        <section>
                                            <hr>
                                            <div class="row justify-content-left mt-3 mb-3">
                                                <div class="col-lg-3 col-md-2 col-xs-12">
                                                    <div class="card mcard" id="edit_blog_image_thumb_show">
                                                        <img src="{{ asset($Blog->blog_image_thumb) }}" width="100px" alt="dce-image" srcset="">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </section>
                                    </div>
                                </div>

                                <div class="form-group has-float-label">
                                    <textarea type="text" name="edit_blog_short_description" rows="5" class="form-control" id="edit_blog_short_description" required>{{ $Blog->blog_short_description }}</textarea>
                                    <span>Blog Short Description</span>
                                </div>
                                <div class="form-group has-float-label">
                                    <textarea class="textarea_tinyMice @error('edit_blog_description') is-invalid @enderror" name="edit_blog_description" id="edit_blog_description" required>{{ $Blog->blog_description }}</textarea>
                                    <span>Blog Description</span>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-float-label">
                                            <select class="form-control" name="edit_status" id="edit_status" required data-width="100%" required>
                                                <option {{ $Blog->status == "Active" ? 'selected' : '' }} value="Active">Active</option>
                                                <option {{ $Blog->status == "DisActive" ? 'selected' : '' }} value="DisActive">De Active</option>
                                            </select>
                                            <span>Status</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-float-label">
                                            <input type="datetime-local" value="{{ $Blog->date == null ? "" : \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $Blog->date)->format('Y-m-d\TH:i') }}" class="form-control form-control-solid date" name="date" id="date" required/>
                                            <span>Date</span>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mb-0">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</main>

@endsection