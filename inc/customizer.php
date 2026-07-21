<?php
/**
 * Customizer settings for Open ZAD Theme.
 *
 * Replaces a heavy options page with core Customizer controls. Colors are
 * stored as hex and converted to the space-separated RGB triplets the
 * bundled utility stylesheet expects (rgb(var(--color-*))).
 *
 * @package Open_ZAD_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The color settings the theme exposes: setting id => [ label, default hex ].
 *
 * @return array<string, array{label:string, default:string, var:string}>
 */
function open_zad_color_settings() {
	return array(
		'open_zad_color_primary' => array(
			'label'   => __( 'Primary color', 'open-zad-theme' ),
			'default' => '#2563eb',
			'var'     => '--color-primary',
		),
		'open_zad_color_accent'  => array(
			'label'   => __( 'Accent color', 'open-zad-theme' ),
			'default' => '#7c3aed',
			'var'     => '--color-accent',
		),
		'open_zad_color_text'    => array(
			'label'   => __( 'Text color', 'open-zad-theme' ),
			'default' => '#1f2937',
			'var'     => '--color-text',
		),
	);
}

/**
 * Convert a #rrggbb hex value into a space-separated "r g b" triplet.
 *
 * @param string $hex Hex color (with or without leading #).
 * @return string
 */
function open_zad_hex_to_rgb_triplet( $hex ) {
	$hex = ltrim( (string) $hex, '#' );

	if ( 3 === strlen( $hex ) ) {
		$hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
	}

	if ( 6 !== strlen( $hex ) || ! ctype_xdigit( $hex ) ) {
		return '';
	}

	return sprintf(
		'%d %d %d',
		hexdec( substr( $hex, 0, 2 ) ),
		hexdec( substr( $hex, 2, 2 ) ),
		hexdec( substr( $hex, 4, 2 ) )
	);
}

/**
 * Build the :root inline CSS from the saved Customizer colors.
 *
 * @return string
 */
function open_zad_get_inline_css() {
	$rules = array();

	foreach ( open_zad_color_settings() as $setting_id => $config ) {
		$value   = get_theme_mod( $setting_id, $config['default'] );
		$triplet = open_zad_hex_to_rgb_triplet( $value );

		if ( '' !== $triplet ) {
			$rules[] = $config['var'] . ':' . $triplet;
		}

		// Keep the accent-hover token in step with the accent color.
		if ( '--color-accent' === $config['var'] && '' !== $triplet ) {
			$rules[] = '--color-accent-hover:' . $triplet;
		}
	}

	if ( empty( $rules ) ) {
		return '';
	}

	return ':root{' . implode( ';', $rules ) . '}';
}

/**
 * Register Customizer controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager instance.
 */
function open_zad_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'open_zad_colors',
		array(
			'title'    => __( 'Theme Colors', 'open-zad-theme' ),
			'priority' => 40,
		)
	);

	foreach ( open_zad_color_settings() as $setting_id => $config ) {
		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => $config['default'],
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'   => $config['label'],
					'section' => 'open_zad_colors',
				)
			)
		);
	}

	// Footer credit line.
	$wp_customize->add_setting(
		'open_zad_footer_credit',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'open_zad_footer_credit',
		array(
			'label'       => __( 'Footer credit text', 'open-zad-theme' ),
			'description' => __( 'Optional line shown next to the copyright in the footer.', 'open-zad-theme' ),
			'section'     => 'title_tagline',
			'type'        => 'text',
		)
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'open_zad_customize_partial_blogname',
			)
		);
	}
}
add_action( 'customize_register', 'open_zad_customize_register' );

/**
 * Render the site title for the selective-refresh partial.
 */
function open_zad_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Live-preview JS for the Customizer color and text controls.
 */
function open_zad_customize_preview_js() {
	wp_enqueue_script(
		'open-zad-customizer',
		get_template_directory_uri() . '/assets/js/customizer.js',
		array( 'customize-preview' ),
		OPEN_ZAD_VERSION,
		true
	);
}
add_action( 'customize_preview_init', 'open_zad_customize_preview_js' );
