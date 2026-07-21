<?php
/**
 * Custom search form.
 *
 * @package Open_ZAD_Theme
 */

$open_zad_search_id = 'search-field-' . wp_unique_id();
?>
<form role="search" method="get" class="search-form flex" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $open_zad_search_id ); ?>" class="sr-only screen-reader-text">
		<?php echo esc_html_x( 'Search for:', 'label', 'open-zad-theme' ); ?>
	</label>
	<input
		type="search"
		id="<?php echo esc_attr( $open_zad_search_id ); ?>"
		class="search-field flex-1 min-w-0 border border-border bg-surface px-4 py-2.5 text-text focus:outline-none focus:border-primary"
		placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'open-zad-theme' ); ?>"
		value="<?php echo get_search_query(); ?>"
		name="s"
	/>
	<button type="submit" class="search-submit border border-primary bg-primary text-white px-5 py-2.5 font-bold hover:opacity-90 transition-opacity">
		<?php echo esc_html_x( 'Search', 'submit button', 'open-zad-theme' ); ?>
	</button>
</form>
