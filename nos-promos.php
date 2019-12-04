<?php
/**
 * Template Name: Page Nos Promos
 */

$context = Timber::context();
$args = array(
    'post_type' => 'post',
    'order_by' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 5,
    'category_name' => 'promos',
    'post_status' => 'publish'
);
$timber_post = new Timber\Post();
$context['promos'] = Timber::get_posts($args);
$context['post'] = $timber_post;
Timber::render( array( 'page-nos-promos.twig' ), $context ); 