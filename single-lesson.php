<?php get_header(); ?>

<div class="breadcrum-area">
  <div class="container">
    <div class="breadcrumb">
      <ul class="list-unstyled">
        <li><a href="index-1.html">Home</a></li>
        <li class="active">Lesson</li>
      </ul>
      <h1 class="title h2"><?php the_title(); ?></h1>
    </div>
  </div>
  <ul class="shape-group-8 list-unstyled">
    <li class="shape shape-1" data-sal="slide-right" data-sal-duration="500" data-sal-delay="100"><img src="<?php echo get_theme_file_uri("assets/media/others/bubble-9.png") ?>" alt="Bubble"></li>
    <li class="shape shape-2" data-sal="slide-left" data-sal-duration="500" data-sal-delay="200"><img src="<?php echo get_theme_file_uri("assets/media/others/bubble-11.png") ?>" alt="Bubble"></li>
    <li class="shape shape-3" data-sal="slide-up" data-sal-duration="500" data-sal-delay="300"><img src="<?php echo get_theme_file_uri("assets/media/others/line-4.png") ?>" alt="Line"></li>
  </ul>
</div>

<section class="section-padding-equal">
  <div class="container">
    <div class="row row-40">
      <div class="col-lg-8">
        <?php while (have_posts()) {
          the_post(); ?>

          <div class="single-blog">
            <div class="single-blog-content blog-grid">
              <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
              </div>

              <div class="author">
                <div class="info">
                  <h6 class="author-name"><?php the_author(); ?></h6>
                  <ul class="blog-meta list-unstyled">
                    <li><?php the_modified_date(); ?></li>
                    <li><?php echo reading_time(); ?></li>
                  </ul>
                </div>
              </div>

              <article>
                <?php the_content(); ?>
              </article>
            </div>
          </div>

        <?php } ?>

        <div class="widget widget-categories">
          <?php
          $getCourse = get_field('related_courses');

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
                'value' => '"' . $getCourse[0]->ID . '"'
              )
            )
          ));

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

      <div class="col-lg-4">
        <div class="axil-sidebar">
          <div class="widget widget-search">
            <h4 class="widget-title">Search</h4>
            <form action="#" class="blog-search">
              <input type="text" placeholder="Search…">
              <button class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
          </div>

          <div class="widget widget-categories">
            <h4 class="widget-title">Categories</h4>
            <?php
            $categories = get_categories();
            echo '<ul class="category-list list-unstyled">';
            foreach ($categories as $category) {
              echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
            }
            echo '</ul>';
            ?>
          </div>

          <div class="widget widge-social-share">
            <div class="blog-share">
              <h5 class="title">Follow:</h5>
              <ul class="social-list list-unstyled">
                <li><a href="../../../index.htm"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="../../../index-1.htm"><i class="fab fa-twitter"></i></a></li>
                <li><a href="../../../index-4.htm"><i class="fab fa-instagram"></i></a></li>
                <li><a href="../../../index-3.htm"><i class="fab fa-linkedin-in"></i></a></li>
                <li><a href="../../../index-4.htm"><i class="fab fa-instagram"></i></a></li>
                <li><a href="../../../index-8.htm"><i class="fab fa-youtube"></i></a></li>
              </ul>
            </div>
          </div>

          <div class="widget widget-recent-post">
            <h4 class="widget-title">Recent post</h4>
            <div class="post-list-wrap">
              <div class="post-list-wrap">
                <?php
                $popularpost  = new WP_Query(array(
                  'posts_per_page' => 5,
                  'meta_key' => 'wpb_post_views_count',
                  'orderby' => 'meta_value_num',
                  'order' => 'DESC'
                ));

                while ($popularpost->have_posts()) {
                  $popularpost->the_post(); ?>
                  <div class="single-post">
                    <div class="post-thumbnail">
                      <a href="<?php the_permalink() ?>"><?php the_post_thumbnail() ?></a>
                    </div>
                    <div class="post-content">
                      <h6 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h6>
                      <ul class="blog-meta list-unstyled">
                        <li><?php the_modified_date(); ?></li>
                        <li><?php echo reading_time(); ?></li>
                      </ul>
                    </div>
                  </div>
                <?php }
                ?>
              </div>
            </div>
          </div>
          <div class="widget widget-banner-ad">
            <a href="#">
              <img src="<?php echo get_theme_file_uri("assets/media/banner/widget-banner.png") ?>" alt="banner">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>