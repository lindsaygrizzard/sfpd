	</div><!-- #content -->
	<footer>
		<?php $gym_footer_count = wp_get_sidebars_widgets(); ?>
		<?php if ( !empty( $gym_footer_count['footer'] ) ): ?>
			<div class="footer-top-area">
				<div class="container">
					<div class="row">
						<?php dynamic_sidebar( 'footer' ); ?>
					</div>
				</div>
			</div>			
		<?php endif; ?>
		<div class="footer-bottom-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="footer-bottom">
							<p><?php echo wp_kses_post( GymEdge::$options['copyright_text'] );?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div><!-- #page -->
<?php if ( GymEdge::$options['back_to_top'] == 1 ): ?>
	<a href="#" class="scrollToTop"></a>
<?php endif; ?>
<?php wp_footer();?>
</body>
</html>