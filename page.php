<?php

/**
 * The template for displaying a page
 * @author Dennis Kjellin
 * @package WP Base Theme
 */

get_header(); ?>

<main id="main" class="main-content" role="main"> 
    <div class="container content">
        <?php the_content(); ?>
    </div>
</main>

<?php get_footer(); ?>