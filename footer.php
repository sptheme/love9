 
    <section id="about-sponsors">
        <div class="container clearfix">
            <section class="clearfix">
                <?php
                if(function_exists('icl_object_id')) {
                    $page_about_obj = get_post(icl_object_id(ot_get_option('about-footer-text'), 'page'));
                    $sponsor_obj = get_post(icl_object_id(ot_get_option('sponsor-footer-text'), 'page'));
                } else {
                    $page_about_obj = get_post(ot_get_option('about-footer-text'));
                    $sponsor_obj = get_post(ot_get_option('sponsor-footer-text'));
                } 
                    $content_about = apply_filters('the_content', $page_about_obj->post_content);
                    $content_sponsor = apply_filters('the_content', $sponsor_obj->post_content);

                ?>
                <div class="block-title"><h4><?php echo $page_about_obj->post_title; ?><div class="shadow-left"></div><div class="shadow-right"></div></h4></div>
                <?php echo $content_about; ?>
                <!-- <a class="learn-more" href="#"><?php _e('Learn more', SP_TEXT_DOMAIN); ?></a> -->
                <section id="sponsors">
                <?php echo $content_sponsor; ?>
                </section>
            </section> <!-- #about-sponsors -->
        </div>
    </section>
    
    <footer class="clearfix">
        <nav id="footer-nav">
            <?php echo sp_footer_navigation(); ?>
        </nav>
        <p class="copyright">
        <?php 
        if ( ot_get_option( 'copyright' ) ): 
            echo ot_get_option( 'copyright' ); 
        else:
            echo get_bloginfo() . '&copy;' . date( 'Y' ) .'. ' . __( 'Copyright© 2014 Love9. All right reserved.', SP_TEXT_DOMAIN );
        endif; ?>
    </footer>

    
    
</div> <!-- #wrapper -->

<?php wp_footer(); ?>

</body>
</html>