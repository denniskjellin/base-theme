<?php get_header(); ?>

<main id="main" class="container" role="main"> 
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
            <div class="content">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
                <a href="<?php the_permalink(); ?>">Read more</a>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
