<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        $currentPath = request()->path(); 
        $pathParts = explode('/', $currentPath);
    ?>
    @if($_SERVER['REQUEST_URI'] === '/')

        @if($GetMetaTags != null)
            <title>{{ $GetMetaTags->meta_title }}</title>
            <meta name="description" content="{{ $GetMetaTags->meta_description }}">
            <meta name="keywords" content="{{ $GetMetaTags->meta_keyword }}">
        @else
            <title></title>
            <meta name="description" content="">
            <meta name="keywords" content="">
        @endif

    @elseif($_SERVER['REQUEST_URI'] === '/about_us')

        @if($GetMetaTags != null)
            <title>{{ $GetMetaTags->meta_title }}</title>
            <meta name="description" content="{{ $GetMetaTags->meta_description }}">
            <meta name="keywords" content="{{ $GetMetaTags->meta_keyword }}">
        @else
            <title></title>
            <meta name="description" content="">
            <meta name="keywords" content="">
        @endif

    @elseif($_SERVER['REQUEST_URI'] === '/blog_and_news')

        @if($GetMetaTags != null)
            <title>{{ $GetMetaTags->meta_title }}</title>
            <meta name="description" content="{{ $GetMetaTags->meta_description }}">
            <meta name="keywords" content="{{ $GetMetaTags->meta_keyword }}">
        @else
            <title></title>
            <meta name="description" content="">
            <meta name="keywords" content="">
        @endif

    @elseif($_SERVER['REQUEST_URI'] === '/contact')

        @if($GetMetaTags != null)
            <title>{{ $GetMetaTags->meta_title }}</title>
            <meta name="description" content="{{ $GetMetaTags->meta_description }}">
            <meta name="keywords" content="{{ $GetMetaTags->meta_keyword }}">
        @else
            <title></title>
            <meta name="description" content="">
            <meta name="keywords" content="">
        @endif

    @elseif($pathParts[0] === "service_detail_for_user")
        @if($_SERVER['REQUEST_URI'] === '/service_detail_for_user/'.$SubCategorySlug)

            @if($ServiceDetail != null)
                <title>{{ $ServiceDetail->meta_title }}</title>
                <meta name="description" content="{{ $ServiceDetail->meta_keyword }}">
                <meta name="keywords" content="{{ $ServiceDetail->meta_description }}">
            @else
                <title></title>
                <meta name="description" content="">
                <meta name="keywords" content="">
            @endif
        @endif

    @elseif($pathParts[0] === "blog_detail")
        @if($_SERVER['REQUEST_URI'] === '/blog_detail/'.$BlogSlug)

            @if($Blog != null)
                <title>{{ $Blog->meta_title }}</title>
                <meta name="description" content="{{ $Blog->meta_description }}">
                <meta name="keywords" content="{{ $Blog->meta_keyword }}">
            @else
                <title></title>
                <meta name="description" content="">
                <meta name="keywords" content="">
            @endif
        @endif

    @else
        <title></title>
        <meta name="description" content="">
        <meta name="keywords" content="">
    @endif

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ url('user_assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ url('user_assets/css/custom.css')}}">
</head>
<body>

@include('user_panel.layout.header')
@yield('content')
@include('user_panel.layout.footer')

<script src="{{url('admin_assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="{{ url('user_assets/js/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.js"></script>
<script src="{{ url('user_assets/js/owl.carousel.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

@include('user_panel.script')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        
        $.ajax({
            url: "{{ url('get_header_services') }}",
            type: 'get',
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function(result){
                $('#services').html(result);
            }
        });
    })
</script>
</body>
</html>