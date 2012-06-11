<?php
/**
 * The Footer widget areas. Clipped from twentyeleven.
 *
 * @package WordPress
 * @subpackage squoze
 * @since 1.0
 */
?>

<?php
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */

	$count = 0;

	if ( is_active_sidebar( 'sidebar-3' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-4' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-5' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-6' ) )
		$count++;
		
	if ( $count == 0 )
		return;
		
	// If we get this far, we have widgets. Let do this.

	$class = '';
	$span = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			$span = '12';
			break;
		case '2':
			$class = 'two';
			$span = '6';
			break;
		case '3':
			$class = 'three';
			$span = '4';
			break;
		case '4':
			$class = 'four';
			$span = '3';
			break;
	}
?>
<div id="supplementary" class="<?php echo $class; ?> row-fluid">
	<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
	<div id="first" class="widget-area <?php echo 'span' . $span; ?>" role="complementary">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
	</div><!-- #first .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
	<div id="second" class="widget-area <?php echo 'span' . $span; ?>" role="complementary">
		<?php dynamic_sidebar( 'sidebar-4' ); ?>
	</div><!-- #second .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
	<div id="third" class="widget-area <?php echo 'span' . $span; ?>" role="complementary">
		<?php dynamic_sidebar( 'sidebar-5' ); ?>
	</div><!-- #third .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
	<div id="fourth" class="widget-area <?php echo 'span' . $span; ?>" role="complementary">
		<?php dynamic_sidebar( 'sidebar-6' ); ?>
	</div><!-- #third .widget-area -->
	<?php endif; ?>
</div><!-- #supplementary .row-fluid -->