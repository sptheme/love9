<?php


/* ---------------------------------------------------------------------- */
/* Show language list on header
/* ---------------------------------------------------------------------- */
if( !function_exists('languages_list_header')) {

	function languages_list_header(){
		$languages = icl_get_languages('skip_missing=0&orderby=code');
		if(!empty($languages)){
			echo '<div class="language"><ul>';
			echo '<li>' . __('Language: ', SP_TEXT_DOMAIN) . '</li>';
			foreach($languages as $l){
				echo '<li class="'.$l['language_code'].'">';

				if(!$l['active']) echo '<a href="'.$l['url'].'" title="' . $l['native_name'] . '">';
				echo '<img src="' . $l['country_flag_url'] . '" alt="' . $l['native_name'] . '" />';
				if(!$l['active']) echo '</a>';

				echo '</li>';
			}
			echo '</ul></div>';
		}
	}

}

/* ---------------------------------------------------------------------- */
/*	Get images attached to post
/* ---------------------------------------------------------------------- */
if ( ! function_exists( 'sp_post_images' ) ) {

	function sp_post_images( $args=array() ) {
		global $post;

		$defaults = array(
			'numberposts'		=> -1,
			'order'				=> 'ASC',
			'orderby'			=> 'menu_order',
			'post_mime_type'	=> 'image',
			'post_parent'		=>  $post->ID,
			'post_type'			=> 'attachment',
		);

		$args = wp_parse_args( $args, $defaults );

		return get_posts( $args );
	}
	
}

/* ---------------------------------------------------------------------- */
/*	Get thumbnail post
/* ---------------------------------------------------------------------- */
if( !function_exists('sp_post_thumbnail') ) {

	function sp_post_thumbnail( $size = 'thumbnail'){
			global $post;
			$thumb = '';

			//get the post thumbnail;
			$thumb_id = get_post_thumbnail_id($post->ID);
			$thumb_url = wp_get_attachment_image_src($thumb_id, $size);
			$thumb = $thumb_url[0];
			if ($thumb) return $thumb;
	}		

}

/* ---------------------------------------------------------------------- */
/*	Start content wrap
/* ---------------------------------------------------------------------- */
if ( !function_exists('sp_start_content_wrap') ) {

	add_action( 'sp_start_content_wrap_html', 'sp_start_content_wrap' );

	function sp_start_content_wrap() {
		echo '<section id="content" class="container clearfix">';
	}
	
}

/* ---------------------------------------------------------------------- */
/*	End content wrap
/* ---------------------------------------------------------------------- */
if ( !function_exists('sp_end_content_wrap') ) {

	add_action( 'sp_end_content_wrap_html', 'sp_end_content_wrap' );

	function sp_end_content_wrap() {
		echo '</section> <!-- #content .container .clearfix -->';
	}

}

/* ---------------------------------------------------------------------- */
/*	Thumnail for social share
/* ---------------------------------------------------------------------- */

if ( !function_exists('sp_facebook_thumb') ) {

	function sp_facebook_thumb() {
		if ( is_singular( 'sp_work' ) ) {
			global $post;

			$thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
			echo '<meta property="og:image" content="' . esc_attr($thumbnail_src[0]) . '" />';
		}
	}

	add_action('wp_head', 'sp_facebook_thumb');
}

/* ---------------------------------------------------------------------- */               							
/*  Get related post by Taxonomy
/* ---------------------------------------------------------------------- */
if ( !function_exists('sp_get_posts_related_by_taxonomy') ) {

	function sp_get_posts_related_by_taxonomy($post_id, $taxonomy, $args=array()) {

		//$query = new WP_Query();
		$terms = wp_get_object_terms($post_id, $taxonomy);
		if (count($terms)) {
		
		// Assumes only one term for per post in this taxonomy
		$post_ids = get_objects_in_term($terms[0]->term_id,$taxonomy);
		$post = get_post($post_id);
		$args = wp_parse_args($args,array(
		  'post_type' => $post->post_type, // The assumes the post types match
		  //'post__in' => $post_ids,
		  'post__not_in' => array($post_id),
		  'tax_query' => array(
		  			array(
						'taxonomy' => $taxonomy,
						'field' => 'term_id',
		  				'terms' => $terms[0]->term_id
					)),
		  'orderby' => 'rand',
		  'posts_per_page' => -1
		  
		));
		$query = new WP_Query($args);
		}
		return $query;
	}

}

