<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DCE Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{url('public/admin_assets/font/iconsmind-s/css/iconsminds.css')}}" />
    <link rel="stylesheet" href="{{url('public/admin_assets/font/simple-line-icons/css/simple-line-icons.css')}}" />

    <link rel="stylesheet" href="{{url('public/admin_assets/css/vendor/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('public/admin_assets/css/vendor/bootstrap.rtl.only.min.css')}}" />
    <link rel="stylesheet" href="{{url('public/admin_assets/css/vendor/bootstrap-float-label.min.css')}}" />
    <link rel="stylesheet" href="{{url('public/admin_assets/css/main.css')}}" />
    <link rel="icon" type="image/png" sizes="32x32" href="https://www.digicontentexperts.com/public/user_assets/images/fav.png">
</head>

<body class="background show-spinner no-footer">
    <div class="fixed-background"></div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card">
                        <div class="position-relative image-side ">

                            <p class=" text-white h2">DCE Website CMS Portal</p>
                            <br>
                            <br>
                            <p class="white mb-0">
                                At Digi Content Experts, we're more than just another digital marketing agency. We embrace innovative, forward thinking strategies, ensuring your brand not only thrive but lead in their industry. Are you ready to begin?
                            </p>
                        </div>
                        <div class="form-side">

                            <img src='{{asset('user_assets/images/main-dce-logo.png')}}' width="150px" alt="logo" />
                            <br><br><br>
                            <h6 class="mb-4">Login</h6>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control"  id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                    <span>E-mail</span>
                                </label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label class="form-group has-float-label mb-4">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                                    <span>Password</span>
                                </label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="#">&nbsp;</a>
                                    <button class="btn btn-primary btn-lg btn-shadow" type="submit">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{url('public/admin_assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
    <script src="{{url('/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('public/admin_assets/js/dore.script.js')}}"></script>
    <script src="{{url('public/admin_assets/js/scripts.js')}}"></script>
</body>

</html>