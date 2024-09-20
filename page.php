<?php

/**
 * The template for displaying a page
 * @author Dennis Kjellin
 * @package WP Base Theme
 */

get_header(); ?>

<main id="main" class="container main-content" role="main"> 
    <div class="content">
        <?php the_content(); ?>
    </div>
</main>

<?php get_footer(); ?>