<?php
$heading  = '';
$heading .= !empty( $url ) ? '<a href="' . $url . '">' : '';
$heading .= $title;
$heading .= !empty( $url ) ? '</a>' : '';
$width_css = !empty( $width ) ? 'max-width: '. $width . 'px;' : '';
$sep_class = ( $separator == 'true' ) ? ' rt-separator' : '';

$title_css = '';
$content_css = '';

if ( $title_size != '' ) {
	$title_size   = (int) $title_size;
	$title_css   .= "font-size: {$title_size}px;";
}
if ( $content_size != '' ) {
	$content_size = (int) $content_size;
	$content_css .= "font-size: {$content_size}px;";
}
?>
<div class="media rt-info-text-1 <?php echo esc_attr( $class );?>" style="<?php echo esc_attr( $width_css );?>">
    <div class="pull-left<?php echo ( $image_style == 'rounded' ) ? ' rounded' : '' ;?>">
        <?php if ( $icontype != 'fontawesome' ): ?>
            <?php echo wp_get_attachment_image( $image, array( $size, $size ), true );?>
        <?php else: ?>
            <i class="<?php echo esc_attr( $icon );?>" aria-hidden="true" style="font-size: <?php echo esc_attr( $size );?>px;"></i>
        <?php endif; ?>
    </div>
    <div class="media-body">
        <h3 class="media-heading" style="<?php echo esc_attr( $title_css );?>"><?php echo wp_kses_post( $heading );?></h3>
        <div class="rt-spacing<?php echo esc_attr( $sep_class );?>" style="margin: <?php echo esc_attr( $spacing );?>px 0;"></div>
        <p class="mb0" style="<?php echo esc_attr( $content_css );?>"><?php echo wp_kses_post( $content );?></p>
    </div>
    <div class="clear"></div>
</div>