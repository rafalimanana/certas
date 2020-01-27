<?php
/**
 * Template Name: Page Produits
 */

global $paged;
if (!isset($paged) || !$paged){
    $paged = 1;
}
$context = Timber::context();
$args = array(
    'post_type' => 'produit',
    'order_by' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 5,
    'paged' => $paged,
    'post_status' => 'publish'
);
$timber_post = new Timber\Post();
// $context['produits'] = Timber::get_posts($args);
$context['produits'] = new Timber\PostQuery($args);
$context['post'] = $timber_post;
Timber::render( array( 'page-produits.twig' ), $context ); 