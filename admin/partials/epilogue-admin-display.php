<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://jefferyng.com
 * @since      1.0.0
 *
 * @package    Epilogue
 * @subpackage Epilogue/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>

    <form method="post" name="my-rdm-quotes_options" action="options.php">

  		<?php
        $options = get_option($this->plugin_name);
        $setting_01 = $options['setting-01'];
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
      ?>

        <!-- Optional title for quotes list -->
        <fieldset>
            <legend class="screen-reader-text"><span>Description of setting</span></legend>
            <label for="<?php echo $this->plugin_name; ?>-setting-01">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-setting-01"
                name="<?php echo $this->plugin_name; ?>[setting-01]"
                value="1" <?php checked($setting_01, 1); ?>/>
            </label>
        </fieldset>

        <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>

    </form>

</div>
