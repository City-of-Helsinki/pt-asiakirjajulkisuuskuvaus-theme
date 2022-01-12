<?php
/**
 * Search results are contained within a div.searchwp-live-search-results
 * which you can style accordingly as you would any other element on your site
 *
 * Some base styles are output in wp_footer that do nothing but position the
 * results container and apply a default transition, you can disable that by
 * adding the following to your theme's functions.php:
 *
 * add_filter( 'searchwp_live_search_base_styles', '__return_false' );
 *
 * There is a separate stylesheet that is also enqueued that applies the default
 * results theme (the visual styles) but you can disable that too by adding
 * the following to your theme's functions.php:
 *
 * wp_dequeue_style( 'searchwp-live-search' );
 *
 * You can use ~/searchwp-live-search/assets/styles/style.css as a guide to customize
 */

$search_query = get_search_query();

$loop = new WP_Query( array(
	's' => $search_query,
	'post_type' => array('post', 'tietovarannot')
)
);

if ( $loop->have_posts() ) : ?>

	<img class="search-logo" src="<?= get_stylesheet_directory_uri() ?>/images/HELSINKI_Tunnus_VALKOINEN.png" alt="Helsinki Logo">

	<div class="searchwp-live-container container">

		<div aria-expanded="false" aria-label="Avaa sivuston haku">
			<?php get_search_form(); ?>
		</div>

		<?php while ( $loop->have_posts() ) : $loop->the_post(); 

			$search_count++;
			$post_type = get_post_type_object( get_post_type() ); ?>

			<div class="searchwp-live-search-result">

				<div class="columns is-vcentered">
					<div class="column is-8">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					</div>
					<div class="column">
						<img src="<?= get_the_post_thumbnail_url( $post->ID ); ?>" alt="">
					</div>
				</div>

			</div>

		<?php endwhile; ?>

	<?php else : ?>
		<p class="searchwp-live-search-no-results">
			<em><?php _ex( 'Ei hakutuloksia.', 'swplas' ); ?></em>
		</p>
	<?php endif; ?>

	<?php if($search_count > 0) {
		if($search_count > 1) {
			echo "<div class='search-results-count'>".$search_count." hakutulosta</div>";
		} else {
			echo "<div class='search-results-count'>".$search_count." hakutulos</div>";
		}
	}
	?>


</div>
