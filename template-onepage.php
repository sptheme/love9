<?php
/**
 * Template Name: Onepage
 */

get_header(); ?>
	
	<?php $home_meta = get_post_meta( $post->ID ); ?>

	<nav id="primary" class="nav-tooltip">
		<ul>
	    <li><a data-scroll href="#intro"><?php _e('Home', SP_TEXT_DOMAIN); ?></a>
	    	<span><?php _e('Home', SP_TEXT_DOMAIN); ?></span></li>
	    <li><a data-scroll href="#tv"><?php _e('TV', SP_TEXT_DOMAIN); ?></a>
	    	<span><?php _e('TV', SP_TEXT_DOMAIN); ?></span></li>
	    <li><a data-scroll href="#radio"><?php _e('Radio', SP_TEXT_DOMAIN); ?></a>
	    	<span><?php _e('Radio', SP_TEXT_DOMAIN); ?></span></li>
	    <li><a data-scroll href="#village"><?php _e('Love9 Village', SP_TEXT_DOMAIN); ?></a>
	    	<span><?php _e('Love9 Village', SP_TEXT_DOMAIN); ?></span></li>
	    <li><a data-scroll href="#about"><?php _e('About us', SP_TEXT_DOMAIN); ?></a>
	    	<span><?php _e('About us', SP_TEXT_DOMAIN); ?></span></li>
		</ul>
	</nav>

	<div id="parallax-1">
    	<!-- Intro -->
    	<img class="cloud-1 wow fadeInLeft" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/cloud.png">
    	<img class="cloud-2 wow fadeInLeft" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/cloud-2.png">
    	<img class="cloud-3 wow fadeInUp" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/cloud.png">
    	<img class="cloud-4 wow fadeInRight" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/cloud-3.png">
    	<img class="cloud-5 wow fadeInRight" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/cloud-2.png">
    	<img class="pagoda wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="1s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/pagoda.png">
    	<img class="mini-forest wow bounceInUp" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/mini-forest.png">
    	<img class="mini-forest-2 wow bounceInUp" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/mini-forest.png">
    	<img class="mini-house wow bounceInUp" data-wow-duration="0.5s" data-wow-delay="0.8s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/mini-house.png">
    	<img class="mini-house-2 wow bounceInUp" data-wow-duration="0.5s" data-wow-delay="1s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/mini-house-1.png">
    	<img class="green-tree wow bounceInUp" data-wow-delay="0.3s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/green-tree.png">
    	<img class="green-tree-2 wow bounceInUp" data-wow-delay="0.5s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/green-tree.png">
    	<img class="medium-forest wow bounceInUp" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/mini-forest-1.png">
    	<img class="ground-home wow pulse" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/bg-ground-home.png">
    	<img class="tomato wow fadeInUp" data-wow-delay="1s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/tomato.png">
    	<img class="carrot wow fadeInUp" data-wow-delay="1s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/carrot.png">
    	<!-- TV Sence -->
    	<img class="tv-stage wow fadeIn" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/tv-stage.jpg">
    	<img class="tv-board wow zoomIn" data-wow-duration="0.3s" src="<?php echo $home_meta['sp_tv_board'][0]; ?>">
    	<img class="tv-stikcy-photo wow fadeInRight" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/photo-sticky-tv.png">
    	<img class="lamp-left wow bounceInDown" data-wow-delay="1s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/lamp-left.png">
    	<img class="lamp-right wow bounceInDown" data-wow-delay="0.9s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/lamp-right.png">
    	<img class="tv-time wow swing" src="<?php echo $home_meta['sp_tv_time'][0]; ?>">
    	<img class="tv-camera wow fadeInUp" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/tv-camera.png">
    	<!-- Radio Sence -->
	    <img class="radio-stage wow fadeInUp" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/radio-stage.jpg">
	    <img class="symbol-radio wow fadeInUp" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/symbol-radio.png">
	    <img class="radio-sticky-photo wow swing" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/photo-sticky-radio.png">
	    <img class="radio-board wow zoomIn" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/radio-board.png">
    	<!-- Village Sence -->
    	<img class="cow" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/cow.png">
    	<img class="grass" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/grass.png">
    	<img class="pig" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/pig.png">
    	<img class="village-board wow zoomIn" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/village-board.png">
    	<img class="village-symbol wow fadeIn" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/village-symbol.png">
    	<img class="anouncement" src="<?php echo $home_meta['sp_announcement'][0]; ?>">
    	<img class="blog" src="<?php echo $home_meta['sp_blog'][0]; ?>">
    	<img class="document" src="<?php echo $home_meta['sp_document'][0]; ?>">
    	<img class="grass-2" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/grass-2.png">
    	<!-- About Sence -->
    	<img class="cloud-6 wow fadeInLeft" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/cloud.png">
    	<img class="cloud-7 wow fadeInLeft" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/cloud-2.png">
    	<img class="cloud-8 wow fadeIn" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/cloud.png">
    	<img class="cloud-9 wow fadeInRight" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/cloud-3.png">
    	<img class="ground-about wow fadeIn" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/bg-ground-about.png">
    	<img class="blue-tree wow fadeInRight" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/blue-tree.png">
    	<img class="green-tree-3 wow fadeInUp" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/green-tree-2.png">
    	<img class="yellow-tree wow fadeInLeft" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/yellow-tree.png">
    </div> <!-- #parallax-1 -->

    <div id="content">
		<section id="intro" class="intro bg-sections">
			<div class="container clearfix">
				<div class="love9">
				<img class="wow zoomIn" data-wow-duration="0.4s" data-wow-delay="1.5s" src="<?php echo $home_meta['sp_intro_title'][0]; ?>">
				<nav class="next-prev wow fadeInDown" data-wow-duration="0.2s" data-wow-delay="1.8s">
					<a data-scroll href="#tv" class="next wow fadeInDown" data-wow-iteration="infinite" data-wow-duration="0.8s"></a>
				</nav>
				<img class="wow zoomIn" data-wow-duration="0.5s" data-wow-delay="1.2s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/home-love9.png">
				</div> <!-- .love9 -->
			</div>
		</section> <!-- #intro -->
		<section id="tv" class="tv bg-sections">
			<div class="container clearfix">
				<a href="<?php echo get_permalink($home_meta['sp_page_tv_drama'][0]); ?>">
		    		<img class="tv-drama wow fadeInLeft" src="<?php echo $home_meta['sp_tv_drama'][0]; ?>">
		    	</a>
		    	<a href="<?php echo get_permalink($home_meta['sp_page_tv_mag'][0]); ?>">
		    		<img class="tv-magazine wow fadeInRight" src="<?php echo $home_meta['sp_tv_magazine'][0]; ?>">
		    	</a>
				<div class="love9 actor-tv">
				<img class="wow zoomIn" data-wow-duration="0.4s" data-wow-delay="1s" src="<?php echo $home_meta['sp_tv_title'][0]; ?>">
				<nav class="next-prev wow fadeInDown" data-wow-duration="0.2s" data-wow-delay="1.2s">
					<a data-scroll href="#intro" class="prev"></a>
					<a data-scroll href="#radio" class="next"></a>
				</nav>
				<img class="wow zoomIn" data-wow-duration="0.2s" data-wow-delay="0.3s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/tv-love9.png">
				</div> <!-- .love9 -->
			</div>
		</section> <!-- #tv -->
		<section id="radio" class="radio bg-sections">
			<div class="container clearfix">
				<div class="weekly-topic wow fadeInUp" data-wow-delay="0.7s">
					<h4>
					<?php _e('Topic for ', SP_TEXT_DOMAIN); ?>
					<?php 
					if(strtolower(ICL_LANGUAGE_CODE) == 'kh') :
						echo sp_month_kh(date('M'));
					else :
						echo date('F');
					endif; ?>
					</h4>
				<?php echo sp_weekly_topic($home_meta['sp_weekly_topic'][0]); ?>
				</div>
				<img class="radio-clock wow fadeInDown" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/radio-clock.png">
				<a href="<?php echo get_permalink($home_meta['sp_page_radio_drama'][0]); ?>">
		    	<img class="radio-drama wow zoomIn" src="<?php echo $home_meta['sp_radio_drama'][0]; ?>">
		    	</a>
		    	<img class="fm-102 wow flash" src="<?php echo $home_meta['sp_radio_fm102'][0]; ?>">
		    	<a href="<?php echo get_permalink($home_meta['sp_page_radio_podcast'][0]); ?>">
		    		<img class="listen-podcast wow swing" src="<?php echo $home_meta['sp_listen_podcast'][0]; ?>">
		    	</a>
		    	<img class="speaker wow zoomIn" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/speaker.png">
				<div class="love9 actor-radio">
				<img class="wow zoomIn" data-wow-duration="0.4s" data-wow-delay="1s" src="<?php echo $home_meta['sp_radio_title'][0]; ?>">
				<nav class="next-prev wow fadeInDown" data-wow-duration="0.2s" data-wow-delay="1.2s">
					<a data-scroll href="#tv" class="prev"></a>
					<a data-scroll href="#village" class="next"></a>
				</nav>
				<img class="wow zoomIn" data-wow-duration="0.2s" data-wow-delay="0.3s" src="<?php echo $home_meta['sp_radio_actor'][0]; ?>">
				</div>
			</div>
		</section> <!-- #radio -->	
		<section id="village" class="village bg-sections">
			<div class="container clearfix">
				<img class="grass-3" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/grass-3.png">
				<img class="presenter wow swing" src="<?php echo $home_meta['sp_presenter'][0]; ?>">
				<img class="actor-frame wow swing" src="<?php echo $home_meta['sp_actor'][0]; ?>">
				<img class="photo-gallery wow swing" src="<?php echo $home_meta['sp_photo_gallery'][0]; ?>">
				<img class="behind-sence wow swing" src="<?php echo $home_meta['sp_behind_sence'][0]; ?>">
				<img class="video wow swing" src="<?php echo $home_meta['sp_video_gallery'][0]; ?>">
				<div class="love9 actor-village">
				<img class="wow zoomIn" data-wow-duration="0.4s" data-wow-delay="1s" src="<?php echo $home_meta['sp_village_title'][0]; ?>">
				<nav class="next-prev wow fadeInDown" data-wow-duration="0.2s" data-wow-delay="1.2s">
					<a data-scroll href="#radio" class="prev"></a>
					<a data-scroll href="#about" class="next"></a>
				</nav>
				<img class="wow zoomIn" data-wow-duration="0.2s" data-wow-delay="0.3s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/village-love9.png">
				</div>
			</div>
		</section> <!-- #village -->
		<section id="about" class="about bg-sections">
			<div class="container clearfix">
				<img class="social-stand wow bounceInUp" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/social-stand.png">
				<a href="<?php echo ot_get_option('facebook-url'); ?>" target="_blank">
		    		<img class="facebook wow fadeInLeft" data-wow-delay="1s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/facebook.gif">
		    	</a>
		    	<a href="<?php echo ot_get_option('youtube-url'); ?>" target="_blank">
		    		<img class="youtube wow fadeInRight" data-wow-delay="1s"src="<?php echo SP_BASE_URL; ?>assets/images/front-page/youtube.gif">
		    	</a>
		    	<a class="popup-with-zoom-anim" href="#contact-dialog">
		    	<img class="mail-box wow bounceInUp" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/mail-box.png">
		    	</a>
				<img class="grass-4" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/grass-4.png">
				<div class="love9 actor-about">
				<img class="wow zoomIn" data-wow-duration="0.4s" data-wow-delay="1s" src="<?php echo $home_meta['sp_about_title'][0]; ?>">
				<nav class="next-prev wow fadeInDown" data-wow-duration="0.2s" data-wow-delay="1.2s">
					<a data-scroll href="#village" class="prev"></a>
				</nav>
				<img class="wow zoomIn" data-wow-duration="0.2s" data-wow-delay="0.3s" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/about-love9.png">
				</div>
				<img class="flower wow fadeInUp" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/flower.png">
			</div>
		</section> <!-- #about -->
	</div> <!-- #content -->

	<div id="contact-dialog" class="zoom-anim-dialog mfp-hide">
		<?php
            if(function_exists('icl_object_id')) {
                $page_contact = get_post(icl_object_id(ot_get_option('quick-contact'), 'page'));
            } else {
                $page_contact = get_post(ot_get_option('quick-contact'));
            } 
                $content_contact = apply_filters('the_content', $page_contact->post_content);

        ?>
		<h4><?php echo $page_contact->post_title; ?></h4>
		<?php  echo $content_contact; ?>
	</div>
	
<?php get_footer(); ?>