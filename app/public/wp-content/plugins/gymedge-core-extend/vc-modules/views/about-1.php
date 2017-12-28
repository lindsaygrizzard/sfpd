<div class="rt-about-1">
	<div class="row">
		<div class="col-md-6">
			<div class="rt-left">
				<div class="rt-title"><?php echo wp_kses_post( $title );?></div>
				<div class="rt-subtitle"><?php echo rawurldecode( base64_decode( strip_tags( $subtitle ) ) );?></div>
				<div class="rt-des"><?php echo wp_kses_post( $content );?></div>
				<?php if ( !empty( $buttontext ) ): ?>
					<a href="<?php echo esc_url( $buttonurl );?>" class="btn rt-button"><?php echo esc_html( $buttontext );?></a>
				<?php endif; ?>
			</div>
		</div>
		<div class="col-md-6">
			<div class="rt-right">
				<?php echo wp_get_attachment_image( $image, 'full' )?>
			</div>
		</div>
	</div>
</div>