<div class="rt-cta-signup-1">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6">
			<div class="rt-left">
				<?php echo wp_get_attachment_image( $image, 'full' )?>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6">
			<div class="rt-right" style="left:<?php echo esc_attr( $left );?>px;">
				<div class="rt-right-content">
					<h2><?php echo rawurldecode( base64_decode( strip_tags( $title ) ) );?></h2>
					<div><?php echo wp_kses_post( $subtitle );?></div>
					<?php if ( !empty( $buttontext ) ): ?>
						<a href="<?php echo esc_url( $buttonurl );?>" class="btn rt-button"><?php echo esc_html( $buttontext );?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>