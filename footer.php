<?php
/**
 * @package kickplate
 */

?>

	</main><!-- #content -->

	<footer id="colophon" role="contentinfo">
		<?php if ( is_active_sidebar( 'footer-1' )  ) : ?>
				<?php dynamic_sidebar( 'footer-1' ); ?>
		<?php endif; ?>
	</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
