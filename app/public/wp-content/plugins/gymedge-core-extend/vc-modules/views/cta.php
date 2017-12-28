<?php
switch ( $theme ) {
    case 'default':
    $btn_class = 'rdtheme-button-3';
    break; 
    default:
    $btn_class = 'rdtheme-button-2';
    break;
}
$class  = vc_shortcode_custom_css_class( $css ). ' '. $theme;
$class .= empty( $subtitle ) ? ' rt-no-sub': ' rt-has-sub';
?>
<div class="rt-cta-1 <?php echo esc_attr( $class );?>">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="rt-cta-contents">
                    <h3 class="rt-cta-title"><?php echo rawurldecode( base64_decode( strip_tags( $title ) ) );?></h3>
                    <div class="rt-cta-subtitle"><?php echo rawurldecode( base64_decode( strip_tags( $subtitle ) ) );?></div>               
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="rt-cta-button">
                    <a class="<?php echo esc_attr( $btn_class );?>" href="<?php echo esc_html( $buttonurl );?>"><?php echo esc_html( $buttontext );?></a>
                </div>
            </div>
        </div>
    </div>
</div>