<?php
$class = vc_shortcode_custom_css_class( $css );
?>
<div class="rt-owl-title-1 <?php echo esc_attr( $class );?>">
	<div class="section-title">
		<h2 class="owl-title" style="color:<?php echo esc_attr( $title_color );?>;"><?php echo esc_html( $title );?></h2>
		<div class="owl-description" style="color:<?php echo esc_attr( $subtitle_color );?>;"><?php echo wp_kses_post( $subtitle );?></div>
	</div>
</div>