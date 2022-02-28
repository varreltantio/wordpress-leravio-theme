<?php get_header();

pageBreadCrumb(array(
  'archive' => 'Blog',
  'title' => 'Blog'
));
?>

<section class="section-padding-equal">
  <div class="container">
    <div class="row row-40">
      <div class="col-lg-8">
        <?php
        while (have_posts()) {
          the_post(); ?>

          <div class="blog-grid">
            <h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
            <div class="post-thumbnail">
              <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url() ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE); ?>"></a>
            </div>
            <p><?php the_excerpt() ?></p>
            <a href="<?php the_permalink() ?>" class="axil-btn btn-borderd btn-large">Read More</a>
          </div>
        <?php }

        $pagination =  paginate_links(array(
          'type' => 'list'
        ));
        if ($pagination) {
          echo '<div class="pagination">' . $pagination . '</div>';
        }
        ?>
      </div>

      <?php get_template_part('template-parts/content', 'sidebar') ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>