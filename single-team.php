<?php
/**
 * The template for displaying all pages.
 */

get_header(); ?>
<?php do_action( 'sp_start_content_wrap_html' ); ?>
    <div id="main" class="main">
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post(); 
		?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
					<header class="entry-header">
						<h1 class="entry-title">
							<?php the_title(); ?>
						</h1>
					</header>

					<div class="entry-content">
						<div class="one-third">
						<?php echo sp_single_team_meta( 'large' ); ?>
						</div>
						
						<div class="two-third last">
							<?php the_content(); ?>
						</div>
						<div class="clear"></div>

						<?php if ( ot_get_option('social_share') != 'off' ) { get_template_part('library/contents/social-share'); } ?>
					</div><!-- .entry-content -->

				</article><!-- #post -->

				<?php if ( ot_get_option( 'related-posts' ) != '1' ) { get_template_part('library/contents/related-team'); } ?>

		<?php		
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			endwhile;
		?>
		
	</div><!-- #main -->
	<?php get_sidebar();?>
<?php do_action( 'sp_end_content_wrap_html' ); ?>
<?php get_footer(); ?>