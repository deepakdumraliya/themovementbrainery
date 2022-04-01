<?php
add_action('acf/init', function() {
	// extra fields for slider to make image round
	acf_add_local_field(array(
		'key' => 'field_circle_images_instead',
		'label' => 'Make Slider images round',
		'name' => 'circle_images',
		'type' => 'true_false',
		'ui' => 1,
		'conditional_logic' => 0,
		'parent' => 'group_5eee426e6354e'
	));
});
