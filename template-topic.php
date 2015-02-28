<?php
/**
 * Template Name: Weekly Topic
 */

get_header(); ?>

<?php do_action( 'sp_start_content_wrap_html' ); ?>
    <div class="main">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
				<div class="yearly-topics">
				<?php
					$yearly_topic = get_post_meta( $post->ID, 'sp_yearly_topic', true );
					$weekly_topic = get_post_meta( $post->ID, 'sp_weekly_topic', true );
					// http://stackoverflow.com/questions/18122476/php-for-loop-for-each-month-of-year?answertab=votes#tab-top
					
					if ( $yearly_topic == '2014' ) :
						$now = date('n', strtotime('2014-12-30')) - 5;
						$current_month = strtotime(date("2014-12-30"));
					else :
						$now = date('n', strtotime(date("Y-m-d")));
						$current_month = strtotime(date("Y-m-d"));
					endif;

					$i = 1;
					
					echo '<ul class="topic-head">';
					echo '<li>';
					echo '<div class="one-fourth">' . __('Week', SP_TEXT_DOMAIN) . '</div>';
					echo '<div class="two-fourth">' . __('Topic', SP_TEXT_DOMAIN) . '</div>';
					echo '<div class="one-fourth last">' . __('Guest Speaker', SP_TEXT_DOMAIN) . '</div>';
					echo '</li>';
					echo '</ul>';
					while($i <= $now) {
					    $month_name = date('F Y', $current_month);
					    //echo '<div class="yearly-topics">';
					    echo '<h4 class="section-month">' . $month_name . '</h4>';
					    echo sp_yearly_topic($yearly_topic, date('m', $current_month), $weekly_topic);
					    //echo '</div>';

					    $current_month = strtotime('-1 month', $current_month);
					    $i++;
					} 
				?>
				</div>
			</article><!-- #post -->
		<?php endwhile;
		else : 
			get_template_part('library/contents/error404');
		endif; ?>
	</div><!-- #main -->
	<?php get_sidebar();?>
<?php do_action( 'sp_end_content_wrap_html' ); ?>
	
<?php get_footer(); ?>