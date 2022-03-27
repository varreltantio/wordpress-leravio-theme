<?php get_header();

pageBreadCrumb(array(
  'archive' => get_the_title(),
  'title' => get_the_title(),
));

while (have_posts()) {
  the_post();
  the_content();
}

get_footer();
