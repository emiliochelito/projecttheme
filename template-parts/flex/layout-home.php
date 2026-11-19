<?php
/**
 * Shareflare home module.
 */
$hero_title    = get_sub_field('hero_title');
$hero_subtitle = get_sub_field('hero_subtitle');
$sort_label    = get_sub_field('sort_label') ?: __('sort', 'projecttheme');
$filters_label = get_sub_field('filters_label') ?: __('filters', 'projecttheme');
$section_title = get_sub_field('section_title');
$videos        = get_sub_field('videos') ?: [];
$see_more      = get_sub_field('see_more');

$see_more_url    = is_array($see_more) && !empty($see_more['url']) ? $see_more['url'] : '';
$see_more_label  = is_array($see_more) && !empty($see_more['title']) ? $see_more['title'] : __('see more', 'projecttheme');
$see_more_target = is_array($see_more) && !empty($see_more['target']) ? $see_more['target'] : '_self';
$see_more_rel    = $see_more_target === '_blank' ? 'noopener noreferrer' : '';
?>
<div class="shareflare-home">
  <?php if ($hero_title || $hero_subtitle) : ?>
    <header class="shareflare-home__hero">
      <?php if ($hero_title) : ?>
        <h1 class="shareflare-home__title"><?php echo esc_html($hero_title); ?></h1>
      <?php endif; ?>

      <?php if ($hero_subtitle) : ?>
        <p class="shareflare-home__subtitle"><?php echo esc_html($hero_subtitle); ?></p>
      <?php endif; ?>

      <img
        class="shareflare-home__divider"
        src="<?php echo esc_url(get_theme_file_uri('/assets/images/shareflare-home-divider.svg')); ?>"
        width="1220"
        height="1"
        alt=""
        aria-hidden="true"
      >
    </header>
  <?php endif; ?>

  <div class="shareflare-home__content">
    <?php if ($sort_label || $filters_label) : ?>
      <div class="shareflare-home__controls" role="group" aria-label="<?php esc_attr_e('Video controls', 'projecttheme'); ?>">
        <?php if ($sort_label) : ?>
          <span class="shareflare-home__control"><?php echo esc_html($sort_label); ?></span>
        <?php endif; ?>
        <?php if ($filters_label) : ?>
          <span class="shareflare-home__control"><?php echo esc_html($filters_label); ?></span>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if ($section_title) : ?>
      <h2 class="shareflare-home__section-title"><?php echo esc_html($section_title); ?></h2>
    <?php endif; ?>

    <?php if ($videos) : ?>
      <div class="shareflare-home__grid">
        <?php foreach ($videos as $video) :
          $image       = $video['image'] ?? 0;
          $title       = $video['title'] ?? '';
          $description = $video['description'] ?? '';
          $watch_link  = $video['watch_link'] ?? [];
          $watch_url   = is_array($watch_link) && !empty($watch_link['url']) ? $watch_link['url'] : '';
          $watch_label = is_array($watch_link) && !empty($watch_link['title']) ? $watch_link['title'] : __('WATCH', 'projecttheme');
          $watch_target = is_array($watch_link) && !empty($watch_link['target']) ? $watch_link['target'] : '_self';
          $watch_rel    = $watch_target === '_blank' ? 'noopener noreferrer' : '';
        ?>
          <article class="shareflare-home__card">
            <?php if ($image) : ?>
              <?php echo wp_get_attachment_image($image, 'medium_large', false, [
                'class' => 'shareflare-home__image',
                'loading' => 'lazy',
                'decoding' => 'async',
              ]); ?>
            <?php else : ?>
              <img
                class="shareflare-home__image"
                src="<?php echo esc_url(get_theme_file_uri('/assets/images/shareflare-home-placeholder.jpg')); ?>"
                alt=""
                loading="lazy"
                decoding="async"
              >
            <?php endif; ?>

            <?php if ($title) : ?>
              <h3 class="shareflare-home__card-title"><?php echo esc_html($title); ?></h3>
            <?php endif; ?>

            <?php if ($description) : ?>
              <p class="shareflare-home__description"><?php echo esc_html($description); ?></p>
            <?php endif; ?>

            <?php if ($watch_url) : ?>
              <a
                class="shareflare-home__watch"
                href="<?php echo esc_url($watch_url); ?>"
                target="<?php echo esc_attr($watch_target); ?>"
                rel="<?php echo esc_attr($watch_rel); ?>"
              ><?php echo esc_html($watch_label); ?></a>
            <?php endif; ?>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <?php if ($see_more_url) : ?>
      <div class="shareflare-home__more">
        <a
          class="shareflare-home__more-link"
          href="<?php echo esc_url($see_more_url); ?>"
          target="<?php echo esc_attr($see_more_target); ?>"
          rel="<?php echo esc_attr($see_more_rel); ?>"
        ><?php echo esc_html($see_more_label); ?></a>
      </div>
    <?php endif; ?>
  </div>
</div>
