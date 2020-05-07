<?php

function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


/*Add custom JS file to run in avada theme*/
function add_msn_child_ristorante_js() {
	wp_enqueue_script('msn-custom-child-ristorante-script', get_stylesheet_directory_uri().'/msn-custom-ristorante-rev-1.js',array('jquery'),1,true);
}


add_action( 'wp_enqueue_scripts', 'add_msn_child_ristorante_js', 100 );



//remove script versions
function _remove_script_version( $src ){
	$parts = explode( '?ver', $src );
        return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

//disable all feeds
function msn_itsme_disable_feed() {
 wp_die( __( 'No feed available, please visit the wpwebmaster.ir' ) );
}

add_action('do_feed', 'msn_itsme_disable_feed', 1);
add_action('do_feed_rdf', 'msn_itsme_disable_feed', 1);
add_action('do_feed_rss', 'msn_itsme_disable_feed', 1);
add_action('do_feed_rss2', 'msn_itsme_disable_feed', 1);
add_action('do_feed_atom', 'msn_itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'msn_itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'msn_itsme_disable_feed', 1);
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );




