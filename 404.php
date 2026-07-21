<?php
/**
 * The template for displaying 404 (not found) pages.
 *
 * @package Open_ZAD_Theme
 */

get_header();
?>

<main id="main" class="site-main max-w-2xl mx-auto text-center py-12">
	<header class="page-header">
		<p class="text-6xl font-black text-primary mb-4">404</p>
		<h1 class="page-title text-2xl md:text-3xl font-black mb-4"><?php esc_html_e( 'This page could not be found', 'open-zad-theme' ); ?></h1>
	</header>

	<div class="page-content text-text-muted">
		<p class="mb-8"><?php esc_html_e( 'The page you were looking for may have been moved or removed. Try a search instead.', 'open-zad-theme' ); ?></p>

		<div class="max-w-md mx-auto mb-8">
			<?php get_search_form(); ?>
		</div>

		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center gap-2 border border-border px-5 py-3 font-bold text-text hover:border-primary hover:text-primary transition-colors">
			<?php esc_html_e( 'Back to home', 'open-zad-theme' ); ?>
		</a>
	</div>
</main>

<?php
get_footer();
