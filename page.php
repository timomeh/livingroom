<?php get_header(); ?>
  <section class="b-content">
    <?php the_post(); ?>
    <article class="m-article">
      <header class="article_header">
        <h3 class="article_title"><?php the_title() ?></h3>
      </header>
      <?php the_content(); ?>
    </article>
  </section>
<?php get_footer(); ?>