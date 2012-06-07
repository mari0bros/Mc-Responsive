<?php
/**
 Wp Bootstrap
 * Sidebar Page
 */
?>

<div class="span3">
      <div class="well sidebar-nav">
            <ul class="nav nav-list">
                <li class="nav-header"><?php _e( 'Categories' ); ?></li>
                <?php wp_list_categories('show_count=0&title_li='); ?>
            </ul>
      </div>
    
    <div class="well sidebar-nav">
            <ul class="nav nav-list">
                <li class="nav-header"><?php _e( 'Archives' ); ?></li>
                <?php wp_get_archives( 'type=monthly' ); ?>
            </ul>
          
            <ul class="nav nav-list">
                <li class="nav-header"><?php _e( 'Meta' ); ?></li>
                <li><?php wp_register(); ?></li>
                <li><?php wp_loginout(); ?></li>
                <li><?php wp_meta(); ?></li>
            </ul>
          
          
            <?php
            if ( ! dynamic_sidebar( 'primary-widget-area' ) ) :

            endif;
            ?>

            <?php
            if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

                <ul class="nav nav-list">
                        <?php dynamic_sidebar( 'secondary-widget-area' ); ?>
                </ul>

            <?php endif; ?>

      </div><!--/.well -->
</div><!--/span-->


