<?php
/**
 * The Template for displaying all single posts.
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

				<?php squoze_content_nav( 'nav-above' ); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php squoze_content_nav( 'nav-below' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary .site-content -->

<?php squoze_which_sidebars() ?>

<?php get_footer(); ?>
