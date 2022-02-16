<?php

function pageBreadCrumb($args = NULL)
{
  if (!$args['archive']) {
    $args['archive'] = get_the_archive_title();
  }

  if (!$args['title']) {
    $args['title'] = get_the_title();
  }
?>
  <div class="breadcrum-area">
    <div class="container">
      <div class="breadcrumb">
        <ul class="list-unstyled">
          <li><a href="<?php echo site_url(); ?>">Home</a></li>
          <li class="active"><?php echo $args['archive']; ?></li>
        </ul>
        <h1 class="title h2"><?php echo $args['title']; ?></h1>
      </div>
    </div>
    <ul class="shape-group-8 list-unstyled">
      <li class="shape shape-1"><img src="<?php echo get_theme_file_uri("assets/media/others/bubble-9.png") ?>" alt="Bubble"></li>
      <li class="shape shape-2"><img src="<?php echo get_theme_file_uri("assets/media/others/bubble-11.png") ?>" alt="Bubble"></li>
      <li class="shape shape-3"><img src="<?php echo get_theme_file_uri("assets/media/others/line-4.png") ?>" alt="Line"></li>
    </ul>
  </div>
<?php }

function leravio_file()
{
  wp_enqueue_script('main-leravio-js', get_theme_file_uri('/assets/js/app.js'), NULL, microtime(), true);

  wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.6.0.min.js');
  wp_enqueue_script('jquery-style-switcher', get_theme_file_uri('/assets/js/vendor/jquery.style.switcher.js'), NULL, 1.0, true);
  wp_enqueue_script('cookie-js', '//cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js');
  wp_enqueue_script('slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js');

  wp_enqueue_style('boostrap', '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
  wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
  wp_enqueue_style('leravio_main_styles', get_stylesheet_uri(), NULL, microtime());
}

add_action('wp_enqueue_scripts', 'leravio_file');

function leravio_custom_logo_setup()
{
  $defaults = array(
    'height'               => 60,
    'width'                => 187,
    'flex-height'          => true,
    'flex-width'           => true,
    'header-text'          => array('site-title', 'site-description'),
    'unlink-homepage-logo' => true,
  );

  add_theme_support('custom-logo', $defaults);
}

add_action('after_setup_theme', 'leravio_custom_logo_setup');

function leravio_features()
{
  register_nav_menu('headerMenuLocation', 'Header Menu Location');
  register_nav_menu('footerResource', 'Footer Resource');
  register_nav_menu('footerSupport', 'Footer Support');

  // set title tag
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');

  add_image_size('homeBlog', 300, 240, true);
  add_image_size('homeCourse', 278, 210, true);
}

add_action('after_setup_theme', 'leravio_features');

function reading_time()
{
  $content = get_post_field('post_content', $post->ID);
  $word_count = str_word_count(strip_tags($content));
  $readingtime = ceil($word_count / 200);

  $totalreadingtime = $readingtime . " menit membaca";
  return $totalreadingtime;
}
