<?php
/**
 * Template Name: Page actualités
 */

$context = Timber::context();

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
$timber_post = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'page-nos-actualites.twig' ), $context );