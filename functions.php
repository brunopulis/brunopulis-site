<?php

/**
 * Odin functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Odin
 * @since 2.2.0
 */

// Sets content width.
if (!isset($content_width)) {
	$content_width = 600;
}

require_once get_template_directory() . '/inc/globals.php';
require_once get_template_directory() . '/inc/filters.php';

// Odin Classes
require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';
require_once get_template_directory() . '/core/classes/class-shortcodes.php';
//require_once get_template_directory() . '/core/classes/class-shortcodes-menu.php';
require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
// require_once get_template_directory() . '/core/classes/class-theme-options.php';
// require_once get_template_directory() . '/core/classes/class-options-helper.php';
require_once get_template_directory() . '/core/classes/class-post-type.php';
// require_once get_template_directory() . '/core/classes/class-taxonomy.php';
// require_once get_template_directory() . '/core/classes/class-metabox.php';
// require_once get_template_directory() . '/core/classes/abstracts/abstract-front-end-form.php';
// require_once get_template_directory() . '/core/classes/class-contact-form.php';
// require_once get_template_directory() . '/core/classes/class-post-form.php';
// require_once get_template_directory() . '/core/classes/class-user-meta.php';
// require_once get_template_directory() . '/core/classes/class-post-status.php';
//require_once get_template_directory() . '/core/classes/class-term-meta.php';

add_post_type_support('page', 'excerpt');

/**
 * Odin Widgets.
 */
require_once get_template_directory() . '/core/classes/widgets/class-widget-like-box.php';

if (!function_exists('odin_setup_features')) {

	/**
	 * Setup theme features.
	 *
	 * @since 2.2.0
	 */
	function odin_setup_features()
	{

		/**
		 * Add support for multiple languages.
		 */
		load_theme_textdomain('odin', get_template_directory() . '/languages');

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'main-menu' => __('Main Menu', 'odin'),
				'footer-menu' => __('Footer Menu', 'odin')
			)
		);

		/*
		 * Add post_thumbnails suport.
		 */
		add_theme_support('post-thumbnails');

		/**
		 * Add feed link.
		 */
		add_theme_support('automatic-feed-links');

		/**
		 * Support Custom Header.
		 */
		$default = array(
			'width'         => 0,
			'height'        => 0,
			'flex-height'   => false,
			'flex-width'    => false,
			'header-text'   => false,
			'default-image' => '',
			'uploads'       => true,
		);

		add_theme_support('custom-header', $default);

		add_image_size('thumb_blog', 416, 200, true);
		add_image_size('thumb_blog_post', 855, 350, false);

		/**
		 * Support Custom Background.
		 */
		$defaults = array(
			'default-color' => '',
			'default-image' => '',
		);

		add_theme_support('custom-background', $defaults);

		/**
		 * Support Custom Editor Style.
		 */
		add_editor_style('assets/css/editor-style.css');

		/**
		 * Add support for infinite scroll.
		 */
		add_theme_support(
			'infinite-scroll',
			array(
				'type'           => 'scroll',
				'footer_widgets' => false,
				'container'      => 'content',
				'wrapper'        => false,
				'render'         => false,
				'posts_per_page' => get_option('posts_per_page')
			)
		);

		/**
		 * Add support for Post Formats.
		 */
		// add_theme_support( 'post-formats', array(
		//     'aside',
		//     'gallery',
		//     'link',
		//     'image',
		//     'quote',
		//     'status',
		//     'video',
		//     'audio',
		//     'chat'
		// ) );

		/**
		 * Support The Excerpt on pages.
		 */
		// add_post_type_support( 'page', 'excerpt' );

		/**
		 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			)
		);

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for custom logo.
		 *
		 *  @since Odin 2.2.10
		 */
		add_theme_support('custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-height' => true,
		));
	}
}

add_action('after_setup_theme', 'odin_setup_features');

/**
 * Register widget areas.
 *
 * @since 2.2.0
 */
