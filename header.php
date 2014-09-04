<?php
/**
 * The Header
 */
?>
<!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js lt-ie9> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper">
    <header id="header">
    <div class="container clearfix">
        
        <div id="brand" role="banner">
            <?php if( !is_singular() ) echo '<h1>'; else echo '<h2>'; ?>
            
            <a  href="<?php echo home_url() ?>/"  title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>">
                <?php if(ot_get_option('custom-logo')) : ?>
                <img src="<?php echo ot_get_option('custom-logo'); ?>" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" />
                <?php else: ?>
                <span><?php bloginfo( 'name' ); ?></span>
                <?php endif; ?>
            </a>
            
            <?php if( !is_singular() ) echo '</h1>'; else echo '</h2>'; ?>
        </div><!-- end .brand -->

        <nav id="primary-menu-container" class="clearfix">
            <?php echo sp_main_navigation(); ?>
        </nav><!-- .primary-nav .wrap -->

        <div class="header-right">
        <div class="social-btn icons clearfix">
            <ul>
                <li class="i-square icon-facebook-squared"><a href="<?php echo ot_get_option('facebook-url'); ?>" target="_blank">Join us</a></li>
                <li class="i-square icon-youtube"><a href="<?php echo ot_get_option('youtube-url'); ?>" target="_blank">Follow us</a></li>
                <li class="i-square icon-soundcloud"><a href="<?php echo ot_get_option('soundcloud-url'); ?>" target="_blank">Follow us</a></li>
            </ul>
        </div>
        <?php 
        if (function_exists('icl_get_languages')) {
            echo languages_list_header(); 
        }
        ?>
        </div> <!-- .header-right -->
        
	</div><!-- end .container .clearfix -->
    </header><!-- end #header -->
