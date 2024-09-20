<?php get_header(); ?>

<main class="site-main">
  <div class="container">
    <div class="row">
      <div class="col-8">
        <?php if ( have_posts() ) : ?>
          <h1 class="page-title"><?php single_cat_title(); ?></h1>
          <?php
            while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content', get_post_format() );

          endwhile;

          the_posts_pagination( 
            array(
            'prev_text'          => __( 'Previous page', 'textdomain' ),
            'next_text'          => __( 'Next page', 'textdomain' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'textdomain' ) . ' </span>',
          )
        );

        else :
          get_template_part( 'template-parts/content', 'none' );
        endif;
        ?>

      </div>
      <div class="col-4">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
