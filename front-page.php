<?php get_header(); ?>

<main id="main" class="container main-container" role="main"> 
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
            <div class="content">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
