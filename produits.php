<?php
/**
 * Template Name: Page Produits
 */

$context = Timber::context();
$args = array(
    'post_type' => 'post',
    'order_by' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 4,
    'category_name' => 'produits',
    'post_status' => 'publish'
);
$timber_post = new Timber\Post();
$context['produits'] = Timber::get_posts($args);
$context['post'] = $timber_post;
Timber::render( array( 'page-produits.twig' ), $context ); 