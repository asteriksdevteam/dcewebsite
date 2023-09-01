<header class='desktopmenu'>
    <div class="container">
        <nav>
            <a href='#' class='logo'><img src='{{url('user_assets/images/logo.png')}}' /></a>
            <a href='#' class='bluelogo'><img src='{{url('user_assets/images/logo2.png')}}' /></a>
            <div class='collapse-menu'>
              <ul>
              <li><a href='{{ url('/') }}'>Home</a></li>
              <li><a href='{{ url('about_us') }}'>About</a></li>
              <li class="droplist"><a href='{{ url('service') }}'>Our services</a>
                
                <div class="dropdown">
                    <ul>
                        <li><a href="#">sub item 1</a></li>
                        <li><a href="#">sub item 2</a></li>
                        <li><a href="#">sub item 3</a></li>
                        <li><a href="#">sub item 4</a></li>
                    </ul>
                </div>

            </li>
              <li><a href='{{ url('blog_and_news') }}'>Blog & news</a></li>
              <li><a href='{{ url('contact') }}'>Contact</a></li>
              <li><i class="fa fa-phone"></i> <a href='#'>+2349067322844</a></li>
              <li><a href='#'>Estimate projects</a></li>
            </ul>
            </div>
        </nav>
    </div>
</header>