function odin_widgets_init()
{
	register_sidebar(
		array(
			'name' => __('Main Sidebar', 'odin'),
			'id' => 'main-sidebar',
			'description' => __('Site Main Sidebar', 'odin'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}

add_action('widgets_init', 'odin_widgets_init');

/**
 * Flush Rewrite Rules for new CPTs and Taxonomies.
 *
 * @since 2.2.0
 */
function odin_flush_rewrite()
{
	flush_rewrite_rules();
}

add_action('after_switch_theme', 'odin_flush_rewrite');

/**
 * Load site scripts.
 *
 * @since 2.2.0
 */
function odin_enqueue_scripts()
{
	$template_url = get_template_directory_uri();

	// Loads Odin main stylesheet.
	wp_enqueue_style('odin-style', get_stylesheet_uri(), array(), null, 'all');

	// jQuery.
	wp_enqueue_script('jquery');

	// General scripts.
	if (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) {
		wp_enqueue_script('fitvids', $template_url . '/assets/js/vendor/jquery.fitvids.js', array(), null, true);
		wp_enqueue_script('bootstrap', $template_url . '/assets/js/vendor/bootstrap.min.js', array(), null, true);

		// Main jQuery.
		wp_enqueue_script('odin-main', $template_url . '/assets/js/main.js', array(), null, true);
	} else {
		// Grunt main file with Bootstrap, FitVids and others libs.
		wp_enqueue_script('odin-main-min', $template_url . '/assets/js/main.min.js', array(), null, true);
	}

	// Load Thread comments WordPress script.
	if (is_singular() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

add_action('wp_enqueue_scripts', 'odin_enqueue_scripts', 1);

/**
 * Odin custom stylesheet URI.
 *
 * @since  2.2.0
 *
 * @param  string $uri Default URI.
 * @param  string $dir Stylesheet directory URI.
 *
 * @return string      New URI.
 */
function odin_stylesheet_uri($uri, $dir)
{
	return $dir . '/assets/css/style.css';
}

add_filter('stylesheet_uri', 'odin_stylesheet_uri', 10, 2);

// CPT 
require_once get_template_directory() . '/inc/cpt/cpt_talks.php';
require_once get_template_directory() . '/inc/cpt/cpt_testimonials.php';

require_once get_template_directory() . '/core/helpers.php';
require_once get_template_directory() . '/inc/admin.php';
require_once get_template_directory() . '/inc/comments-loop.php';
require_once get_template_directory() . '/inc/optimize.php';
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Reading time
 * 
 * @return string
 */
function reading_time()
{
	$content = get_post_field('post_content', $post->ID);
	$wordCount = str_word_count(strip_tags($content));
	$readingTime = ceil($wordCount / 200);

	$readingTime == 1 ? $timer = " minuto" : $timer = " minutos";

	$totalReadingTime = $readingTime . $timer . ' ';

	return $totalReadingTime;
}

/**
 * Site Header Background 
 *
 * @author Bill Erickson
 * @link http://www.billerickson.net/code/background-image-site-header/
 */
function be_site_header_background($attributes)
{
	$image = false;
	if (is_page())
		$image = get_post_meta(get_the_ID(), 'be_page_header', true);

	if (!$image)
		return $output;

	$image = wp_get_attachment_image_src($image, 'full');
	$attributes['class'] .= ' ';
	$attributes['style'] = 'background-image: url(' . $image[0] . ');';

	return $attributes;
}

add_filter('odin', 'be_site_header_background');


function wpb_author_info_box($content)
{
	global $post;

	// Detect if it is a single post with a post author
	if (is_single() && isset($post->post_author)) {
		// Get author's display name 
		$display_name = get_the_author_meta('display_name', $post->post_author);

		// If display name is not available then use nickname as display name
		if (empty($display_name))
			$display_name = get_the_author_meta('nickname', $post->post_author);

		// Get author's biographical information or description
		$user_description = get_the_author_meta('user_description', $post->post_author);

		// Get author's website URL 
		$user_website = get_the_author_meta('url', $post->post_author);

		// Get link to the author archive page
		$user_posts = get_author_posts_url(get_the_author_meta('ID', $post->post_author));

		if (!empty($display_name))
			$author_details = '<p class="author_name">About ' . $display_name . '</p>';

		if (!empty($user_description))
			// Author avatar and bio
			$author_details .= '<p class="author_details">' . get_avatar(get_the_author_meta('user_email'), 90) . nl2br($user_description) . '</p>';
		$author_details .= '<p class="author_links"><a href="' . $user_posts . '">View all posts by ' . $display_name . '</a>';

		// Check if author has a website in their profile
		if (!empty($user_website)) {
			// Display author website link
			$author_details .= ' | <a href="' . $user_website . '" target="_blank" rel="nofollow">Website</a></p>';
		} else {
			// if there is no author website then just close the paragraph
			$author_details .= '</p>';
		}

		// Pass all this info to post content  
		$content = $content . '<footer class="author_bio_section" >' . $author_details . '</footer>';
	}

	return $content;
}

// Add our function to the post content filter 
add_action('the_content', 'wpb_author_info_box');

// Allow HTML in author bio section 
remove_filter('pre_user_description', 'wp_filter_kses');


function remove_admin_bar()
{
	return false;
}

add_filter('show_admin_bar', 'remove_admin_bar');
