<?php
/**
 * Template Name: Onepage
 */

get_header(); ?>
	
	<?php $home_meta = get_post_meta( $post->ID ); ?>

    <div id="content">
		<section id="touch-intro" class="touch-intro bg-sections">
			<div class="behind-ground">
				<div class="container bg-section">
					<img class="touch-pagoda wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="1s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/pagoda.png">
			    	<img class="touch-mini-forest wow bounceInUp" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/mini-forest.png">
			    	<img class="touch-mini-forest-2 wow bounceInUp" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/mini-forest.png">
			    	<img class="touch-mini-house wow bounceInUp" data-wow-duration="0.5s" data-wow-delay="0.8s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/mini-house.png">
    				<img class="touch-mini-house-2 wow bounceInUp" data-wow-duration="0.5s" data-wow-delay="1s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/mini-house-1.png">
			    	<img class="touch-green-tree wow bounceInUp" data-wow-delay="0.3s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/green-tree.png">
			    	<img class="touch-green-tree-2 wow bounceInUp" data-wow-delay="0.5s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/green-tree.png">
			    	<img class="touch-medium-forest wow bounceInUp" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/mini-forest-1.png">
				</div>
			</div> <!-- .behind-ground -->
			<div class="intro-ground">
				<div class="container bg-sections">
					<img class="touch-cloud-1 wow fadeInLeft" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/cloud.png">
			    	<img class="touch-cloud-2 wow fadeInLeft" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/cloud-2.png">
			    	<img class="touch-cloud-3 wow fadeInUp" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/cloud-3.png">
			    	<img class="touch-tomato wow fadeInUp" data-wow-delay="1s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/tomato.png">
    	<img class="touch-carrot wow fadeInUp" data-wow-delay="1s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/carrot.png">
					<div class="intro-title"><img class="wow zoomIn" data-wow-duration="0.4s" data-wow-delay="1.5s" src="<?php echo $home_meta['sp_intro_title'][0]; ?>"></div>
					<div class="intro-actor"><img class="wow zoomIn" data-wow-duration="0.5s" data-wow-delay="1.2s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/home-love9.png"></div>
				</div> <!-- .container .clearfix -->
			</div> <!-- .intro-ground -->
		</section> <!-- #intro -->
	</div> <!-- #content -->
	
<?php get_footer(); ?>