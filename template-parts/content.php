<?php
/**
 * Template part for displaying a post in a list (archive/blog context).
 *
 * @package Open_ZAD_Theme
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry border border-border bg-surface p-6 md:p-8' ); ?>>

	<?php open_zad_post_thumbnail(); ?>

	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-badge inline-block mb-3 text-xs font-bold uppercase tracking-wider text-primary border border-primary px-2 py-1">
				<?php esc_html_e( 'Featured', 'open-zad-theme' ); ?>
			</span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title text-xl md:text-2xl font-black mb-3"><a class="text-text hover:text-primary transition-colors" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta flex flex-wrap items-center gap-x-3 gap-y-1 mb-4">
				<?php
				open_zad_posted_on();
				open_zad_posted_by();
				?>
			</div>
		<?php endif; ?>
	</header>

	<div class="entry-summary text-text-muted leading-relaxed">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer mt-6">
		<a class="read-more inline-flex items-center gap-2 text-sm font-bold text-primary hover:underline" href="<?php the_permalink(); ?>">
			<?php esc_html_e( 'Read more', 'open-zad-theme' ); ?>
			<span aria-hidden="true">&rarr;</span>
		</a>
	</footer>
</article>
