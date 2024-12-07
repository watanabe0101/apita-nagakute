<?php
if ( !defined( 'ABSPATH' ) ) exit;


// オリジナルパンくずリスト
function breadcrumb( $breadcrumb_class = 'breadcrumb' ) {
  ?>
    <div class="<?php echo esc_attr($breadcrumb_class); ?>">
      <ol class="breadcrumb__list" itemscope itemtype="https://schema.org/BreadcrumbList">
        <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a itemprop="item" href="<?php echo esc_url(home_url()); ?>" class="breadcrumb__link">
            <span itemprop="name">HOME</span>
          </a>
          <meta itemprop="position" content="1">
          <span class="fas fa-angle-right" aria-hidden="true"></span>
        </li>

        <!-- 固定ページの子ページの場合 -->
        <?php if(is_page() && isset($post) && $post->post_parent): ?>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_page_link($post->post_parent); ?>" href="<?php echo get_page_link($post->post_parent); ?>" class="breadcrumb__link">
              <span itemprop="name"><?php echo get_the_title($post->post_parent); ?></span>
            </a>
            <meta itemprop="position" content="2">
          </li>

          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name"><?php echo strtoupper(get_the_title()); ?></span>
            <meta itemprop="position" content="3">
            <span class="fas fa-angle-right" aria-hidden="true"></span>
          </li>

        <!-- 固定ページの場合 -->
        <?php elseif(is_page()): ?>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name"><?php echo strtoupper(get_the_title()); ?></span>
            <meta itemprop="position" content="2">
          </li>

        <!-- 年別アーカイブページの場合 -->
        <?php elseif(is_year()): ?>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>" class="breadcrumb__link">
              <span itemprop="name"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
            </a>
            <meta itemprop="position" content="2">
            <span class="fas fa-angle-right" aria-hidden="true"></span>
          </li>

          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name"><?php echo get_query_var('year'); ?>年</span>
            <meta itemprop="position" content="3">
          </li>

        <!-- 月別アーカイブページの場合 -->
        <?php elseif(is_month()): ?>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>" class="breadcrumb__link">
              <span itemprop="name"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
            </a>
            <meta itemprop="position" content="2">
            <span class="fas fa-angle-right" aria-hidden="true"></span>
          </li>

          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_year_link(get_query_var("year")); ?>?post_type=<?php echo esc_html(get_post_type_object(get_post_type())->name); ?>" href="<?php echo get_year_link(get_query_var("year")); ?>?post_type=<?php echo esc_html(get_post_type_object(get_post_type())->name); ?>" class="breadcrumb__link">
              <span itemprop="name"><?php echo get_query_var('year');?>年</span>
            </a>
            <meta itemprop="position" content="3">
            <span class="fas fa-angle-right" aria-hidden="true"></span>
          </li>

          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name"><?php echo get_query_var('monthnum'); ?>月</span>
            <meta itemprop="position" content="4">
          </li>

        <!-- タクソノミーのアーカイブページの場合 -->
        <?php elseif(is_tax()): ?>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>" class="breadcrumb__link">
              <span itemprop="name"><?php echo esc_html(strtoupper(get_post_type_object(get_post_type())->name)); ?></span>
            </a>
            <meta itemprop="position" content="2">
            <span class="fas fa-angle-right" aria-hidden="true"></span>
          </li>

          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <?php $term = get_queried_object(); ?>
            <span itemprop="name"><?php echo esc_html($term->slug); ?></span>
            <meta itemprop="position" content="3">
          </li>

        <!-- カスタム投稿のアーカイブページの場合 -->
        <?php elseif(is_post_type_archive()): ?>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name"><?php echo esc_html(strtoupper(get_query_var('post_type'))); ?></span>
            <meta itemprop="position" content="2">
          </li>

        <!-- 記事ページの場合 -->
        <?php elseif(is_single() && !is_singular('works')): ?>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>" class="breadcrumb__link">
              <span itemprop="name"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></span>
            </a>
            <meta itemprop="position" content="2">
            <span class="fas fa-angle-right" aria-hidden="true"></span>
          </li>

          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name"><?php single_post_title(); ?></span>
            <meta itemprop="position" content="3">
          </li>

          <!-- カスタム投稿の記事ページの場合 -->
        <?php elseif(is_singular('works')): ?>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo get_post_type_archive_link(get_post_type()); ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>" class="breadcrumb__link">
              <span itemprop="name"><?php echo esc_html(strtoupper(get_query_var('post_type'))); ?></span>
            </a>
            <meta itemprop="position" content="2">
            <span class="fas fa-angle-right" aria-hidden="true"></span>
          </li>

          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name"><?php single_post_title(); ?></span>
            <meta itemprop="position" content="3">
          </li>

        <!--  404エラーページの場合 -->
        <?php elseif(is_404()): ?>
          <li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name">404</span>
            <meta itemprop="position" content="2">
          </li>

        <?php endif; ?>
      </ol>
    </div>
  <?php
}