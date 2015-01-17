<?php $theme = wp_get_theme(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php if (is_404()): ?><meta name="robots" content="noindex" />
  <?php endif; ?><meta charset="UTF-8">
  <title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#73b036">
  <?php if(is_single() || is_page()) $type = "single"; else $type = "overview"; ?>
  <?php get_template_part('partial-meta', $type); ?>
  <link rel="icon" type="image/x-icon" href="<?= get_stylesheet_directory_uri() ?>/img/favicon.png">
  <link rel="icon" sizes="192x192" href="<?= get_stylesheet_directory_uri() ?>/img/favicon-highres.png">
  <style><?php get_template_part('partial', 'css'); ?></style>
  <?php wp_head(); ?>
  <script>
    (function(d) {
      var config = {
        kitId: 'sam1uuj',
        scriptTimeout: 3000
      },
      h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='//use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
    })(document);
  </script>
  <?php if (!is_preview()): ?><script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-58652766-1', 'auto');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');
  </script><?php endif; ?>
</head>
<body>
  <?php get_template_part( 'partial', 'svgmap' ); ?>
  <header class="b-header">
    <a href="<?= home_url(); ?>">
      <h1 class="header_brand">
        <span class="brand_name">timomeh</span>
        <svg class="brand_logo"><use xlink:href="#shape-hairline"></use></svg>
      </h1>
    </a>
  </header>