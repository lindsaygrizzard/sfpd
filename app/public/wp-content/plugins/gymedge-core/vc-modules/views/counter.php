<?php
$width_css = !empty( $width ) ? 'max-width: '. $width . 'px;' : '';
$icon_css = "font-size: {$size}px;padding: {$padding_tb}px {$padding_lr}px;";
?>
<div class="<?php echo esc_attr( $class );?>">
	<div class="rt-counter-1" style="<?php echo esc_attr( $width_css );?>">
		<div class="rt-left"><i class="<?php echo esc_attr( $icon );?>" aria-hidden="true" style="<?php echo esc_attr( $icon_css );?>"></i></div>
		<div class="rt-right">
			<div class="rt-title"><?php echo esc_html( $title );?></div>
			<div class="rt-subtitle"><?php echo esc_html( $subtitle );?></div>
		</div>
		<div class="clear"></div>
	</div>
</div>