<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package squoze
 * @since squoze 1.0
 */

get_header();

$content_columns = squoze_get_layout();

?>

		<section id="primary" class="site-content span<?php echo $content_columns; ?>">
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'squoze' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header>

				<?php squoze_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'search' ); ?>

				<?php endwhile; ?>

				<?php squoze_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'search' ); ?>

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary .site-content -->

<?php squoze_which_sidebars() ?>

<?php get_footer(); ?>
