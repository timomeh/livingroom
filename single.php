<?php get_header(); ?>
  <section class="b-content">
<?php the_post(); ?>
<?php get_template_part('article', get_post_format()); ?>
  </section>
  <section class="b-pagenav">
    <a class="m-button m-button--large pagenav--back" href="/">zu allen Beiträgen</a>
  </section>
<?php get_footer(); ?>