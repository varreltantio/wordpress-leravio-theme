<?php

function pageBreadCrumb($args = NULL)
{
  if (!$args['archive']) {
    $args['archive'] = get_the_archive_title();
  }

  if (!isset($args['title'])) {
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
        <h1 class="title"><?php echo $args['title']; ?></h1>
      </div>
    </div>
    <ul class="shape-group-8 list-unstyled">
      <li class="shape shape-1"><img src="<?php echo get_theme_file_uri("assets/media/others/bubble-9.png") ?>" alt="Bubble"></li>
      <li class="shape shape-2"><img src="<?php echo get_theme_file_uri("assets/media/others/bubble-11.png") ?>" alt="Bubble"></li>
      <li class="shape shape-3"><img src="<?php echo get_theme_file_uri("assets/media/others/line-4.png") ?>" alt="Line"></li>
    </ul>
  </div>
<?php }
