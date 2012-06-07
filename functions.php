<?php
/**
 Wp Bootstrap
 * Functions and definition page
 */

add_action( 'after_setup_theme', 'wp_bootstrap_init' );
if ( ! function_exists( 'wp_bootstrap_init' ) ):
    
    function wp_bootstrap_init() 
    {
        if ( ! isset( $content_width ) ) $content_width = 900;
        register_sidebar( $args );

        $locale = get_locale();
        $locale_file = get_template_directory() . "/languages/$locale.php";
        if ( is_readable( $locale_file ) )
                require_once( $locale_file );

        add_theme_support( 'automatic-feed-links' );
        if(has_post_format())
        {
            add_theme_support( 'post-formats', array(
                    'link',
                    'video',
                    'image',
                    'gallery',
                    'quote'
            ) );
        }
        add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
        
	if ( ! defined( 'HEADER_TEXTCOLOR' ) )
		define( 'HEADER_TEXTCOLOR', '' );


	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'wp_bootstrap_header_image_width', 960 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'wp_bootstrap_header_image_height', 250 ) );

	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	if ( ! defined( 'NO_HEADER_TEXT' ) )
		define( 'NO_HEADER_TEXT', true );

        add_option('wp_bootstrap_responsive', 1);
        add_option('wp_bootstrap_fluid', 1);
        add_option('wp_bootstrap_show_top_bar', 1);
        add_option('wp_bootstrap_show_social', 1);
        
        require_once( get_template_directory() . '/inc/theme-options.php' );
        
        if ( isset( $_REQUEST['customize'] ) AND 'on' == $_REQUEST['customize'] ) {
                require_once( get_template_directory() . '/inc/theme-customizer.php' );
        }
    }
endif;

function register_my_menus() {
  register_nav_menus(
    array( 'header-menu' => __( 'Header Menu' ) )
  );
}
add_action( 'init', 'register_my_menus' );
add_action( 'after_setup_theme', 'wp_bootstrap_init' );

show_admin_bar(false);

function wp_bootstrap_admin_header_style(){}
add_custom_image_header( '', 'wp_bootstrap_admin_header_style' );

function wp_bootstrap_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
    <div class="<?php echo (get_option('wp_bootstrap_fluid') == 0) ? 'row' : 'row-fluid'; ?> single-comment">
            <div class="span1" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>"><?php echo get_avatar($comment,$size='60',$default='<path_to_url>' ); ?></div>
            <div class="span11">
                <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
                    <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
                </a>
                 
                <?php edit_comment_link(__('(Edit)'),'  ','') ?>

                <?php comment_text() ?>
                
                
                    <a class="btn" data-toggle="modal" href="#myModal<?php comment_ID() ?>" ><?php _e('Details'); ?></a>
                    <div class="modal fade" id="myModal<?php comment_ID() ?>">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">×</button>
                        <h3><?php _e('Reply to'); the_title(); ?></h3>
                    </div>
                    <div class="modal-body">
                        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
                            <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
                        </a>
                        <p><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></p>
                        <?php comment_text() ?>
                    </div>
                    </div>
                
                
                
                <div class="btn btn-info">
                    <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

                    <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php _e('Your comment is awaiting moderation.') ?></em>
                    <br />
                <?php endif; ?>
                </div>
            </div>
    </div>
<hr />
<?php
}

function wp_bootstrap_share()
{
    if(get_option('wp_bootstrap_show_social') == 1){
    ?>
    <nav class="span12 social">
        <div class="label label-info share"><?php _e('Share'); ?></div>
        <br />
        <iframe src="http://www.facebook.com/plugins/like.php?app_id=162659317130181&amp;href=<?php the_permalink(); ?>&amp;send=false&amp;layout=button_count&amp;width=150&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font=arial&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:107px; height:21px;" allowTransparency="true"></iframe>
        <a href="http://twitter.com/share7?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" class="twitter-share-button" data-count="horizontal" data-via="Mari0Bros" data-lang="it">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
        <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
        <g:plusone size="medium" href="<?php the_permalink(); ?>"></g:plusone>
    </nav>
    <?php
    }
}
?>
