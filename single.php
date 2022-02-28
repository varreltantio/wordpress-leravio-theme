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
                <img src="<?php the_post_thumbnail_url() ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE); ?>">
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
                <?php
                the_content();

                if (has_tag()) {
                  echo '<p class="mt--20 mb-2">Tags:</p>';

                  foreach ((get_the_tags()) as $tag) {
                    echo '<span class="btn btn-dark m-1">' . $tag->name . '</span>';
                  }
                }
                ?>
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