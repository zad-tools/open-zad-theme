<?php
/**
 * The template for displaying search results.
 *
 * @package Open_ZAD_Theme
 */

get_header();
?>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
	<main id="main" class="site-main <?php echo is_active_sidebar( 'sidebar-1' ) ? 'lg:col-span-8' : 'lg:col-span-12'; ?>">

		<?php if ( have_posts() ) : ?>

			<header class="page-header mb-8 border-b border-border pb-6">
				<h1 class="page-title text-2xl md:text-3xl font-black">
					<?php
					printf(
						/* translators: %s: search query. */
						esc_html__( 'Search results for: %s', 'open-zad' ),
						'<span class="text-primary">' . esc_html( get_search_query() ) . '</span>'
					);
					?>
				</h1>
			</header>

			<div class="post-list grid grid-cols-1 gap-8">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', get_post_type() );
				endwhile;
				?>
			</div>

			<?php
			the_posts_pagination(
				array(
					'mid_size'           => 1,
					'prev_text'          => esc_html__( 'Previous', 'open-zad' ),
					'next_text'          => esc_html__( 'Next', 'open-zad' ),
					'screen_reader_text' => esc_html__( 'Search results navigation', 'open-zad' ),
					'class'              => 'pagination mt-12 flex flex-wrap gap-2 [&_.page-numbers]:inline-flex [&_.page-numbers]:items-center [&_.page-numbers]:justify-center [&_.page-numbers]:min-w-[2.5rem] [&_.page-numbers]:h-10 [&_.page-numbers]:px-3 [&_.page-numbers]:border [&_.page-numbers]:border-border [&_.current]:bg-primary [&_.current]:text-white',
				)
			);
			?>

		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>

	</main>

	<?php get_sidebar(); ?>
</div>

<?php
get_footer();
