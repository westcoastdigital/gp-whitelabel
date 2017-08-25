<?php 

// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;

class WhiteLabel {
	private $white_label_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'white_label_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'white_label_page_init' ) );
	}

	public function white_label_add_plugin_page() {
		add_management_page(
			'White Label', // page_title
			'White Label', // menu_title
			'manage_options', // capability
			'white-label', // menu_slug
			array( $this, 'white_label_create_admin_page' ) // function
		);
	}

	public function white_label_create_admin_page() {
		$this->white_label_options = get_option( 'white_label_option_name' ); ?>

		<div class="wrap">
			<h2>White Label</h2>
			<p>White Label Theme</p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'white_label_option_group' );
					do_settings_sections( 'white-label-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function white_label_page_init() {
		register_setting(
			'white_label_option_group', // option_group
			'white_label_option_name', // option_name
			array( $this, 'white_label_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'white_label_setting_section', // id
			'Settings', // title
			array( $this, 'white_label_section_info' ), // callback
			'white-label-admin' // page
		);

		add_settings_field(
			'gp_wp_name', // id
			'Theme Name', // title
			array( $this, 'gp_wp_name_callback' ), // callback
			'white-label-admin', // page
			'white_label_setting_section' // section
		);

		add_settings_field(
			'gp_wp_url', // id
			'URL', // title
			array( $this, 'gp_wp_url_callback' ), // callback
			'white-label-admin', // page
			'white_label_setting_section' // section
		);

		add_settings_field(
			'gp_wp_author', // id
			'Author', // title
			array( $this, 'gp_wp_author_callback' ), // callback
			'white-label-admin', // page
			'white_label_setting_section' // section
		);
	}

	public function white_label_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['gp_wp_name'] ) ) {
			$sanitary_values['gp_wp_name'] = sanitize_text_field( $input['gp_wp_name'] );
		}

		if ( isset( $input['gp_wp_url'] ) ) {
			$sanitary_values['gp_wp_url'] = sanitize_text_field( $input['gp_wp_url'] );
		}

		if ( isset( $input['gp_wp_author'] ) ) {
			$sanitary_values['gp_wp_author'] = sanitize_text_field( $input['gp_wp_author'] );
		}

		return $sanitary_values;
	}

	public function white_label_section_info() {
		
	}

	public function gp_wp_name_callback() {
		printf(
			'<input class="regular-text" type="text" name="white_label_option_name[gp_wp_name]" id="gp_wp_name" value="%s">',
			isset( $this->white_label_options['gp_wp_name'] ) ? esc_attr( $this->white_label_options['gp_wp_name']) : ''
		);
	}

	public function gp_wp_url_callback() {
		printf(
			'<input class="regular-text" type="text" name="white_label_option_name[gp_wp_url]" id="gp_wp_url" value="%s">',
			isset( $this->white_label_options['gp_wp_url'] ) ? esc_attr( $this->white_label_options['gp_wp_url']) : ''
		);
	}

	public function gp_wp_author_callback() {
		printf(
			'<input class="regular-text" type="text" name="white_label_option_name[gp_wp_author]" id="gp_wp_author" value="%s">',
			isset( $this->white_label_options['gp_wp_author'] ) ? esc_attr( $this->white_label_options['gp_wp_author']) : ''
		);
	}

}
if ( is_admin() )
	$white_label = new WhiteLabel();

/* 
 * Retrieve this value with:
 * $white_label_options = get_option( 'white_label_option_name' ); // Array of All Options
 * $gp_wp_name = $white_label_options['gp_wp_name']; // Theme Name
 * $gp_wp_url = $white_label_options['gp_wp_url']; // URL
 * $gp_wp_author = $white_label_options['gp_wp_author']; // Author
 */

