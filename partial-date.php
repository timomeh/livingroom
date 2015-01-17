<?php if(is_single()): ?>
<time class="article_date" datetime="<?php the_time('Y-m-d – H:i') ?>">
  <span class="date_day"><?php the_time('l, j. F Y') ?></span>
  <span class="date_hour"><?php the_time('H:i') ?> Uhr</span>
</time>
<?php else: ?>
<time class="article_date" datetime="<?php the_time('Y-m-d – H:i') ?>">
  <a href="<?php the_permalink() ?>">
    <span class="date_day"><?php the_time('l, j. F Y') ?></span>
    <span class="date_hour"><?php the_time('H:i') ?> Uhr</span>
  </a>
</time>
<?php endif; ?>