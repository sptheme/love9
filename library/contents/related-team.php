<?php //$related = sp_related_posts(); ?>
<?php $related = sp_get_posts_related_by_taxonomy(get_the_ID(), 'team-category', array('posts_per_page' => 3)); ?>

<?php if ( $related->have_posts() ): ?>
<section class="related-posts">
<h4 class="heading"><?php _e('Related team', SP_TEXT_DOMAIN); ?></h4>

<ul class="clearfix">
	
	<?php while ( $related->have_posts() ) : $related->the_post(); ?>
	<li class="related post-hover">
		<article <?php post_class(); ?>>

			<?php
				$out = '';
				$out .= '<div class="sp-team">';
				$out .= sp_post_thumbnail('large');
				$out .= '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
				$out .= '<h5>' . get_post_meta( get_the_ID(), 'sp_team_position', true) . '</h5>';
			    $out .= '<a class="team-email" href="mailto:' . antispambot(get_post_meta( get_the_ID(), 'sp_team_email', true)) . '">' . antispambot(get_post_meta( get_the_ID(), 'sp_team_email', true)) . '</a>';
			    $out .= '</div>';
			    echo $out;
			?>

		</article>
	</li><!--/.related-->
	<?php endwhile; ?>

</ul><!--/.post-related-->
</section>
<?php endif; ?>

<?php wp_reset_query(); ?>
