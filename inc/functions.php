<?php 

// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! function_exists( 'generate_setup' ) ) {

function generate_create_menu() {
	$white_label_options = get_option( 'white_label_option_name' );
	$gp_wp_name = $white_label_options['gp_wp_name'];
	$generate_page = add_theme_page( $gp_wp_name, $gp_wp_name, 'edit_theme_options', 'generate-options', 'generate_settings_page' );
	add_action( "admin_print_styles-$generate_page", 'generate_options_styles' );
}
add_action('admin_menu', 'generate_create_menu');

function generate_settings_page() {
	$white_label_options = get_option( 'white_label_option_name' );
	$gp_wp_name = $white_label_options['gp_wp_name'];
	$gp_wp_url = $white_label_options['gp_wp_url'];
	$gp_wp_author = $white_label_options['gp_wp_author'];
	?>
	<div class="wrap">
		<div class="metabox-holder">
			<div class="gp-masthead clearfix">
				<div class="gp-container">
					<div class="gp-title">
						<a href="<?php echo $gp_wp_url; ?>" target="_blank"><?php echo $gp_wp_name; ?></a> <span class="gp-version"><?php echo GENERATE_VERSION; ?></span>
					</div>
				</div>
			</div>
			<div class="gp-container">
				<div class="postbox-container clearfix" style="float: none;">
					<div class="grid-container grid-parent">
							
						<div class="form-metabox grid-70" style="padding-left: 0;">
							<form method="post" action="options.php">
								<?php settings_fields( 'generate-settings-group' ); ?>
								<?php do_settings_sections( 'generate-settings-group' ); ?>
								<div class="customize-button hide-on-desktop">
									<?php
									printf( '<a id="generate_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
										esc_url( add_query_arg( array(
											'return' => urlencode( wp_unslash( $_SERVER['REQUEST_URI'] ) ),
										), admin_url( 'customize.php' ) ) ),
										__( 'Customize', 'generatepress' )
									);
									?>
								</div>

								<?php do_action('generate_inside_options_form'); ?>
							</form>
							
							<?php
							$modules = array(
								'Backgrounds' => array(
										'url' => generate_get_premium_url( 'https://generatepress.com/downloads/generate-backgrounds/' ),
								),
								'Blog' => array(
										'url' => generate_get_premium_url( 'https://generatepress.com/downloads/generate-blog/' ),
								),
								'Colors' => array(
										'url' => generate_get_premium_url( 'https://generatepress.com/downloads/generate-colors/' ),
								),
								'Copyright' => array(
										'url' => generate_get_premium_url( 'https://generatepress.com/downloads/generate-copyright/' ),
								),
								'Disable Elements' => array(
										'url' => generate_get_premium_url( 'https://generatepress.com/downloads/generate-disable-elements/' ),
								),
								'Hooks' => array(
										'url' => generate_get_premium_url( 'https://generatepress.com/downloads/generate-hooks/' ),
								),
								'Import / Export' => array(
										'url' => generate_get_premium_url( 'https://generatepress.com/downloads/generate-import-export/' ),
								),
								'Menu Plus' => array(
										'url' => generate_get_premium_url( 'https://generatepress.com/downloads/generate-menu-plus/' ),
								),
								'Page Header' => array(
										'url' => generate_get_premium_url( 'https://generatepress.com/downloads/generate-page-header/' ),
								),
								'Secondary Nav' => array(
										'url' => generate_get_premium_url( 'https://generatepress.com/downloads/generate-secondary-nav/' ),
								),
								'Sections' => array(
										'url' => generate_get_premium_url( 'https://generatepress.com/downloads/generate-sections/' ),
								),
								'Spacing' => array(
										'url' => generate_get_premium_url( 'https://generatepress.com/downloads/generate-spacing/' ),
								),
								'Typography' => array(
										'url' => generate_get_premium_url( 'https://generatepress.com/downloads/generate-typography/' ),
								)
							);
							
							if ( ! defined( 'GP_PREMIUM_VERSION' ) ) : ?>
							<div class="postbox generate-metabox">
								<h3 class="hndle"><?php _e( 'Add-ons','generatepress' ); ?></h3>
								<div class="inside" style="margin:0;padding:0;">
									<div class="premium-addons">
										<?php foreach( $modules as $module => $info ) { ?>
										<div class="add-on activated gp-clear addon-container grid-parent">
											<div class="addon-name column-addon-name" style="">
												<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php echo $module; ?></a>
											</div>
											<div class="addon-action addon-addon-action" style="text-align:right;">
												<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php _e( 'Learn more','generatepress' ); ?></a>
											</div>
										</div>
										<div class="gp-clear"></div>
										<?php } ?>		
									</div>
								</div>
							</div>
							<?php endif; ?>
							
							<?php do_action('generate_options_items'); ?>
						</div>
							
						<div class="generate-right-sidebar grid-30" style="padding-right: 0;">
							<div class="customize-button hide-on-mobile">
								<?php
								printf( '<a id="generate_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
									esc_url( add_query_arg( array(
										'return' => urlencode( wp_unslash( $_SERVER['REQUEST_URI'] ) ),
									), admin_url( 'customize.php' ) ) ),
									__( 'Customize', 'generatepress' )
								);
								?>
							</div>
							<?php do_action( 'generate_admin_right_panel' ); ?>
							<?php if ( ! defined( 'GP_PREMIUM_VERSION' ) ) : ?>
								<div class="postbox generate-metabox popular-articles">
									<h3 class="hndle"><a href="https://docs.generatepress.com" target="_blank"><?php _e( 'View all','generatepress' ); ?></a><?php _e( 'Documentation','generatepress' ); ?></h3>
									<div class="inside">
										<ul>
											<li><a href="https://docs.generatepress.com/article/adding-header-logo/" target="_blank"><?php _e( 'Adding a Logo','generatepress' ); ?></a></li>
											<li><a href="https://docs.generatepress.com/article/sidebar-layout/" target="_blank"><?php _e( 'Sidebar Layout','generatepress' ); ?></a></li>
											<li><a href="https://docs.generatepress.com/article/container-width/" target="_blank"><?php _e( 'Container Width','generatepress' ); ?></a></li>
											<li><a href="https://docs.generatepress.com/article/navigation-location/" target="_blank"><?php _e( 'Navigation Location','generatepress' ); ?></a></li>
											<li><a href="https://docs.generatepress.com/article/footer-widgets/" target="_blank"><?php _e( 'Footer Widgets','generatepress' ); ?></a></li>
										</ul>
									</div>
								</div>
							<?php endif; ?>
							<div class="postbox generate-metabox" id="gen-delete">
								<h3 class="hndle"><?php _e('Delete Customizer Settings','generatepress');?></h3>
								<div class="inside">
									<p><?php printf( __( '<strong>Warning:</strong> Deleting your <a href="%1$s">Customizer</a> settings can not be undone.','generatepress' ), admin_url('customize.php') ); ?></p>
									<p><?php _e( 'Consider using our Import/Export add-on to export your settings before deleting them.','generatepress');?></p>
									<form method="post">
										<p><input type="hidden" name="generate_reset_customizer" value="generate_reset_customizer_settings" /></p>
										<p>
											<?php 
											$warning = 'return confirm("' . __( 'Warning: This will delete your settings.','generatepress' ) . '")';
											wp_nonce_field( 'generate_reset_customizer_nonce', 'generate_reset_customizer_nonce' );
											submit_button( __( 'Delete Default Settings', 'generatepress' ), 'button', 'submit', false, array( 'onclick' => esc_js( $warning ) ) ); 
											?>
										</p>
											
									</form>
									<?php do_action('generate_delete_settings_form');?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="gp-options-footer">
					<span><?php printf( _x( 'Made with %s by ' . $gp_wp_author, 'made with love', 'generatepress' ), '<span style="color:#D04848" class="dashicons dashicons-heart"></span>' ); ?></span>
				</div>
			</div>
		</div>
	</div>
<?php }

}// finish checking generatepress is active

