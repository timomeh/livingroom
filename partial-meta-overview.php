<?php

$description = get_latest_excerpt();
$thumbnails = get_latest_thumbnail(array('thumbnail', 'facebook'));
if($thumbnails['thumbnail'] == "") {
  $thumbnails['thumbnail'] = home_url() . "/wp-content/themes/livingroom/img/twimg.png";
  $thumbnails['facebook'] = home_url() . "/wp-content/themes/livingroom/img/fbimg.png";
}
$title = "";

if(is_archive()) {
  if(is_day()) $title = "Archiv vom " . get_the_date('j. F Y');
  elseif(is_month()) $title = "Archiv vom " . get_the_date('F Y');
  elseif(is_year()) $title = "Archiv von " . get_the_date('Y');
  else $title = "Archiv";
}
elseif (is_404()) {
  $description = "Leider gibt es hier keinen Inhalt.";
  $title = "Seite nicht gefunden";
}
else {
  $title = "Hallo! Irgendwie. Eigentlich.";
}

$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$uri_path = 'http://' . $_SERVER['HTTP_HOST'] . $uri_parts[0];

?>
  <meta name="title" content="timomeh" />
  <meta name="description" content="<?= $description ?>" />
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:site" content="@timomeh" />
  <meta name="twitter:creator" content="@timomeh" />
  <meta name="twitter:title" content="timomeh" />
  <meta name="twitter:description" content="<?= $description ?>" />
  <meta name="twitter:url" content="<?= $uri_path ?>" />
  <meta name="twitter:image" content="<?= $thumbnails['thumbnail']; ?>" />
  <meta property="og:url" content="<?= $uri_path ?>" />
  <meta property="og:site_name" content="timomeh" />
  <meta property="og:title" content="<?= $title; ?>" />
  <meta property="og:description" content="<?= $description ?>" />
  <meta property="og:image" content="<?= $thumbnails['facebook']; ?>" />
  <meta property="og:locale" content="de_DE" />