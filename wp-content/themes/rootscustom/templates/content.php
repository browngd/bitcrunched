<article <?php post_class(); ?>>
  <header>
    <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <?php get_template_part('templates/entry-meta'); ?>
    <?php
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail('large');
}
?>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
  <footer>
    <?php the_tags('Tagged with: ',' • ','<br />'); ?>
  </footer>
</article>
