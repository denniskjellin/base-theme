<?php get_header() ;?>
<main id="main" role="main"> 
    <div class="container main-container">
      <?php if(have_posts()):?>
          <?php while(have_posts()):the_post();?>
                          <h2><?php the_title();?></h2>
                          <p><?php the_content();?></p>
          <?php endwhile;?>
      <?php endif;?>
    </div>
</div>
</main>


<?php get_footer();?>
