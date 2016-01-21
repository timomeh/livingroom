<?php

show_admin_bar(false);
add_theme_support('post-thumbnails');
add_image_size('facebook', 1200, 9999);

function disable_self_ping( &$links ) {
  foreach ( $links as $l => $link )
    if (0 === strpos($link, get_option('home')))
      unset($links[$l]);
}
add_action( 'pre_ping', 'disable_self_ping' );

add_theme_support('post-formats', array('aside', 'status', 'quote', 'gallery', 'image', 'video', 'audio'));


// see http://stackoverflow.com/a/79986/2376069
function trim_at_whole_word($string, $max_size) {
  $parts = preg_split('/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE);
  $parts_count = count($parts);

  $length = 0;
  $last_part = 0;
  for (; $last_part < $parts_count; ++$last_part) {
    $length += strlen($parts[$last_part]);
    if ($length > $max_size) { break; }
  }

  return implode(array_slice($parts, 0, $last_part));
}

function get_the_field($field_name) {
  remove_filter('acf_the_content', 'wpautop');
  the_field($field_name);
  add_filter('acf_the_content', 'wpautop');
}


function get_article_format($format) {
  switch($format) {
    case 'aside':
    case 'gallery':
    case 'image':
    case 'video':
    case 'audio':
      $format = "other";
      break;
    default:
      $format = $format;
  }

  get_template_part('article', $format);
}

function get_thumbnail_of_id($post_id, $sizes) {
  $thumb_id = get_post_thumbnail_id($post_id);
  $result = array();
  foreach ($sizes as $size) {
    $result[$size] = wp_get_attachment_image_src($thumb_id, $size)[0];
  }

  return $result;
}

function generate_custom_excerpt($post_content, $post_excerpt) {
  // post_content of found post without linebreaks
  $post_content = preg_replace( "/\r|\n/", "", strip_tags($post_content));

  if (strlen($post_content) > 0) $post_text = $post_content;
  elseif (strlen($post_excerpt) > 0) $post_text = $post_excerpt;

  // split sentences
  $sentences_with_delim = preg_split("/([.?!:–—] )/", $post_text, 0, PREG_SPLIT_DELIM_CAPTURE);
  $sentences = array();
  for($i = 0; $i <= count($sentences_with_delim); $i += 2) {
    $sentences[] = ltrim($sentences_with_delim[$i] . $sentences_with_delim[$i + 1], " ");
  }

  $length_of_first_sentence = strlen($sentences[0]);
  $length_of_display = 0;
  $max_size = 200;
  $display = "";

  if(strlen($sentences[0]) <= $max_size) {
    // If the first sentence is shorter than max_size

    $i = 0;
    while($length_of_display <= $max_size) {
      if($length_of_display + strlen($sentences[$i]) > $max_size) {
        // If current added sentence will result in a longer string than max_size ...
        if(strlen($sentences[$i]) > 30) { // ... and is longer than 30 characters
          // Add the part of the sentence before max_size is reached, and add ellipsis

                      // remove last space of string, don't forget ellipsis is 1 char long, so -1
          $display .= rtrim(trim_at_whole_word($sentences[$i], $max_size - $length_of_display - 1), " ");
          $display .= "…";
        }
      }
      else {
        // If current sentence can be added as a whole, add him!
        $display .= $sentences[$i];
      }

      $length_of_display += strlen($sentences[$i]) + 1;
      $i++;
    }
  }
  else {
    // If the first sentence is longer than max_size, display him until max_size is reached
    $display = trim_at_whole_word($post_content, $max_size-1);
    $display .= "…";
  }

  $display = htmlspecialchars(str_replace(array("\r", "\n"), "", $display));
  if ($display == "") {
    return "[Diesen Post direkt auf timomeh.de anschauen]";
  }

  return $display;
}

function get_excerpt_of_id($id) {
  return generate_custom_excerpt(get_post($id)->post_content, get_post($id)->post_excerpt);
}


//
// Deprecated stuff
// (Currently not in use)

function get_latest_excerpt() {
  // Query published posts NOT with post_format image, gallery, video or audio
  $args = array(
    'numberposts' => 1,
    'post_type' => 'post',
    'post_status' => 'publish',
    'tax_query' => array(
      array(
        'taxonomy' => 'post_format',
        'field' => 'slug',
        'terms' => array('post-format-image', 'post-format-gallery', 'post-format-video', 'post-format-audio'),
        'operator' => 'NOT IN'
      )
    )
  );

  return generate_custom_excerpt(get_posts($args)[0]->post_content, get_posts($args)[0]->post_excerpt);
}


function get_latest_thumbnail($sizes) {
  $args = array(
    'numberposts' => 1,
    'post_type' => 'post',
    'meta_key' => '_thumbnail_id',
    'post_status' => 'publish'
  );
  $post_id = get_posts($args)[0]->ID;

  return get_thumbnail_of_id($post_id, $sizes);
}
