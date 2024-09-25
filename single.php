<?php get_header(); ?>
<div class="container">
  <div class="row">
    <!-- Main content area -->
    <div class="col-8">
      <main id="main-content">
      
        <?php
        // Loop through posts
        if(have_posts()) :
          while(have_posts()) : the_post();
        ?>
        <article class="post">
          <h1 class="post__title"><?php the_title(); ?></h1>
          <div class="post__meta">
            <span class="post__author">By <?php the_author(); ?></span>
            <span class="post__date"><?php the_date(); ?></span>
          </div>
          <div class="post__content">
            <?php the_content(); ?>
          </div>
        </article>
        <?php
          endwhile;
        endif;
        ?>
      </main>
    </div>
    
    <!-- Sidebar -->
    <aside id="sidebar" class="col-4">
      <div class="sidebar">
        <h2 class="sidebar__title">Recent Posts</h2>
        <ul>
          <?php
          // Query recent posts
          $recent_posts = wp_get_recent_posts(array(
            'numberposts' => 5,
            'post_status' => 'publish'
          ));
          
          // Loop through recent posts
          foreach($recent_posts as $post) :
          ?>
          <li>
            <a href="<?php echo get_permalink($post['ID']); ?>"><?php echo $post['post_title']; ?></a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="sidebar">
        <h2 class="sidebar-title">Categories</h2>
        <ul>
          <?php
          // Display list of categories
          wp_list_categories(array(
            'title_li' => '', // Don't display title
          ));
          ?>
        </ul>
      </div>

      <div class="sidebar archives">
        <h2 class="sidebar-title">Archives</h2>
        <ul>
          <?php
          // Display list of archives
          wp_get_archives(array(
            'type' => 'monthly', // Display monthly archives
            'show_post_count' => true, // Show the number of posts in each archive
          ));
          ?>
        </ul>

        <div class="pagination">
          <?php
          // Display pagination links
          echo paginate_links();
          ?>
        </div>
      </div>
    </aside>
  </div>
</div>
<?php get_footer(); ?>
