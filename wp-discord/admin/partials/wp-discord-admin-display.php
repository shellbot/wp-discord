<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://wpdiscord.com
 * @since      0.1.0
 *
 * @package    WP_Discord
 * @subpackage WP_Discord/admin/partials
 */
?>

<div class="wrap">
    <div id="icon-themes" class="icon32"></div>
    <h1><?php echo $title; ?></h1>


    <p class="notice notice-warning">
        DISCLAIMER: <strong>Please note that the channel posting feature is currently a Beta release.</strong> Certain functionality may break. We appreciate your patience as we test out this feature. Use at your own risk. <br><a href="https://github.com/rspraymond/wp-discord/issues" target="_blank">Please report any bugs at the WP Discord official repo.</a>
    </p>

    <?php
        // Notices
        if (isset($notices)) {
            foreach ($notices as $notice) {
                ?>
                <div class="notice <?php echo $notice['class']; ?> is-dismissible">
                    <p><?php echo $notice['message']; ?></p>
                </div>
                <?php

            }
        }
    ?>
    <?php settings_errors(); ?>

    <h2 class="nav-tab-wrapper">
        <?php

        foreach ($tabs as $tab) {
            ?>
                <a href="?page=wp-discord&tab=<?php echo $tab->name; ?>" class="nav-tab <?php echo $active_tab == $tab->name ? 'nav-tab-active' : ''; ?>"><?php echo $tab->get_display_name() ?></a>
            <?php

        }

        ?>
    </h2>


    <form method="post" action="/wp-admin/admin-post.php">
        <?php wp_nonce_field(WPD_PREFIX . 'save_settings'); ?>
        <input type="hidden" name="action" value="<?php echo WPD_PREFIX; ?>save_settings">
        <?php

        if (isset($tabs[$active_tab])) {
            $tabs[$active_tab]->display();
        }

        ?>

        <?php submit_button(); ?>
    </form>

</div>