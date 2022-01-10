<?php
/**
 * The default template for displaying content.
 *
 * Used for both single and index/archive/author/catagory/search/tag.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('my-4'); ?> style="background: #eee; padding: 20px;">
	<header class="entry-header">
		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php odin_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : ?>
		<div class="entry-summary">
			<?php echo odin_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>
		<div class="entry-content">
			<?php echo odin_excerpt(); ?>
		</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?>
			<span class="cat-links"><?php echo __( 'Postado em:', 'odin' ) . ' ' . get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'odin' ) ); ?></span>
		<?php endif; ?>
		<?php the_tags( '<span class="tag-links">' . __( 'Tags:', 'odin' ) . ' ', ', ', '</span>' ); ?>
		<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Deixe um comentário', 'odin' ), __( '1 Comentário', 'odin' ), __( '% Comentários', 'odin' ) ); ?></span>
		<?php endif; ?>
	</footer>
</article><!-- #post-## -->
