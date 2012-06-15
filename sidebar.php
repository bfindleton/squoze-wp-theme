<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package squoze
 * @since squoze 1.0
 */
 
$layout = of_get_option( 'sidebar_layout' );

switch ( $layout ) {
	case 'both':
	case 'right':
		$rightside = of_get_option( 'right_sidebar_columns' );
		$content_columns = $rightside;
		break;
	case 'left':
		$leftside = of_get_option( 'left_sidebar_columns' );
		$content_columns = $leftside;
		break;
	default:
		$content_columns = 3;
		break;
}


?>
		<div id="secondary" class="widget-area span<?php echo $content_columns; ?>" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<aside id="search" class="widget widget_search">
					<?php get_search_form(); ?>
				</aside>

				<aside id="archives" class="widget">
					<h3 class="widget-title"><?php _e( 'Archives', 'squoze' ); ?></h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h3 class="widget-title"><?php _e( 'Meta', 'squoze' ); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->
		