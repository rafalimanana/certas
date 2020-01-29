<?php
/**
 * Template Name: Page à propos
 */

$context = Timber::context();

$timber_post = new Timber\Post();
$context['page_contents'] = get_fields();
$context['post'] = $timber_post;
Timber::render( array( 'page-a-propos.twig' ), $context ); 