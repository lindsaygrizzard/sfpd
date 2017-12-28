<?php
$class_schedules = array();

foreach ( $classes as $class ) {
    $button_text = get_post_meta( $class->ID, 'gym_class_button_text', true );
    $button_url  = get_post_meta( $class->ID, 'gym_class_button_url', true );
    $metas = get_post_meta( $class->ID, 'gym_class_schedule', true );
    $metas = ( $metas != '' ) ? $metas : array();

    foreach ( $metas as $meta ) {
        if ( empty( $meta['week'] ) || $meta['week'] == 'none' ) {
            continue;
        }
        
        $start_time = !empty( $meta['start_time'] ) ? strtotime( $meta['start_time'] ) : false;
        $end_time   = !empty( $meta['end_time'] ) ? strtotime( $meta['end_time'] ) : false;

        if ( GymEdge::$options['class_time_format'] == '24' ) {
            $start_time = $start_time ? date( "H:i", $start_time ) : '';
            $end_time   = $end_time ? date( "H:i", $end_time ) : '';
        }
        else {
            $start_time = $start_time ? date( "g:ia", $start_time ) : '';
            $end_time   = $end_time ? date( "g:ia", $end_time ) : '';
        }

        $class_schedules[$class->ID][] = array(
            'weekday'     => $meta['week'],
            'trainer'     => !empty( $meta['trainer'] ) ? get_the_title( $meta['trainer'] ) : '',
            'start_time'  => $start_time,
            'end_time'    => $end_time,
            'button_text' => $button_text,
            'button_url'  => $button_url,
        );
    }
}
?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="rt-class-schedule-1<?php echo esc_attr( $schedule_class );?>">
            <ul class="nav nav-tabs">
                <?php
                $count = 0;
                ?>
                <?php foreach ( $classes as $class ): ?>
                    <?php
                    $id = $class->ID . '-' . $uniqid;
                    $active_class = ( $count != 0 ) ? '' : 'active';
                    $count++;
                    ?>
                    <li class="<?php echo esc_attr( $active_class );?>"><a href="#<?php echo esc_attr( $id );?>" data-toggle="tab"><?php echo esc_html( $class->post_title );?></a></li>
                <?php endforeach; ?>
            </ul>
            <div class="tab-content class-schedule-tab">
                <?php
                $count = 0;
                ?>
                <?php foreach ( $class_schedules as $class_id => $class_array ): ?>
                    <?php
                    $id = $class_id . '-' . $uniqid;
                    $active_class = ( $count != 0 ) ? '' : ' in active';
                    $count++;
                    ?>
                    <div class="tab-pane fade<?php echo esc_attr( $active_class );?>" id="<?php echo esc_attr( $id );?>">
                        <?php foreach ( $class_array as $value ): ?>
                            <?php
                            $time = $value['start_time'];
                            if ( !empty( $value['end_time'] ) ) {
                                $time .=  "- {$value['end_time']}";
                            }
                            ?>
                            <ul>
                                <li><?php echo esc_html( $weeknames[$value['weekday']] );?></li>
                                <li><?php echo esc_html( $time );?></li>
                                <li><?php echo esc_html( $value['trainer'] );?></li>
                                <?php if ( $schedule_button == 'true' && !empty( $value['button_text'] ) && !empty( $value['button_url'] ) ): ?>
                                    <li class="rtin-btn"><a href="<?php echo esc_url( $value['button_url'] );?>"><?php echo esc_html( $value['button_text'] );?></a></li>
                                <?php endif; ?>
                            </ul>                          
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>