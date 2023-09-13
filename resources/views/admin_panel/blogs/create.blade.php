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
                        <h5 class="mb-4">Create Blogs</h5>
                        <div style="display: flex; justify-content: end; margin:20px 44px 0 0">
                            <a href="{{ url('blogs') }}" class="btn btn-primary cbtn">Back</a>
                        </div>
                        <hr>
                        <div class="col-12 col-lg-12 mb-5">
                            <form action="{{ url('create_blog_db') }}" enctype="multipart/form-data" method="post" onsubmit="return validateDropdown();">
                                @csrf
                                <div class="form-group has-float-label">
                                    <select class="form-control" name="blog_Category" id="blog_Category" required>
                                        <option disabled selected>Select</option>
                                        @foreach($Category as $item)
                                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                        @endforeach
                                    </select>
                                    <span>Sub Category</span>
                                </div>

                                <div class="form-group has-float-label">
                                    <input type="text" name="meta_title" class="form-control" id="meta_title" required>
                                    <span>Meta Title</span>
                                </div>

                                <div class="form-group has-float-label">
                                    <select id="meta_keyword" class="form-control" multiple="multiple" name="meta_keyword[]" required></select>
                                    <span>Meta Keyword</span>
                                </div>

                                <div class="form-group has-float-label">
                                    <textarea type="text" name="meta_description" rows="5" class="form-control" id="meta_description" required></textarea>
                                    <span>Meta Description</span>
                                </div>

                                <div class="form-group has-float-label">
                                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" required>
                                    <span>Blog Slug</span>
                                </div>
                                @error('slug')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror 
                                <p id="error" style="color: red;"></p>

                                <br>
                                <div class="form-group has-float-label">
                                    <input type="text" name="blog_name" class="form-control" id="blog_name" required>
                                    <span>Blog Name</span>
                                </div>

                                <div class="form-group has-float-label">
                                    <input type="file" name="blog_images" class="form-control" id="blog_images" required>
                                    <span>Blog Image</span>
                                </div>

                                
                                <section>
                                    <hr>
                                    <div class="row justify-content-left mt-3 mb-3">
                                        <div class="col-lg-3 col-md-2 col-xs-12">
                                            <div class="card mcard" id="blog_images_show">
                                                <img src="" alt="" srcset="">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </section>
                                

                                <div class="form-group has-float-label">
                                    <input type="file" name="blog_image_thumb" class="form-control" id="blog_image_thumb" required>
                                    <span>Blog Thumb Image</span>
                                </div>


                                <section>
                                    <hr>
                                    <div class="row justify-content-left mt-3 mb-3">
                                        <div class="col-lg-3 col-md-2 col-xs-12">
                                            <div class="card mcard" id="blog_image_thumb_show">
                                                <img src="" alt="" srcset="">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </section>


                                <div class="form-group has-float-label">
                                    <textarea type="text" name="blog_short_description" rows="3" class="form-control" id="blog_short_description" required></textarea>
                                    <span>Blog Short Description</span>
                                </div>

                                <div class="form-group has-float-label">
                                    <textarea type="text" name="blog_description" rows="5" class="form-control" id="blog_description" required></textarea>
                                    <span>Blog Description</span>
                                </div>

                                <div class="form-group has-float-label">
                                    <select class="form-control" name="status" id="status" required data-width="100%" required>
                                        <option selected value="Active">Active</option>
                                        <option value="DisActive">De Active</option>
                                    </select>
                                    <span>Status</span>
                                </div>

                                <button type="submit" class="btn btn-primary mb-0">Submit</button>
                            </form>

                            <section>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-3 col-md-6 col-xs-12">
                                            <div class="card mcard show_blog_image">
                                                <img src="" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</main>

@endsection