<?php
if (!defined('ABSPATH')) exit;


// オリジナルパンくずリスト
function breadcrumb($breadcrumb_class = 'breadcrumb')
{
?>
  <div class="<?php echo esc_attr($breadcrumb_class); ?>">
    <ol class="breadcrumb__list" itemscope itemtype="https://schema.org/BreadcrumbList">
      <li class="breadcrumb__item breadcrumb__home" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="<?php echo esc_url(home_url()); ?>" class="breadcrumb__link">
          <span itemprop="name">ホーム</span>
        </a>
        <meta itemprop="position" content="1">
        <span class="breadcrumb__arrow" aria-hidden="true"></span>
      </li>

      <!-- 固定ページの子ページの場合 -->
      <?php if (is_page() && isset($post) && $post->post_parent): ?>
        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_page_link($post->post_parent); ?>" href="<?php echo get_page_link($post->post_parent); ?>" class="breadcrumb__link">
            <span itemprop="name"><?php echo get_the_title($post->post_parent); ?></span>
          </a>
          <meta itemprop="position" content="2">
        </li>

        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name"><?php echo strtoupper(get_the_title()); ?></span>
          <meta itemprop="position" content="3">
          <span class="breadcrumb__arrow" aria-hidden="true"></span>
        </li>

        <!-- 固定ページの場合 -->
      <?php elseif (is_page()): ?>
        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name"><?php echo get_the_title(); ?></span>
          <meta itemprop="position" content="2">
        </li>

        <!-- 年別アーカイブページの場合 -->
      <?php elseif (is_year()): ?>
        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>" class="breadcrumb__link">
            <span itemprop="name"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
          </a>
          <meta itemprop="position" content="2">
          <span class="breadcrumb__arrow" aria-hidden="true"></span>
        </li>

        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name"><?php echo get_query_var('year'); ?>年</span>
          <meta itemprop="position" content="3">
        </li>

        <!-- 月別アーカイブページの場合 -->
      <?php elseif (is_month()): ?>
        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>" class="breadcrumb__link">
            <span itemprop="name"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
          </a>
          <meta itemprop="position" content="2">
          <span class="breadcrumb__arrow" aria-hidden="true"></span>
        </li>

        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_year_link(get_query_var("year")); ?>?post_type=<?php echo esc_html(get_post_type_object(get_post_type())->name); ?>" href="<?php echo get_year_link(get_query_var("year")); ?>?post_type=<?php echo esc_html(get_post_type_object(get_post_type())->name); ?>" class="breadcrumb__link">
            <span itemprop="name"><?php echo get_query_var('year'); ?>年</span>
          </a>
          <meta itemprop="position" content="3">
          <span class="breadcrumb__arrow" aria-hidden="true"></span>
        </li>

        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name"><?php echo get_query_var('monthnum'); ?>月</span>
          <meta itemprop="position" content="4">
        </li>

        <!-- タクソノミーのアーカイブページの場合 -->
      <?php elseif (is_tax()): ?>
        <?php
        $current_taxonomy = get_queried_object();
        $taxonomy_name = $current_taxonomy->taxonomy; // タクソノミー名を取得
        $post_type = get_taxonomy($taxonomy_name)->object_type[0]; // このタクソノミーに紐づく投稿タイプを取得
        $post_type_obj = get_post_type_object($post_type);

        if ($current_taxonomy && is_object($current_taxonomy)): ?>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemprop="item" href="<?php echo esc_url(get_post_type_archive_link($post_type)); ?>" class="breadcrumb__link">
              <span itemprop="name"><?php echo esc_html($post_type_obj->label); ?></span> <!-- カスタム投稿一覧のリンク -->
            </a>
            <meta itemprop="position" content="2">
            <span class="breadcrumb__arrow" aria-hidden="true"></span>
          </li>

          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name"><?php echo esc_html($current_taxonomy->name); ?></span> <!-- ターム名を表示 -->
            <meta itemprop="position" content="3">
          </li>
        <?php endif; ?>

        <!-- カスタム投稿のアーカイブページの場合 -->
      <?php elseif (is_post_type_archive()): ?>
        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name"><?php echo esc_html(get_post_type_object(get_query_var('post_type'))->label); ?></span>
          <meta itemprop="position" content="2">
        </li>

        <!-- 記事ページの場合 -->
      <?php elseif (is_single() && !is_singular('works')): ?>
        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>" class="breadcrumb__link">
            <span itemprop="name"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
          </a>
          <meta itemprop="position" content="2">
          <span class="breadcrumb__arrow" aria-hidden="true"></span>
        </li>

        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name"><?php single_post_title(); ?></span>
          <meta itemprop="position" content="3">
        </li>

        <!-- カスタム投稿の記事ページの場合 -->
      <?php elseif (is_singular('works')): ?>
        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>" class="breadcrumb__link">
            <span itemprop="name"><?php echo esc_html(strtoupper(get_query_var('post_type'))); ?></span>
          </a>
          <meta itemprop="position" content="2">
          <span class="breadcrumb__arrow" aria-hidden="true"></span>
        </li>

        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name"><?php single_post_title(); ?></span>
          <meta itemprop="position" content="3">
        </li>

        <!--  404エラーページの場合 -->
      <?php elseif (is_404()): ?>
        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name">404</span>
          <meta itemprop="position" content="2">
        </li>

      <?php endif; ?>
    </ol>
  </div>
<?php
}

