<?php
/**
 * Template part shown when no posts are found.
 *
 * @package Open_ZAD_Theme
 */

?>
<section class="no-results not-found border border-border bg-surface p-8 text-center">
	<header class="page-header">
		<h1 class="page-title text-2xl font-black mb-4"><?php esc_html_e( 'Nothing found', 'open-zad' ); ?></h1>
	</header>

	<div class="page-content text-text-muted">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p>
				<?php
				printf(
					wp_kses(
						/* translators: %s: URL to the WordPress "write a new post" screen. */
						__( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'open-zad' ),
						array( 'a' => array( 'href' => array() ) )
					),
					esc_url( admin_url( 'post-new.php' ) )
				);
				?>
			</p>
		<?php elseif ( is_search() ) : ?>
			<p><?php esc_html_e( 'Sorry, nothing matched your search terms. Please try again with different keywords.', 'open-zad' ); ?></p>
			<div class="mt-6 max-w-md mx-auto"><?php get_search_form(); ?></div>
		<?php else : ?>
			<p><?php esc_html_e( 'It seems we cannot find what you are looking for. Perhaps searching can help.', 'open-zad' ); ?></p>
			<div class="mt-6 max-w-md mx-auto"><?php get_search_form(); ?></div>
		<?php endif; ?>
	</div>
</section>
