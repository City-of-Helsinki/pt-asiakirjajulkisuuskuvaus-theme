<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bulmascores
 */

?>

<article id="post-<?= the_ID(); ?>" <?php post_class(); ?>>

	<div class="columns">
		
		<div class="column is-4 desktop-only tablet-only">
			<?php
			$parent_posts = get_posts(array(
				'post_type' => 'tietovarannot',
				'posts_per_page' => -1, 
				'post_parent' => 0,
				'order' => ASC,
			));
			if (!empty($parent_posts)):
				?>
				<ul class="sidenavigation">
					<?php foreach($parent_posts as $parent_post): ?>
						<li class="<?= $parent_post->ID == get_the_ID() ? 'active' : '' ?>">
							<?php
							$subposts = get_posts(array(
								'post_type' => 'tietovarannot',
								'posts_per_page' => -1, 
								'post_parent' => $parent_post->ID
							));
							?>
							<a href="<?= get_permalink($parent_post->ID) ?>">
								<span><?= get_the_title($parent_post->ID) ?></span>
								<?php if (!empty($subposts)): ?>
									<i class="hds-icon hds-icon--angle-up" aria-hidden="true"></i>
								<?php endif; ?>
							</a>
							<?php 
							if (!empty($subposts)):
								?>
								<ul class="submenu">
									<?php foreach($subposts as $subpost): ?>
										<li class="<?= $subpost->ID == get_the_ID() ? 'active' : '' ?>">
											<a href="<?= get_permalink($subpost->ID) ?>"><?= get_the_title($subpost->ID) ?></a>
										</li>
									<?php	endforeach; ?>
								</ul>
							<?php endif; ?>
						</li>
					<?php endforeach; wp_reset_postdata(); ?>
				</ul>
			<?php endif; ?>
		</div>

		<div class="column is-8">

			<div class="entry-content mb-2">
				<header class="entry-header">
					<?php
					if ( is_singular() ) : ?>
						<h1 class="main-title is-1"><?= get_the_title( $post->ID ); ?></h1>
					<?php else :
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

					<section class="toc">
						<div class="toc-content">
							<h3>Tältä sivulta löydät</h3>
							<ul>
								<?php 
								/**
								 * Table of content
								 * H2 elements populated as list here
								 */  
								?>
							</ul>
						</div>
					</section>


					<script>
						jQuery(document).ready(function() {
							var x = 0;
							var url = window.location.href;  
							jQuery('h2', jQuery('.entry-content')).each(function () {
								x++;
								jQuery(this).attr("id", "sisallysluettelo" + x);
								jQuery('.toc-content ul').append('<li><a href="' + url +'#sisallysluettelo'+ x +'">' + jQuery(this).html() + '</a><li>');
							});
						});
					</script>	

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

	</div>




</article><!-- #post-<?php the_ID(); ?> -->


