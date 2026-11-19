<?php
/**
 * Shareflare header layout.
 */
$brand_text    = get_sub_field('brand_text') ?: 'shareflare';
$active_page   = get_sub_field('active_page') ?: 'home';
$search_label  = get_sub_field('search_placeholder') ?: __('Search in site', 'projecttheme');
$navigation    = get_sub_field('navigation') ?: [];
$search_action = get_sub_field('search_action');
$search_action = is_array($search_action) && !empty($search_action['url']) ? $search_action['url'] : home_url('/');
?>
<header
  class="shareflare-header"
  data-node-id="69:423"
  data-name="Header"
>
  <span class="shareflare-header__mark" aria-hidden="true"></span>

  <?php if ($brand_text) : ?>
    <a class="shareflare-header__brand" href="<?php echo esc_url(home_url('/')); ?>">
      <?php echo esc_html($brand_text); ?>
    </a>
  <?php endif; ?>

  <div class="shareflare-header__right">
    <?php if (!empty($navigation)) : ?>
      <nav class="shareflare-header__nav" aria-label="<?php esc_attr_e('Primary navigation', 'projecttheme'); ?>">
        <?php foreach ($navigation as $item) :
          $item_label = $item['label'] ?? '';
          $item_link  = $item['link'] ?? [];
          $item_key   = strtolower(trim((string) $item['key'])) ?: '';
          $item_url   = is_array($item_link) && !empty($item_link['url']) ? $item_link['url'] : '';
          $item_target = is_array($item_link) && !empty($item_link['target']) ? $item_link['target'] : '_self';
          $item_rel    = $item_target === '_blank' ? 'noopener noreferrer' : '';

          if ($item_label === '') {
            continue;
          }
        ?>
          <?php if ($item_url) : ?>
            <a
              class="shareflare-header__nav-item<?php echo $item_key === $active_page ? ' is-active' : ''; ?>"
              href="<?php echo esc_url($item_url); ?>"
              target="<?php echo esc_attr($item_target); ?>"
              rel="<?php echo esc_attr($item_rel); ?>"
              <?php echo $item_key === $active_page ? 'aria-current="page"' : ''; ?>
            ><?php echo esc_html($item_label); ?></a>
          <?php else : ?>
            <span class="shareflare-header__nav-item<?php echo $item_key === $active_page ? ' is-active' : ''; ?>">
              <?php echo esc_html($item_label); ?>
            </span>
          <?php endif; ?>
        <?php endforeach; ?>
      </nav>
    <?php endif; ?>

    <form class="shareflare-header__search" role="search" method="get" action="<?php echo esc_url($search_action); ?>">
      <label class="visually-hidden" for="shareflare-header-search">
        <?php echo esc_html($search_label); ?>
      </label>
      <input
        id="shareflare-header-search"
        class="shareflare-header__search-input"
        type="search"
        name="s"
        placeholder="<?php echo esc_attr($search_label); ?>"
      >
      <button class="shareflare-header__search-button" type="submit" aria-label="<?php esc_attr_e('Search', 'projecttheme'); ?>">
        <img
          src="<?php echo esc_url(get_theme_file_uri('/assets/images/header-search.svg')); ?>"
          width="20"
          height="20"
          alt=""
          aria-hidden="true"
        >
      </button>
    </form>
  </div>
</header>
