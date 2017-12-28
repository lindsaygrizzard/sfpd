<?php
global $post;
$gym_designation   = get_post_meta( $post->ID, 'gym_trainer_designation', true );
$gym_experience    = get_post_meta( $post->ID, 'gym_trainer_experience', true );
$gym_email         = get_post_meta( $post->ID, 'gym_trainer_email', true );
$gym_phone         = get_post_meta( $post->ID, 'gym_trainer_phone', true );
$gym_socials       = get_post_meta( $post->ID, 'gym_trainer_socials', true );
$gym_skills        = get_post_meta( $post->ID, 'gym_trainer_skill', true );

if ( GymEdge::$layout == 'full-width' ) {
	$gym_trainer_img_class = 'col-sm-4';
	$gym_trainer_details_class = 'col-sm-8';
}
else{
	$gym_trainer_img_class = 'col-sm-12 col-md-5 col-lg-4';
	$gym_trainer_details_class = 'col-sm-12 col-md-7 col-lg-8';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="<?php echo esc_attr( $gym_trainer_details_class );?>">
			<div class="trainer-detail-content">

				<!-- instructor header, image and categories -->
				<div class="instructor-image-single">
					<?php the_post_thumbnail( $thumb_size );?>
				</div>
				<h3 class="instructor-name">
					<a href="<?php the_permalink();?>"><?php the_title();?></a>
				</h3>
				<?php if ( $gym_designation ): ?>
					<p class="instructor-cats">
						<?php echo esc_html( $gym_designation );?>
					</p>
				<?php endif; ?>

				<!-- instructor content -->
				<div class="detail-heading"> 
					<?php the_content();?>
				</div>

				<!-- CTAs -->
				<div class="instructor-ctas">
					<a class="button button-purple sign-up" href="<?php the_field('instructor-mindbody-link'); ?>">
						Take class 
						<?php if( the_title() ): ?>
							with <?php the_title();?>
						<?php endif;?>
					</a>
					<!-- <?php //if( get_field('gym_gallery') ): ?> -->
						<a class="button button-outline gallery" href="<?php the_field('instructor-gallery-link'); ?>">
							Gallery
						</a>
					<!-- <?php //endif;?> -->
				</div>


				<?php if ( have_rows('performance_videos') ) { ?>
					<p>Performance Videos: </p>
				<?php
						while ( have_rows('performance_videos') ) : the_row();	
				?>
						<li>
							<a href="<?php the_sub_field('performance_video_link');?>"><?php the_sub_field('instructor_video_title');?></a>
						</li>
				
				<?php
					 endwhile;

					}
					else{

					}
				?>

				<?php if ( !empty( $gym_socials ) ): ?>
					<ul>
						<?php foreach ( $gym_socials as $gym_key => $gym_social ): ?>
							<?php if ( !empty( $gym_social ) ): ?>
								<li><a target="_blank" href="<?php echo esc_attr( $gym_social );?>"><i class="fa <?php echo esc_attr( GymEdge::$trainer_social_fields[$gym_key]['icon'] );?>"></i></a></li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>						
				<?php endif; ?>
			</div>
		</div>
	</div>
</article>