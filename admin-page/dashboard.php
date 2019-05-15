<?php
defined( 'ABSPATH' ) or die();

add_action( 'admin_menu', 'wdpr_add_admin_menu' );
add_action( 'admin_init', 'wdpr_settings_init' );


function wdpr_add_admin_menu(  ) {

	add_menu_page( 'WordPress Debug Reporter', 'WordPress Debug Reporter', 'install_plugins', 'wordpress_debug_reporter', 'wdpr_options_page' );

}


function wdpr_settings_init(  ) {

	register_setting( 'pluginPage', 'wdpr_settings' );

	add_settings_section(
		'wdpr_pluginPage_section',
		__( 'Settings', 'wdpr' ),
		'wdpr_settings_section_callback',
		'pluginPage'
	);

	add_settings_field(
		'wdpr_active',
		__( 'Debug Reporter Active', 'wdpr' ),
		'wdpr_active_render',
		'pluginPage',
		'wdpr_pluginPage_section'
	);

	add_settings_field(
		'wdpr_visible',
		__( 'Reporter Div Visible', 'wdpr' ),
		'wdpr_visible_render',
		'pluginPage',
		'wdpr_pluginPage_section'
	);


}


function wdpr_active_render(  ) {

	$options = get_option( 'wdpr_settings' );
	?>
	<input type='checkbox' name='wdpr_settings[wdpr_active]' <?php checked( $options['wdpr_active'], 1 ); ?> value='1'>
	<?php

}


function wdpr_visible_render(  ) {

	$options = get_option( 'wdpr_settings' );
	?>
	<input type='checkbox' name='wdpr_settings[wdpr_visible]' <?php checked( $options['wdpr_visible'], 1 ); ?> value='1'>
	<?php

}


function wdpr_settings_section_callback(  ) {

	echo __( 'Active - Visible', 'wdpr' );

}


function wdpr_options_page(  ) {

		?>
		<form action='options.php' method='post'>

			<h2>WordPress Debug Reporter</h2>

			<?php
			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
			submit_button();
			?>

		</form>
		<?php

}
