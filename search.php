<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

	<main id="content" class="container" tabindex="-1" role="main">
		<div class="row">
			<div class="col-md-8">
				<?php if ( have_posts() ) : ?>
					<header class="page-header">
						<h1 class="page-title"><?php printf( __( 'Resultados para: %s', 'odin' ), get_search_query() ); ?></h1>
					</header><!-- .page-header -->

					<?php
						while ( have_posts() ) : the_post();
							get_template_part( 'content', get_post_format() );
						endwhile;

						// Post navigation.
						odin_paging_nav();
					else :
						// If no content, include the "No posts found" template.
						get_template_part( 'content', 'none' );
				?>
				<?php endif; ?>
			</div>

			<aside class="col-md-4">
				<div class="position-sticky">
					<?php get_sidebar();  ?>
				</div>
			</aside>
		</div>
	</main><!-- #main -->

<?php
get_footer();
