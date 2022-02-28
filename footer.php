<footer class="footer-area">
  <div class="container">
    <div class="footer-top">
      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-5">
          <div class="footer-social-link">
            <ul class="list-unstyled text-center">
              <?php get_template_part('template-parts/widget', 'socialmedia') ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-main">
      <div class="row">
        <div class="col-xl-6 col-lg-5">
          <div class="footer-widget border-end">
            <div class="footer-newsletter">
              <h2 class="title">Get in touch!</h2>
              <p>Fusce varius, dolor tempor interdum tristique, dui urna bib
                endum magna, ut ullamcorper purus</p>
              <form>
                <div class="input-group">
                  <input type="email" class="form-control" placeholder="Email address">
                  <button class="subscribe-btn" type="submit">Subscribe</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-xl-6 col-lg-7" data-sal="slide-left" data-sal-duration="800" data-sal-delay="100">
          <div class="row">
            <div class="col-sm-6">
              <div class="footer-widget">
                <h6 class="widget-title">Resourses</h6>
                <?php wp_nav_menu(array(
                  'menu_class' => 'footer-menu-link list-unstyled',
                  'theme_location' => 'footerResource'
                )) ?>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="footer-widget">
                <h6 class="widget-title">Support</h6>
                <?php wp_nav_menu(array(
                  'menu_class' => 'footer-menu-link list-unstyled',
                  'theme_location' => 'footerSupport'
                )) ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="footer-copyright text-center">
            <span class="copyright-text">&copy; Copyright <?php echo date("Y"); ?>. All rights reserved by <a href="https://leravio.com/">Leravio</a>.</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<div class="offcanvas offcanvas-end header-offcanvasmenu" tabindex="-1" id="offcanvasMenuRight">
  <div class="offcanvas-header">
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <form action="#" class="side-nav-search-form">
      <div class="form-group">
        <input type="text" class="search-field" name="search-field" placeholder="Search...">
        <button class="side-nav-search-btn"><i class="fas fa-search"></i></button>
      </div>
    </form>
    <div class="row ">
      <div class="col-lg-5 col-xl-6">
        <ul class="main-navigation list-unstyled">
          <li><a href="index-1.html">Digital Agency</a></li>
          <li><a href="index-2.html">Creative Agency</a></li>
          <li><a href="index-3.html">Personal Portfolio</a></li>
          <li><a href="index-4.html">Home Startup</a></li>
          <li><a href="index-5.html">Corporate Agency</a></li>
        </ul>
      </div>
      <div class="col-lg-7 col-xl-6">
        <div class="contact-info-wrap">
          <div class="contact-inner">
            <address class="address">
              <span class="title">Contact Information</span>
              <p>Theodore Lowe, Ap #867-859 <br> Sit Rd, Azusa New York</p>
            </address>
            <address class="address">
              <span class="title">We're Available 24/7. Call Now.</span>
              <a class="tel" href="tel:8884562790"><i class="fas fa-phone"></i>(888)
                456-2790</a>
              <a class="tel" href="tel:12125553333"><i class="fas fa-fax"></i>(121)
                255-53333</a>
            </address>
          </div>
          <div class="contact-inner">
            <h5 class="title">Find us here</h5>
            <div class="contact-social-share">
              <ul class="social-share list-unstyled">
                <?php get_template_part('template-parts/widget', 'socialmedia') ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<?php wp_footer() ?>
</body>

</html>