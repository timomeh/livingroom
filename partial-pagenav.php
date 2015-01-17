<section class="b-pagenav">
  <?php if (get_previous_posts_link() != NULL): ?>
    <?php $ppl = explode('"', get_previous_posts_link()); ?>
    <a class="m-button pagenav--new" href="<?php echo $ppl[1]; ?>">neuer</a>
  <?php endif; ?>
  <?php if (get_next_posts_link() != NULL): ?>
    <?php $npl = explode('"', get_next_posts_link()); ?>
    <a class="m-button pagenav--old" href="<?php echo $npl[1]; ?>">älter</a>
  <?php endif; ?>
</section>