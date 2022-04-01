<?php
/**
 * Template Name: Home Page
 *
 * @package    Everest_Agency
 * @subpackage Everest_Agency_Core
 */

$context    = Timber::context();
$context['post']  = Timber::get_post();
$context['header'] = create_header_object($post);


Timber::render( 'home.twig', $context );
