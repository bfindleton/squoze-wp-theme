<?php
/**
 * Template Name: 2 columns - sidebar right
 *
 * This is the template that displays pages with 2 columns, sidebar on the right.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package squoze
 * @since squoze 1.0
 */

get_header();

$content_columns = 12 - of_get_option( 'right_sidebar_columns' );

?>

		<div id="primary" class="site-content span<?php echo $content_columns; ?>">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary .site-content -->

<?php get_sidebar(); ?>
<?php get_sidebar( 'two' ); ?>
<?php get_footer(); ?>
