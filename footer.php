<?php
/**
 Wp Bootstrap
 * Footer Page
 */
?>

    

            <footer class="<?php echo (get_option('wp_bootstrap_fluid') == 0) ? 'row' : 'row-fluid'; ?>">
                        
                                <section class="span5">
                                        <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                                <?php bloginfo( 'name' ); ?>
                                        </a>
                                </section><!-- #site-info -->

                                <section class="span7">
                                    <p align="right">
                                        WpBootstrap - Free theme for wordpress <i class="icon-picture"></i><br />
                                        Developed by <a href="http://www.marioconcina.it">Mario Concina</a> <i class="icon-user"></i><br />
                                        Follow me on <a href="http://www.twitter.com/mari0bros">Twitter</a> <i class="icon-comment"></i>
                                        
                                     </p>
                                </section><!-- #site-generator -->
                        
            </footer><!-- #footer -->
    </div><!--.row -->
</div><!--.container -->

<?php wp_footer(); ?>
</body>
</html>
