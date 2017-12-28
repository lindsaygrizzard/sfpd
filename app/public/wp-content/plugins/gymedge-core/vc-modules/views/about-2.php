<div class="rt-about-2">
	<div class="row">
		<div class="col-md-7 col-xs-12">
			<div class="rt-left">
				<h2 class="rt-title"><?php echo wp_kses_post( $title );?></h2>
				<div class="rt-des"><?php echo wp_kses_post( $content );?></div>
				<?php if ( !empty( $buttontext ) ): ?>
					<a href="<?php echo esc_url( $buttonurl );?>" class="btn rt-button"><?php echo esc_html( $buttontext );?></a>
				<?php endif; ?>
			</div>
		</div>
		<div class="col-md-5 col-xs-12">
			<div class="rt-right">
				<?php echo wp_get_attachment_image( $image, 'full' )?>
			</div>
		</div>
	</div>
</div>