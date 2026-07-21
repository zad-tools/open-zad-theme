/**
 * Customizer live preview — repaints color tokens without a full refresh.
 *
 * @package Open_ZAD_Theme
 */
( function () {
	'use strict';

	if ( typeof wp === 'undefined' || ! wp.customize ) {
		return;
	}

	function hexToTriplet( hex ) {
		hex = String( hex ).replace( '#', '' );
		if ( hex.length === 3 ) {
			hex = hex[ 0 ] + hex[ 0 ] + hex[ 1 ] + hex[ 1 ] + hex[ 2 ] + hex[ 2 ];
		}
		if ( hex.length !== 6 ) {
			return '';
		}
		var r = parseInt( hex.substring( 0, 2 ), 16 );
		var g = parseInt( hex.substring( 2, 4 ), 16 );
		var b = parseInt( hex.substring( 4, 6 ), 16 );
		return r + ' ' + g + ' ' + b;
	}

	function bindColor( settingId, cssVar, alsoHover ) {
		wp.customize( settingId, function ( value ) {
			value.bind( function ( newval ) {
				var triplet = hexToTriplet( newval );
				if ( ! triplet ) {
					return;
				}
				document.documentElement.style.setProperty( cssVar, triplet );
				if ( alsoHover ) {
					document.documentElement.style.setProperty( '--color-accent-hover', triplet );
				}
			} );
		} );
	}

	bindColor( 'open_zad_color_primary', '--color-primary', false );
	bindColor( 'open_zad_color_accent', '--color-accent', true );
	bindColor( 'open_zad_color_text', '--color-text', false );

	wp.customize( 'blogname', function ( value ) {
		value.bind( function ( newval ) {
			var el = document.querySelector( '.site-title a' );
			if ( el ) {
				el.textContent = newval;
			}
		} );
	} );

	wp.customize( 'open_zad_footer_credit', function ( value ) {
		value.bind( function ( newval ) {
			var el = document.querySelector( '.site-footer-credit' );
			if ( el ) {
				el.innerHTML = newval;
			}
		} );
	} );
} )();
