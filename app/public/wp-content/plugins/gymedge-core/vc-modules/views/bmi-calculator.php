<?php
$uniqid = (int) rand();

$metric_checked = $imperial_checked = $metric_style = $imperial_style = '';
if ( $unit_default == 'imperial' ) {
	$imperial_checked = ' checked';
	$metric_style = ' style="display:none;"';
}
else {
	$metric_checked = ' checked';
	$imperial_style = ' style="display:none;"';
}

$metric_radio_html = '<input id="rt-bmi-metric-' . $uniqid . '" type="radio" name="rt-bmi-unit" value="metric"' . $metric_checked . '><label for="rt-bmi-metric-' . $uniqid . '">' . __( 'Metric Units', 'gymedge-core' ) . '</label>';
$imperial_radio_html = '<input id="rt-bmi-imperial-' . $uniqid . '" type="radio" name="rt-bmi-unit" value="imperial"' . $imperial_checked . '><label for="rt-bmi-imperial-' . $uniqid . '">' . __( 'Imperial Units', 'gymedge-core' ) . '</label>';

if ( $unit_default == 'imperial' ) {
	$radio_html = $imperial_radio_html . $metric_radio_html;
}
else {
	$radio_html = $metric_radio_html . $imperial_radio_html;	
}
$bmi_chart = array(
	array( __( 'Below 18.5', 'gymedge-core' ),   __( 'Underweight', 'gymedge-core' ) ),
	array( __( '18.5 - 24.9', 'gymedge-core' ),  __( 'Normal', 'gymedge-core' ) ),
	array( __( '25 - 29.9', 'gymedge-core' ),  __( 'Overweight', 'gymedge-core' ) ),
	array( __( '30 and Above', 'gymedge-core' ), __( 'Obese', 'gymedge-core' ) ),
);
$bmi_chart_encoded = json_encode( $bmi_chart );
?>
<div class="rt-bmi-calculator rt-<?php echo esc_attr( $theme );?>">
	<div class="row">
		<div class="col-md-7">
			<div class="rt-left">
				<h3 class="rt-title"><?php echo esc_html( $title );?></h3>
				<div class="rt-subtitle"><?php echo rawurldecode( base64_decode( strip_tags( $subtitle ) ) );?></div>
				<form class="rt-bmi-form">
					<div class="rt-bmi-radio"<?php echo ( $unit_display == 'false' ) ? ' style="display:none;"':'';?>>
						<?php echo $radio_html;?>
					</div>
					<div class="rt-bmi-fields">
						<input type="text" class="rt-bmi-fields-metric" name="rt-bmi-weight" placeholder="<?php _e( 'Weight / kg', 'gymedge-core' );?>"<?php echo $metric_style;?>>
						<input type="text" class="rt-bmi-fields-metric" name="rt-bmi-height" placeholder="<?php _e( 'Height / cm', 'gymedge-core' );?>"<?php echo $metric_style;?>>
						<input type="text" class="rt-bmi-fields-imperial" name="rt-bmi-pound" placeholder="<?php _e( 'Weight / lbs', 'gymedge-core' );?>"<?php echo $imperial_style;?>>
						<input type="text" class="rt-bmi-fields-imperial" name="rt-bmi-feet" placeholder="<?php _e( 'Height / feet', 'gymedge-core' );?>"<?php echo $imperial_style;?>>
						<input type="text" class="rt-bmi-fields-imperial" name="rt-bmi-inch" placeholder="<?php _e( 'Height / inch', 'gymedge-core' );?>"<?php echo $imperial_style;?>>
					</div>
					<input type="submit" class= "rt-bmi-submit" value="<?php echo esc_html( $buttontext );?>">
					<div class="rt-bmi-result" style="display:none;" data-chart="<?php echo esc_attr( $bmi_chart_encoded );?>"><?php _e( 'Your BMI is:', 'gymedge-core' );?> <span class="rt-bmi-val"></span><?php _e( ', and weight status is:', 'gymedge-core' );?> <span class="rt-bmi-status"></span></div>
					<div class="rt-bmi-error" data-emptymsg="<?php _e( 'Error: One or more fields are empty', 'gymedge-core' );?>" data-numbermsg="<?php _e( 'Error: All field values must be a number', 'gymedge-core' );?>"></div>
				</form>
			</div>
		</div>
		<div class="col-md-5">
			<div class="rt-right">
				<table class="bmi-chart">
					<tr>
						<th><?php _e( 'BMI', 'gymedge-core' );?></th>
						<th><?php _e( 'Weight Status', 'gymedge-core' );?></th>
					</tr>
					<?php foreach ( $bmi_chart as $chart ): ?>
						<tr>
							<td><?php echo $chart[0];?></td>
							<td><?php echo $chart[1];?></td>
						</tr>						
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>