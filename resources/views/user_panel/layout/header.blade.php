<header class="desktopmenu">
  <div class="container">
      <nav>
          <a href='index.html' class='whitelogo'><img src='{{url('user_assets/images/logo.png')}}' /></a>
          <a href='index.html' class='logo'><img src='{{url('user_assets/images/logo2.png')}}' /></a>
          <div class="toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
              <i class="fa fa-bars"></i>
          </div>
          <div class="collapse-menu">
              <ul>
                <li><a href='{{ url('/') }}'>Home</a></li>
                <li><a href='{{ url('about_us') }}'>About</a></li>
                  <li class="custom-dropdown"><a href='{{ url('service') }}'>our services <i class="fa fa-angle-down"></i></a>
                      <div class="meg-menu">
                          <div class="container">
                              <div class="row">
                                  <div class="col-md-3">
                                      <div class="widget widgetfirst">
                                          <h6>digital marketing</h6>
                                      </div>
                                      <div class="mega-list mega-firstlist">
                                          <ul>
                                              <li><a href="#">seo</a></li>
                                              <li><a href="#">ppc</a></li>
                                              <li><a href="#">social media marketing</a></li>
                                              <li><a href="#">search engine</a></li>
                                              <li><a href="#">search engine marketing</a></li>
                                              <li><a href="#">video marketing</a></li>
                                              <li><a href="#">e-commerce marketing</a></li>
                                              <li><a href="#">content marketing</a></li>
                                              <li><a href="#">email marketing</a></li>
                                              <li><a href="#">small business seo</a></li>
                                              <li><a href="#">local seo</a></li>
                                              <li><a href="#">google ads</a></li>
                                          </ul>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="widget">
                                          <h6>content services</h6>
                                      </div>
                                      <div class="mega-list mega-secondtlist">
                                          <ul>
                                              <li><a href="#">seo</a></li>
                                              <li><a href="#">ppc</a></li>
                                              <li><a href="#">social media marketing</a></li>
                                              <li><a href="#">search engine</a></li>
                                              <li><a href="#">search engine marketing</a></li>
                                              <li><a href="#">video marketing</a></li>
                                              <li><a href="#">e-commerce marketing</a></li>
                                              <li><a href="#">content marketing</a></li>
                                              <li><a href="#">email marketing</a></li>
                                              <li><a href="#">small business seo</a></li>
                                              <li><a href="#">local seo</a></li>
                                              <li><a href="#">google ads</a></li>
                                          </ul>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="widget">
                                          <h6>it services</h6>
                                      </div>
                                      <div class="mega-list mega-thirdlist">
                                          <ul>
                                              <li><a href="#">seo</a></li>
                                              <li><a href="#">ppc</a></li>
                                              <li><a href="#">social media marketing</a></li>
                                              <li><a href="#">search engine</a></li>
                                              <li><a href="#">search engine marketing</a></li>
                                              <li><a href="#">video marketing</a></li>
                                              <li><a href="#">e-commerce marketing</a></li>
                                              <li><a href="#">content marketing</a></li>
                                              <li><a href="#">email marketing</a></li>
                                              <li><a href="#">small business seo</a></li>
                                              <li><a href="#">local seo</a></li>
                                              <li><a href="#">google ads</a></li>
                                          </ul>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="widget widgetlast">
                                          <h6>design & development</h6>
                                      </div>
                                      <div class="mega-list mega-fourthlist">
                                          <ul>
                                              <li><a href="#">seo</a></li>
                                              <li><a href="#">ppc</a></li>
                                              <li><a href="#">social media marketing</a></li>
                                              <li><a href="#">search engine</a></li>
                                              <li><a href="#">search engine marketing</a></li>
                                              <li><a href="#">video marketing</a></li>
                                              <li><a href="#">e-commerce marketing</a></li>
                                              <li><a href="#">content marketing</a></li>
                                              <li><a href="#">email marketing</a></li>
                                              <li><a href="#">small business seo</a></li>
                                              <li><a href="#">local seo</a></li>
                                              <li><a href="#">google ads</a></li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </li>
                  <li><a href='{{ url('blog_and_news') }}'>Blog & news</a></li>
                  <li><a href='{{ url('contact') }}'>Contact</a></li>
                  <li><a href="#"><i class="fa fa-phone" class="phone"></i> +2349067322844</a></li>
                  <li><a href="#" class="estimate">Estimate Project</a></li>
              </ul>
          </div>

          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
              <div class="offcanvas-header">
               <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
               <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
               <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                  <li class="nav-item">
                   <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                   <a class="nav-link" href="#">Link</a>
                  </li>
                  <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                   </a>
                   <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li>
                       <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                   </ul>
                  </li>
               </ul>
               <form class="d-flex mt-3" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
               </form>
              </div>
           </div>
      </nav>
  </div>
</header>