// recruitパンくずリスト
function breadcrumb_recruit($breadcrumb_class = 'breadcrumb')
{
?>
  <div class="<?php echo esc_attr($breadcrumb_class); ?>">
    <ol class="breadcrumb__list" itemscope itemtype="https://schema.org/BreadcrumbList">
      <li class="breadcrumb__item breadcrumb__home" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="<?php echo esc_url(home_url()); ?>" class="breadcrumb__link">
          <span itemprop="name">ホーム</span>
        </a>
        <meta itemprop="position" content="1">
        <span class="breadcrumb__arrow" aria-hidden="true"></span>
      </li>

      <!-- 固定ページの子ページの場合 -->
      <?php if (is_page() && isset($post) && $post->post_parent): ?>
        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_page_link($post->post_parent); ?>" href="<?php echo get_page_link($post->post_parent); ?>" class="breadcrumb__link">
            <span itemprop="name"><?php echo get_the_title($post->post_parent); ?></span>
          </a>
          <meta itemprop="position" content="2">
        </li>

        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name"><?php echo strtoupper(get_the_title()); ?></span>
          <meta itemprop="position" content="3">
          <span class="breadcrumb__arrow" aria-hidden="true"></span>
        </li>

        <!-- 固定ページの場合 -->
      <?php elseif (is_page()): ?>
        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name"><?php echo strtoupper(get_the_title()); ?></span>
          <meta itemprop="position" content="2">
        </li>

        <!-- 年別アーカイブページの場合 -->
      <?php elseif (is_year()): ?>
        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>" class="breadcrumb__link">
            <span itemprop="name"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
          </a>
          <meta itemprop="position" content="2">
          <span class="breadcrumb__arrow" aria-hidden="true"></span>
        </li>

        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name"><?php echo get_query_var('year'); ?>年</span>
          <meta itemprop="position" content="3">
        </li>

        <!-- 月別アーカイブページの場合 -->
      <?php elseif (is_month()): ?>
        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>" class="breadcrumb__link">
            <span itemprop="name"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
          </a>
          <meta itemprop="position" content="2">
          <span class="breadcrumb__arrow" aria-hidden="true"></span>
        </li>

        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_year_link(get_query_var("year")); ?>?post_type=<?php echo esc_html(get_post_type_object(get_post_type())->name); ?>" href="<?php echo get_year_link(get_query_var("year")); ?>?post_type=<?php echo esc_html(get_post_type_object(get_post_type())->name); ?>" class="breadcrumb__link">
            <span itemprop="name"><?php echo get_query_var('year'); ?>年</span>
          </a>
          <meta itemprop="position" content="3">
          <span class="breadcrumb__arrow" aria-hidden="true"></span>
        </li>

        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name"><?php echo get_query_var('monthnum'); ?>月</span>
          <meta itemprop="position" content="4">
        </li>

        <!-- タクソノミーのアーカイブページの場合 -->
      <?php elseif (is_tax()): ?>
        <?php
        $current_taxonomy = get_queried_object();
        $taxonomy_name = $current_taxonomy->taxonomy; // タクソノミー名を取得
        $post_type = get_taxonomy($taxonomy_name)->object_type[0]; // このタクソノミーに紐づく投稿タイプを取得
        $post_type_obj = get_post_type_object($post_type);

        if ($current_taxonomy && is_object($current_taxonomy)): ?>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemprop="item" href="<?php echo esc_url(get_post_type_archive_link($post_type)); ?>" class="breadcrumb__link">
              <span itemprop="name"><?php echo esc_html($post_type_obj->label); ?></span> <!-- カスタム投稿一覧のリンク -->
            </a>
            <meta itemprop="position" content="2">
            <span class="breadcrumb__arrow" aria-hidden="true"></span>
          </li>

          <?php
          // 'recruitment_status' タクソノミーの 'currently-recruiting' タームを取得
          $currently_recruiting_term = get_term_by('slug', 'currently-recruiting', 'recruitment_status');
          if ($currently_recruiting_term): ?>
            <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <span itemprop="name"><?php echo esc_html($currently_recruiting_term->name); ?>の求人情報</span> <!-- 'currently-recruiting' ターム名を表示 -->
              <meta itemprop="position" content="3">
              <span class="breadcrumb__arrow" aria-hidden="true"></span>
            </li>
          <?php endif; ?>

          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name"><?php echo esc_html($current_taxonomy->name); ?></span> <!-- ターム名を表示 -->
            <meta itemprop="position" content="4">
          </li>
        <?php endif; ?>


        <!-- カスタム投稿のアーカイブページの場合 -->
      <?php elseif (is_post_type_archive()): ?>
        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name"><?php echo esc_html(get_post_type_object(get_query_var('post_type'))->label); ?></span>
          <meta itemprop="position" content="2">
        </li>

        <!-- 記事ページの場合 -->
      <?php elseif (is_single() && !is_singular('works')): ?>
        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>" class="breadcrumb__link">
            <span itemprop="name"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
          </a>
          <meta itemprop="position" content="2">
          <span class="breadcrumb__arrow" aria-hidden="true"></span>
        </li>

        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name"><?php single_post_title(); ?></span>
          <meta itemprop="position" content="3">
        </li>

        <!-- カスタム投稿の記事ページの場合 -->
      <?php elseif (is_singular('works')): ?>
        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>" class="breadcrumb__link">
            <span itemprop="name"><?php echo esc_html(strtoupper(get_query_var('post_type'))); ?></span>
          </a>
          <meta itemprop="position" content="2">
          <span class="breadcrumb__arrow" aria-hidden="true"></span>
        </li>

        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name"><?php single_post_title(); ?></span>
          <meta itemprop="position" content="3">
        </li>

        <!--  404エラーページの場合 -->
      <?php elseif (is_404()): ?>
        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name">404</span>
          <meta itemprop="position" content="2">
        </li>

      <?php endif; ?>
    </ol>
  </div>
<?php
}

