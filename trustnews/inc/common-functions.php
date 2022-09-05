<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package trustnews
 */

//Excerpt More
function trustnews_excerpt_more( $link ) {
   $excerpt_text = get_theme_mod('excerpt_text',esc_html__('Read More','trustnews'));
    if ( is_admin() ) {
        return $link;
    }

    $link = sprintf(
        '<a href="%1$s" class="more-link">%2$s</a>',
        esc_url( get_permalink( get_the_ID() ) ),
        /* translators: %s: Name of current post */
        sprintf( $excerpt_text, get_the_title( get_the_ID() ) )
    );
    return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'trustnews_excerpt_more' );

//Excerpt length
function trustnews_excerpt_length($length) {
    $excerpt_length = get_theme_mod('excerpt_length','30');
    if( is_admin() ){
        return absint($length);
    }

    $length = $excerpt_length;
    return absint($length);
}
add_filter('excerpt_length', 'trustnews_excerpt_length');
