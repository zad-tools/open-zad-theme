<?php
/**
 * Template tags — small presentation helpers used across templates.
 *
 * @package Open_ZAD_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'open_zad_posted_on' ) ) {
	/**
	 * Print the published/updated date, linked to the post.
	 */
	function open_zad_posted_on() {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string .= '<time class="updated screen-reader-text" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			'<span class="posted-on text-text-muted text-sm">%s</span>',
			wp_kses(
				$time_string,
				array(
					'time' => array(
						'class'    => array(),
						'datetime' => array(),
					),
				)
			)
		);
	}
}

if ( ! function_exists( 'open_zad_posted_by' ) ) {
	/**
	 * Print the post author, linked to the author archive.
	 */
	function open_zad_posted_by() {
		printf(
			'<span class="byline text-text-muted text-sm">%1$s <a class="url fn n text-text hover:text-primary" href="%2$s">%3$s</a></span>',
			esc_html__( 'by', 'open-zad-theme' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
}

if ( ! function_exists( 'open_zad_entry_footer' ) ) {
	/**
	 * Print categories and tags for the current post.
	 */
	function open_zad_entry_footer() {
		if ( 'post' !== get_post_type() ) {
			return;
		}

		$categories = get_the_category_list( ' ' );
		if ( $categories ) {
			printf(
				'<div class="cat-links text-sm text-text-muted mt-4">%1$s %2$s</div>',
				esc_html__( 'Posted in', 'open-zad-theme' ),
				wp_kses_post( $categories )
			);
		}

		$tags = get_the_tag_list( '', ' ' );
		if ( $tags ) {
			printf(
				'<div class="tags-links text-sm text-text-muted mt-2">%1$s %2$s</div>',
				esc_html__( 'Tagged', 'open-zad-theme' ),
				wp_kses_post( $tags )
			);
		}
	}
}

if ( ! function_exists( 'open_zad_post_thumbnail' ) ) {
	/**
	 * Render the featured image, linked on archive views.
	 */
	function open_zad_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) {
			echo '<figure class="post-thumbnail mb-8">';
			the_post_thumbnail( 'large', array( 'class' => 'w-full h-auto' ) );
			echo '</figure>';
			return;
		}
		?>
		<a class="post-thumbnail block mb-4 overflow-hidden" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail(
				'large',
				array(
					'class'   => 'w-full h-auto',
					'alt'     => the_title_attribute( array( 'echo' => false ) ),
					'loading' => 'lazy',
				)
			);
			?>
		</a>
		<?php
	}
}