/* ---------------------------------------------------------------------- */               							
/*  Retrieve the terms list and return array
/* ---------------------------------------------------------------------- */
if ( !function_exists('sp_get_terms_list') ) {

	function sp_get_terms_list($taxonomy){
		$args = array(
				'hide_empty'	=> 0
			);
		$taxonomies = get_terms($taxonomy, $args);
		return $taxonomies;
	}

}

/* ---------------------------------------------------------------------- */               							
/*  Taxonomy has children and has parent
/* ---------------------------------------------------------------------- */
function has_children($cat_id, $taxonomy) {
    $children = get_terms(
        $taxonomy,
        array( 'parent' => $cat_id, 'hide_empty' => false )
    );
    if ($children){
        return true;
    }
    return false;
}

function category_has_parent($catid){
    $category = get_category($catid);
    if ($category->category_parent > 0){
        return true;
    }
    return false;
}

/* ---------------------------------------------------------------------- */
/*  Get related pages
/* ---------------------------------------------------------------------- */
if ( !function_exists('sp_get_related_pages') ) {

	function sp_get_related_pages() {

		$orig_post = $post;
		global $post;
		$tags = wp_get_post_tags($post->ID);
		if ($tags) {
			$tag_ids = array();
			foreach($tags as $individual_tag)
			$tag_ids[] = $individual_tag->term_id;
			$args=array(
			'post_type' => 'page',
			'tag__in' => $tag_ids,
			'post__not_in' => array($post->ID),
			'posts_per_page'=>5
			);
			$pages_query = new WP_Query( $args );
			if( $pages_query->have_posts() ) {
				echo '<div id="relatedpages"><h3>Related Pages</h3><ul>';
				while( $pages_query->have_posts() ) {
				$pages_query->the_post(); ?>
				<li><div class="relatedthumb"><a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('thumb'); ?></a></div>
				<div class="relatedcontent">
				<h3><a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<?php the_time('M j, Y') ?>
				</div>
				</li>
			<?php }
				echo '</ul></div>';
			} else { 
				echo "No Related Pages Found:";
			}
		}
		$post = $orig_post;
		wp_reset_postdata(); 

	}
	
}

/* ---------------------------------------------------------------------- */
/*  Get related post
/* ---------------------------------------------------------------------- */ 
if ( ! function_exists( 'sp_related_posts' ) ) {

	function sp_related_posts() {
		wp_reset_postdata();
		global $post;

		// Define shared post arguments
		$args = array(
			'no_found_rows'				=> true,
			'update_post_meta_cache'	=> false,
			'update_post_term_cache'	=> false,
			'ignore_sticky_posts'		=> 1,
			'orderby'					=> 'rand',
			'post__not_in'				=> array($post->ID),
			'posts_per_page'			=> 3
		);
		// Related by categories
		if ( ot_get_option('related-posts') == 'categories' ) {
			
			$cats = get_post_meta($post->ID, 'related-cat', true);
			
			if ( !$cats ) {
				$cats = wp_get_post_categories($post->ID, array('fields'=>'ids'));
				$args['category__in'] = $cats;
			} else {
				$args['cat'] = $cats;
			}
		}
		// Related by tags
		if ( ot_get_option('related-posts') == 'tags' ) {
		
			$tags = get_post_meta($post->ID, 'related-tag', true);
			
			if ( !$tags ) {
				$tags = wp_get_post_tags($post->ID, array('fields'=>'ids'));
				$args['tag__in'] = $tags;
			} else {
				$args['tag_slug__in'] = explode(',', $tags);
			}
			if ( !$tags ) { $break = true; }
		}
		
		$query = !isset($break) ? new WP_Query($args) : new WP_Query;
		return $query;
	}
	
}

/* ---------------------------------------------------------------------- */
/*	Displays a page pagination
/* ---------------------------------------------------------------------- */

