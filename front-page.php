<?php
get_header();
?>

<section class="banner banner-style-1">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="banner-content">
          <h1 class="title">Buat Website Dengan Cepat Sekarang.</h1>
          <span class="subtitle">Leravio merupakan tempat membuat Website dengan cepat sekarang dan juga belajar bahasa pemrograman yang lengkap.</span>
          <a href="contact.html" class="axil-btn btn-fill-primary btn-large">Hubungi Kami</a>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="banner-thumbnail">
          <div class="large-thumb">
            <amp-img src="<?php echo get_theme_file_uri("assets/media/banner/laptop.png") ?>" alt="Laptop" height="400" layout="fixed-height"></amp-img>
          </div>
          <ul class="list-unstyled shape-group">
            <li class="shape shape-1">
              <amp-img src="<?php echo get_theme_file_uri("assets/media/banner/marker.png") ?>" alt="Marker" height="400" layout="fixed-height"></amp-img>
            </li>
            <li class="shape shape-2">
              <amp-img src="<?php echo get_theme_file_uri("assets/media/banner/chat-icon.png") ?>" alt="Chat" height="400" layout="fixed-height"></amp-img>
            </li>
            <li class="shape shape-3">
              <amp-img src="<?php echo get_theme_file_uri("assets/media/banner/sticker.png") ?>" alt="sticker" height="400" layout="fixed-height"></amp-img>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <ul class="list-unstyled shape-group-13">
    <li class="shape shape-1">
      <img src="<?php echo get_theme_file_uri("assets/media/others/bubble-18.png") ?>" alt="Bubble">
    </li>
    <li class="shape shape-2">
      <img src="<?php echo get_theme_file_uri("assets/media/others/bubble-19.png") ?>" alt="Bubble">
    </li>
    <li class="shape shape-3">
      <img src="<?php echo get_theme_file_uri("assets/media/others/hand-2.png") ?>" alt="Hand">
    </li>
    <li class="shape shape-4">
      <img src="<?php echo get_theme_file_uri("assets/media/others/bubble-14.png") ?>" alt="Bubble">
    </li>
    <li class="shape shape-5">
      <img src="<?php echo get_theme_file_uri("assets/media/others/bubble-14.png") ?>" alt="Bubble">
    </li>
  </ul>
</section>

<section class="section section-padding-equal bg-color-dark">
  <div class="container">
    <div class="section-heading heading-light-left">
      <span class="subtitle">What We Can Do For You</span>
      <h2 class="title">Services we can help you with</h2>
      <p class="opacity-50">Nulla facilisi. Nullam in magna id dolor
        blandit rutrum eget vulputate augue sed eu imperdiet.</p>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="services-grid active">
          <div class="thumbnail">
            <img src="<?php echo get_theme_file_uri("assets/media/icon/icon-1.png") ?>" alt="icon"></img>
          </div>
          <div class="content">
            <h5 class="title"> <a href="#">Design</a></h5>
            <p>Simply drag and drop photos and videos into your workspace to automatically add them to your Collab Cloud library.</p>
            <a href="#" class="more-btn">Find out more</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="services-grid">
          <div class="thumbnail">
            <img src="<?php echo get_theme_file_uri("assets/media/icon/icon-2.png") ?>" alt="icon"></img>
          </div>
          <div class="content">
            <h5 class="title"> <a href="#">Development</a></h5>
            <p>Simply drag and drop photos and videos into your workspace to automatically add them to your Collab Cloud library.</p>
            <a href="#" class="more-btn">Find out more</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="services-grid">
          <div class="thumbnail">
            <img src="<?php echo get_theme_file_uri("assets/media/icon/icon-6.png") ?>" alt="icon"></img>
          </div>
          <div class="content">
            <h5 class="title"> <a href="#">Content strategy</a></h5>
            <p>Simply drag and drop photos and videos into your workspace to automatically add them to your Collab Cloud library.</p>
            <a href="#" class="more-btn">Find out more</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <ul class="list-unstyled shape-group-10">
    <li class="shape shape-1"><img src="<?php echo get_theme_file_uri("assets/media/others/circle-1.png") ?>" alt="Circle"></li>
    <li class="shape shape-2"><img src="<?php echo get_theme_file_uri("assets/media/others/line-3.png") ?>" alt="Circle"></li>
    <li class="shape shape-3"><img src="<?php echo get_theme_file_uri("assets/media/others/bubble-5.png") ?>" alt="Circle"></li>
  </ul>
</section>


<section class="section section-padding-equal">
  <div class="container">
    <div class="section-heading">
      <span class="subtitle">What's Going On</span>
      <h2 class="title">Latest stories</h2>
      <p>News From Abstrak And Around The World Of Web Design And Complete Solution of Online Digital Marketing </p>
    </div>
    <div class="row row-cols-md-2 row-cols-lg-3">
      <?php
      $homepagePosts = new WP_Query(array(
        'posts_per_page' => 6,
      ));

      while ($homepagePosts->have_posts()) {
        $homepagePosts->the_post(); ?>
        <div class="col-md mb-5 mb-lg-0 mt-5">
          <div class="card border shadow p-2 blog-list active">
            <div class="post-thumbnail">
              <a href="<?php the_permalink() ?>">
                <img src="<?php the_post_thumbnail_url() ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE); ?>"></img>
              </a>
            </div>

            <div class="px-2 pb-0 pt-4 post-content">
              <ul class="blog-meta list-unstyled mb-3">
                <li><?php the_modified_date(); ?></li>
                <li><?php echo reading_time(); ?></li>
              </ul>

              <h5 class="title">
                <a href="<?php the_permalink() ?>">
                  <?php the_title() ?>
                </a>
              </h5>
            </div>
          </div>
        </div>

      <?php }
      wp_reset_postdata();
      ?>
    </div>

  </div>
  <ul class="shape-group-1 list-unstyled">
    <li class="shape shape-1"><img src="<?php echo get_theme_file_uri("assets/media/others/bubble-1.png") ?>" alt="bubble"></li>
    <li class="shape shape-2"><img src="<?php echo get_theme_file_uri("assets/media/others/line-1.png") ?>" alt="bubble"></li>
    <li class="shape shape-3"><img src="<?php echo get_theme_file_uri("assets/media/others/line-2.png") ?>" alt="bubble"></li>
    <li class="shape shape-4"><img src="<?php echo get_theme_file_uri("assets/media/others/bubble-2.png") ?>" alt="bubble"></li>
  </ul>
</section>


<?php
get_footer();
