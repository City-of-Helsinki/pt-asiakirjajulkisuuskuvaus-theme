<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bulmascores
 */

?>
<!doctype html>
	<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

		<?php wp_head(); ?>

		<!-- Matomo -->
		<script type="text/javascript">
			var _paq = window._paq = window._paq || [];
			/* tracker methods like "setCustomDimension" should be called before "trackPageView" */
			_paq.push(['trackPageView']);
			_paq.push(['enableLinkTracking']);
			(function() {
				var u="//webanalytics.digiaiiris.com/js/";
				_paq.push(['setTrackerUrl', u+'tracker.php']);
				_paq.push(['setSiteId', '568']);
				var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
				g.type='text/javascript'; g.async=true; g.src=u+'piwik.min.js'; s.parentNode.insertBefore(g,s);
			})();
		</script>
		<!-- End Matomo Code -->

	</head>

	<body <?php body_class(); ?>>



		<div id="page" class="site">

			<a class="screen-reader-text" href="#content"><?php pll_e('Siirry sisältöön') ?></a>

			<header id="masthead" class="site-header">

				<section class="section desktop-only">
					<div class="container">
						<div class="nav-header">
							<div class="logo columns is-mobile is-vcentered desktop-only">
								<?php the_custom_logo(); ?>
								<div class="site-brand">Asiakirjajulkisuuskuvaus</div>
							</div>
							<div class="nav-end">
								<div class="columns">
									<div class="column">
										<?php /*
										<div class="lang-select right">
											<ul>
												<?php pll_the_languages(); ?>
											</ul>
										</div>
										*/ ?>
									</div>
									<div tabindex="0" class="column search-open is-narrow">
										<div  class="hds-icon hds-icon--size-s hds-icon--search desktop-only">
											Hae
										</div>
										<span class="search-text"><?php pll_e('Hae') ?></span> 
										<div class="search-box" aria-expanded="false" aria-label="Avaa sivuston haku">
											<?php get_search_form(); ?>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</section>


				<nav class="navigation">
					<div class="navbar-brand mobile-only is-mobile is-vcentered">
						<div class="mobile-logo is-mobile columns is-vcentered mobile-only">
							<?php the_custom_logo(); ?>
							<div class="site-brand mobile-only">Asiakirjajulkisuuskuvaus</div>
						</div>
						<div class="columns is-mobile is-vcentered mobile-only">
							<div class="mobile-only">
								<?php pll_the_languages( array( 'dropdown' => 1, 'display_names_as' => 'slug' ) ); ?>
							</div>
							<div id="mobile-menu-open-btn" class="navbar-burger burger" data-target="navMenuColorinfo-example">
								<span></span>
								<span></span>
								<span></span>
							</div>
						</div>
					</div>

					<div id="header-mobile-menu" class="mobile-navbar-menu mobile-only">
						<div class="navbar-brand is-vcentered">
							<div class="mobile-logo is-mobile columns is-vcentered mobile-only">
								<div class="site-brand mobile-only">Asiakirjajulkisuuskuvaus</div>
							</div>
							<div class="columns is-mobile is-vcentered mobile-only">
								<div class="mobile-only">
									<?php pll_the_languages( array( 'dropdown' => 1, 'display_names_as' => 'slug' ) ); ?>
								</div>
								<div id="mobile-menu-close-btn" class="navbar-burger is-vcentered">
									<i class="hds-icon hds-icon--cross" aria-hidden="true"></i>
								</div>
							</div>
						</div>
						<div class="search-box open" aria-expanded="false" aria-label="Avaa sivuston haku">
							<?php get_search_form(); ?>
						</div>
						<div class="nav-menu">
							<?php 
								wp_nav_menu(
									array(
										'theme_location'  => 'primary',
										'menu' 			  => 'Menu 1',
										'container' => false,
									)
								);
							?>
						</div>
					</div>

					<div class="navbar-menu">
						<div class="container">
							<?php 
							wp_nav_menu(
								array(
									'theme_location'  => 'primary',
									'menu' 			  => 'Menu 1',
									'container' => false,
								)
							);
							?>
						</div>
					</div>
				</nav>
				<!-- #bulma-site-navigation -->
			</header><!-- #masthead -->


			<div id="content" class="site-content">
