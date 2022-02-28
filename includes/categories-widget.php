<?php

/*
Plugin Name: Leravio Categories Widget
Version: 1.0
*/

class Leravio_Widget_Categories extends WP_Widget
{

  function Leravio_Widget_Categories()
  {
    $widget_ops = array('classname' => 'widget-categories', 'description' => __("My list or dropdown of categories"));
    $this->WP_Widget('custom_categories_widget', __('Custom Categories Widget (Leravio)'), $widget_ops);
  }

  function widget($args, $instance)
  {
    extract($args);

    $title = apply_filters('widget_title', empty($instance['title']) ? __('Categories') : $instance['title']);
    $c = $instance['count'] ? '1' : '0';
    $h = $instance['hierarchical'] ? '1' : '0';
    $d = $instance['dropdown'] ? '1' : '0';
    $n = ($instance['number'] < 0) ? 5 : $instance['number'];

    echo $before_widget;
    if ($title)
      echo $before_title . $title . $after_title;

    $cat_args = array(
      'orderby' => 'count',
      'order'   => 'DESC',
      'show_count' => $c,
      'hierarchical' => $h,
      'number' => $n,
      'echo' => 0,
    );

    if ($d) {
      $cat_args['show_option_none'] = __('Select Category');
      wp_dropdown_categories(apply_filters('widget_categories_dropdown_args', $cat_args));
?>

      <script type='text/javascript'>
        /* <![CDATA[ */
        var dropdown = document.getElementById("cat");

        function onCatChange() {
          if (dropdown.options[dropdown.selectedIndex].value > 0) {
            location.href = "<?php echo get_option('home'); ?>/?cat=" + dropdown.options[dropdown.selectedIndex].value;
          }
        }
        dropdown.onchange = onCatChange;
        /* ]]> */
      </script>

    <?php
    } else {
    ?>
      <ul class="category-list list-unstyled">
        <?php
        $cat_args['title_li'] = '';

        // Get the category list, and tweak the output of the markup.
        $pattern = '#<li([^>]*)><a([^>]*)>(.*?)<\/a>\s*\(([0-9]*)\)\s*<\/li>#i';  // removed ( and )

        $replacement = '<li$1><a$2><span class="cat-name">$3</span> <span class="cat-count">($4)</span></a>'; // give cat name and count a span, wrap it all in a link

        $subject      = wp_list_categories(apply_filters('widget_categories_args', $cat_args));
        echo preg_replace($pattern, $replacement, $subject);
        ?>
      </ul>
    <?php
    }

    echo $after_widget;
  }

  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['count'] = $new_instance['count'] ? 1 : 0;
    $instance['hierarchical'] = $new_instance['hierarchical'] ? 1 : 0;
    $instance['dropdown'] = $new_instance['dropdown'] ? 1 : 0;
    $instance['number'] = strip_tags($new_instance['number'] < 0 ? 5 : $new_instance['number']);

    return $instance;
  }

  function form($instance)
  {
    //Defaults
    $instance = wp_parse_args((array) $instance, array('title' => ''));
    $title = esc_attr($instance['title']);
    $count = isset($instance['count']) ? (bool) $instance['count'] : false;
    $hierarchical = isset($instance['hierarchical']) ? (bool) $instance['hierarchical'] : false;
    $dropdown = isset($instance['dropdown']) ? (bool) $instance['dropdown'] : false;
    $number = esc_attr($instance['number']);

    ?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
    </p>

    <p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('dropdown'); ?>" name="<?php echo $this->get_field_name('dropdown'); ?>" <?php checked($dropdown); ?> />
      <label for="<?php echo $this->get_field_id('dropdown'); ?>"><?php _e('Show as dropdown'); ?></label><br />

      <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" <?php checked($count); ?> />
      <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Show post counts'); ?></label><br />

      <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('hierarchical'); ?>" name="<?php echo $this->get_field_name('hierarchical'); ?>" <?php checked($hierarchical); ?> />
      <label for="<?php echo $this->get_field_id('hierarchical'); ?>"><?php _e('Show hierarchy'); ?></label>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="number" value="<?php echo $number; ?>" />
    </p>
<?php
  }
}

function cw_load_leravio_widget_categories()
{
  register_widget('Leravio_Widget_Categories');
}
add_action('widgets_init', 'cw_load_leravio_widget_categories');
