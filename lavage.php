<?php
/**
 * Template Name: Page lavage
 */

$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'page-lavage.twig' ), $context ); 