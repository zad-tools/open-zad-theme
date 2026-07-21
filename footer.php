<?php
/**
 * The footer: closes the content wrapper and renders footer widgets + credit.
 *
 * @package Open_ZAD_Theme
 */

?>
	</div><!-- .max-w-6xl -->
</div><!-- #content -->

<footer id="colophon" class="site-footer border-t border-border bg-surface mt-auto">
	<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
		<div class="footer-widgets mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div>
	<?php endif; ?>

	<div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-6 border-t border-border flex flex-col sm:flex-row items-center justify-between gap-4">
		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'open-zad' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'flex flex-wrap items-center gap-4 text-sm [&_a]:text-text-muted [&_a:hover]:text-primary',
						'depth'          => 1,
						'fallback_cb'    => false,
					)
				);
				?>
			</nav>
		<?php endif; ?>

		<p class="site-info text-sm text-text-muted m-0">
			<?php
			printf(
				/* translators: 1: current year, 2: site name. */
				esc_html__( '© %1$s %2$s.', 'open-zad' ),
				esc_html( wp_date( 'Y' ) ),
				esc_html( get_bloginfo( 'name' ) )
			);
			?>
			<?php
			$open_zad_credit = get_theme_mod( 'open_zad_footer_credit', '' );
			if ( '' !== $open_zad_credit ) :
				?>
				<span class="site-footer-credit"><?php echo wp_kses_post( $open_zad_credit ); ?></span>
			<?php else : ?>
				<span class="site-footer-credit"></span>
			<?php endif; ?>
		</p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
