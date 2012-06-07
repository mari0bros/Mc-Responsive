<?php
/**
 Wp Bootstrap
 * Page
 */

get_header(); ?>

<div class="<?php echo (get_option('wp_bootstrap_fluid') == 0) ? 'row' : 'row-fluid'; ?>">
<section class="span9">
    <?php
    if(have_posts()) :
        while(have_posts()) : the_post ();
        ?>
        <nav class="row-fluid">
                <div class="span6"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link' ) . '</span> %title' ); ?></div>
                <div class="span6 right"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link' ) . '</span>' ); ?></div>
        </nav>
    
        <section class="row-fluid">
            <article class="span12" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <?php the_title('<h2>', '</h2>'); ?>
                <ul class="post-info">
                    <li><i class="icon-time"></i> <code><?php the_date(); ?></code></li>
                    <li><i class="icon-user"></i> <code>
                                                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author"><?php echo get_the_author(); ?>
                                                </a>
                                            </code></li>
                </ul>
              <?php the_content(); ?>
            </article>
            
            <?php wp_bootstrap_share(); ?>
        </section>
        <?php
    endwhile;
    ?>
    
</section>

<?php endif; ?>
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
