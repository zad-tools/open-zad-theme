<?php
/**
 * Template part for displaying a single post or page.
 *
 * @package Open_ZAD_Theme
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

	<header class="entry-header mb-6">
		<?php the_title( '<h1 class="entry-title text-3xl md:text-4xl font-black leading-tight mb-4">', '</h1>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta flex flex-wrap items-center gap-x-3 gap-y-1">
				<?php
				open_zad_posted_on();
				open_zad_posted_by();
				?>
			</div>
		<?php endif; ?>
	</header>

	<?php open_zad_post_thumbnail(); ?>

	<div class="entry-content max-w-none">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Post title. Only visible to screen readers. */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'open-zad' ),
					array( 'span' => array( 'class' => array() ) )
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links mt-6 flex flex-wrap gap-2">' . esc_html__( 'Pages:', 'open-zad' ) . ' ',
				'after'  => '</div>',
			)
		);
		?>
	</div>

	<footer class="entry-footer">
		<?php open_zad_entry_footer(); ?>
	</footer>
</article>
