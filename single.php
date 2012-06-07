<?php
/**
 Wp Bootstrap
 * Single Page
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
                <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'wpbootstrap' ), 'after' => '</div>' ) ); ?>
            </article>
            
            <?php wp_bootstrap_share(); ?>
        </section>
        <?php
    endwhile;
    previous_posts_link();
    next_post_link();
    ?>
    <hr />
    <a name="replyto"></a>
    <section class="<?php echo (get_option('wp_bootstrap_fluid') == 0) ? 'row' : 'row-fluid'; ?>">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab">
            <li <?php if(!isset($_GET['replytocom'])){ ?> class="active" <?php } ?>><a href="#home"><i class="icon-search"></i> 
                <?php
			printf( _n( '%1', get_comments_number(), 'wpbootstrap' ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
			?>
                <?php _e('Comments'); ?></a></li>
            <li <?php if(isset($_GET['replytocom'])){ ?> class="active" <?php } ?>><a href="#profile"><i class="icon-pencil"></i> <?php _e('Leave a comment'); ?></a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane  <?php if(!isset($_GET['replytocom'])){ ?> active<?php } ?>" id="home"><?php comments_template( '', true ); ?></div>
                <div class="tab-pane <?php if(isset($_GET['replytocom'])){ ?> active <?php } ?>" id="profile"><?php comment_form(); ?></div>
            </div>
        </div>
    </section>
</section>

<?php endif; ?>
<?php get_sidebar(); ?>
</div>

<script type="text/javascript">
jQuery(function(){
    jQuery('input[name="submit"]').attr('class', 'btn btn-large');
    jQuery('.comment-reply-link').each(function(){
        var current_href = jQuery(this).attr('href');
        current_href = current_href.replace('#respond', '#replyto');
        jQuery(this).attr('href', current_href);
    });
    
    jQuery('.comment-reply-link').click(function(){
        jQuery('ul.nav-tabs > li').removeAttr('class', 'active');
        jQuery('.tab-content > div').attr('class', 'tab-pane');
        
        jQuery('#profile').attr('class', 'tab-pane active');
        jQuery('ul.nav-tabs > li:last-child').attr('class', 'active');
    });
}) ;  
</script>

<?php get_footer(); ?>
