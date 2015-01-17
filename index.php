<?php get_header(); ?>
  <section class="b-content">
<?php
  if(have_posts()) {
    while(have_posts()) {
      the_post();

      // get_article_format can be found in functions.php
      // It get's the article-TYPE.php partial
      get_article_format(get_post_format());
    }
  }
  else {
    get_article_format('404');
  }
?>
  </section>
<?php get_template_part('partial', 'pagenav'); ?>
<?php get_footer(); ?>