<?php
$schedule = array();
$available_weeks = array();

foreach ( $classes as $class ) {
	$metas = get_post_meta( $class->ID, 'gym_class_schedule', true );
	$metas = ( $metas != '' ) ? $metas : array();

	foreach ( $metas as $meta ) {

		if ( empty( $meta['week'] ) || $meta['week'] == 'none' || empty( $meta['start_time'] ) ) {
			continue;
		}

		$start_time = strtotime( $meta['start_time'] );
		$end_time   = !empty( $meta['end_time'] ) ? strtotime( $meta['end_time'] ) : false;

		if ( GymEdge::$options['class_time_format'] == '24' ) {
			$start_time = date( "H:i", $start_time );
			$end_time   = $end_time ? date( "H:i", $end_time ) : '';
		}
		else {
			$start_time = date( "g:ia", $start_time );
			$end_time   = $end_time ? date( "g:ia", $end_time ) : '';
		}

		if ( !in_array( $meta['week'], $available_weeks ) ) {
			$available_weeks[] = $meta['week'];
		}

		$schedule[$start_time][$meta['week']][] = array(
			'id'         => $class->ID,
			'class'      => $class->post_title,
			'start_time' => $start_time,
			'end_time'   => $end_time,
			'trainer'    => !empty( $meta['trainer'] ) ? get_the_title( $meta['trainer'] ) : '',
		);
	}
}

// remove empty fields
foreach ( $weeknames as $key => $value ){
	if ( !in_array( $key, $available_weeks ) ) {
		unset( $weeknames[$key] );
	}
}

uksort( $schedule, array( $this, 'sort_by_time_as_key' ) );
?>
<div class="table-responsive rt-routine rt-<?php echo esc_attr( $theme );?>">
	<?php if ( $nav == 'true' ): ?>
		<div class="rt-routine-nav">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#" data-id="all"><?php _e( 'All', 'gymedge-core' );?></a></li>
				<?php foreach ( $classes as $class ): ?>
					<li><a data-id="<?php echo esc_attr( $class->ID );?>" href="#"><?php echo esc_html( $class->post_title );?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>
	<table class="tab-content">
		<tr>
			<th></th>
			<?php foreach ( $weeknames as $weekname ): ?>
				<th class="rt-col-title"><div><?php echo esc_html( $weekname );?></div></th>
			<?php endforeach; ?>
		</tr>
		<?php foreach ( $schedule as $schedule_time => $schedule_value ): ?>
			<tr>
				<th class="rt-row-title"><?php echo $schedule_time;?></th>
				<?php
				// each week slot(cell)
				foreach ( $weeknames as $weekname => $weekvalue ) {
					$has_cell = false;
					// iterate over each week array
					foreach ( $schedule_value as $schedule_week => $routine ) {
						if ( $weekname == $schedule_week ) {
							echo '<td>';
							$this->print_routine( $routine, $link, $trainer );
							echo '</td>';
							$has_cell = true;
						}
					}
					if ( !$has_cell ) {
						echo '<td></td>';
					}
				}
				?>
			</tr>
		<?php endforeach; ?>
	</table>
</div>