<?php
$gym_socials = array(
	'social_facebook' => array(
		'icon' => 'fa-facebook',
		'url'  => GymEdge::$options['social_facebook'],
		),
	'social_twitter' => array(
		'icon' => 'fa-twitter',
		'url'  => GymEdge::$options['social_twitter'],
		),
	'social_gplus' => array(
		'icon' => 'fa-google-plus',
		'url'  => GymEdge::$options['social_gplus'],
		),
	'social_linkedin' => array(
		'icon' => 'fa-linkedin',
		'url'  => GymEdge::$options['social_linkedin'],
		),
	'social_youtube' => array(
		'icon' => 'fa-youtube',
		'url'  => GymEdge::$options['social_youtube'],
		),
	'social_pinterest' => array(
		'icon' => 'fa-pinterest',
		'url'  => GymEdge::$options['social_pinterest'],
		),
	'social_instagram' => array(
		'icon' => 'fa-instagram',
		'url'  => GymEdge::$options['social_instagram'],
		),
	'social_skype' => array(
		'icon' => 'fa-skype',
		'url'  => GymEdge::$options['social_skype'],
		),
	);
$gym_socials = array_filter( $gym_socials, array( 'GymEdge_Helper' , 'filter_social' ) );
?>
<div id="tophead">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="tophead-contact">
					<?php if ( !empty( GymEdge::$options['top_phone'] ) ): ?>
						<div class="phone">
							<i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?php echo esc_attr( GymEdge::$options['top_phone'] );?>"><?php echo esc_html( GymEdge::$options['top_phone'] );?></a>
						</div>
					<?php endif; ?>
					<?php if ( !empty( GymEdge::$options['top_phone'] ) && !empty( GymEdge::$options['top_email'] ) ): ?>
						<div class="seperator">|</div>
					<?php endif; ?>								
					<?php if ( !empty( GymEdge::$options['top_email'] ) ): ?>
						<div class="email">
							<i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:<?php echo esc_attr( GymEdge::$options['top_email'] );?>"><?php echo esc_html( GymEdge::$options['top_email'] );?></a>
						</div>	
					<?php endif; ?>
				</div>
				<div class="tophead-right">
					<?php if ( has_nav_menu( 'top' ) ): ?>
						<div class="tophead-links">
							<?php wp_nav_menu( array('theme_location' => 'top' ) ); ?>
						</div>
					<?php endif; ?>
					<?php if ( has_nav_menu( 'top' ) && !empty( $gym_socials ) ): ?>
						<div class="seperator">|</div>
					<?php endif; ?>
					<?php if ( !empty( $gym_socials ) ): ?>
						<ul class="tophead-social">
							<?php foreach ( $gym_socials as $gym_social ): ?>
								<li><a target="_blank" href="<?php echo esc_url( $gym_social['url'] );?>"><i class="fa <?php echo esc_attr( $gym_social['icon'] );?>"></i></a></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>