<?php
/**
 * The template for displaying Archive pages
 */

global $wp_query;
get_header(); ?>
	<?php do_action( 'sp_start_content_wrap_html' ); ?>
    <div id="main" class="main">
        
    <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <h1 class="page-title">
                    <?php
                        if ( is_day() ) :
                            printf( __( 'Daily Archives: %s', SP_TEXT_DOMAIN ), get_the_date() );

                        elseif ( is_month() ) :
                            printf( __( 'Monthly Archives: %s', SP_TEXT_DOMAIN ), get_the_date( _x( 'F Y', 'monthly archives date format', SP_TEXT_DOMAIN ) ) );

                        elseif ( is_year() ) :
                            printf( __( 'Yearly Archives: %s', SP_TEXT_DOMAIN ), get_the_date( _x( 'Y', 'yearly archives date format', SP_TEXT_DOMAIN ) ) );

                        elseif ( is_category() ) :
                            echo single_cat_title();

                        else :
                            _e( 'Archives', SP_TEXT_DOMAIN );

                        endif;
                    ?>
                </h1>
            </header><!-- .page-header --> 

            <?php /* Start the Loop */ ?>
        
            <div class="sp-posts">
            <?php   while ( have_posts() ) : the_post();

                        echo sp_render_masonry_post( $post->ID, 'post-sider', 'one-third' );

                    endwhile; 
            ?>
            </div> <!-- .container-msnry -->

            <?php         
                    // Pagination
                    if(function_exists('wp_pagenavi'))
                        wp_pagenavi();
                    else 
                        echo sp_pagination();
                else : 

                    get_template_part( 'library/contents/no-results' );

                endif; 
            ?>
            
    </div> <!-- #main -->
    <?php get_sidebar(); ?>
    <?php do_action( 'sp_end_content_wrap_html' ); ?>
<?php get_footer(); ?>