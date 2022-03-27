<?php /*

@package leraviotheme

*/

if (post_password_required()) {
  return;
}

?>

<div id="comments" class="comment-area">
  <h3 class="mt-5">Comments</h3>
  <ul class="list-unstyled blog-comment">
    <?php
    if (have_comments()) :
    ?>
      <div class="parent">
        <?php
        $args = array(
          'type' => 'comment',
          'callback' => 'leravio_comment',
        );

        wp_list_comments($args);
        ?>
      </div>
      <?php
      if (!comments_open() && get_comments_number()) :
      ?>
        <p class="no-comments"><?php esc_html_e('Comments are closed.', 'leraviotheme') ?></p>
    <?php
      endif;
    endif;
    ?>
  </ul>

  <div class="col-lg-8">
    <div class="container">
      <?php
      $comments_args = array(
        'class_submit' => 'axil-btn btn-fill-primary btn-fluid',
        // Change the title of send button 
        'label_submit' => __('Send', 'textdomain'),
        // Change the title of the reply section
        'title_reply' => __('Write a Reply or Comment', 'textdomain'),
        // Remove "Text or HTML to be displayed after the set of comment fields".
        'comment_notes_after' => '',
        // Redefine your own textarea (the comment body).
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x('Comment', 'noun') . '</label><br /><textarea class="form-control textarea" id="comment" name="comment" aria-required="true" cols="30" rows="4"></textarea></p>',
      );
      comment_form($comments_args);
      ?>
    </div>
  </div>
</div>