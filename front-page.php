<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package Odi
 * @since 2.2.0
 */
get_header();
?>
<main class="main-content" id="main-content">
    <section class="d-flex align-items-center hero" id="hero">
        <div class="container hero__container">
            <div class="row">
                <div class="text-center d-flex flex-column justify-content-center">
                    <h1 class="big-title big-title--large">Olá, eu sou o Pulis</h1>

                    <div class="subtitle">
                        <p>Consultor de acessibilidade e <span lang="en">Front-end developer.</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-services pt-4" id="featured-services">
        <div class="section-title">
            <h2>Serviços</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="icon-box text-center">
                        <div class="icon">
                            <span class="fas fa-universal-access" aria-hidden="true"></span>
                        </div>

                        <h3 class="featured-services__title">Auditoria de Acessibilidade</h3>
                        <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="icon-box text-center">
                        <div class="icon">
                            <span class="fas fa-chalkboard-teacher" aria-hidden="true"></span>
                        </div>

                        <h3 class="featured-services__title"><span lang="en">Workshop</span> e Treinamentos</h3>
                        <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="icon-box text-center">
                        <div class="icon">
                            <span class="fas fa-code" aria-hidden="true"></span>
                        </div>

                        <h3 class="featured-services__title">Desenvolvimento <span lang="en">Frontend</span></h3>
                        <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to action -->
    <section class="cta" id="cta" data-aos="fade-up" data-aos-delay="100">
        <div class="text-center">
            <h2>Que tal uma mentoria gratuita?</h2>
            <p>Mentoria de acessibilidade digital para desenvolvedores e analistas de qualidade.</p>
            <a href="https://calendly.com/brunopulis" rel="noopener noreferrer" target="_blank" class="cta-btn">
                Entre em contato <span class="sr-only">abre em uma nova aba</span>
            </a>
        </div>
    </section>

    <section class="featured-posts" id="featured-posts">
        <div class="container">
            <div class="section-title">
                <h2>Artigos</h2>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 4,
                    'order' => 'DESC'
                );

                $query = new WP_Query($args);

                if (have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
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
                                            Publicado em: <?php the_time('F j, Y'); ?>.
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
        </div>
    </section>

    <?php
    get_footer();
