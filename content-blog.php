<?php

/**
 *
 * The template used for displaying page content.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<?php odin_breadcrumbs(); ?>

<article id="blog-<?php the_ID(); ?>" itemprop="blogPosts" itemscope itemtype="http://schema.org/BlogPosting">
  <div class="entry-content blog__content">
    <h1 class="entry-title"><?php the_title(); ?></h1>

    <?php if (has_post_thumbnail()) : ?>
      <?php the_post_thumbnail('full'); ?>
    <?php endif; ?>

    <?php the_content(); ?>
</article><!-- #post-## -->