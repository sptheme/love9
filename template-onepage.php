<?php
/**
 * Template Name: Onepage
 */

get_header(); ?>
	
	<?php $home_meta = get_post_meta( $post->ID ); ?>

	<style type="text/css">
		/* Village */
		a.presenter {
			background: url(<?php echo $home_meta['sp_presenter'][0];?>) no-repeat;
			width: 100px;
			height: 121px;
		}
		a.presenter:hover {  background-position: 0 -121px; }

		a.actor-frame {
			background: url(<?php echo $home_meta['sp_actor'][0];?>) no-repeat;
			width: 116px;
			height: 123px;
		}
		a.actor-frame:hover {  background-position: 0 -123px; }

		a.photo-gallery {
			background: url(<?php echo $home_meta['sp_photo_gallery'][0];?>) no-repeat;
			width: 137px;
			height: 123px;
		}
		a.photo-gallery:hover {  background-position: 0 -123px; }

		a.behind-scene {
			background: url(<?php echo $home_meta['sp_behind_scene'][0];?>) no-repeat;
			width: 165px;
			height: 127px;
		}
		.kh a.behind-scene {
			background: url(<?php echo $home_meta['sp_behind_scene'][0];?>) no-repeat;
			width: 102px;
			height: 127px;
		}
		a.behind-scene:hover {  background-position: 0 -127px; }

		a.video {
			background: url(<?php echo $home_meta['sp_video_gallery'][0];?>) no-repeat;
			width: 104px;
			height: 137px;
		}
		a.video:hover {  background-position: 0 -137px; }

		a.announcement {
			background: url(<?php echo $home_meta['sp_announcement'][0];?>) no-repeat;
			width: 175px;
			height: 140px;
		}
		a.announcement:hover {  background-position: 0 -140px; }

		a.blog {
			background: url(<?php echo $home_meta['sp_blog'][0];?>) no-repeat;
			width: 92px;
			height: 109px;
		}
		a.blog:hover {  background-position: 0 -109px; }

		a.document {
			background: url(<?php echo $home_meta['sp_document'][0];?>) no-repeat;
			width: 143px;
			height: 87px;
		}
		a.document:hover {  background-position: 0 -87px; }

		/* TV */
		a.tv-drama {
			background: url(<?php echo $home_meta['sp_tv_drama'][0];?>) no-repeat;
			width: 298px;
			height: 260px;
		}
		a.tv-drama:hover {  background-position: 0 -269px }

		a.tv-magazine {
			background: url(<?php echo $home_meta['sp_tv_magazine'][0];?>) no-repeat;
			width: 210px;
			height: 193px;
		}
		a.tv-magazine:hover {  background-position: 0 -193px }

		/* Radio */
		a.radio-drama {
			background: url(<?php echo $home_meta['sp_radio_drama'][0];?>) no-repeat;
			width: 276px;
			height: 240px;
		}
		a.radio-drama:hover {  background-position: 0 -240px }

		a.listen-podcast {
			background: url(<?php echo $home_meta['sp_listen_podcast'][0];?>) no-repeat;
			width: 190px;
			height: 68px;
		}
		a.listen-podcast:hover {  background-position: 0 -69px }

		/* About */
		a.facebook {
			background: url(<?php echo $home_meta['sp_facebook'][0];?>) no-repeat;
			width: 49px;
			height: 45px;
		}
		a.facebook:hover {  background-position: 0 -45px; }

		a.youtube {
			background: url(<?php echo $home_meta['sp_youtube'][0];?>) no-repeat;
			width: 146px;
			height: 54px;
		}
		a.youtube:hover {  background-position: 0 -54px; }

		a.mail-box {
			background: url(<?php echo $home_meta['sp_mail_box'][0];?>) no-repeat;
			width: 96px;
			height: 259px;
		}
		a.mail-box:hover {  background-position: 0 -259px; }

	</style>

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
	    <a href="<?php echo get_permalink($home_meta['sp_page_weekly_topic'][0]); ?>">
	    <img class="radio-board wow zoomIn" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/radio-board.png">
	    </a>
    	<!-- Village Sence -->
    	<img class="cow" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/cow.png">
    	<img class="grass" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/grass.png">
    	<img class="pig" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/pig.png">
    	<img class="village-board wow zoomIn" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/village-board.png">
    	<img class="village-symbol wow fadeIn" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/village-symbol.png">

    	<a class="announcement wow swing" href="<?php echo get_permalink($home_meta['sp_page_announcement'][0]); ?>"></a>
    	<a class="blog wow swing" href="<?php echo get_permalink($home_meta['sp_page_blog'][0]); ?>"></a>
    	<a class="document wow swing" href="<?php echo get_permalink($home_meta['sp_page_documents'][0]); ?>"></a>

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
				<a class="tv-drama wow fadeInLeft" href="<?php echo get_permalink($home_meta['sp_page_tv_drama'][0]); ?>"></a>
		    	<a class="tv-magazine wow fadeInRight" href="<?php echo get_permalink($home_meta['sp_page_tv_mag'][0]); ?>"></a>
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
				<?php 
					$today = getdate();
					echo sp_weekly_topic($today['year'], $today['mon'], $home_meta['sp_weekly_topic'][0]); ?>
				</div>
				<img class="radio-clock wow fadeInDown" src="<?php echo SP_BASE_URL; ?>assets/images/front-page/radio-clock.png">
				<a class="radio-drama wow zoomIn" href="<?php echo get_permalink($home_meta['sp_page_radio_drama'][0]); ?>"></a>
		    	<img class="fm-102 wow flash" src="<?php echo $home_meta['sp_radio_fm102'][0]; ?>">
		    	<a class="listen-podcast wow swing" href="<?php echo get_permalink($home_meta['sp_page_radio_podcast'][0]); ?>"></a>
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
				<a class="presenter wow swing" href="<?php echo get_permalink($home_meta['sp_page_presenter'][0]); ?>"></a>
				<a class="actor-frame wow swing" href="<?php echo get_permalink($home_meta['sp_page_actor'][0]); ?>"></a>
				<a class="photo-gallery wow swing" href="<?php echo get_permalink($home_meta['sp_page_photogallery'][0]); ?>"></a>
				<a class="behind-scene wow swing" href="<?php echo get_permalink($home_meta['sp_page_behind_scene'][0]); ?>"></a>
				<a class="video wow swing" href="<?php echo get_permalink($home_meta['sp_page_video_gallery'][0]); ?>"></a>
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
				<a class="facebook wow fadeInLeft" data-wow-delay="1s" href="<?php echo ot_get_option('facebook-url'); ?>" target="_blank"></a>
		    	<a class="youtube wow fadeInRight" data-wow-delay="1s" href="<?php echo ot_get_option('youtube-url'); ?>" target="_blank"></a>
		    	<a class="popup-with-zoom-anim mail-box wow bounceInUp" href="#contact-dialog"></a>
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