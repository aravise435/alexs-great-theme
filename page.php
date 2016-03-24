<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Great_Theme
 */

get_header(); ?>
<div class=" small-12 medium-12 larger-12 columns maindiv">        
       
        <div class="small-12 medium-8 large-8 columns pagecontent">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'components/content-page/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
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
