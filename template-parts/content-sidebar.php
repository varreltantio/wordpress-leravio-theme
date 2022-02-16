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
      $categories = get_categories(array(
        'orderby' => 'count',
        'order'   => 'DESC',
        'number'  => 5,
      ));
      echo '<ul class="category-list list-unstyled">';
      foreach ($categories as $category) {
        if ($category->category_parent == '0') {
          echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
        }
      }
      echo '</ul>';
      ?>
    </div>

    <div class="widget widge-social-share">
      <div class="blog-share">
        <h5 class="title">Follow:</h5>
        <ul class="social-list list-unstyled">
          <?php get_template_part('template-parts/widget', 'socialmedia') ?>
        </ul>
      </div>
    </div>

    <!-- <div class="widget widget-recent-post">
      <h4 class="widget-title">Popular post</h4>
      <div class="post-list-wrap">
        <div class="post-list-wrap">
          <?php
          $post  = array(
            'posts_per_page' => 5,
            'post_type' => 'post',
            'meta_key' => 'wp_post_views_count',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
          );

          $popularpost = new WP_Query($post);

          var_dump($popularpost);
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
    </div> -->

    <div class="widget widget-banner-ad">
      <a href="#">
        <img src="<?php echo get_theme_file_uri("assets/media/banner/widget-banner.png") ?>" alt="banner">
      </a>
    </div>
  </div>
</div>