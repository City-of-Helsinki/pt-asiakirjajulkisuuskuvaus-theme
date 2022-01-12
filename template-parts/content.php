<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bulmascores
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="card-content">

		<div class="entry-content mb-2">

			<header class="entry-header">
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="main-title is-1">', '</h1>' );
				else :
					the_title( '<h2 class="main-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				?>


				<div class="ote">
					<?php 
					if (get_field('ingressi')) {
						echo get_field('ingressi');
					}
					?>
				</div>


				<div class="main-image">
					<img src="<?= get_the_post_thumbnail_url( $post->ID, 'large' ) ?>" alt="">
					<?php if (get_post(get_post_thumbnail_id())->post_excerpt) {?>
						<div class="featured-image-caption">
							<?php echo wp_kses_post(get_post(get_post_thumbnail_id())->post_excerpt); ?>
						</div>
					<?php } ?>
				</div>

			</header><!-- .entry-header -->


			<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bulmascores' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bulmascores' ),
				'after'  => '</div>',
			) );
			?>

		</div><!-- .entry-content -->

	</div>

</article><!-- #post-<?php the_ID(); ?> -->


