<?php

include_once( get_stylesheet_directory() . '/inc/bootstrap-pagination.php' );



// style and scripts
add_action('wp_enqueue_scripts', 'bootscore_child_enqueue_styles');
function bootscore_child_enqueue_styles() {

  // style.css
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

  // Compiled main.css
  $modified_bootscoreChildCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/css/main.css'));
  wp_enqueue_style('main', get_stylesheet_directory_uri() . '/css/main.css', array('parent-style'), $modified_bootscoreChildCss);

  // custom.js
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', false, '', true);
}


// Breadcrumb
function the_breadcrumb_render() {
    if (!is_home()) {
        echo '<nav aria-label="breadcrumb" class="breadcrumb-scroller mb-4 mt-3 py-2 px-3 bg-light rounded">';
        echo '<ol class="breadcrumb mb-0">';
        echo '<li class="breadcrumb-item"><a href="' . home_url() . '">' . '<i class="fa-solid fa-house"></i>' . '</a></li>';
        if (is_category() || is_single()) {
            $cat_IDs = wp_get_post_categories(get_the_ID());
            foreach ($cat_IDs as $cat_ID) {
                $cat = get_category($cat_ID);
                echo '<li class="breadcrumb-item"><a href="' . get_term_link($cat->term_id) . '">' . $cat->name . '</a></li>';
            }
        }
        if (is_page() || is_single()) {
            echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
        }
        echo '</ol>';
        echo '</nav>';
    }
}
add_filter('breadcrumbs', 'breadcrumbs');
// Breadcrumb END

// Register Bootstrap 5 Nav Walker
if (!function_exists('register_bs_navwalker')) :
    function register_bs_navwalker() {
        require_once('inc/class-bootstrap-5-navwalker.php');
        register_nav_menu('main-menu', 'Main menu');
        register_nav_menu('footer-menu', 'Footer menu');
    }
endif;
add_action('after_setup_theme', 'register_bs_navwalker');
// Register Bootstrap 5 Nav Walker END


// Create shortcut for homepage sections
function main_homepage_sections() {
    get_template_part('homepage-sections/hero-section');
    get_template_part('homepage-sections/services');
    get_template_part('homepage-sections/about');
}

function main_homepage_sections_shortcode() {
    ob_start();
    main_homepage_sections();
    return ob_get_clean();
}
add_shortcode( 'main_homepage_sections', 'main_homepage_sections_shortcode' );
// Create shortcut for homepage sections END