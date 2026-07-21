<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Open_ZAD_Theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) || is_page() ) {
	return;
}
?>

<aside id="secondary" class="widget-area lg:col-span-4" aria-label="<?php esc_attr_e( 'Sidebar', 'open-zad-theme' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
