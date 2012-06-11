<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package squoze
 * @since squoze 1.0
 */
?>

	</div><!-- #main .row-fluid -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
			if ( ! is_404() )
				get_sidebar( 'footer' );
		?>

		<div class="site-info row-fluid">
			<div class="span12">
				<?php do_action( 'squoze_credits' ); ?>
				<a href="http://arbalestmedia.com/" title="<?php esc_attr_e( 'A Squishy Personal Publishing Platform', 'squoze' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'squoze' ), 'Squoze' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( '&copy; 2012 %1$s.', 'squoze' ), '<a href="http://arbalestmedia.com/" rel="designer">Arbalest Media</a>' ); ?>
			</div><!-- .span12 -->
		</div><!-- .site-info .row-fluid -->
	</footer><!-- .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>
