<?php get_header();
pageBreadCrumb(array(
  'archive' => 'Lesson',
));
?>

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

      <?php get_template_part('template-parts/content', 'sidebar') ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>