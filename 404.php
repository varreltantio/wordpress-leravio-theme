<?php get_header(); ?>

<section class="error-page onepage-screen-area">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="content">
          <h2 class="title">Page not found</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
          <a href="<?php echo site_url() ?>" class="axil-btn btn-fill-primary">Go Back</a>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="thumbnail">
          <img src="<?php echo get_theme_file_uri("assets/media/others/404.png") ?>" alt="404">
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>