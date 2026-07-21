<?php
/**
 * The template for displaying a single post.
 *
 * @package Open_ZAD_Theme
 */

get_header();
?>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
	<main id="main" class="site-main <?php echo is_active_sidebar( 'sidebar-1' ) ? 'lg:col-span-8' : 'lg:col-span-12'; ?>">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle text-xs text-text-muted">' . esc_html__( 'Previous', 'open-zad' ) . '</span> <span class="nav-title font-bold">%title</span>',
					'next_text' => '<span class="nav-subtitle text-xs text-text-muted">' . esc_html__( 'Next', 'open-zad' ) . '</span> <span class="nav-title font-bold">%title</span>',
					'class'     => 'post-navigation mt-12 grid gap-4 sm:grid-cols-2 [&_a]:block [&_a]:border [&_a]:border-border [&_a]:p-4 [&_a]:text-text [&_a:hover]:border-primary',
				)
			);

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile;
		?>

	</main>

	<?php get_sidebar(); ?>
</div>

<?php
get_footer();
