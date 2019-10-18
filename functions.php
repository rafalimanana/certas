<?php
/**
 * Timber certas-theme
 * https://github.com/timber/certas-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

/**
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block. 
 */
$composer_autoload = __DIR__ . '/vendor/autoload.php';
if ( file_exists($composer_autoload) ) {
	require_once( $composer_autoload );
	$timber = new Timber\Timber();
}


	/**
	 * Contenu section publication ( slide )
	 */
	add_shortcode( 'edv_list_publication_home', 'edv_list_publication_home' );
	function edv_list_publication_home( $atts ) {

		$output_string = '';

		$args = array(
			'post_type'   => 'post',
			'post_status' => 'publish'
		);

		
				

		$actus = new WP_Query( $args );
		if ( $actus->have_posts() ) {
			while ( $actus->have_posts() ) {
				$actus->the_post();

				$output_string .= '<div class="col-3 list-article">';
				$output_string .= '<div class="media block-6 services d-block text-center">';
				$output_string .= '<div class="icon d-flex justify-content-center align-items-center">';
				$output_string .= '<span>';
				$output_string .= '<img src="' . get_the_post_thumbnail_url() . '" style="margin-top: -42px;width: 484px;height: 360px;">';
				$output_string .= '</span>';
				$output_string .= '</div>';
				$output_string .= '<div class="media-body py-md-4">';
				$output_string .= '<h3 class="text-uppercase">' . get_the_title() . '</h3>';
				$output_string .= '<p>' . get_the_excerpt() . '</p>';
				$output_string .= '</div>';
				$output_string .= '</div>  ';
				$output_string .= '</div>';
				/*$output_string .= '<figure class="snip1491">';
				$output_string .='<div class="col-lg-3">';
				$output_string .= '<img src="' . get_the_post_thumbnail_url() . '" alt="" style="width: 40%;height: 70%;">';
				$output_string .='</div>';
				$output_string .= '<figcaption>';
				$output_string .= '<p>';
				$output_string .= '<a href="' . get_the_permalink() . '">' . get_the_excerpt() . '</a>';
				$output_string .= '<a href="' . get_the_permalink() . '" class="btn btn-read">Lire la suite</a>';
				$output_string .= '</p>';
				$output_string .= '</figcaption>';
				$output_string .= '</figure>';
				$output_string .= '<p class="text-left f-size-14" style="padding-bottom: 50px;">';
				$output_string .= '<strong class="color-secondary">' . get_the_title() . '</strong>';
				$output_string .= '</p>';*/
			}
		}
		wp_reset_postdata();

		return $output_string;
	}



function my_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyDiMMAriR_BQJuATnSn_pSuhZnYmkKPVGk';
	return $api;
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


function mailtrap($phpmailer) {
  $phpmailer->isSMTP();
  $phpmailer->Host = 'smtp.mailtrap.io';
  $phpmailer->SMTPAuth = true;
  $phpmailer->Port = 2525;
  $phpmailer->Username = '1a541f8281cb7a';
  $phpmailer->Password = '19351422688045';
}

add_action('phpmailer_init', 'mailtrap');

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if ( ! class_exists( 'Timber' ) ) {

	add_action( 'admin_notices', function() {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
	});

	add_filter('template_include', function( $template ) {
		return get_stylesheet_directory() . '/static/no-timber.html';
	});
	return;
}


/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array( 'templates', 'views' );

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site {
	/** Add timber support. */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'loadScripts' ) );
		parent::__construct();
	}
	/** This is where you can register custom post types. */
	public function register_post_types() {

	}
	/** This is where you can register custom taxonomies. */
	public function register_taxonomies() {

	}

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context( $context ) {
		$context['foo'] = 'bar';
		$context['stuff'] = 'I am a value set in your functions.php file';
		$context['notes'] = 'These values are available everytime you call Timber::context();';
		$context['menu'] = new Timber\Menu();
		$context['site'] = $this;
		return $context;
	}



	public function theme_supports() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5', array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats', array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support( 'menus' );
	}

	/** This Would return 'foo bar!'.
	 *
	 * @param string $text being 'foo', then returned 'foo bar!'.
	 */
	public function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	/** This is where you can add your own functions to twig.
	 *
	 * @param string $twig get extension.
	 */
	public function add_to_twig( $twig ) {
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter( new Twig_SimpleFilter( 'myfoo', array( $this, 'myfoo' ) ) );
	    $function = new Twig_SimpleFunction('enqueue_script', function ($handle) {
	        wp_enqueue_script( $handle);
	    });
	    $twig->addFunction($function);
		return $twig;
	}

	function loadScripts() {
		wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDiMMAriR_BQJuATnSn_pSuhZnYmkKPVGk', array(), '3', true );
        wp_enqueue_script( 'google-map', get_template_directory_uri() . '/templates/js/google.js', array('google-map', 'jquery'), '0.1', true );
    }

}

new StarterSite();
