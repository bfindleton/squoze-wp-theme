<?php
/**
 * Template Name: 3 columns - both sidebars
 *
 * This is the template that displays pages with 3 columns, sidebar on the left and right.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package squoze
 * @since squoze 1.0
 */

get_header();

$leftside = of_get_option( 'left_sidebar_columns', 3 );
$rightside = of_get_option( 'right_sidebar_columns', 3 );
$content_columns = 12 - $leftside - $rightside;
wp_localize_script(
		'squoze-js',
		'layout_object',
		array(
			'layout' => 'both',
		)
);

get_sidebar( 'two' );

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
<?php get_footer(); ?>