if ( !function_exists('sp_pagination') ) {

	function sp_pagination( $pages = '', $range = 2 ) {

		$showitems = ( $range * 2 ) + 1;

		global $paged, $wp_query;

		if( empty( $paged ) )
			$paged = 1;

		if( $pages == '' ) {

			$pages = $wp_query->max_num_pages;

			if( !$pages )
				$pages = 1;

		}

		if( 1 != $pages ) {

			$output = '<nav class="pagination">';

			// if( $paged > 2 && $paged >= $range + 1 /*&& $showitems < $pages*/ )
				// $output .= '<a href="' . get_pagenum_link( 1 ) . '" class="next">&laquo; ' . __('First', 'sptheme_admin') . '</a>';

			if( $paged > 1 /*&& $showitems < $pages*/ )
				$output .= '<a href="' . get_pagenum_link( $paged - 1 ) . '" class="next">&larr; ' . __('Previous', SP_TEXT_DOMAIN) . '</a>';

			for ( $i = 1; $i <= $pages; $i++ )  {

				if ( 1 != $pages && ( !( $i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems ) )
					$output .= ( $paged == $i ) ? '<span class="current">' . $i . '</span>' : '<a href="' . get_pagenum_link( $i ) . '">' . $i . '</a>';

			}

			if ( $paged < $pages /*&& $showitems < $pages*/ )
				$output .= '<a href="' . get_pagenum_link( $paged + 1 ) . '" class="prev">' . __('Next', SP_TEXT_DOMAIN) . ' &rarr;</a>';

			// if ( $paged < $pages - 1 && $paged + $range - 1 <= $pages /*&& $showitems < $pages*/ )
				// $output .= '<a href="' . get_pagenum_link( $pages ) . '" class="prev">' . __('Last', 'sptheme_admin') . ' &raquo;</a>';

			$output .= '</nav>';

			return $output;

		}

	}

}

/* ---------------------------------------------------------------------- */
/*	Comment Template
/* ---------------------------------------------------------------------- */
if ( ! function_exists( 'sp_comment_template' ) ) {

	function sp_comment_template( $comment, $args, $depth ) {
		global $retina;
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case '' :
		?>

		<li id="comment-<?php comment_ID(); ?>" class="comment clearfix">

			<?php $av_size = isset($retina) && $retina === 'true' ? 96 : 48; ?>
			
			<div class="user"><?php echo get_avatar( $comment, $av_size, $default=''); ?></div>

			<div class="message">
				
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => 3 ) ) ); ?>

				<div class="info">
					<h4><?php echo (get_comment_author_url() != '' ? comment_author_link() : comment_author()); ?></h4>
					<span class="meta"><?php echo comment_date('F jS, Y \a\t g:i A'); ?></span>
				</div>

				<?php comment_text(); ?>
				
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="await"><?php _e( 'Your comment is awaiting moderation.', 'goodwork' ); ?></em>
				<?php endif; ?>

			</div>

		</li>

		<?php
			break;
			case 'pingback'  :
			case 'trackback' :
		?>
		
		<li class="post pingback">
			<p><?php _e( 'Pingback:', 'goodwork' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'goodwork'), ' ' ); ?></p></li>
		<?php
				break;
		endswitch;
	}
	
}

/* ---------------------------------------------------------------------- */
/*	Ajaxify Comments
/* ---------------------------------------------------------------------- */

add_action('comment_post', 'ajaxify_comments',20, 2);
function ajaxify_comments($comment_ID, $comment_status){
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	//If AJAX Request Then
		switch($comment_status){
			case '0':
				//notify moderator of unapproved comment
				wp_notify_moderator($comment_ID);
			case '1': //Approved comment
				echo "success";
				$commentdata=&get_comment($comment_ID, ARRAY_A);
				$post=&get_post($commentdata['comment_post_ID']); 
				wp_notify_postauthor($comment_ID, $commentdata['comment_type']);
			break;
			default:
				echo "error";
		}
		exit;
	}
}

/* ---------------------------------------------------------------------- */
/*	Full Meta post entry
/* ---------------------------------------------------------------------- */
if ( ! function_exists( 'sp_post_meta' ) ) {
	function sp_post_meta() {
		printf( __( '<i class="icon icon-calendar-1"></i><time class="entry-date" datetime="%1$s"> %2$s</time><span class="by-author"> by </span><span class="author vcard">%3$s</span><span class="posted-in"> in </span><i class="icon icon-tag"> </i> %4$s ', SP_TEXT_DOMAIN ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			get_the_author(),
			get_the_category_list( ', ' )
		);
		if ( comments_open() ) : ?>
				<span class="with-comments"><?php _e( ' with ', SP_TEXT_DOMAIN ); ?></span>
				<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( '0 Comments', SP_TEXT_DOMAIN ) . '</span>', __( '1 Comment', SP_TEXT_DOMAIN ), __( '<i class="icon icon-comment-1"></i> % Comments', SP_TEXT_DOMAIN ) ); ?></span>
		<?php endif; // End if comments_open() ?>
		<?php edit_post_link( __( 'Edit', SP_TEXT_DOMAIN ), '<span class="sep"> | </span><span class="edit-link">', '</span>' );
	}
};

