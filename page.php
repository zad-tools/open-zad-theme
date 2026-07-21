<?php
/**
 * The template for displaying all single pages.
 *
 * @package Open_ZAD_Theme
 */

get_header();
?>

<main id="main" class="site-main max-w-3xl mx-auto">
	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'single' );

		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile;
	?>
</main>

<?php
get_footer();
