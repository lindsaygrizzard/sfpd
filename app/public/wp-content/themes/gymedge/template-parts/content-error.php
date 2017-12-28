<?php
$gym_error_bodybg = !empty( GymEdge::$options['error_bodybg']['url'] ) ? GymEdge::$options['error_bodybg']['url'] : GYMEDGE_IMG_URL . 'error.jpg';
?>
<div <?php post_class( 'error-page-content' );?>>
	<div class="row">
		<div class="col-sm-12 col-xs-12">
			<div class="error-page" style="background-image: url(<?php echo esc_url( $gym_error_bodybg );?>);">
				<h1><?php echo esc_html( GymEdge::$options['error_text1'] );?></h1>
				<p><?php echo esc_html( GymEdge::$options['error_text2'] );?></p>
			</div>
		</div>
		<div class="col-sm-12 col-xs-12">
			<div class="error-page-message">       					
				<p><?php echo esc_html( GymEdge::$options['error_text3'] );?></p>
				<div class="home-page">
					<a href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo esc_html( GymEdge::$options['error_buttontext'] );?></a>
				</div>
			</div>
		</div>	
	</div>
</div>