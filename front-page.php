<?php get_header(); ?>

<main id="main" role="main"> 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <?php if(have_posts()): ?>
                    <?php while(have_posts()): the_post(); ?>
                        <h1><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                        <a href="<?php the_permalink(); ?>">Read more</a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
