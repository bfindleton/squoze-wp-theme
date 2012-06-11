<?php
/**
 * The Template for displaying all single product custom posts.
 *
 * @package squoze
 * @since squoze 1.0
 */

get_header();

$content_columns = squoze_get_layout();

?>

		<div id="primary" class="site-content span<?php echo $content_columns; ?>">
			<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary .site-content -->

<?php squoze_which_sidebars() ?>

<?php get_footer(); ?>
