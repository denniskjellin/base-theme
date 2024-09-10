<?php get_header() ;?>
<main id="main" class="container main-container" role="main"> 
    <div class="content">
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
