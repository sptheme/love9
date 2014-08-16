 
    <section id="about-sponsors">
        <div class="container clearfix">
            <section class="clearfix">
                <div class="block-title"><h4>Some words about us<div class="shadow-left"></div><div class="shadow-right"></div></h4></div>
                <h4>Love9 is the brand new project from <a href="#">BBC Media Action</a> on TV, on Radio and online. It’s all about you, our youth audiences. And of course, it’s about LOVE a subject we know is very important to you all!</h4>
                <p>The programmes and discussions will be made and hosted by our own youth teams, speaking with you as peers about your lives and the situations you face every day, with a particular focus on sexual and reproductive health and rights.</p>
                <a class="learn-more" href="#contact-dialog"><?php _e('Learn more', SP_TEXT_DOMAIN); ?></a>
                
                <section id="sponsors">
                    <h6>Funded by:</h6>
                    <img src="<?php echo SP_BASE_URL; ?>assets/images/unfpa.jpg">
                    <img src="<?php echo SP_BASE_URL; ?>assets/images/usaid-cambodia.jpg">
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