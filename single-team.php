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
				<?php get_template_part('library/contents/post-formats'); ?>

				<header class="entry-header">
					<h1 class="entry-title">
						<?php the_title(); ?>
					</h1>
					<div class="entry-meta">
						<strong><?php echo get_post_meta($post->ID, 'sp_team_position', true); ?></strong>
					</div>
				</header>

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
				<?php if ( ot_get_option('social_share') != 'off' ) { get_template_part('library/contents/social-share'); } ?>

				<?php if ( ot_get_option( 'related-posts' ) != '1' ) { 
					echo sp_get_related_posts( $post->ID, array('posts_per_page' => 3) ); 
				} ?>

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