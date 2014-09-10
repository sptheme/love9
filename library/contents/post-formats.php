<?php $meta = get_post_custom($post->ID); ?>

<?php if ( has_post_format( 'audio' ) ): // Audio ?>
	
	<div class="post-format">		
		<?php
			$embed_url = get_post_meta( $post->ID, 'sp_audio_external', true ); 
			echo sp_soundcloud($embed_url); 
		?>	
	</div>
	
<?php endif; ?>

<?php if ( has_post_format( 'gallery' ) ): // Gallery ?>
	
	<div class="post-format">
		<?php $gallery = explode( ',', get_post_meta( $post->ID, 'sp_gallery', true ) ); if ( !empty($gallery) ): ?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
			 	/* Single Post slider */
				$('#post-slider-<?php echo the_ID(); ?>').flexslider({
					animation: "slide",
					slideshowSpeed: 5000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
					animationDuration: 200,         //Integer: Set the speed of animations, in milliseconds
					animationLoop: true,            //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
					pauseOnAction: true,            //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
					pauseOnHover: true,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
					smoothHeight: "true",
					before: function(slider) {
					    $('.flex-caption').delay(100).fadeOut(100);
					},
					after: function(slider) {
					  $('.flex-active-slide').find('.flex-caption').delay(200).fadeIn(400);
					}
				});
			});
		</script>
		<div class="flex-container">
			<div class="flexslider" id="post-slider-<?php the_ID(); ?>">
				<ul class="slides">
					<?php foreach ( $gallery as $image ): ?>
						<li>
							<?php 
								$images = wp_get_attachment( $image );
							?>
							<img src="<?php echo $images['src']; ?>" alt="<?php echo $images['caption']; ?>">
							<?php if ( $images['caption'] ): ?>
								<p class="flex-caption"><?php echo $images['caption']; ?></p>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<?php endif; ?>
	</div>
	
<?php endif; ?>

<?php if ( has_post_format( 'image' ) || ! has_post_format() ): // Image ?>

	<?php if ( has_post_thumbnail() ) : ?>
	<div class="post-format">
		<?php 
		$caption = get_post(get_post_thumbnail_id())->post_excerpt;
		if ( isset($caption) && $caption && is_singular() ) {
			echo '<div class="wp-caption">';
			the_post_thumbnail('large');
			echo '<p class="wp-caption-text">'.$caption.'</p>';
			echo '</div>';
		} else { the_post_thumbnail('large'); }	
		?>
	</div>
	<?php endif; ?>
	
<?php endif; ?>

<?php if ( has_post_format( 'video' ) ): // Video ?>

	<div class="post-format">
		<?php 
			if ( isset($meta['sp_video_url'][0]) && !empty($meta['sp_video_url'][0]) ) {
				global $wp_embed;
				$video = $wp_embed->run_shortcode('[embed]'.$meta['sp_video_url'][0].'[/embed]');
				echo $video;
			} elseif ( isset($meta['sp_video_embed_code'][0]) && !empty($meta['sp_video_embed_code'][0]) ) {
				echo '<div class="video-container">';
				echo $meta['sp_video_embed_code'][0];
				echo '</div>';
			}
		?>	
	</div>
	
<?php endif; ?>

