<?php
/**
 * The template for displaying Archive pages
 */

global $wp_query;
get_header(); ?>
    <?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>   
	<?php do_action( 'sp_start_content_wrap_html' ); ?>
    <div id="main" class="main">
        
    <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <h1 class="page-title">
                    <?php echo $term->name; ?>
                </h1>
            </header><!-- .page-header --> 

            <div class="entry-content">
            <p><?php echo $term->description; ?></p>
            </div>

            <?php /* Start the Loop */ ?>
        
            <div class="container-msnry clearfix">
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