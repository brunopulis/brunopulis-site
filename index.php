<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

<?php odin_breadcrumbs(); ?>

<main id="content">
    <div class="container">
	    <div class="row">
            <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 6,
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
            <?php odin_paging_nav(); ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
	</div>
</div>
</main>
<?php get_footer(); ?>

