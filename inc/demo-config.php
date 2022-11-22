<?php

/**
 * Adding local_import_json and import_json param supports.
 */
if ( ! function_exists( 'quax_after_content_import_execution' ) ) {
	function quax_after_content_import_execution( $selected_import_files, $import_files, $selected_index ) {

		$downloader = new OCDI\Downloader();

		if( ! empty( $import_files[$selected_index]['import_json'] ) ) {

			foreach( $import_files[$selected_index]['import_json'] as $index => $import ) {
				$file_path = $downloader->download_file( $import['file_url'], 'demo-import-file-'. $index .'-'. date( 'Y-m-d__H-i-s' ) .'.json' );
				$file_raw  = OCDI\Helpers::data_from_file( $file_path );
				update_option( $import['option_name'], json_decode( $file_raw, true ) );
			}

		} else if( ! empty( $import_files[$selected_index]['local_import_json'] ) ) {

			foreach( $import_files[$selected_index]['local_import_json'] as $index => $import ) {
				$file_path = $import['file_path'];
				$file_raw  = OCDI\Helpers::data_from_file( $file_path );
				update_option( $import['option_name'], json_decode( $file_raw, true ) );
			}

		}

	}
	add_action('ocdi/after_content_import_execution', 'quax_after_content_import_execution', 3, 99 );
}


function quax_ocdi_intro_text( $default_text ) {
	$default_text .= '<div class="ocdi_custom-intro-text notice notice-info inline">';
	$default_text .= sprintf (
		'%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
		esc_html__( 'Install and activate all ', 'elecsen-core' ),
		get_admin_url(null, 'themes.php?page=tgmpa-install-plugins' ),
		esc_html__( 'required plugins', 'elecsen-core' ),
		esc_html__( 'before you click on the "Import" button.', 'elecsen-core' )
	);

	$default_text .= sprintf (
		' %1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
		esc_html__( 'You will find all the pages in ', 'elecsen-core' ),
		get_admin_url(null, 'edit.php?post_type=page' ),
		esc_html__( 'Pages.', 'elecsen-core' ),
		esc_html__( 'Other pages will be imported along with the main Homepage.', 'elecsen-core' )
	);
	$default_text .= '<br>';
	$default_text .= '</div>';

	return $default_text;
}

function quax_core_import_files() {
	return array(
		array(
			'import_file_name'         => esc_html__( 'Main Demo (All Pages)', 'elecsen-core' ),
			'local_import_file'        => QUAX_CORE_DIR . 'inc/demo-data/content.xml',
			'import_preview_image_url' => QUAX_PLUGIN_URL . 'inc/demo-data/thumbnail/home-one.png',
			'local_import_widget_file' => QUAX_CORE_DIR . 'inc/demo-data/widgets.wie',
			'import_notice'            => wp_kses_post( __( 'Install and activate all required plugins before you click on the "Import" button. 
            <br> All pages will be imported.', 'elecsen-core' ) ),
			'preview_url'              => 'https://quax.loyalcoders.agency/',
			'local_import_json'        => array(
				array(
					'file_path'   => QUAX_CORE_DIR . 'inc/demo-data/options.json',
					'option_name' => 'quax_opt',
				)
			),
		),
	);
}

add_filter( 'pt-ocdi/import_files', 'quax_core_import_files' );


/**
 * Set Menu and font page
 * @param $selected_import
 */
function quax_after_import( $selected_import ) {
	echo "This will be displayed on all after imports!";

	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
		'main_menu' => $main_menu->term_id,
	) );

	$front_page_id = get_page_by_title('Home 01' );
	$blog_page_id = get_page_by_title( 'Blog' );
	update_option( 'page_for_posts', $blog_page_id->ID );

	if ( isset( $front_page_id ) and is_object( $front_page_id ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
	}
}

add_action( 'ocdi/after_import', 'quax_after_import' );