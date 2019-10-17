<?php
/**
 * Template Name: Page d'accueil
 */

$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'front-page.twig' ), $context );