/* ---------------------------------------------------------------------- */
/*	Mini Meta post entry
/* ---------------------------------------------------------------------- */
if ( ! function_exists( 'sp_meta_mini' ) ) :
	function sp_meta_mini() {
		printf( __( '<a href="%1$s" title="%2$s"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="sep"> |  </span>', SP_TEXT_DOMAIN ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
			//get_the_category_list( ', ' )
		);
		if ( comments_open() ) : ?>
				<span class="sep"><?php _e( ' | ', SP_TEXT_DOMAIN ); ?></span>
				<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( '0 Comments', SP_TEXT_DOMAIN ) . '</span>', __( '1 Comment', SP_TEXT_DOMAIN ), __( '% Comments', SP_TEXT_DOMAIN ) ); ?></span>
		<?php endif; // End if comments_open()
	}
endif;

/* ---------------------------------------------------------------------- */
/*	Embeded add video from youtube, vimeo and dailymotion
/* ---------------------------------------------------------------------- */
function sp_get_video_img($url) {
	
	$video_url = @parse_url($url);
	$output = '';

	if ( $video_url['host'] == 'www.youtube.com' || $video_url['host']  == 'youtube.com' ) {
		parse_str( @parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
		$video_id =  $my_array_of_vars['v'] ;
		$output .= 'http://img.youtube.com/vi/'.$video_id.'/0.jpg';
	}elseif( $video_url['host'] == 'www.youtu.be' || $video_url['host']  == 'youtu.be' ){
		$video_id = substr(@parse_url($url, PHP_URL_PATH), 1);
		$output .= 'http://img.youtube.com/vi/'.$video_id.'/0.jpg';
	}
	elseif( $video_url['host'] == 'www.vimeo.com' || $video_url['host']  == 'vimeo.com' ){
		$video_id = (int) substr(@parse_url($url, PHP_URL_PATH), 1);
		$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$video_id.php"));
		$output .=$hash[0]['thumbnail_large'];
	}
	elseif( $video_url['host'] == 'www.dailymotion.com' || $video_url['host']  == 'dailymotion.com' ){
		$video = substr(@parse_url($url, PHP_URL_PATH), 7);
		$video_id = strtok($video, '_');
		$output .='http://www.dailymotion.com/thumbnail/video/'.$video_id;
	}

	return $output;
	
}

/* ---------------------------------------------------------------------- */
/*	Embeded add video from youtube, vimeo and dailymotion
/* ---------------------------------------------------------------------- */
function sp_add_video ($url, $width = 620, $height = 349) {

	$video_url = @parse_url($url);
	$output = '';

	if ( $video_url['host'] == 'www.youtube.com' || $video_url['host']  == 'youtube.com' ) {
		parse_str( @parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
		$video =  $my_array_of_vars['v'] ;
		$output .='<iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$video.'?rel=0" frameborder="0" allowfullscreen></iframe>';
	}
	elseif( $video_url['host'] == 'www.youtu.be' || $video_url['host']  == 'youtu.be' ){
		$video = substr(@parse_url($url, PHP_URL_PATH), 1);
		$output .='<iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$video.'?rel=0" frameborder="0" allowfullscreen></iframe>';
	}
	elseif( $video_url['host'] == 'www.vimeo.com' || $video_url['host']  == 'vimeo.com' ){
		$video = (int) substr(@parse_url($url, PHP_URL_PATH), 1);
		$output .='<iframe src="http://player.vimeo.com/video/'.$video.'" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
	}
	elseif( $video_url['host'] == 'www.dailymotion.com' || $video_url['host']  == 'dailymotion.com' ){
		$video = substr(@parse_url($url, PHP_URL_PATH), 7);
		$video_id = strtok($video, '_');
		$output .='<iframe frameborder="0" width="'.$width.'" height="'.$height.'" src="http://www.dailymotion.com/embed/video/'.$video_id.'"></iframe>';
	}

	return $output;
}

/* ---------------------------------------------------------------------- */
/*	Embeded soundcloud
/* ---------------------------------------------------------------------- */

function sp_soundcloud($url , $autoplay = 'false' ) {
	return '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.$url.'&amp;auto_play='.$autoplay.'&amp;show_artwork=true"></iframe>';
}

/* ---------------------------------------------------------------------- */
/*	Get Most Racent posts from Category
/* ---------------------------------------------------------------------- */
if ( ! function_exists( 'sp_last_posts_cat' ) ) {
	function sp_last_posts_cat( $post_num = 5 , $thumb = true , $category = 1 ) {

		global $post;
		
		$out = '';
		if ( is_singular() ) :
			$args = array( 'cat' => $category, 'posts_per_page' => (int) $post_num, 'post__not_in' => array($post->ID) );	
		else : 
			$args = array( 'cat' => $category, 'posts_per_page' => (int) $post_num, 'post__not_in' => get_option( 'sticky_posts' ) );
		endif;
		

		$custom_query = new WP_Query( $args );

		$out .= '<section class="custom-posts clearfix">';
		if( $custom_query->have_posts() ) :
			while ( $custom_query->have_posts() ) : $custom_query->the_post();

			$out .= '<article>';
			$out .= '<a href="' . get_permalink() . '" class="clearfix">';
			if ( has_post_thumbnail() && $thumb ) :
				$out .= get_the_post_thumbnail();
			else :
				$out .= '<img class="wp-image-placeholder" src="' . SP_ASSETS_THEME .'images/placeholder/thumb-small.png">';	
			endif;
			$out .= '<h5>' . get_the_title() . '</h5>';
			$out .= '<span class="time">' . get_the_time('j M, Y') . '</span>';
			$out .= '</a>';
			$out .= '</article>';

			endwhile; wp_reset_postdata();
		endif;
		$out .= '<a href="' . esc_url(get_category_link( $category )) . '" class="learn-more">' . __('More news', SP_TEXT_DOMAIN) .'</a>';
		$out .= '</section>';

		return $out;
	}
}

/* ---------------------------------------------------------------------- */
/*	Get latest gallery/album
/* ---------------------------------------------------------------------- */
if ( ! function_exists( 'sp_get_album_gallery' ) ) {
	function sp_get_album_gallery( $album_id = '', $post_num = 10, $size = 'thumbnail' ) {

		global $post;

		$gallery = explode( ',', get_post_meta( $album_id, 'sp_gallery', true ) );
		/*$args = array(
			'posts_per_page'	=>	$post_num,
			'post_parent'		=>	$album_id
		);

		$gallery = sp_post_images( $args );*/

		$out = '<div class="gallery clearfix">';
		
		if ( $gallery[0] != '' ) :
			foreach ( $gallery as $image ) :
			$imageid = wp_get_attachment_image_src($image, $size);
			$out .= '<div class="one-third">';
			$out .= '<a href="' . wp_get_attachment_url($image) . '">';
			$out .= '<img class="attachment-medium wp-post-image" src="' . $imageid[0] . '">';
			$out .= '</a>';
			$out .= '</div><!-- .one-third -->';
			endforeach; 
		else : 
			$out .= __( 'Sorry there is no image for this album.', SP_TEXT_DOMAIN );
		endif;
		
		/*foreach ( $gallery as $image ) : setup_postdata( $image );
			$imageid = wp_get_attachment_image_src($image->ID, $size);
			$out .= '<div class="one-third">';
			$out .= '<a href="' . wp_get_attachment_url($image->ID) . '">';
			$out .= '<img class="attachment-medium wp-post-image" src="' . $imageid[0] . '" alt="' . $image->post_title . '">';
			$out .= '</a>';
			$out .= '</div><!-- .one-third -->';
		endforeach; wp_reset_postdata();*/

		$out .= '</div>';

		return $out;
	}
}

/* ---------------------------------------------------------------------- */
/*	Get Cover of Album
/* ---------------------------------------------------------------------- */
if ( ! function_exists( 'sp_get_cover_album' ) ) {
	function sp_get_cover_album( $post_num = 10, $size = 'thumbnail' ) {

		global $post;

		$args = array(
			'post_type' 		=>	'gallery',
			'posts_per_page'	=>	$post_num,
		);

		$custom_query = new WP_Query( $args );

		if( $custom_query->have_posts() ) :
			$out = '<div class="album-cover clearfix">';
			while ( $custom_query->have_posts() ) : $custom_query->the_post();
				$out .= '<div class="two-fourth">';
				$out .= '<a href="'.get_permalink().'"><img src="' . sp_post_thumbnail( $size ) . '" /></a>';
                $out .= '<h5><a href="'.get_permalink().'">' . get_the_title() . '</a></h5>';
                $out .= '</a>';
                $out .= '</div><!-- .two-fourth -->';

			endwhile; wp_reset_postdata();
			$out .= '</div><!-- .album-cover -->';
		endif;

		return $out;
	}
}

/* ---------------------------------------------------------------------- */
/*	Get video village as gallery
/* ---------------------------------------------------------------------- */
if ( ! function_exists( 'sp_get_video_village' ) ) {
	function sp_get_video_village( $post_num = 10 ) {

		global $post;

		$args = array(
			'post_type'			=> 'video_gallery',
			'posts_per_page'	=>	$post_num
		);

		$custom_query = new WP_Query( $args );

		$out = '<div class="video-gallery clearfix">';
		while ( $custom_query->have_posts() ) : $custom_query->the_post();
			$video_cover = sp_get_video_img( get_post_meta( get_the_ID(), 'sp_video_url', true ) );
			$out .= '<div class="two-fourth">';
			$out .= '<a href="' . get_permalink() . '">';
			$out .= '<img class="attachment-medium wp-post-image" src="' . $video_cover . '">';
			$out .= '</a>';
			$out .= '<h6><a href="' . get_permalink() . '">' . get_the_title() . '</a></h6>';
			$out .= '</div><!-- .one-third -->';
		endwhile;
		wp_reset_postdata();

		return $out;
	}
}	

/* ---------------------------------------------------------------------- */
/*	Social icons - Widget
/* ---------------------------------------------------------------------- */
if ( ! function_exists( 'sp_show_social_icons' ) ) {
	function sp_show_social_icons() {

		$social_icons = ot_get_option( 'social-links' );

		$out = '<section class="social-btn clearfix round">';
		$out .= '<ul>';
		
		foreach ($social_icons as $icons) {
			if ( $icons['social-icon'] == 'icon-facebook' )	
				$out .= '<li class="i-square icon-facebook-squared"><a href="#" target="_self"></a></li>';
			
			if ( $icons['social-icon'] == 'icon-twitter' )
				$out .= '<li class="i-square icon-twitter"><a href="#" target="_self"></a></li>';
			
			if ( $icons['social-icon'] == 'icon-gplus' )
				$out .= '<li class="i-square icon-gplus"><a href="#" target="_self"></a></li>';
			
			if ( $icons['social-icon'] == 'icon-youtube' )	
				$out .= '<li class="i-square icon-youtube"><a href="#" target="_self"></a></li>';
		}

		$out .= '</ul>';
		$out .= '</section>';

		return $out;

	}
}

/* ---------------------------------------------------------------------- */               							
/*  Get post type and return array
/* ---------------------------------------------------------------------- */
if ( !function_exists('sp_get_posts_type') ) {
	function sp_get_posts_type( $post_type = 'post', $args=array() ) {

		$defaults = array(
				'post_type' => $post_type, 
				'posts_per_page' => -1
			);
		$args = wp_parse_args( $args, $defaults );
		extract( $args );

		$custom_query = new WP_Query($args);

		if ( $custom_query->have_posts() ):
			$out = '<div class="sp-post-' . $post_type . '">';
			while ( $custom_query->have_posts() ) : $custom_query->the_post();
				$out .= sp_switch_posttype_content( $post_type );
			endwhile;
			wp_reset_postdata();
			$out .= '</div>';
		endif;

		return $out;
	}	
}

/* ---------------------------------------------------------------------- */               							
/*  Get post related by post type and return array
/* ---------------------------------------------------------------------- */
if ( !function_exists('sp_get_related_posts') ) {
	function sp_get_related_posts( $post_id, $args=array() ) {

		$post = get_post($post_id);
		$post_type = $post->post_type;

		$defaults = array(
				'post_type' => $post_type, 
				'post__not_in' => array($post_id),
				'orderby' => 'rand',
				'posts_per_page' => 6
			);
		$args = wp_parse_args( $args, $defaults );
		extract( $args );

		$custom_query = new WP_Query($args);

		if ( $custom_query->have_posts() ):
			$out = '<section class="related-posts sp-post-' . $post_type . '">';
			$out .= '<h4 class="heading">' . __('Related post...', SP_TEXT_DOMAIN) . '</h4>';
			$out .= '<ul class="clearfix">';
			while ( $custom_query->have_posts() ) : $custom_query->the_post();
				$out .= '<li class="related">';
				$out .= sp_switch_posttype_content( $post_type );
				$out .= '</li>';
			endwhile;
			$out .= '</ul>';
			$out .= '</section>';
			wp_reset_query();
		else :
			$out = 'There is no related post.';
		endif; 

		return $out;
	}	
}

/* ---------------------------------------------------------------------- */               							
/*  Switch post type content
/* ---------------------------------------------------------------------- */
if ( !function_exists('sp_switch_posttype_content') ) {
	function sp_switch_posttype_content( $post_type ) {
		
		if ( $post_type == 'presenter' || $post_type == 'actor' ) {
			$out = sp_render_team_post(get_the_ID(), 'large');
		} elseif ( $post_type == 'behind_scene' ) {
			$out = sp_render_blog_post(get_the_ID(), 'large');
		} elseif ( $post_type == 'gallery' ) {
			$out = sp_render_photogallery_post(get_the_ID());
		} else { // for blog 
			$out = sp_render_video_post(get_the_ID(), 'large');
		}
		return $out;
		
	}
}

/* ---------------------------------------------------------------------- */               							
/* Render HTML Video
/* ---------------------------------------------------------------------- */
if ( !function_exists('sp_render_video_post') ) {
	function sp_render_video_post($post_id, $size = 'thumbnail') {

		$video_url = get_post_meta($post_id, 'sp_video_url', true);
		$video_cover = sp_get_video_img( $video_url );

    	$out = '<article id="post-' . $post_id . '">';
    	if ( has_post_thumbnail() ) :
			$out .= '<a href="'.get_permalink().'"><img class="attachment-medium wp-post-image" src="' . sp_post_thumbnail( $size ) . '" /></a>';
		else :
			$out .= '<a href="'.get_permalink().'"><img class="attachment-medium wp-post-image" src="' . $video_cover . '" /></a>';
		endif; 
		$out .= '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
	    $out .= '</article>';

		return $out;
	}
}

/* ---------------------------------------------------------------------- */               							
/* Render HTML Team (Presneter or Actor)
/* ---------------------------------------------------------------------- */
if ( !function_exists('sp_render_team_post') ) {
	function sp_render_team_post($post_id, $size = 'thumbnail') {

		$team_position = get_post_meta($post_id, 'sp_team_position', true);
    	$team_email = get_post_meta($post_id, 'sp_team_email', true);

    	$out = '<article id="post-' . $post_id . '">';
		$out .= '<a href="'.get_permalink().'"><img class="attachment-medium wp-post-image" src="' . sp_post_thumbnail( $size ) . '" /></a>';
		$out .= '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
	    $out .= '<h5>' . get_post_meta( get_the_ID(), 'sp_team_position', true) . '</h5>';
	    $out .= '<a class="team-email" href="mailto:' . antispambot(get_post_meta( get_the_ID(), 'sp_team_email', true)) . '">' . antispambot(get_post_meta( get_the_ID(), 'sp_team_email', true)) . '</a>';
	    $out .= '</article>';

		return $out;
	}
}

/* ---------------------------------------------------------------------- */               							
/* Render HTML Photogallery
/* ---------------------------------------------------------------------- */
if ( !function_exists('sp_render_photogallery_post') ) {
	function sp_render_photogallery_post($post_id, $size = 'thumbnail') {

    	$out = '<article id="post-' . $post_id . '">';
		$out .= '<a href="'.get_permalink().'"><img class="attachment-medium wp-post-image" src="' . sp_post_thumbnail( $size ) . '" /></a>';
		$out .= '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
	    $out .= '</article>';

		return $out;
	}
}

