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
						<?php the_content(); ?>

						 <?php 
						 	$post = get_post( get_the_ID() );
						 	$post_type = $post->post_type;
						 	$taxonomies = get_object_taxonomies( $post_type, 'objects' );
						 	echo $taxonomies[0]->term_id;
						 	foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
							    echo $taxonomy->name;
							}
						 ?> 
						
						<?php if ( ot_get_option('social_share') != 'off' ) { get_template_part('library/contents/social-share'); } ?>
					</div><!-- .entry-content -->

				</article><!-- #post -->

				<?php if ( ot_get_option( 'related-posts' ) != '1' ) { 
					echo sp_get_related_posts( get_the_ID(), array('posts_per_page' => 3) ); 
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