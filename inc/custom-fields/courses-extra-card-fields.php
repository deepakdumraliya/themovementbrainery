<?php
if ( function_exists( 'acf_add_local_field_group' ) ) :

	acf_add_local_field_group(
		array(
			'key'                   => 'group_60faa7f06b5aa',
			'title'                 => 'Learn More Course Card',
			'fields'                => array(
				array(
					'key'               => 'field_60faa8230b583',
					'label'             => 'Add Learn More Card on Courses?',
					'name'              => 'add_learn_more_card_on_courses',
					'type'              => 'true_false',
					'instructions'      => 'Toggle to show a learn more card on the courses archive page',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'message'           => '',
					'default_value'     => 0,
					'ui'                => 0,
					'ui_on_text'        => '',
					'ui_off_text'       => '',
				),
				array(
					'key'               => 'field_60faa8570b584',
					'label'             => 'Card Image',
					'name'              => 'card_image',
					'type'              => 'image',
					'instructions'      => '',
					'required'          => 1,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_60faa8230b583',
								'operator' => '==',
								'value'    => '1',
							),
						),
					),
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'return_format'     => 'array',
					'preview_size'      => 'medium',
					'library'           => 'all',
					'min_width'         => '',
					'min_height'        => '',
					'min_size'          => '',
					'max_width'         => '',
					'max_height'        => '',
					'max_size'          => '',
					'mime_types'        => '',
				),
				array(
					'key'               => 'field_5d3090sv038v9',
					'label'             => 'Card Title',
					'name'              => 'card_title',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 1,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_60faa8230b583',
								'operator' => '==',
								'value'    => '1',
							),
						),
					),
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				),
				array(
					'key'               => 'field_60faa8740b585',
					'label'             => 'Card Content',
					'name'              => 'card_content',
					'type'              => 'wysiwyg',
					'instructions'      => '',
					'required'          => 1,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_60faa8230b583',
								'operator' => '==',
								'value'    => '1',
							),
						),
					),
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'tabs'              => 'all',
					'toolbar'           => 'full',
					'media_upload'      => 1,
					'delay'             => 0,
				),
				array(
					'key'               => 'field_60faa8a00b586',
					'label'             => 'Card Link',
					'name'              => 'card_link',
					'type'              => 'link',
					'instructions'      => '',
					'required'          => 1,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_60faa8230b583',
								'operator' => '==',
								'value'    => '1',
							),
						),
					),
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'return_format'     => 'array',
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'theme-general-settings',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => true,
			'description'           => '',
		)
	);

	endif;
