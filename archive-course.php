<?php get_header(); ?>
<div class="breadcrum-area breadcrumb-banner">
  <div class="container">
    <div class="section-heading heading-left">
      <h1 class="title h2">Our Courses</h1>
      <p>A quick view of industry specific problems solved with design by the awesome team at Abstrak.</p>
    </div>
    <div class="banner-thumbnail">
      <img class="paralax-image" src="<?php echo get_theme_file_uri("assets/media/banner/banner-thumb-1.png") ?>" alt="Illustration">
    </div>
  </div>
  <ul class="shape-group-8 list-unstyled">
    <li class="shape shape-1">
      <img src="<?php echo get_theme_file_uri("assets/media/others/bubble-9.png") ?>" alt="Bubble">
    </li>
    <li class="shape shape-2">
      <img src="<?php echo get_theme_file_uri("assets/media/others/bubble-20.png") ?>" alt="Bubble">
    </li>
  </ul>
</div>


<section class="section section-padding-equal project-column-4 pt--200 pt_md--80 pt_sm--60">
  <div class="container-fluid plr--30">
    <div class="row row-cols-md-2 row-cols-lg-3">
      <?php
      while (have_posts()) {
        the_post(); ?>
        <div class="col-md mb-5 mb-lg-0 mt-5">
          <div class="card border shadow p-2 blog-list active">
            <div class="post-thumbnail">
              <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url() ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE); ?>"></a>
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

      $pagination =  paginate_links(array(
        'type' => 'list',
      ));
      if ($pagination) {
        echo '<div class="pagination justify-content-center mt--20">' . $pagination . '</div>';
      }
      ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>