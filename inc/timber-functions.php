<?php
// Add ACF options page to global context
add_filter(
	'timber_context',
	function ( $context ) {

		// Add ACF options to Timber context
		$context['options'] = get_fields( 'options' );

		$current_post_type            = get_post_type();
		$context['current_post_type'] = $current_post_type;

		$featured_posts = get_field( "featured_{$current_post_type}", 'option' );

		if ( $featured_posts ) {

			$featured_post_args = array(
				'post_type'   => $current_post_type,
				'numberposts' => -1,
				'post__in'    => $featured_posts,
			);

			$context['featured_posts'] = new Timber\PostQuery( $featured_post_args );

		}

		return $context;
	}
);


// Add common ea functions to Timber/Twig
add_filter( 'timber/twig', 'add_ea_functions_to_twig' );

function add_ea_functions_to_twig( $twig ) {

	$twig->addFunction( new Timber\Twig_Function( 'return_button', 'return_button' ) );
	$twig->addFunction( new Timber\Twig_Function( 'ea_render_card_for_post', 'ea_render_card_for_post' ) );
	$twig->addFunction( new Timber\Twig_Function( 'ea_leadership_card', 'ea_leadership_card' ) );
	$twig->addFunction(new Timber\Twig_Function('ea_potenza_leadership_card', 'ea_potenza_leadership_card'));

	return $twig;
}

/**
 * @param WP_POST $post
 * @param array $extra_args
 * @return array
 */
function create_header_object( WP_Post $post, $extra_args = array() ) {
	$header_title = get_field( 'header_title', $post->ID ) ?: ea_get_the_title();
	// Rename page title for Courses to In-Person
	$header_title     = 'courses' === $post->post_type ? 'In-person' : $header_title;
	$background_image = get_field( 'header_image', $post->ID ) ?: get_field( 'default_header_image', 'option' );
	$background_image = is_array( $background_image ) ? $background_image['url'] : $background_image;
	$column_image     = is_archive( $post ) ? get_field( $post->post_type . '_header_image', 'options' ) : get_field( 'header_column_image', $post->ID );
	$header_style     = $background_image ? 'background-image: url(' . $background_image . ')' : '';
	$link             = get_field( 'header_link', $post->ID ) ?: '';
	$header_content   = get_field( 'header_content', $post->ID ) ?: '';
	$is_front_page    = is_front_page() || is_page_template( 'page-templates/page-home.php' ) ? true : false;
	return array_merge(
		array(
			'front_page'       => $is_front_page,
			'header_title'     => $header_title,
			'background_image' => $background_image,
			'column_image'     => $column_image,
			'link'             => $link,
			'header_content'   => $header_content,
			'header_style'     => $header_style,
			'is_archive'       => is_archive(),
		),
		$extra_args
	);
}
