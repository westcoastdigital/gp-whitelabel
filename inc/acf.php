<?php 

// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;

function generate_whitelabel_options_page() {
	
	if( function_exists('acf_add_options_page') ) {
		
		$option_page = acf_add_options_page(array(
			'page_title' 	=> __('White Label', 'gp-whitelabel'),
			'menu_title' 	=> __('White Label', 'gp-whitelabel'),
			'parent_slug' 	=> 'themes.php',
			'menu_slug' 	=> 'white-label-settings',
		));
		
	}
	
}
add_action('acf/init', 'generate_whitelabel_options_page');

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_59a3655d15655',
	'title' => 'White Label',
	'fields' => array (
		array (
			'key' => 'field_59a36569c0502',
			'label' => 'Theme Name',
			'name' => 'theme_name',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'GeneratePress',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_59a36572c0503',
			'label' => 'Theme Author',
			'name' => 'theme_author',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Tom Usborne',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_59a36599c0504',
			'label' => 'Theme URL',
			'name' => 'theme_url',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'https://tomusborne.com/',
			'placeholder' => '',
		),
		array (
			'key' => 'field_59a365bec0505',
			'label' => 'Screenshot',
			'name' => 'theme_screenshot',
			'type' => 'image',
			'instructions' => '880 x 660 pixels',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_59a365dbc0506',
			'label' => 'Theme Description',
			'name' => 'theme_description',
			'type' => 'textarea',
			'instructions' => 'No markup',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'GeneratePress is a fast, lightweight (less than 1MB zipped), mobile responsive WordPress theme built with speed, SEO and usability in mind. GP can serve as a solid base for any website, and works great with any of your favorite page builders. With an emphasis on WordPress coding standards, we ensure GeneratePress is compatible with all well-coded plugins, including major ones like WooCommerce, WPML, BuddyPress and bbPress. GeneratePress is device friendly (mobile and tablet), uses 100% valid HTML, is fully schema microdata integrated, is translated into over 20 languages by our amazing community and is cross browser compatible (including IE8). Some of our features include 9 widget areas, 5 navigation positions, 5 sidebar layouts, dropdown menus (click or hover) and a back to top button. All our options use the native WordPress Customizer, meaning you can see every change you make instantly before pressing the publish button. Learn more and check out our powerful premium version at https://generatepress.com',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
		array (
			'key' => 'field_59a3660ec0507',
			'label' => 'Theme Tags',
			'name' => 'theme_tags',
			'type' => 'textarea',
			'instructions' => 'comma seperate values',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'two-columns, three-columns, one-column, right-sidebar, left-sidebar, footer-widgets, blog, e-commerce, flexible-header, full-width-template, buddypress, custom-header, custom-background, custom-menu, custom-colors, sticky-post, threaded-comments, translation-ready, rtl-language-support, featured-images, theme-options',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'white-label-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;