// recruitパンくずリスト
function breadcrumb_recruitment_status($breadcrumb_class = 'breadcrumb')
{
?>
  <div class="<?php echo esc_attr($breadcrumb_class); ?>">
    <ol class="breadcrumb__list" itemscope itemtype="https://schema.org/BreadcrumbList">
      <li class="breadcrumb__item breadcrumb__home" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="<?php echo esc_url(home_url()); ?>" class="breadcrumb__link">
          <span itemprop="name">ホーム</span>
        </a>
        <meta itemprop="position" content="1">
        <span class="breadcrumb__arrow" aria-hidden="true"></span>
      </li>

      <!-- タクソノミーのアーカイブページの場合 -->
      <?php if (is_tax()): ?>
        <?php
        $current_taxonomy = get_queried_object();
        $taxonomy_name = $current_taxonomy->taxonomy; // タクソノミー名を取得
        $post_type = get_taxonomy($taxonomy_name)->object_type[0]; // このタクソノミーに紐づく投稿タイプを取得
        $post_type_obj = get_post_type_object($post_type);

        if ($current_taxonomy && is_object($current_taxonomy)): ?>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemprop="item" href="<?php echo esc_url(get_post_type_archive_link($post_type)); ?>" class="breadcrumb__link">
              <span itemprop="name"><?php echo esc_html($post_type_obj->label); ?></span> <!-- カスタム投稿一覧のリンク -->
            </a>
            <meta itemprop="position" content="2">
            <span class="breadcrumb__arrow" aria-hidden="true"></span>
          </li>

          <?php
          // 'recruitment_status' タクソノミーの 'currently-recruiting' タームを取得
          $currently_recruiting_term = get_term_by('slug', 'currently-recruiting', 'recruitment_status');
          if ($currently_recruiting_term): ?>
            <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <span itemprop="name"><?php echo esc_html($currently_recruiting_term->name); ?>の求人情報</span> <!-- 'currently-recruiting' ターム名を表示 -->
              <meta itemprop="position" content="3">
            </li>
          <?php endif; ?>
        <?php endif; ?>
      <?php endif; ?>
    </ol>
  </div>
<?php
}
