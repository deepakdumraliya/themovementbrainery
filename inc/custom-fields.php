<?php
/**
 * Add general page fields for ACF Pro
 *
 * @package Everest_Agency
 * @subpackage Everest_Agency_Core
 */

function ea_remove_ea_core_page_fields() {
	// Remove the EA Core page fields and page section fields groups
	ea_remove_acf_local( 'group_59b6eccd78bc8' );
}
add_action( 'acf/init', 'ea_remove_ea_core_page_fields', 11 );



require_once __DIR__ . '/custom-fields/options-fields.php';

require_once __DIR__ . '/custom-fields/page-fields.php';

require_once __DIR__ . '/custom-fields/cta-fields.php';

require_once __DIR__ . '/custom-fields/core-additional-fields.php';

require_once __DIR__ . '/custom-fields/mentors-fields.php';

require_once __DIR__ . '/custom-fields/courses-extra-card-fields.php';

require_once __DIR__ . '/custom-fields/archive-header-image-fields.php';
