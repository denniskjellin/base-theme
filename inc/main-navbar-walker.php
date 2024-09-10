<?php
class main_navbar_walker extends Walker_Nav_menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        // Output the start of a submenu
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        // Output a menu item
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        // Add classes to the menu item
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'nav-item';
        if ($args->walker->has_children) {
            $classes[] = 'dropdown';
        }
        if (in_array('current-menu-item', $item->classes, true)) {
            $classes[] = 'active';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        // Output the menu item start tag
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
        $output .= $indent . '<li' . $id . $class_names . '>';

        // Output the link attributes and content
        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';

        $atts_str = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $atts_str .= ' ' . $attr . '="' . $value . '"';
            }
        }

        // Add appropriate classes for dropdown functionality
        $atts_str .= ($args->walker->has_children && 0 === $depth) ? ' class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="nav-link"';

        // Output the link tag
        $output .= '<a' . $atts_str . '>';
        $output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $output .= '</a>';
    }
}
?>