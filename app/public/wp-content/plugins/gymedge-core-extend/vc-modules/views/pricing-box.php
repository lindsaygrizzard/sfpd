<?php
$style = "";
if ( !empty( $maxwidth ) ) {
	$style .= "max-width:{$maxwidth}px;";
}
?>
<div class="rt-pricing-box-1" style="<?php echo esc_attr( $style );?>">
	<div class="rt-top">
		<div class="rt-title"><?php echo esc_html( $title );?></div>
		<div class="rt-price"><?php echo esc_html( $price );?><span>/<?php echo esc_html( $unit );?></span></div>
		<div class="rt-features">
			<?php foreach ( $features as $feature ): ?>
				<div><?php echo esc_html( $feature );?></div>
			<?php endforeach; ?>
		</div>	
	</div>
	<div class="rt-btn"><a href="<?php echo esc_url( $btnurl );?>"><?php echo esc_html( $btntext );?></a></div>
</div>
