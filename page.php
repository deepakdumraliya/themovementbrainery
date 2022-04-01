<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package Everest_Agency
 * @subpackage Everest_Agency_Core
 */
$context    = Timber::context();
$context['post']  = Timber::get_post();
$context['header'] = create_header_object($post);


Timber::render( 'default-page.twig', $context );
