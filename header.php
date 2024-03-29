<!DOCTYPE html>

<html amp <?php language_attributes(); ?>>

<head>

  <meta charset="<?php bloginfo('charset'); ?>">
  <script async src="https://cdn.ampproject.org/v0.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>

  <style amp-boilerplate>
    body {
      -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
      -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
      -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
      animation: -amp-start 8s steps(1, end) 0s 1 normal both
    }

    @-webkit-keyframes -amp-start {
      from {
        visibility: hidden
      }

      to {
        visibility: visible
      }
    }

    @-moz-keyframes -amp-start {
      from {
        visibility: hidden
      }

      to {
        visibility: visible
      }
    }

    @-ms-keyframes -amp-start {
      from {
        visibility: hidden
      }

      to {
        visibility: visible
      }
    }

    @-o-keyframes -amp-start {
      from {
        visibility: hidden
      }

      to {
        visibility: visible
      }
    }

    @keyframes -amp-start {
      from {
        visibility: hidden
      }

      to {
        visibility: visible
      }
    }
  </style>
  <noscript>
    <style amp-boilerplate>
      body {
        -webkit-animation: none;
        -moz-animation: none;
        -ms-animation: none;
        animation: none
      }
    </style>
  </noscript>

</head>

<body <?php body_class(); ?>>
  <a href="#main-wrapper" id="backto-top" class="back-to-top">
    <i class="leravio-icon icon-up">&#xe802;</i>
  </a>

  <div class="my_switcher d-none d-lg-block">
    <ul>
      <li title="Light Mode">
        <a href="javascript:void(0)" class="setColor light" data-theme="light">
          <i class="leravio-icon icon-lightbulb">&#xe801;</i>
        </a>
      </li>
      <li title="Dark Mode">
        <a href="javascript:void(0)" class="setColor dark" data-theme="dark">
          <i class="leravio-icon icon-moon">&#xe800;</i>
        </a>
      </li>
    </ul>
  </div>

  <div id="main-wrapper" class="main-wrapper">
    <header class="header axil-header header-style-1">
      <div id="axil-sticky-placeholder"></div>
      <div class="axil-mainmenu">
        <div class="container">
          <div class="header-navbar">
            <div class="header-logo">
              <?php
              $custom_logo_id = get_theme_mod('custom_logo');
              $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

              if (has_custom_logo()) {
                echo '<a href="' . esc_url(home_url('/')) . '" rel="home">';
                echo '<amp-img width="167" height="60" class="light-version-logo" src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
                echo '</amp-img>';
                echo '</a>';
                echo '<a href="' . esc_url(home_url('/')) . '" rel="home">';
                echo '<amp-img width="167" height="60" class="dark-version-logo" src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
                echo '</amp-img>';
                echo '</a>';
              } else {
                echo '<h1>' . get_bloginfo('name') . '</h1>';
              } ?>
            </div>
            <div class="header-main-nav">
              <!-- Start Mainmanu Nav -->
              <nav class="mainmenu-nav" id="mobilemenu-popup">
                <?php wp_nav_menu(array(
                  'menu_class' => 'mainmenu',
                  'theme_location' => 'headerMenuLocation'
                )) ?>

              </nav>
              <!-- End Mainmanu Nav -->
            </div>

            <div class="header-action">
              <ul class="list-unstyled">
                <li class="sidemenu-btn d-lg-block d-none">
                  <button class="btn-wrap" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenuRight">
                    <span></span>
                    <span></span>
                    <span></span>
                  </button>
                </li>
                <li class="mobile-menu-btn sidemenu-btn d-lg-none d-block">
                  <button class="btn-wrap" data-bs-toggle="offcanvas" data-bs-target="#mobilemenu-popup">
                    <span></span>
                    <span></span>
                    <span></span>
                  </button>
                </li>
                <li class="my_switcher d-block d-lg-none">
                  <ul>
                    <li title="Light Mode">
                      <a href="javascript:void(0)" class="setColor light" data-theme="light">
                        <i class="leravio-icon icon-lightbulb">&#xe801;</i>
                      </a>
                    </li>
                    <li title="Dark Mode">
                      <a href="javascript:void(0)" class="setColor dark" data-theme="dark">
                        <i class="leravio-icon icon-moon">&#xe800;</i>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>