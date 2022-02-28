<?php

function reading_time()
{
  $content = get_post_field('post_content');
  $word_count = str_word_count(strip_tags($content));
  $readingtime = ceil($word_count / 200);

  $totalreadingtime = $readingtime . " menit membaca";
  return $totalreadingtime;
}
