<?php
/**
 * Template Name: Page d'accueil
 */

$context = Timber::context();
$args = 'category_name=actualite&numberposts=10';
$timber_post = new Timber\Post();
$context['post'] = $timber_post;
$context['articles'] = Timber::get_posts($args);
Timber::render( array( 'front-page.twig' ), $context );