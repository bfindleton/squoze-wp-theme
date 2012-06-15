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
	case 'left':
		$leftside = of_get_option( 'left_sidebar_columns' );
		$content_columns = $leftside;
		break;
	case 'right':
		$rightside = of_get_option( 'right_sidebar_columns' );
		$content_columns = $rightside;
		break;
	default:
		$content_columns = 3;
		break;
}


?>
		<div id="tertiary" class="widget-area span<?php echo $content_columns; ?>" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div><!-- #secondary .widget-area -->
		
