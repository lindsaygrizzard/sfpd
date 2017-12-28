<?php
$custom_class = vc_shortcode_custom_css_class( $css );
$style = ( $bgcolor != '' ) ? "background-color: {$bgcolor};" : "background-color: transparent;";

if ( $txtcolor != '' ) {
	$style  .= "color: {$txtcolor};";
}
if ( $bdrcolor != '' ) {
	$style  .= "border: 2px solid {$bdrcolor};";
}
?>
<div class="<?php echo esc_attr( $custom_class );?>" style="text-align:<?php echo esc_attr( $btnalign );?>;">
	<a class="rt-vc-button-1" data-txtcolor="<?php echo esc_attr( $txtcolor );?>" data-bgcolor="<?php echo esc_attr( $bgcolor );?>" data-txthover="<?php echo esc_attr( $txthovercolor );?>" data-bghover="<?php echo esc_attr( $bghovercolor );?>" style="<?php echo esc_attr( $style );?>" href="<?php echo esc_url( $buttonurl );?>"><?php echo esc_html( $buttontext );?></a>
</div>