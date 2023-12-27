<!-- Your Blade view for displaying a single blog post -->
<html>
<head>
    <title>{{ $Blog->blog_name }}</title>
    <meta property="og:site_name" content="Digi Content Experts" />
    <meta property="og:url" content="{{ $Blog->url }}" />
    <meta property="og:title" content="{{ $Blog->blog_name }}" />
    <meta property="og:description" content="{{ $Blog->blog_short_description }}" />
    <meta property="og:image" content="{{ URL::asset($Blog->blog_image_thumb) }}" />

    <!-- Set a more restrictive Permissions-Policy to exclude 'ambient-light-sensor' -->
    <meta name="permissions-policy" content="geolocation=(), microphone=(), camera=()">
</head>

<body>
    <!-- Your blog content goes here -->

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <!-- Your share button code -->
    <div class="fb-share-button" 
        data-href="{{ route('blog_details', ['slug' => $Blog->slug]) }}" 
        data-layout="button_count"
        data-image="{{ asset($Blog->thumbnail_path) }}">
    </div>
</body>
</html>