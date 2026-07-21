<?php
/**
 * Custom block styles.
 *
 * Registers a handful of block styles that match the theme's sharp,
 * utilitarian look. Each one has matching CSS in assets/css/main.css
 * (compiled from src/input.css), which is loaded on the front end and,
 * via add_editor_style(), inside the block editor.
 *
 * @package Open_ZAD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'open_zad_register_block_styles' ) ) {
	/**
	 * Register the theme's block styles.
	 */
	function open_zad_register_block_styles() {
		if ( ! function_exists( 'register_block_style' ) ) {
			return;
		}

		register_block_style(
			'core/quote',
			array(
				'name'  => 'open-zad-bordered',
				'label' => __( 'Bordered', 'open-zad' ),
			)
		);

		register_block_style(
			'core/image',
			array(
				'name'  => 'open-zad-frame',
				'label' => __( 'Framed', 'open-zad' ),
			)
		);

		register_block_style(
			'core/group',
			array(
				'name'  => 'open-zad-card',
				'label' => __( 'Bordered card', 'open-zad' ),
			)
		);
	}
}
add_action( 'init', 'open_zad_register_block_styles' );
