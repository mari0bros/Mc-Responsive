<?php
function wp_bootstrap_add_submenu_page()
{
	$theme_page = add_theme_page(
		__( 'Theme Options', 'wp-bootstrap' ),
		__( 'Theme Options', 'wp-bootstrap' ),
		'edit_theme_options',
		'theme_options',
		'wp_bootstrap_main_page'
	);
	add_action( "admin_print_styles-{$theme_page}", 'wp_bootstrap_admin_enqueue_scripts' );
}

add_action( 'admin_menu', 'wp_bootstrap_add_submenu_page' );


function wp_bootstrap_main_page()
{
?>
<div class="wrap">

    <?php screen_icon(); ?>
    <h2><?php _e( 'Wp Bootstrap Customization', 'wpbootstrap' ); ?></h2>
    <?php settings_errors(); ?>

    <div id="poststuff">
        <div id="post-body" class="obenland-wp columns-2">
            <div id="post-body-content">
            <?php
            if(isset($_POST['act']) == 'send')
            {
                update_option('wp_bootstrap_responsive', $_POST['wp_bootstrap_responsive']);
                update_option('wp_bootstrap_fluid', $_POST['wp_bootstrap_fluid']);
                update_option('wp_bootstrap_show_top_bar', $_POST['wp_bootstrap_show_top_bar']);
                update_option('wp_bootstrap_show_social', $_POST['wp_bootstrap_show_social']);
            }
            ?>
                <style type="text/css">
                    .wpbootstrap_settings{ margin:10px; padding:0; float:left; }
                    .wpbootstrap_settings li{ width:150px; height:70px; float:left; }
                    .wpbootstrap_settings h2{ margin:0; padding:0; }
                </style>             
            <form method="post">
                    <ul class="wpbootstrap_settings">
                        <li>
                            <h2><?php echo _e('Make responsive'); ?></h2>
                            <p>
                                <?php echo _e('No'); ?> <input type="radio" name="wp_bootstrap_responsive" value="0" <?php echo (get_option('wp_bootstrap_responsive') == 0) ? 'checked' : false; ?> />
                                <?php echo _e('Yes'); ?> <input type="radio" name="wp_bootstrap_responsive" value="1" <?php echo (get_option('wp_bootstrap_responsive') == 1) ? 'checked' : false; ?> />
                            </p>
                        </li>

                        <li>
                            <h2><?php echo _e('Make fluid'); ?></h2>
                            <?php echo _e('No'); ?> <input type="radio" name="wp_bootstrap_fluid" value="0" <?php echo (get_option('wp_bootstrap_fluid') == 0) ? 'checked' : false; ?> />
                            <?php echo _e('Yes'); ?> <input type="radio" name="wp_bootstrap_fluid" value="1" <?php echo (get_option('wp_bootstrap_fluid') == 1) ? 'checked' : false; ?> />
                        </li>

                        <li>
                            <h2><?php echo _e('Display top bar'); ?></h2>
                            <?php echo _e('No'); ?> <input type="radio" name="wp_bootstrap_show_top_bar" value="0" <?php echo (get_option('wp_bootstrap_show_top_bar') == 0) ? 'checked' : false; ?> />
                            <?php echo _e('Yes'); ?> <input type="radio" name="wp_bootstrap_show_top_bar" value="1" <?php echo (get_option('wp_bootstrap_show_top_bar') == 1) ? 'checked' : false; ?> />
                        </li>
                        
                        <li>
                            <h2><?php echo _e('Display social network share'); ?></h2>
                            <?php echo _e('No'); ?> <input type="radio" name="wp_bootstrap_show_social" value="0" <?php echo (get_option('wp_bootstrap_show_social') == 0) ? 'checked' : false; ?> />
                            <?php echo _e('Yes'); ?> <input type="radio" name="wp_bootstrap_show_social" value="1" <?php echo (get_option('wp_bootstrap_show_social') == 1) ? 'checked' : false; ?> />
                        </li>
                    </ul>

                    <input type="hidden" name="act" value="send" />
                    <input type="submit" class="button-primary" name="send" value="<?php echo _e('Update'); ?>" />
            </form>
            </div>
            
            <div id="postbox-container-1">
                    <div id="side-info-column">
                            <?php do_action( 'wp_bootstrap_show_more' ); ?>
                    </div>
            </div>
            </div>
    </div>
</div>
<?php
}


function wp_bootstrap_donate()
{
?>
<div id="formatdiv" class="postbox" style="clear:both; margin-top:20px; float:left;">
        <h3 class="hndle"><span><?php _e('Donate for this theme', 'wpbootstrap' ); ?></span></h3>
        <div class="inside">
            <p>
                <?php _e('This theme is helpfull? Donate!') ; ?>
            </p>
            
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
                ">
                    <input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal — The safer, easier way to pay online.">
                    <img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
                </form>
                <p><?php _e( 'If you won\'t to donate:', 'wpbootstrap' ); ?></p>
                <ul>
                        <li><a href="http://wordpress.org/extend/themes/wpbootstrap"><?php _e( 'Rate this theme', 'wpbootstrap' ); ?></a></li>
                </ul>
        </div>
</div>
<?php
}
add_action( 'wp_bootstrap_show_more', 'wp_bootstrap_donate');

