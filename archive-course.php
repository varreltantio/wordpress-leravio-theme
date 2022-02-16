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
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4">
      <?php
      while (have_posts()) {
        the_post(); ?>
        <div class="col">
          <div class="project-grid">
            <div class="thumbnail">
              <a href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url('homeCourse') ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE); ?>">
              </a>
            </div>
            <div class="content">
              <h5 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
              <span class="subtitle"><?php if (has_excerpt()) {
                                        echo wp_trim_words(get_the_excerpt(), 18);
                                      } else {
                                        echo wp_trim_words(get_the_content(), 18);
                                      } ?>
              </span>
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