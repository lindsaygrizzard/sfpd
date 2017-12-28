<div class="rt-about-3">
	<h2 class="rt-title"><?php echo wp_kses_post( $title );?></h2>
	<div class="rt-des"><?php echo wp_kses_post( $content );?></div>
	<?php if ( !empty( $buttontext ) ): ?>
		<a href="<?php echo esc_url( $buttonurl );?>" class="btn rt-button"><?php echo esc_html( $buttontext );?></a>
	<?php endif; ?>
</div>