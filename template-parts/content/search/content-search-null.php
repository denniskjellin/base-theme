<div class="no-results not-found">
    <div class="page-header">
        <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'textdomain' ); ?></h1>
    </div>

    <div class="page-content">
        <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'textdomain' ); ?></p>
        <?php get_search_form(); ?>
    </div>
</div>

<div class="link-home">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html_e( 'Back to Home', 'textdomain' ); ?></a>
</div>