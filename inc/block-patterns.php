<?php
/**
 * Block patterns.
 *
 * Registers an "Open ZAD" pattern category and a couple of ready-made
 * patterns built entirely from core blocks, so they work without any
 * plugin and inherit the theme's block styles.
 *
 * @package Open_ZAD
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'open_zad_register_block_patterns' ) ) {
	/**
	 * Register the theme's pattern category and patterns.
	 */
	function open_zad_register_block_patterns() {
		if ( ! function_exists( 'register_block_pattern' ) || ! function_exists( 'register_block_pattern_category' ) ) {
			return;
		}

		register_block_pattern_category(
			'open-zad',
			array( 'label' => __( 'Open ZAD', 'open-zad' ) )
		);

		// Call-to-action card.
		$cta_heading = esc_html__( 'Build something worth reading', 'open-zad' );
		$cta_text    = esc_html__( 'A fast, accessible starting point for your next blog or magazine — no page builder required.', 'open-zad' );
		$cta_button  = esc_html__( 'Get started', 'open-zad' );

		register_block_pattern(
			'open-zad/call-to-action',
			array(
				'title'      => __( 'Call to action card', 'open-zad' ),
				'categories' => array( 'open-zad', 'call-to-action' ),
				'content'    => '<!-- wp:group {"className":"is-style-open-zad-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-open-zad-card"><!-- wp:heading -->
<h2 class="wp-block-heading">' . $cta_heading . '</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>' . $cta_text . '</p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">' . $cta_button . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
			)
		);

		// Three-column feature row.
		$features = array(
			array(
				esc_html__( 'Fast', 'open-zad' ),
				esc_html__( 'A compiled utility stylesheet and a tiny script, all served locally.', 'open-zad' ),
			),
			array(
				esc_html__( 'Accessible', 'open-zad' ),
				esc_html__( 'Skip link, keyboard-navigable menu, and WCAG 2.1 AA color targets.', 'open-zad' ),
			),
			array(
				esc_html__( 'RTL-first', 'open-zad' ),
				esc_html__( 'Logical properties throughout, so right-to-left languages just work.', 'open-zad' ),
			),
		);

		$columns = '';
		foreach ( $features as $feature ) {
			$columns .= '<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">' . $feature[0] . '</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>' . $feature[1] . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
';
		}

		register_block_pattern(
			'open-zad/three-column-features',
			array(
				'title'      => __( 'Three-column features', 'open-zad' ),
				'categories' => array( 'open-zad', 'columns' ),
				'content'    => '<!-- wp:columns -->
<div class="wp-block-columns">' . $columns . '</div>
<!-- /wp:columns -->',
			)
		);
	}
}
add_action( 'init', 'open_zad_register_block_patterns' );
