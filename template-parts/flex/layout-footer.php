<?php
/**
 * Shareflare footer layout.
 */
$left_title   = get_sub_field('left_title') ?: 'KONTAKT';
$left_items   = get_sub_field('left_items') ?: [
  ['text' => 'SERVICE/-HELPCENTER'],
  ['text' => 'service@shareflare.at'],
  ['text' => 'SERVICEZEITEN'],
  ['text' => 'Montag - Freitag 08:00-18:00'],
  ['text' => 'Kein Ladengeschäft vor Ort'],
  ['text' => 'KONTAKTFORMULAR'],
];
$middle_title = get_sub_field('middle_title') ?: 'INFORMATION';
$middle_items = get_sub_field('middle_items') ?: [
  ['text' => 'Über uns'],
  ['text' => 'Community'],
  ['text' => 'Rechtliche Hinweise'],
  ['text' => 'Lizenz Hinweise'],
  ['text' => 'Blablabla'],
];
$right_title  = get_sub_field('right_title') ?: 'COMMUNITY';
$right_items  = get_sub_field('right_items') ?: [
  ['text' => 'Instagram'],
  ['text' => 'Snapchat'],
  ['text' => 'Facebook'],
  ['text' => 'Twitter'],
  ['text' => 'LinkedIn'],
];

$render_items = function ($items) {
  if (empty($items)) {
    return;
  }

  echo '<div class="shareflare-footer__items">';
  foreach ($items as $item) {
    $text = $item['text'] ?? '';
    $link = $item['link'] ?? [];
    $url  = is_array($link) && !empty($link['url']) ? $link['url'] : '';
    $target = is_array($link) && !empty($link['target']) ? $link['target'] : '_self';
    $rel = $target === '_blank' ? 'noopener noreferrer' : '';

    if ($text === '') {
      continue;
    }

    $spaced_text = ['SERVICEZEITEN', 'Kein Ladengeschäft vor Ort', 'KONTAKTFORMULAR'];
    $item_class = in_array($text, $spaced_text, true) ? 'shareflare-footer__item shareflare-footer__item--spaced' : 'shareflare-footer__item';

    if ($url) {
      echo '<a class="' . esc_attr($item_class) . '" href="' . esc_url($url) . '" target="' . esc_attr($target) . '" rel="' . esc_attr($rel) . '">' . esc_html($text) . '</a>';
    } else {
      echo '<span class="' . esc_attr($item_class) . '">' . esc_html($text) . '</span>';
    }
  }
  echo '</div>';
};
?>
<footer
  class="shareflare-footer"
  data-node-id="69:253"
  data-name="Footer"
>
  <div class="shareflare-footer__column shareflare-footer__column--left">
    <h2 class="shareflare-footer__title"><?php echo esc_html($left_title); ?></h2>
    <?php $render_items($left_items); ?>
  </div>

  <div class="shareflare-footer__column shareflare-footer__column--middle">
    <h2 class="shareflare-footer__title"><?php echo esc_html($middle_title); ?></h2>
    <?php $render_items($middle_items); ?>
  </div>

  <div class="shareflare-footer__column shareflare-footer__column--right">
    <h2 class="shareflare-footer__title"><?php echo esc_html($right_title); ?></h2>
    <?php $render_items($right_items); ?>
  </div>
</footer>
