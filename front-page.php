<?php
/**
 * Template Name: Page d'accueil
 */

$context = Timber::context();

$args = array(
    'post_type' => 'post',
    'order_by' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 10,
	'category_name' => 'actualites',
    'post_status' => 'publish'
);
$context['posts'] = Timber::get_posts($args);
$timber_post = new Timber\Post();
$context['foo'] = 'bar';
$context['post'] = $timber_post;
// $context['posts'] = new Timber\PostQuery();
Timber::render( array( 'front-page.twig' ), $context );