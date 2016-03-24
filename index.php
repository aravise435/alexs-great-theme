<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Great_Theme
 */

get_header(); ?>
<?php if ( is_active_sidebar( 'slider-sidebar' ) ) : ?>
       <div class="small-12 medium-12 large-12 columns slidercontainer hide-for-small-only">
           
		<?php dynamic_sidebar( 'slider-sidebar' ); ?>
	  </div>
<?php endif; ?>
     
<div class="maindiv">        
       
        <div class="small-12 medium-8 large-8 columns posts">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">    
                        <div class="post-title">
                    <?php if (have_posts()) : ?>
                        <?php query_posts("showposts=1"); // show one latest post only ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <div class="entry-head firstpost">
                                    <?php the_date(); ?><br />
                                    <?php the_title();?><br />
                                    <?php the_post_thumbnail( 'large' ); ?><br />
                                    <?php the_excerpt('<p>','</p>');?><br />
                                </div>
                             </div>
                            <?php endwhile; ?>
                        <?php query_posts("showposts=4&offset=1"); // show 4 latests posts excluding the latest ?>
                        <div class="row small-up-1 medium-up-2 large-up-2">
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="column">    
                                <div class="entry-head"> 
                                   <div class="small-12 medium-12 large-12 columns">
                                    <a href="<?php echo get_permalink();?>">
                                    <?php the_post_thumbnail( 'medium' ); ?>
                                    </a>                        
                                    </div>
                                    <div class="small-12 medium-12 large-12 columns">
                                    <?php the_date(); ?>
                                    <br />
                                    <?php the_title('<h3>','</h3>');?><br />
                                    <?php the_excerpt('<p>','</p>');?><br /> 
                                    </div>    
                                </div>
                            </div>    
                        <?php endwhile; ?>
                        </div>    
                        <?php else: ?>
                        <!-- Error message when no post published -->
                        <?php endif; ?>

                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
        </div>
 <div class="small-12 medium-4 large-4 columns">
     <div class="small-12 medium-12 large-12 columns bio-widget">
         <?php
         // The Query       
$the_query = new WP_Query( array( 'pagename' => 'Bio' ));
// The Loop
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		the_post_thumbnail( 'medium' ); 
        ?>
        <h5 class="bio-title"> Alexandra Sauer </h5>
         <?php
        the_content();
	}
} else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();
         ?>
     </div>
        <?php get_sidebar(); ?>
        </div>
</div>
<?php get_footer(); ?>
