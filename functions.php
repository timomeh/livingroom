<?php

show_admin_bar(false);

function disable_self_ping( &$links ) {
  foreach ( $links as $l => $link )
    if (0 === strpos($link, get_option('home')))
      unset($links[$l]);
}
add_action( 'pre_ping', 'disable_self_ping' );

add_theme_support('post-formats', array('aside', 'status', 'quote'));

function get_the_field($field_name) {
  remove_filter('acf_the_content', 'wpautop');
  the_field($field_name);
  add_filter('acf_the_content', 'wpautop');
  
}
