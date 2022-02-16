<?php get_header();

pageBreadCrumb(array(
  'archive' => 'Blog',
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

      </div>

      <?php get_template_part('template-parts/content', 'sidebar') ?>
    </div>
  </div>
</section>

<?php
get_footer(); ?>