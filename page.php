<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/templates/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */


$context = Timber::context();
if (is_page( array('Nos actualités', 'Nos actualites') ) ) {
	$l_args = array(
	    'post_type' => 'post',
	    'order_by' => 'date',
	    'order' => 'DESC',
	    'posts_per_page' => 1,
	    'category_name' => 'actualites',
	    'post_status' => 'publish'
	);
	$last_posts = Timber::get_posts($l_args);
	$last_id=0;
	if (!empty($last_posts)) {
		$last_id = $last_posts[0]->ID;
	}
	$args = array(
	    'post_type' => 'post',
	    'order_by' => 'date',
	    'order' => 'DESC',
	    'posts_per_page' => 6,
	    'category_name' => 'actualites',
	    'post__not_in'      => array($last_id),
	    'post_status' => 'publish'
	);
	$context['last_posts'] = $last_posts;
	$context['posts'] = Timber::get_posts($args);
}
if (is_page( array('Produits', 'Liste des produits vendus') ) ) {
	$args = array(
	    'post_type' => 'post',
	    'order_by' => 'date',
	    'order' => 'DESC',
	    'posts_per_page' => 4,
	    'category_name' => 'produits',
	    'post_status' => 'publish'
	);
	$context['produits'] = Timber::get_posts($args);
}
if (is_page( array('Promos', 'Nos promos') ) ) {
	$args = array(
	    'post_type' => 'post',
	    'order_by' => 'date',
	    'order' => 'DESC',
	    'posts_per_page' => 5,
	    'category_name' => 'promos',
	    'post_status' => 'publish'
	);
	$context['promos'] = Timber::get_posts($args);
}
$timber_post = new Timber\Post();
// $context['nav_top'] = new TimberMenu('topnavigation');
$context['post'] = $timber_post;
Timber::render( array( 'page-' . $timber_post->post_name . '.twig', 'page.twig' ), $context );
