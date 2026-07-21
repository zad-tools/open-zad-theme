<?php
/**
 * The header: opens the document and renders the site branding + primary nav.
 *
 * @package Open_ZAD_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-background text-text font-sans antialiased min-h-screen flex flex-col' ); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text sr-only focus:not-sr-only focus:absolute focus:top-2 focus:start-2 focus:z-50 focus:bg-primary focus:text-white focus:px-4 focus:py-2" href="#content">
	<?php esc_html_e( 'Skip to content', 'open-zad' ); ?>
</a>

<header id="masthead" class="site-header border-b border-border bg-surface">
	<div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between gap-6">

		<div class="site-branding flex items-center gap-3">
			<?php if ( has_custom_logo() ) : ?>
				<div class="site-logo"><?php the_custom_logo(); ?></div>
			<?php endif; ?>

			<div class="site-identity">
				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title text-xl font-black tracking-tight m-0">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="text-text hover:text-primary transition-colors"><?php bloginfo( 'name' ); ?></a>
					</h1>
				<?php else : ?>
					<p class="site-title text-xl font-black tracking-tight m-0">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="text-text hover:text-primary transition-colors"><?php bloginfo( 'name' ); ?></a>
					</p>
				<?php endif; ?>

				<?php
				$open_zad_description = get_bloginfo( 'description', 'display' );
				if ( $open_zad_description || is_customize_preview() ) :
					?>
					<p class="site-description text-sm text-text-muted m-0"><?php echo esc_html( $open_zad_description ); ?></p>
				<?php endif; ?>
			</div>
		</div>

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="site-navigation" class="main-navigation relative" aria-label="<?php esc_attr_e( 'Primary Menu', 'open-zad' ); ?>">
				<button type="button" class="menu-toggle sm:hidden inline-flex items-center gap-2 border border-border px-3 py-2 text-sm font-bold"
					aria-expanded="false" aria-controls="primary-menu-wrap">
					<span class="sr-only"><?php esc_html_e( 'Toggle menu', 'open-zad' ); ?></span>
					<span aria-hidden="true">☰</span>
				</button>

				<div id="primary-menu-wrap"
					class="hidden sm:block max-sm:absolute max-sm:end-0 max-sm:top-full max-sm:mt-2 max-sm:min-w-[12rem] max-sm:border max-sm:border-border max-sm:bg-surface max-sm:p-4 max-sm:z-40">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'container'      => false,
							'menu_class'     => 'flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-6 text-sm font-bold [&_a]:text-text [&_a:hover]:text-primary',
							'fallback_cb'    => false,
							'depth'          => 2,
						)
					);
					?>
				</div>
			</nav>
		<?php endif; ?>
	</div>
</header>

<div id="content" class="site-content flex-1">
	<div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-10 md:py-14">
