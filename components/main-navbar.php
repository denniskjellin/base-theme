<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_bloginfo('name'); ;?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar__nav-ul navbar-nav flex-grow-1">
          <?php
          // Output the menu using wp_nav_menu with custom walker
          if ( has_nav_menu('main-menu') ) {
            wp_nav_menu(array(
              'theme_location' => 'main-menu',
              'menu_class'     => 'navbar-nav',
              'walker'         => new main_navbar_walker(),
            ));
          } else {
            ?>
            <p>Create a main navigation to set nav-links</p>
          <?php
          }
          ?>
        </ul>
        <form class="d-flex mt-0" role="search" action="<?php echo esc_url(home_url('/')); ?>">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="s">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>
