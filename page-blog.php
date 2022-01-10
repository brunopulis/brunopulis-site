<?php
/**
 * The template for displaying all pages.
 * 
 * Template Name: Blog
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header();
?>

<main id="content" class="container">
	<h2>Blog</h2>
	<div class="row">
        <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4,
                'order' => 'DESC'
            );

            $query = new WP_Query( $args );
            
            if ( have_posts() ):
                while( $query->have_posts() ): $query->the_post();
        ?>
                <div class="col-md-6">
                    <article class="post-preview">   
                        <?php the_post_thumbnail(); ?>

                        <header class="post-preview__header">
                            <p class="post-preview__category"><?php the_category($separator = ", "); ?></p>
                            <h2 class="post-preview__title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            
                            <div class="post-excerpt">   
                                <p class="card-text"><?php echo odin_excerpt(); ?></p>
                            </div>
                        </header>  

                        <footer class="post-preview__footer">
                            <p class="m-post-author">
                                <span class="posted-on">
                                    Publicado em: <?php the_time( 'F j, Y' ); ?>.
                                    <time class="entry-date published" datetime="<?php the_date(); ?>"><?php the_date(); ?></time>
                                </span>
                            </p>
                        </footer>
                    </article>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
	</div>
</main>

<?php
get_footer(); 
