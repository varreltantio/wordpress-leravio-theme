<?php

// Plugins
include_once(get_template_directory() . '/includes/page-breadcrumb.php');
include_once(get_template_directory() . '/includes/reading-time.php');
include_once(get_template_directory() . '/includes/leravio_comment.php');

// Widgets
include_once(get_template_directory() . '/includes/categories-widget.php');

// Theme Support
include_once(get_template_directory() . '/includes/theme-support.php');

function leravio_file()
{
  // load css
  wp_enqueue_style('boostrap', '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
  wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome-v6', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
  wp_enqueue_style('leravio_main_styles', get_theme_file_uri('/assets/css/style.css'), NULL, '1.3');

  // load js
  wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.6.0.min.js', NULL, '3.6.0', true);
  wp_enqueue_script('jquery-style-switcher', get_theme_file_uri('/assets/js/vendor/jquery.style.switcher.js'), NULL, '1.1', true);
  wp_enqueue_script('cookie', '//cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js', NULL, '3.0.1', true);
  wp_enqueue_script('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', NULL, '1.8.1', true);
  wp_enqueue_script('main-leravio', get_theme_file_uri('/assets/js/app.js'), NULL, '1.3', true);
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

  // add_image_size('homeBlog', 300, 240, true);
  // add_image_size('homeCourse', 278, 210, true);
}

add_action('after_setup_theme', 'leravio_features');

function my_register_sidebars()
{
  /* Register the 'primary' sidebar. */
  register_sidebar(
    array(
      'id'            => 'primary-sidebar',
      'name'          => __('Primary Sidebar'),
      'description'   => __('A short description of the sidebar.'),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    )
  );
}

add_action('widgets_init', 'my_register_sidebars');
