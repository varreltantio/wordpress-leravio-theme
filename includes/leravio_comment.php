<?php

function leravio_comment($comment, $args, $depth)
{
  if ('div' === $args['style']) {
    $tag       = 'div';
    $add_below = 'comment';
  } else {
    $tag       = 'li';
    $add_below = 'div-comment';
  } ?>
  <<?php echo $tag; ?> <?php comment_class(empty($args['has_children']) ? 'list-unstyled' : 'parent'); ?> id="comment-<?php comment_ID() ?>">
    <?php
    if ('div' != $args['style']) { ?>
      <div id="div-comment-<?php comment_ID() ?>" class="comment-list">
        <div class="comment">
        <?php
      } ?>
        <div class="comment-author thumbnail">
          <?php
          if ($args['avatar_size'] != 0) {
            echo get_avatar($comment, $args['avatar_size']);
          } ?>
        </div>

        <div class="content">
          <div class="heading">
            <?php printf(__('<h5 class="title">%s</h5>'), get_comment_author_link()); ?>
            <div class="comment-date">
              <p><?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()); ?></p>
              <div class="reply-btn">
                <?php
                comment_reply_link(
                  array_merge(
                    $args,
                    array(
                      'add_below' => $add_below,
                      'depth'     => $depth,
                      'max_depth' => $args['max_depth']
                    )
                  )
                ); ?>
              </div>
            </div>
          </div>

          <p><?php comment_text(); ?></p>
          <?php
          if ($comment->comment_approved == '0') : ?>
            <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.'); ?></em><br />
          <?php
          endif; ?>
          <p><?php edit_comment_link(__('(Edit)'), '  ', ''); ?></p>
        </div>
        <?php
        if ('div' != $args['style']) : ?>
        </div>
      </div>
  <?php
        endif;
      }
