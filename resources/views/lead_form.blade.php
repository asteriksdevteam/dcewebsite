<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DCE | Unlock Potential with Our Modern Lead Generation Form</title>
    <meta name="description" content="Step into a new era of business success using our modern lead generation form. Harness cutting-edge tools to capture leads and propel your growth.">
    <meta name="keywords" content="DCE Modern lead generation, Business success, Cutting-edge tools, Growth strategy, DCE Lead Query,">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{url('public/admin_assets/font/iconsmind-s/css/iconsminds.css')}}" />
    <link rel="stylesheet" href="{{url('admin_assets/font/simple-line-icons/css/simple-line-icons.css')}}" />

    <link rel="stylesheet" href="{{url('public/admin_assets/css/vendor/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('public/admin_assets/css/vendor/bootstrap.rtl.only.min.css')}}" />
    <link rel="stylesheet" href="{{url('public/admin_assets/css/vendor/bootstrap-float-label.min.css')}}" />
    <link rel="stylesheet" href="{{url('public/admin_assets/css/main.css')}}" />
</head>

<body class="background show-spinner no-footer">
    <div class="fixed-background"></div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card">
                        <div class="position-relative image-side">

                        </div>
                        <div class="form-side">
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            <img src='{{asset('user_assets/images/main-dce-logo.png')}}' width="150px" alt="logo" />
                            <br><br><br>
                            <!--<h6 class="mb-4">Login</h6>-->
                            <form method="POST" action="{{ ('Submit-lead-form') }}">
                                <div class="row">
                                    <div class="col">
                                        @csrf
                                        <label class="form-group has-float-label mb-4">
                                            <input class="form-control"  id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required/>
                                            <span>Name</span>
                                        </label>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                         <label class="form-group has-float-label mb-4">
                                    <input class="form-control"  id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required/>
                                    <span>E-mail</span>
                                </label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                </div>
                                
                                
                               
                                
                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control"  id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required/>
                                    <span>Phone Number</span>
                                </label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control"  id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}" required/>
                                    <span>Company</span>
                                </label>
                                @error('company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                <label class="form-group has-float-label mb-4">
                                    <select name="categories" id="categories" class='form-control first_categories'>
                                        <option disabled selected>Select Service*</option>
                                        @foreach($Category as $item)
                                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                        @endforeach
                                    </select>
                                    <span>Categories</span>
                                </label>
                                @error('categories')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                <label class="form-group has-float-label mb-4">
                                    <textarea class="form-control"  id="summary" type="text" class="form-control @error('summary') is-invalid @enderror" name="summary" value="{{ old('summary') }}" required></textarea>
                                    <span>Summary</span>
                                </label>
                                @error('summary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="#">&nbsp;</a>
                                    <button class="btn btn-primary btn-lg btn-shadow" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{url('public/admin_assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
    <script src="{{url('public/public/admin_assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('public/admin_assets/js/dore.script.js')}}"></script>
    <script src="{{url('public/admin_assets/js/scripts.js')}}"></script>
</body>

</html>