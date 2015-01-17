    <article id="article-<?php the_ID() ?>" class="m-article m-article--status">
      <div class="article_content">
        <?php get_template_part('partial', 'date') ?>
        <?php the_content(); ?>
      </div>  
    </article>