<?php $count = 0;?>
<div class="rt-owl-upcoming-1">
	<div class="rt-heading">
		<div class="rt-heading-left"><?php echo rawurldecode( base64_decode( strip_tags( $title ) ) );?></div>
		<div class="rt-heading-right">
			<div class="rt-arrow rt-arrow-1"><i class="fa fa-angle-left"></i></div>
			<div class="rt-arrow rt-arrow-2"><i class="fa fa-angle-right"></i></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="owl-wrap">
		<div class="owl-theme owl-carousel rt-owl-carousel-2" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
			<?php foreach ( $schedule as $data ): ?>
				<?php $count++;
				$time = $data['start_time'];
				if ( $data['end_time'] ) {
					$time .=  "- {$data['end_time']}";
				}
				$time .= ", {$data['weekname']}";
				?>
				<div class="rt-item <?php echo $count % 2 ? 'rt-odd':'rt-even';?>">
					<div class="rt-title"><?php echo esc_html( $data['class'] );?></div>
					<div class="rt-meta"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo esc_html( $time );?></div>
				</div>
			<?php endforeach;?>
		</div>
	</div>
	<div class="clear"></div>
</div>