<?php
if ( !defined( 'ABSPATH' ) ) exit;


// カスタム投稿のタームをターム別一覧ページへのリンク付きで取得
function display_category_labels($taxonomy, $custom_class = '') {
  $categories = get_the_category();
  $genre_terms = get_the_terms(get_the_ID(), $taxonomy);

  if ($genre_terms && !is_wp_error($genre_terms)) {
    $categories = array_merge($categories, $genre_terms);
  }

  if (!empty($categories) && is_array($categories)) {
    foreach ($categories as $category) { 
      $term_link = get_term_link($category); // ターム別一覧ページへのリンク取得

      if (!is_wp_error($term_link) && !empty($term_link)) { ?>
        <a href="<?php echo esc_url($term_link); ?>" class="<?php echo esc_attr($custom_class); ?>"># <?php echo esc_html($category->name); ?></a>
      <?php
      } else {
        $category_link = get_category_link($category->term_id); // カテゴリー一覧ページへのリンク取得
        if (!is_wp_error($category_link) && !empty($category_link)) { ?>
          <a href="<?php echo esc_url($category_link); ?>" class="<?php echo esc_attr($custom_class); ?>"><?php echo esc_html($category->name); ?></a>
        <?php
        } else { ?>
          <span class="<?php echo esc_attr($custom_class); ?>"><?php echo esc_html($category->name); ?></span>
        <?php
        }
      }
    }
  }
}


//taxonomy-labelをクラス名にtaxonomy名を付与して出力（リンクなし）
function taxonomies_label()
{
  if ($terms = get_the_terms(get_the_ID(), 'genre')) {
    foreach ($terms as $term) {
      echo ('<p ');
      echo 'class="card__label-' . esc_attr($term->slug) . '">';
      echo esc_html($term->name);
      echo ('</p>');
    }
  }
}


//taxonomy-labelをクラス名にtaxonomy名を付与して出力（リンクあり）
function taxonomies_label_link()
{
  if ($terms = get_the_terms(get_the_ID(), 'タクソノミー')) {
    foreach ($terms as $term) {
      echo ('<p ');
      echo 'class="card__' . esc_attr($term->slug) . '"><a href="card__' . get_term_link($term->slug, 'タクソノミー') . '">';
      echo esc_html($term->name);
      echo ('</a></p>');
    }
  }
}


//taxonomy-labelをクラスを付与せずに出力（リンクなし）
function taxonomies_label_simple()
{
  if ($terms = get_the_terms(get_the_ID(), 'genre')) {
    foreach ($terms as $term) {
      echo ('<p class="card__label">');
      echo esc_html($term->name);
      echo ('</p>');
    }
  }
}