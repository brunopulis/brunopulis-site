<?php

/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Odin
 * @since 2.2.0
 */
?>
<!DOCTYPE html>
<html class="no-js" lang="pt-br">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<?php if (!get_option('site_icon')) : ?>
		<link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" />
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a href="#main-content" class="sr-only sr-only-focusable">
		<div class="container">
			<span class="sr-only"><?php _e('Ir para conteúdo', 'odin'); ?></span>
		</div>
	</a>

	<nav class="site-header navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
		<div class="container d-flex">
			<a href="<?php bloginfo('url') ?>/" class="navbar-brand">Bruno Pulis</a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Menu principal">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse flex-row-reverse" id="navbarNavDropdown">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main-menu',
						'depth'          => 2,
						'container'      => false,
						'menu_class'     => 'navbar-nav',
						'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
						'walker'         => new Odin_Bootstrap_Nav_Walker()
					)
				);
				?>
			</div>
		</div>
	</nav>