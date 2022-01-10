<?php
/**
 * The template for displaying Category pages.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

<main class="main-content" id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php if ( have_posts() ) : ?>
                    <header class="page-header">
                        <?php
                            the_archive_title( '<h1 class="page-title">', '</h1>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                    </header><!-- .page-header -->

                    <?php
                        while ( have_posts() ) : the_post();
                            get_template_part( 'content', get_post_format() );
                        endwhile;

                            // Page navigation.
                            odin_paging_nav();
                        else :
                            // If no content, include the "No posts found" template.
                            get_template_part( 'content', 'none' );
                    endif;
                ?>
            </div>

            <aside class="col-md-4">
                <div class="position-sticky">
                    <?php get_sidebar();  ?>
                </div>
            </aside>
        </div>
    </div>
</main><!-- #main -->

<?php
get_footer();
