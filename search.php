<?php
/**
 * The template for displaying search results.
 *
 * @package WP Base Theme
 */

get_header(); ?>

<main id="main" class="main-container" role="main"> 
    <div class="container">
        <div class="row">
            <section class="col-12 col-md-8">
                <?php if (have_posts()) : ?>
                    <h1 class="page-title">
                        <?php printf(esc_html__('Search Results for: %s', 'textdomain'), '<span>' . esc_html(get_search_query()) . '</span>'); ?>
                    </h1>
                    
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/content/search/content', 'search'); ?>
                    <?php endwhile; ?>

                    <?php the_posts_navigation(); ?>

                <?php else : ?>
                    <?php get_template_part('template-parts/content/search/content', 'search-null'); ?>
                <?php endif; ?>
            </section>

            <div class="col-12 col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>