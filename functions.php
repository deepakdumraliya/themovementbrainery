<?php

/**
 * Important note:
 *
 * This is a child theme to the everest-agency-core theme.
 *
 * This file is ran and included BEFORE the parent functions.php. So if you use any helper functions,
 * etc. from the parent theme, that must be done in a hook function (e.g. `'init'`).
 *
 * Additionally, you can bump the "Version" in style.css whenever you want the cache for frontend resources to be
 * busted, i.e. immediately before a go-live. This version string is appended as a query string param to certain
 * static resources like `style.css`.
 *
 * All other WP-specific PHP files though, if they're present in this child theme, will overwrite the
 * corresponding file in the parent theme if it exists.
 */

/**
 * Enqueue scripts and styles for the front end.
 *
 * Note: we set priority to 10 (or higher) so that this runs after the parent theme runs its
 * `wp_enqueue_scripts` hook. This ensures the core styles (`'everest-agency-core-style'`) is
 * loaded first.
 *
 * See `\ea_core_scripts_and_styles()` in `everest-agency-core/inc/core.php` to see all third-party
 * scripts and styles that are already loaded including their "handles" which you can add to the
 * "deps" array of any styles or scripts you add here to ensure those deps are loaded first.
 *
 * A partial list of scripts:
 *   - everest-agency-core-functions
 *   - jquery
 *   - bootstrap
 *   - bxslider
 *
 * A partial list of styles:
 *   - everest-agency-core-style
 *   - genericons
 *   - socicon
 *   - google-montserrat
 *
 * @see \ea_core_scripts_and_styles()
 * @see \ea_get_template_resource_uri()
 * @see http://www.wpbeginner.com/wp-tutorials/how-to-properly-add-javascripts-and-styles-in-wordpress/
 */
function ea_theme_scripts_and_styles()
{
	$theme_version = ea_get_version();
	$core_version  = ea_get_core_version();
	// Load our styles
	// This is parent theme
	wp_enqueue_style(
		'ea-theme-style',
		ea_get_core_template_resource_uri('/build/style.css'),
		array(),
		$theme_version
	);
	//Add fonts for header
	wp_enqueue_style(
		'adobe-fonts',
		'https://use.typekit.net/ncb1cdv.css',
		['ea-theme-style'],
		$theme_version
	);
	// This is child theme
	wp_enqueue_style(
		'ea-child-theme-style',
		get_stylesheet_directory_uri() . ('/build/style.css'),
		array('ea-theme-style'),
		$theme_version
	);
	wp_enqueue_script(
		'everest-agency-theme-main',
		get_stylesheet_directory_uri() . '/build/index.js',
		array('wp-element', 'jquery'),
		$theme_version,
		true
	);
}

add_action('wp_enqueue_scripts', 'ea_theme_scripts_and_styles', 10);
add_image_size('ea-gallery', 540, $crop = false);

function ea_potenza_leadership_card($leaderArray = array(), $slug = false, $classes = false)
{
	foreach ($leaderArray as $leaderIndex => $leader) {
		$thumbnail    = get_the_post_thumbnail_url($leader->ID, 'large');
		$image_id     = get_post_thumbnail_id($leader->ID);
		$extraClasses = $classes ? $classes : '';
		$image_alt    = get_post_meta($image_id, '_wp_attachment_image_alt', true);
		$position     = get_field('mentor_title', $leader->ID);
		$cvv		  = get_field('upload_cvv', $leader->ID);

		$name         = $leader->post_title;
		$company      = get_field('company', $leader->ID);
		$appt_link    = get_field('calendy_link', $leader->ID);
		$content      = $leader->post_content;
		$slug         = $slug ? $slug : 'leader-' . ea_random_number($name);
?>
		<div class="col-12 col-md-4 col-sm-6 mb-5 leadership-card <?php echo esc_attr($extraClasses); ?>">
			<div class="card clean-card">
				<?php
				if ($thumbnail) {
					ea_lazy_load_image($thumbnail, $image_alt, 'card-img-top img-fluid');
				?>
				<?php } ?>
				<div class="card-body">
					<h3 class="card-title"><?php echo $name; ?></h3>

					<?php if ($position) { ?>
						<p class="meta"><?php echo $position; ?></p>
					<?php } ?>

					<?php if ($company) { ?>
						<p class="meta company"><?php echo $company; ?></p>
					<?php } ?>
					<?php
					if ($appt_link) {
						return_button($appt_link, 'btn btn-primary');
					}
					?>
					<div class="card-content pt-3">
						<a class="btn btn-primary" title="More info on <?php echo esc_attr($name); ?>" data-toggle="modal" data-target=".bio-modal-<?php echo $slug . '-' . $leaderIndex; ?>" href="#">Read More</a>
					</div>
					<div class="card-content pt-3">
						<a class="btn btn-primary" title="click to download" href="<?php if (empty($cvv)) {
																						echo "#";
																					} else {
																						echo $cvv;
																					}	?>" <?php if (!empty($cvv)) {
																									echo "download";
																								} ?>>CV</a>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade bio-modal-<?php echo $slug . '-' . $leaderIndex; ?>" tabindex="-1" role="dialog" aria-labelledby="bio-modal-<?php echo $slug . '-' . $leaderIndex; ?>" aria-hidden="true">
			<div class="modal-dialog modal-lg center">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-12">
								<div class="leader-details">
									<?php
									if ($thumbnail) {
										ea_lazy_load_image($thumbnail,  $image_alt, 'img-fluid mb-2');
									}
									?>
								</div>
								<div class="bio-content">
									<?php if ($name) { ?>
										<h3 class="mb-0"><?php echo $name; ?></h3>
									<?php
									}
									if ($position) {
									?>
										<p class="meta"><?php echo $position; ?></p>
									<?php
									}
									echo $content;
									?>
								</div>
								<?php
								if ($appt_link) {
									return_button($appt_link, 'btn btn-primary mt-5');
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php
	}
}



require_once(__DIR__ . '/inc/custom-fields.php');
require_once(__DIR__ . '/inc/custom-post-types.php');
require_once(__DIR__ . '/inc/timber-functions.php');

function register_my_menus()
{
	register_nav_menus(
		array(
			'footer_column_1' => __('Footer Column 1'),
		)
	);
}
add_action('init', 'register_my_menus');

//Add custom post types to the recent post block bc acf hook runs before post type
function acf_load_post_type_field_choices($field)
{

	// reset choices
	$field['choices'] = array();
	$choices = array(
		'post',
		'page',
	);

	// get the textarea value from options page without any formatting
	$choices = array_merge($choices, get_post_types(['_builtin' => false]));

	// remove any unwanted white space
	$choices = array_map('trim', $choices);


	// loop through array and add to field 'choices'
	if (is_array($choices)) {

		foreach ($choices as $choice) {

			$field['choices'][$choice] = $choice;
		}
	}


	// return the field
	return $field;
}

add_filter('acf/load_field/name=post_type', 'acf_load_post_type_field_choices');
