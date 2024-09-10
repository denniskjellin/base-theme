<?php
/**
 * The template for displaying search results.
 *
 * @package WP Base Theme
 */

get_header(); ?>

<main id="main" class="container main-container" role="main"> 
    <section class="content">
            <div class="row">
                <div class="col-12 col-md-8">
                    <?php if (have_posts()) : ?>
                        <header class="page-header">
                            <h1 class="page-title"><?php printf(esc_html__('Search Results for: %s'), '<span>' . get_search_query() . '</span>'); ?></h1>
                        </header>

                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part('template-parts/content', 'search'); ?>
                        <?php endwhile; ?>

                        <?php the_posts_navigation(); ?>

                    <?php else : ?>
                        <?php get_template_part('template-parts/content', 'search-null'); ?>
                    <?php endif; ?>
                </div>

                <div class="col-12 col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
    </section>
</main>

<?php get_footer(); ?>