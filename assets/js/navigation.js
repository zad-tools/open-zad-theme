/**
 * Accessible mobile navigation toggle.
 *
 * Shows/hides the primary menu on small screens and keeps aria-expanded in
 * sync. Closes on Escape and when focus leaves the navigation.
 *
 * @package Open_ZAD_Theme
 */
( function () {
	'use strict';

	function setup( nav ) {
		var button = nav.querySelector( '.menu-toggle' );
		var menu = nav.querySelector( '#primary-menu-wrap' );

		if ( ! button || ! menu ) {
			return;
		}

		function close() {
			menu.classList.add( 'hidden' );
			button.setAttribute( 'aria-expanded', 'false' );
		}

		function toggle() {
			var isHidden = menu.classList.toggle( 'hidden' );
			button.setAttribute( 'aria-expanded', isHidden ? 'false' : 'true' );
		}

		button.addEventListener( 'click', toggle );

		nav.addEventListener( 'keydown', function ( event ) {
			if ( 'Escape' === event.key ) {
				close();
				button.focus();
			}
		} );

		document.addEventListener( 'click', function ( event ) {
			if ( ! nav.contains( event.target ) ) {
				close();
			}
		} );
	}

	document.addEventListener( 'DOMContentLoaded', function () {
		var navs = document.querySelectorAll( '.main-navigation' );
		Array.prototype.forEach.call( navs, setup );
	} );
} )();
