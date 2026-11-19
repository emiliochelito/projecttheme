<?php
/**
 * Upload form layout.
 */
$drop_label = get_sub_field('drop_label') ?: __('DROP IT!', 'projecttheme');
$info_text  = get_sub_field('info_text') ?: __('Give us a few infos about your film...', 'projecttheme');
$input_id   = 'upload-form-file-' . wp_unique_id();
?>
<form
  class="upload-form"
  method="post"
  enctype="multipart/form-data"
  data-node-id="32:10"
  data-name="UploadForm"
>
  <label class="upload-form__drop" for="<?php echo esc_attr($input_id); ?>">
    <input
      class="upload-form__input"
      id="<?php echo esc_attr($input_id); ?>"
      name="upload_form_file"
      type="file"
    >
    <span class="upload-form__label"><?php echo esc_html($drop_label); ?></span>
  </label>

  <div class="upload-form__info">
    <p class="upload-form__info-text"><?php echo esc_html($info_text); ?></p>
  </div>
</form>
