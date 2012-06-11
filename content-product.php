<?php
/**
 * @package squoze
 * @since squoze 1.0
 */
	$custom = get_post_custom($post->ID);
	$price = "$". $custom["price"][0];

?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<h2 class="entry-title"><?php the_title(); ?> - <?php echo $price ?></h2>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php the_post_thumbnail(); ?>
				<?php the_content(); ?>
			</div><!-- .entry-content -->

			<footer class="entry-meta">
				<?php // add order button and back link here ?>

				<?php edit_post_link( __( 'Edit', 'squoze' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->
		</article><!-- #post-<?php the_ID(); ?> -->
