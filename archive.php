<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Fourteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Everest_Agency
 * @subpackage Everest_Agency_Core
 */

$category = isset( $_GET['category'] ) ? esc_html( $_GET['category'] ) : '';

$context           = Timber::context();
$context['header'] = create_header_object( $post );
$query_args        = array(
	'post_type' => get_post_type(),
);

if ( ! empty( $category ) ) {
	$query_args['tax_query'][] = array(
		'taxonomy' => 'category',
		'field'    => 'slug',
		'terms'    => $category,
	);
}
$context['post_type'] = get_post_type();
$context['posts']     = new Timber\PostQuery( $query_args );


Timber::render( 'archive.twig', $context );

