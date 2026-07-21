<?php
/**
 * The template for displaying comments.
 *
 * @package Open_ZAD_Theme
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area mt-12 pt-8 border-t border-border">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title text-xl font-black mb-6">
			<?php
			$open_zad_comment_count = get_comments_number();
			if ( '1' === $open_zad_comment_count ) {
				esc_html_e( 'One comment', 'open-zad-theme' );
			} else {
				printf(
					/* translators: %s: comment count number. */
					esc_html( _n( '%s comment', '%s comments', $open_zad_comment_count, 'open-zad-theme' ) ),
					esc_html( number_format_i18n( $open_zad_comment_count ) )
				);
			}
			?>
		</h2>

		<ol class="comment-list space-y-6">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 48,
				)
			);
			?>
		</ol>

		<?php
		the_comments_pagination(
			array(
				'prev_text' => esc_html__( 'Previous', 'open-zad-theme' ),
				'next_text' => esc_html__( 'Next', 'open-zad-theme' ),
			)
		);
		?>

	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments text-text-muted"><?php esc_html_e( 'Comments are closed.', 'open-zad-theme' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>
</div>
