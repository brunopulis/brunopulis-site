<?php

/**
 * The Template for displaying all single posts.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

<div class="">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php
				while (have_posts()) : the_post();
					get_template_part('content', 'blog');

					if (comments_open() || get_comments_number()) :
						comments_template();
					endif;
				endwhile;
				?>
			</div>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
