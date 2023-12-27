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
            <link rel="canonical" href="https://www.digicontentexperts.com" />
        @else
            <title></title>
            <meta name="description" content="">
            <meta name="keywords" content="">
        @endif

    @elseif($_SERVER['REQUEST_URI'] === '/about-us')

        @if($GetMetaTags != null)
            <title>{{ $GetMetaTags->meta_title }}</title>
            <meta name="description" content="{{ $GetMetaTags->meta_description }}">
            <meta name="keywords" content="{{ $GetMetaTags->meta_keyword }}">
            <link rel="canonical" href="https://www.digicontentexperts.com/about-us" />
        @else
            <title></title>
            <meta name="description" content="">
            <meta name="keywords" content="">
        @endif

    @elseif($_SERVER['REQUEST_URI'] === '/blog-and-news')

        @if($GetMetaTags != null)
            <title>{{ $GetMetaTags->meta_title }}</title>
            <meta name="description" content="{{ $GetMetaTags->meta_description }}">
            <meta name="keywords" content="{{ $GetMetaTags->meta_keyword }}">
            <link rel="canonical" href="https://www.digicontentexperts.com/blog-and-news" />
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
            <link rel="canonical" href="https://www.digicontentexperts.com/contact" />
        @else
            <title></title>
            <meta name="description" content="">
            <meta name="keywords" content="">
        @endif

    @elseif($_SERVER['REQUEST_URI'] === '/termsandcondition')

        @if($GetMetaTags != null)
            <title>{{ $GetMetaTags->meta_title }}</title>
            <meta name="description" content="{{ $GetMetaTags->meta_description }}">
            <meta name="keywords" content="{{ $GetMetaTags->meta_keyword }}">
            <link rel="canonical" href="https://www.digicontentexperts.com/termsandcondition" />
        @else
            <title></title>
            <meta name="description" content="">
            <meta name="keywords" content="">
        @endif

    @elseif($_SERVER['REQUEST_URI'] === '/privacypolicy')

        @if($GetMetaTags != null)
            <title>{{ $GetMetaTags->meta_title }}</title>
            <meta name="description" content="{{ $GetMetaTags->meta_description }}">
            <meta name="keywords" content="{{ $GetMetaTags->meta_keyword }}">
            <link rel="canonical" href="https://www.digicontentexperts.com/privacypolicy" />
        @else
            <title></title>
            <meta name="description" content="">
            <meta name="keywords" content="">
        @endif

    @elseif($pathParts[0] === "service")
        @if($_SERVER['REQUEST_URI'] === '/service/'.$SubCategorySlug)

            @if($ServiceDetail != null)
                <title>{{ $ServiceDetail->meta_title }}</title>
                <meta name="description" content="{{ $ServiceDetail->meta_description }}">
                <meta name="keywords" content="{{ $ServiceDetail->meta_keyword }}">
                <link rel="canonical" href="https://www.digicontentexperts.com/service/<?php echo $SubCategorySlug; ?>" />
            @else
                <title></title>
                <meta name="description" content="">
                <meta name="keywords" content="">
            @endif
        @endif

    @elseif($pathParts[0] === "blog-detail")
        @if($_SERVER['REQUEST_URI'] === '/blog-detail/'.$BlogSlug)

            @if($Blog != null)
                <title>{{ $Blog->meta_title }}</title>
                <meta name="description" content="{{ $Blog->meta_description }}">
                <meta name="keywords" content="{{ $Blog->meta_keyword }}">
                <link rel="canonical" href="https://www.digicontentexperts.com/blog-detail/<?php echo $BlogSlug; ?>" />
                
                <meta property="og:title" content="{{ $OG_Title }}">
                <meta property="og:image" content="https://www.digicontentexperts.com/public/{{ $OG_Image }}">
                <meta property="og:url" content="{{ $OG_URL }}">
                <meta property="og:site_name" content="{{ $OG_Site_Name }}">
                
                <meta name="twitter:card" content="summary">
                <meta name="twitter:domain" content="{{ $OG_Site_Name }}"/>
                <meta name="twitter:title" property="og:title" itemprop="title name" content="{{ $OG_Title }}" />
                <meta name="twitter:description" property="og:description" itemprop="description" content="{{ $OG_Description }}" />
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
    


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css">
    <link rel="stylesheet" href="{{ url('public/user_assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ url('public/user_assets/css/digi_custom.css')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="https://www.digicontentexperts.com/public/user_assets/images/fav.png">
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4Q8VPPPJH3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-4Q8VPPPJH3');
    </script>
</head>

<body>
@include('user_panel.layout.header')
@yield('content')
@include('user_panel.layout.footer')

<script src="{{url('public/admin_assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="{{ url('public/user_assets/js/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.js"></script>
<script src="{{ url('public/user_assets/js/owl.carousel.min.js')}}"></script>
<script src=”https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js”></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

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