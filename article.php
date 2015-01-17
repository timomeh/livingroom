    <article id="article-<?php the_ID() ?>" class="m-article">
<?php if(is_single()): ?>
      <header class="article_header">
        <h3 class="article_title"><?php the_title() ?></h3>
      </header>
<?php else: ?>
      <header class="article_header">
        <h3 class="article_title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
      </header>
<?php endif; ?>
      <div class="article_content">
        <?php get_template_part('partial', 'date') ?></a>
        <?php the_content('Weiterlesen…'); ?>
      </div> 
    </article>