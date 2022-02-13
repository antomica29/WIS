<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'twentytwentytwo-style'; // This is 'twentytwentytwo-style' for the Twenty Twenty Two theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css',
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
    wp_enqueue_style( 'wis-feed', get_template_directory_uri() . "-child/shortcodes/wis-feed/wis-feed.css");
}

function getPageContent($atts)
{
    $args = shortcode_atts(array(
        'title' => '',
    ), $atts);
    $title = $args['title'];

    $page = file_get_contents('https://www.wis-ltd.net/blog/');

    ob_start();
    require_once "shortcodes/wis-feed/wis-feed.php";
    return ob_get_clean();
}
add_shortcode('wis-feed', 'getPageContent');

function shortcodes_init()
{
    add_shortcode('wis-feed', 'getPageContent');
}
add_action('init', 'shortcodes_init');
