<?php
/**
 Wp Bootstrap
 * Attachment Page
 */

get_header(); ?>

<section class="<?php echo (get_option('wp_bootstrap_fluid') == 0) ? 'row' : 'row-fluid'; ?>">
    <section class="span9">
        <?php 
         if(have_posts())
        while(have_posts()) : the_post ();
        ?>
        <hr />
        <article class="<?php echo (get_option('wp_bootstrap_fluid') == 0) ? 'row' : 'row-fluid'; ?>">
            <div class="span9">
                <?php the_title('<h2>', '</h2>'); ?>
                <?php the_excerpt(); ?>
            </div>
        </article>
        <?php endwhile; ?>
    </section>
    <?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>