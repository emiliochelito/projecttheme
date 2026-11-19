<?php
/**
 * Thumbnail card layout.
 */
$image       = get_sub_field('image');
$title       = get_sub_field('title');
$text        = get_sub_field('text');
$link        = get_sub_field('link');
$link_url    = is_array($link) && !empty($link['url']) ? $link['url'] : '';
$link_label  = is_array($link) && !empty($link['title']) ? $link['title'] : __('WATCH', 'projecttheme');
$link_target = is_array($link) && !empty($link['target']) ? $link['target'] : '_self';
$link_rel    = $link_target === '_blank' ? 'noopener noreferrer' : '';
?>
<article class="thumbnail-card" data-node-id="10:184" data-name="Thumbnail">
  <?php if ($image) : ?>
    <?php echo wp_get_attachment_image($image, 'medium_large', false, [
      'class' => 'thumbnail-card__image',
      'loading' => 'lazy',
      'decoding' => 'async',
    ]); ?>
  <?php else : ?>
    <img
      class="thumbnail-card__image"
      src="<?php echo esc_url(get_theme_file_uri('/assets/images/thumbnail-figma.jpg')); ?>"
      alt=""
      width="233"
      height="142"
      loading="lazy"
      decoding="async"
    >
  <?php endif; ?>

  <?php if ($title) : ?>
    <h3 class="thumbnail-card__title"><?php echo esc_html($title); ?></h3>
  <?php endif; ?>

  <?php if ($text) : ?>
    <p class="thumbnail-card__text"><?php echo esc_html($text); ?></p>
  <?php endif; ?>

  <?php if ($link_url) : ?>
    <a
      class="thumbnail-card__button"
      href="<?php echo esc_url($link_url); ?>"
      target="<?php echo esc_attr($link_target); ?>"
      rel="<?php echo esc_attr($link_rel); ?>"
    ><?php echo esc_html($link_label); ?></a>
  <?php else : ?>
    <span class="thumbnail-card__button"><?php echo esc_html($link_label); ?></span>
  <?php endif; ?>
</article>