function gp_whitelabel_admin_script() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'admin-script', plugins_url( 'admin.js' , __FILE__ ), array( 'jquery' ), '', true );
    $white_label_options = get_option( 'white_label_option_name' );
	$gp_wp_name = $white_label_options['gp_wp_name'];
	$gp_wp_url = $white_label_options['gp_wp_url'];
	$gp_wp_author = $white_label_options['gp_wp_author'];
    $admin_js = "
    	jQuery(document).ready(function() {
		var name = jQuery('.theme-overlay .theme-info .theme-name').text(),
			author = jQuery('.theme-overlay .theme-info .theme-author').text();
		
			console.log(author);
			jQuery( '#generatepress-name' ).text( '{$gp_wp_name}' );
			jQuery('.theme-overlay .theme-info .theme-name').each(function () {
				if (jQuery(this).text() == 'GeneratePressVersion: 1.4') {
					jQuery(this).text( '{$gp_wp_name}' );
				}
			});
			jQuery('.theme-overlay .theme-info .theme-author').each(function () {
				if (jQuery(this).text() == 'By Tom Usborne') {
					jQuery(this).text( 'by {$gp_wp_author}' );
				}
			});
			jQuery( '.theme-description' ).text(function(i, text) {
				return text.replace( 'GeneratePress', '{$gp_wp_name}' );
			});
		});";
    wp_add_inline_script( 'admin-script', $admin_js );
}
//add_action( 'admin_enqueue_scripts', 'gp_whitelabel_admin_script' );