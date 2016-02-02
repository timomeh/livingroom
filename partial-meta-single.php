<?php

$post_id = $post->ID;
$description = get_excerpt_of_id($post_id);
$thumbnails = get_thumbnail_of_id($post_id, array('large', 'facebook'));
$isStandardThumbnail = false;
if($thumbnails['large'] == "") {
  $thumbnails['large'] = home_url() . "/wp-content/themes/livingroom/img/twimg.png";
  $thumbnails['facebook'] = home_url() . "/wp-content/themes/livingroom/img/fbimg.png";
  $isStandardThumbnail = true;
}
$title = get_the_title($post_id);

$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$uri_path = 'https://' . $_SERVER['HTTP_HOST'] . $uri_parts[0];

switch(get_post_format()) {
  case 'image':
    $card = "photo";
    break;
  case 'gallery':
    $card = "photo";
    break;
  default:
    $card = "summary_large_image";
}

if ($isStandardThumbnail) $card = 'summary';

?><meta name="title" content="timomeh.de" />
  <meta name="description" content="<?= $description ?>" />
  <meta name="twitter:card" content="<?= $card ?>" />
  <meta name="twitter:site" content="@timomeh" />
  <meta name="twitter:creator" content="@timomeh" />
  <meta name="twitter:title" content="<?= $title; ?>" />
  <meta name="twitter:description" content="<?= $description ?>" />
  <meta name="twitter:url" content="<?= $uri_path ?>" />
  <meta name="twitter:image" content="<?= $thumbnails['large']; ?>" />
  <meta property="article:author" content="https://www.facebook.com/timo.maemecke" />
  <meta property="og:url" content="<?= $uri_path ?>" />
  <meta property="og:site_name" content="timomeh.de" />
  <meta property="og:title" content="<?= $title; ?>" />
  <meta property="og:description" content="<?= $description ?>" />
  <meta property="og:image" content="<?= $thumbnails['facebook']; ?>" />
  <meta property="og:locale" content="de_DE" />
