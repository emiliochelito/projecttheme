<?php
/**
 * Genre selector layout.
 */
$label   = get_sub_field('label') ?: __('Genre', 'projecttheme');
$genres  = get_sub_field('genres') ?: [];
$options = [];

foreach ($genres as $genre) {
  $genre_label = is_array($genre) ? ($genre['label'] ?? '') : '';
  $genre_value = is_array($genre) ? ($genre['value'] ?? $genre_label) : '';

  if ($genre_label !== '') {
    $options[] = [
      'label' => $genre_label,
      'value' => $genre_value,
    ];
  }
}

$select_id = 'genre-selector-' . wp_unique_id();
?>
<div
  class="genre-selector"
  data-node-id="32:96"
  data-name="GenreSelector"
>
  <label class="genre-selector__field" for="<?php echo esc_attr($select_id); ?>">
    <span class="genre-selector__label"><?php echo esc_html($label); ?></span>
    <select
      class="genre-selector__select"
      id="<?php echo esc_attr($select_id); ?>"
      name="genre"
    >
      <option value="" selected><?php echo esc_html($label); ?></option>
      <?php foreach ($options as $option) : ?>
        <option value="<?php echo esc_attr($option['value']); ?>">
          <?php echo esc_html($option['label']); ?>
        </option>
      <?php endforeach; ?>
    </select>
  </label>
</div>
