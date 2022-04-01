<?php
/**
 * The Template for displaying all single posts
 *
 * @package Everest_Agency
 * @subpackage Everest_Agency_Core
 */

$context              = Timber::context();
$context['post']      = Timber::get_post();
$context['post_type'] = get_post_type();
$context['header']    = create_header_object( $post );

Timber::render( 'post.twig', $context );
