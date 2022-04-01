<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Everest_Agency
 * @subpackage Everest_Agency_Core
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- Third-party CSS enqueued in everest-agency-core/inc/core.php -->
	<!-- Theme CSS should be enqueued in [child-theme]/functions.php -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<nav class="navbar mainnav navbar-expand-md navbar-light" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#primary-nav" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar top-bar"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
		</button>
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
													 <?php
														if ( get_field( 'site_logo_primary', 'option' ) ) {
															?>
				<img src="<?php the_field( 'site_logo_primary', 'option' ); ?>" class="primary-logo">
															<?php
														} else {
															?>
															<?php bloginfo( 'name' ); ?><?php } ?></a>
		</div>
		<div class="collapse navbar-collapse" id="primary-nav">
			<?php
			ea_render_nav(
				'primary',
				get_post(),
				array(
					'bootstrap_dropdown' => true,
					'top_class'          => 'nav navbar-nav',
				)
			);
			?>
		</div>
	</div>
</nav>
