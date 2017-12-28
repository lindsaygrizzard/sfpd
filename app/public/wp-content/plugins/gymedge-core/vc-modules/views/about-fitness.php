<?php
$noimg_class = ( $image == '' ) ? ' noimg' : '';
?>
<div class="rt-fitness-wrap<?php echo esc_attr( $noimg_class );?>">
	<?php echo wp_get_attachment_image( $image, 'full' )?>
	<div class="rt-fitness"><?php echo wp_kses_post( $content );?></div>
</div>