@extends('admin_panel.layout.app');
@section('content')

<style>
   .mcard 
   {
        margin-bottom: 32px;
        position: relative;
        padding: 30px;
    }
    .mcard img 
    {
        width: 100px;
        display: block;
        margin: auto;
    }
    .garbage 
    {
        position: absolute;
        bottom: 16px;
        right: 14px;
    }
    .garbage i
    {
        font-size: 20px;
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
                <h1>Edit Meta Tags</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">Edit Pages</h5>
                        <div style="display: flex; justify-content: end; margin:20px 44px 0 0">
                            <a href="{{ url('add_meta_tags') }}" class="btn btn-outline-primary cbtn" >Back</a>
                        </div>
                        <form action="{{ url('update_meta_tag') }}" method="post" class="needs-validation tooltip-label-right" novalidate>
                            @csrf

                            <div class="form-group position-relative error-l-50">
                                <input type="hidden" id="id" name="id" value="{{ $MetaTag->id }}">
                                <label>Select Page</label>
                                <select name="page" id="edit_page" class="form-control" required>
                                    <option disabled selected>Select</option>
                                    <option value="home" {{ $MetaTag->page == "home" ? "selected" : "" }}>Home</option>
                                    <option value="about-us" {{ $MetaTag->page == "about-us" ? "selected" : "" }}>About us</option>
                                    <option value="blog_and_news" {{ $MetaTag->page == "blog_and_news" ? "selected" : "" }}>Blogs & News</option>
                                    <option value="contact-us" {{ $MetaTag->page == "contact-us" ? "selected" : "" }}>Contact us</option>
                                    <option value="blog_and_news" {{ $MetaTag->page == "terms_and_conditions" ? "selected" : "" }}>Terms and condition</option>
                                    <option value="contact-us" {{ $MetaTag->page == "privacy_policy" ? "selected" : "" }}>Privacy and policy</option>
                                </select>

                                <div class="invalid-tooltip">
                                    Page is required!
                                </div>
                            </div>

                            <div class="form-group position-relative error-l-50">
                                <label>Meta Title</label>
                                <input type="text" class="form-control" value="{{ $MetaTag->meta_title }}" name="meta_title" id="edit_meta_title" required>
                                <div class="invalid-tooltip">
                                    Meta Title is required!
                                </div>
                            </div>

                            <div class="form-group position-relative error-l-50">
                                <label>Meta Keyword</label>
                                <select id="meta_keyword" class="form-control" multiple="multiple" name="meta_keyword[]" required>
                                    @foreach ($meta_keyword as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-tooltip">
                                    Meta Title is required!
                                </div>
                            </div>

                            <div class="form-group position-relative error-l-50">
                                <label>Meta Description</label>
                                <textarea type="text" class="form-control" rows="4" name="meta_description" id="edit_meta_description" required>{{ $MetaTag->meta_description }}</textarea>
                                <div class="invalid-tooltip">
                                    Meta Description is required!
                                </div>
                            </div>
                            
                            
                            <button type="submit" class="btn btn-primary btn-block mb-0 testimonails">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection