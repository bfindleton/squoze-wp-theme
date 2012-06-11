<?php
/**
 * Template Name: 1 Column - no sidebars
 *
 * This is the template that displays page as one column, full page.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package squoze
 * @since squoze 1.0
 */

get_header();

$content_columns = 12;

?>

		<div id="primary" class="site-content span<?php echo $content_columns; ?>">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary .site-content -->

<?php get_footer(); ?>
