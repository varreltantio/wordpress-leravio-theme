<?php get_header(); ?>
<div class="breadcrum-area breadcrumb-banner single-breadcrumb">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="section-heading heading-left">
          <h1 class="title h2"><?php the_title(); ?></h1>
          <?php
          if (has_category()) {
            echo '<p class="mb-2">Category:</p>';
            foreach ((get_the_category()) as $category) {
              echo '<a class="btn btn-primary m-1" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
            }
          }

          if (has_tag()) {
            echo '<p class="mt--20 mb-2">Tags:</p>';

            foreach ((get_the_tags()) as $tag) {
              echo '<span class="btn btn-dark m-1">' . $tag->name . '</span>';
            }
          }
          ?>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="banner-thumbnail">
          <img src="<?php the_post_thumbnail_url() ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE); ?>">
        </div>
      </div>
    </div>
  </div>
  <ul class="shape-group-8 list-unstyled">
    <li class="shape shape-1">
      <img src="<?php echo get_theme_file_uri("assets/media/others/bubble-9.png") ?>" alt="Leravio Course 1">
    </li>
    <li class="shape shape-2">
      <img src="<?php echo get_theme_file_uri("assets/media/others/bubble-20.png") ?>" alt="Leravio Course 2">
    </li>
    <li class="shape shape-3">
      <img src="<?php echo get_theme_file_uri("assets/media/others/line-4.png") ?>" alt="Leravio Course 3">
    </li>
  </ul>
</div>

<section class="section-padding single-portfolio-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <article>
          <?php the_content(); ?>
        </article>
        <?php
        $relatedLessons = new WP_Query(array(
          'posts_per_page' => -1,
          'post_type' => 'lesson',
          'meta_key' => 'lesson_order',
          'orderby' => 'meta_value_num',
          'order' => 'ASC',
          'meta_query' => array(
            array(
              'key' => 'lesson_order',
              'compare' => '>=',
              'type' => 'numeric'
            ),
            array(
              'key' => 'related_courses',
              'compare' => 'LIKE',
              'value' => '"' . get_the_ID() . '"'
            )
          )
        ));

        if ($relatedLessons->have_posts()) {
          $first_post = $relatedLessons->posts[0];

          echo ' <a href="' . site_url("lessons/") . $first_post->post_name . '" class="axil-btn btn-fill-primary">Learn Now</a>';
        } else {
          echo '<a href="#" class="axil-btn btn-warning">Cooming Soon</a>';
        }
        ?>

      </div>

      <div class="col-lg-6 offset-xl-1">
        <div class="why-choose-us">
          <div class="section-heading heading-left mb--20">
            <h2 class="title">Curriculum</h2>
          </div>

          <div class="widget widget-categories">
            <?php
            if ($relatedLessons->have_posts()) {
              echo '<ul class="category-list list-unstyled">';
              while ($relatedLessons->have_posts()) {
                $relatedLessons->the_post(); ?>
                <li>
                  <a href="<?php the_permalink() ?>">
                    <?php the_title() ?>
                  </a>
                </li>
            <?php }
              echo '</ul>';
            }

            wp_reset_postdata();
            ?>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>