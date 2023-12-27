<section class='footer'>
  <div class="container">
    <div class='row upper-footer'>
      <div class="col-lg-4 col-md-4 col-xs-12">
        <div class='footer-content'>
          <img src="{{asset('user_assets/images/dce-footer-logo.png')}}" class="footw" alt="dce-image" />
          <p class="text-white FooterContent"></p>
        </div>
        <div class="footer-social">
          <ul>
              <li><a href="https://www.facebook.com/digicontentexperts" target="blank"><i class="fab fa-facebook"></i></a></li>
              <li><a href="https://twitter.com/DCE_Offical"><i class="fab fa-twitter"></i></a></li>
              <li><a href="https://www.linkedin.com/company/digi-content-experts"><i class="fab fa-linkedin"></i></a></li>
              <li><a href="https://www.instagram.com/digicontentexperts/"><i class="fab fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
        <div class="col-lg-8 col-md-8 col-xs-12">
            <div class="row justify-content-between">
              <div class="col-lg-3 col-md-6 col-xs-12">
                <div class='widget'>
                    <h5>Service</h5>
                </div>
                <div class='footer-list'>
                  <ul class="footerLinksOne">
                  </ul>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-xs-12" class='mp'>
                <div class='widget'>
                    <h5>Company</h5>
                </div>
                <div class='footer-list'>
                  <ul>
                    <li><a href='{{ url('about-us') }}'>About</a></li>
                    <li><a href='{{ url('blog-and-news') }}'>Blog & News</a></li>
                    <li><a href='{{ url('contact') }}'>Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-xs-12" class='mp'>
                 <div class="widget">
                          <h5>Get in Touch With Us</h5>
                      </div> 
                      <div class="footer-list footer-last-list">
                          <ul>
                            <li><i class="fa-solid fa-phone text-white"></i> <a href="tel:+17372557407"><b>+17372557407</b></a></li>
                            <li><i class="fa-solid fa-envelope text-white"></i> <a href="mailto:info@digicontentexperts.com"><b>info@digicontentexperts.com</b></a></li>
                            <li><i class="fa-solid fa-location-dot text-white"></i> <a href="https://maps.app.goo.gl/6DE6HDiPNSBrZfNQ7" target="_blank"><b>5900 Balcones Drive STE 100 Austin, TX 78731</b></a></li>
                          </ul>
                      </div>
              </div>
            </div>
        </div>
    </div>
  </div>
  <div class='lower-footer'>
    <div class="container">
      <div class="row">
          <div class="col-md-6">
              <p class='footer-credits'>All Rights Reserved <span id="currentYear"></span> - Digi Content Experts</p>
          </div>
          <div class="col-md-6">
              <p class="text-end footer-rightcont"><a href="{{ route('termsandcondition') }}" class="fts1">Terms & Conditions</a> | <a href="{{ route('privacypolicy') }}" class="fts2">Privacy Policy</a></p>
          </div>
      </div>
    </div>
  </div>
</section>