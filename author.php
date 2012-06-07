<?php
/**
 Wp Bootstrap
 * Author Page
 */

get_header(); ?>

<section class="<?php echo (get_option('wp_bootstrap_fluid') == 0) ? 'row' : 'row-fluid'; ?>">
    <section class="span9">
        <h1 class="page-title author"><?php printf( __( 'Author Archives: %s', 'wpbootstrap' ), "<span class='vcard'><a class='url fn n' href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a></span>" ); ?></h1>
        <?php 
         if(have_posts())
        while(have_posts()) : the_post ();
        ?>
        <hr />
        <?php
        // If a user has filled out their description, show a bio on their entries.
        if ( get_the_author_meta( 'description' ) ) : ?>
                                                <div id="entry-author-info">
                                                        <div id="author-avatar">
                                                                <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'wpbootstrap_author_bio_avatar_size', 60 ) ); ?>
                                                        </div><!-- #author-avatar -->
                                                        <div id="author-description">
                                                                <h2><?php printf( __( 'About %s', 'wpbootstrap' ), get_the_author() ); ?></h2>
                                                                <?php the_author_meta( 'description' ); ?>
                                                        </div><!-- #author-description	-->
                                                </div><!-- #entry-author-info -->
        <?php endif; ?>
        <hr />
        
        <article class="<?php echo (get_option('wp_bootstrap_fluid') == 0) ? 'row' : 'row-fluid'; ?>">
            <div class="span9">
                <?php the_title('<h2>', '</h2>'); ?>
                <?php rewind_posts(); ?>
                <?php the_excerpt(); ?>
            </div>
        </article>
        <?php endwhile; ?>
    </section>
    <?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>