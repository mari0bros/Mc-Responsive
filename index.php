<?php
/**
 Wp Bootstrap
 * Index Page, display first post in the hero-unit block!
 */

get_header(); ?>

<section class="<?php echo (get_option('wp_bootstrap_fluid') == 0) ? 'row' : 'row-fluid'; ?>">
<div class="span9">
    <?php
    $cont = 0;
    if(have_posts())
        while(have_posts()) : the_post ();
        if($cont == 0){
        ?>
        <!-- first block -->
        <div class="hero-unit">
            <?php the_title('<h1>', '</h1>'); ?>
            <?php the_excerpt(); ?>
            <p><a href="<?php the_permalink(); ?>" class="btn btn-primary btn-large">Learn more &raquo;</a></p>
        </div>
        <?php
        } else
            {
            $supp = $cont % 3;
            if($supp == 1){ ?>
                <div class="row-fluid">
            <?php } ?>
                    <div class="span4 content_home">
                        
                      <script type="text/javascript">
                      jQuery(function(){
                          jQuery('#read_more<?php the_ID(); ?>').popover();
                      });
                      </script>  
                        
                      <?php the_title('<h3>', '</h3>'); ?>
                      <div class="img_box_home">
                          <?php the_post_thumbnail('medium'); ?>
                      </div>
                      <a href="<?php the_permalink(); ?>" id="read_more<?php the_ID(); ?>" class="btn btn-action" rel="popover" data-content="<?php the_excerpt(); ?>" data-original-title="<?php echo _e('Continue reading'); ?>"><?php echo _e('Continue reading'); ?></a>  
                    </div>

                <?php
                if($supp == 0){ ?>
                </div>
                <?php }
            }
            $cont ++;
    endwhile;
    if($supp != 0) echo '</div>';
    ?>
</div>
    <?php get_sidebar(); ?>
</section>




<?php get_footer(); ?>
