<?php
/**
 Wp Bootstrap
 * 404 Page
 */

get_header(); ?>
<section class="<?php echo (get_option('wp_bootstrap_fluid') == 0) ? 'row' : 'row-fluid'; ?>">
    <section class="span9">
        <hr />
        <article class="<?php echo (get_option('wp_bootstrap_fluid') == 0) ? 'row' : 'row-fluid'; ?>">
            
                <div id="post-0" class="span12 post error404 not-found">
				<h1 class="entry-title"><?php _e( 'Not Found', 'wpbootstrap' ); ?></h1>
				<div class="entry-content">
					<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'wpbootstrap' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</div><!-- #post-0 -->
            
        </article>
    </section>
    <?php get_sidebar(); ?>
</section>

	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>

<?php get_footer(); ?>