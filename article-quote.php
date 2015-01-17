    <article id="article-<?php the_ID() ?>" class="m-article m-article--quote">
      <div class="article_content">
        <?php get_template_part('partial', 'date') ?>
        <blockquote>
          <?php the_content(); ?>
          <?php if(get_field('cite')): ?><footer><cite><?php get_the_field('cite'); ?></cite></footer></blockquote><?php endif; ?>
        </blockquote>
      </div>  
    </article>