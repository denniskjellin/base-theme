
<footer class="footer mt-5">
    <div class="footer__content">
        <div class="footer__links">
            <a href="#">Hem</a>
            <a href="#">Om oss</a>
            <a href="#">Kontakt</a>
            <a href="#">Tjänster</a>
            <a href="#">Nyheter</a>
        </div>
    <div class="footer__copyright-test">
        <p><?php echo get_bloginfo('name') ;?> all rights reserved</p>
    </div>
        <div class="footer__social-icons">
            <a href="#" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.svg" alt="Besök oss på Facebook." aria-label="Besök oss på Facebook.">
            </a>
            <a href="#" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.svg" alt="Besök oss på Instagram." aria-label="Besök oss på Instagram.">
            </a>
        </div>
    </div>
</footer>
    <?php wp_footer(); ?>
    <!-- Other content -->

<?php wp_footer(); ?>
  </div> <!-- end .wrapper -->
</body>
</html>

