<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Bulmascores
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<section class="404-error">
			<div class="hero-body">
				<div class="container">
					<h1 class="title">404</h1>
					<h2 class="subtitle">
						<?php esc_html_e( 'Sivua ei valitettavasti löytynyt', 'asiakirjajulkisuuskuvaus' ); ?>
					</h2>
					<?php
					get_search_form();
					?>

				</div>
			</div>
		</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
