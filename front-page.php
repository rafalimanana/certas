<?php
/**
 * Template Name: Page d'accueil
 */

$context = Timber::context();
$timber_post = new Timber\Post();
$context['foo'] = 'bar';
$context['post'] = $timber_post;
$context['posts'] = new Timber\PostQuery();
Timber::render( array( 'front-page.twig' ), $context );