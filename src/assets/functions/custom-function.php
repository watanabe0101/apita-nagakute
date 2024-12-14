<?php

if (!defined('ABSPATH')) exit;

// 公開からn日の投稿にNewラベルを付与
function keika_time($days) {
  $today = date_i18n('U');
  $entry_day = get_the_time('U');
  $keika = date('U', ($today - $entry_day)) / 86400;
  if ($days > $keika):
    echo '<div class="entry-icon-new">NEW</div>';
  endif;
}