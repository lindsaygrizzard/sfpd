<?php
$primary_color   = GymEdge::$options['primary_color']; // #fb5b21
$secondery_color = GymEdge::$options['secondery_color']; // #b0360a
$primary_rgb = GymEdge_Helper::hex2rgb( $primary_color ); // 251, 91, 33

/*-------------------------------------    
INDEX
===================================
#. VC: Owl Nav 1
#. VC: Owl Nav 2
#. VC: Owl Dots 1
#. VC: Owl Title 1
#. VC: Owl Post Slider 1
#. VC: Owl Post Slider 2
#. VC: Owl Post Slider 3
#. VC: Post Grid
#. VC: Owl Team Slider 1
#. VC: Owl Team Slider 2
#. VC: Owl Team Slider 3
#. VC: Owl Team Slider 4
#. VC: Team Grid 1
#. VC: Owl Class Slider 1
#. VC: Owl Class Slider 2
#. VC: Class Grid 1
#. VC: Class Grid 2
#. VC: Owl Testimonial Slider 1
#. VC: Info Text 1
#. VC: Info Text 2
#. VC: Info Text 3
#. VC: Class Schedule 1
#. VC: Owl Upcoming Class 1
#. VC: Class Routine
#. VC: CTA
#. VC: CTA Signup 1
#. VC: CTA Discount 1
#. VC: About 1
#. VC: About 3
#. VC: Pricing Box
#. VC: Counter
#. VC: Gallery
#. VC: BMI Calculator
#. VC: Default Accordian
-------------------------------------*/
?>
<?php /*--- VC: Owl Nav 1 ---*/ ?>
.rt-owl-nav-1 .owl-custom-nav .owl-prev,
.rt-owl-nav-1 .owl-custom-nav .owl-next {
	background-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Owl Nav 2 ---*/ ?>
.rt-owl-nav-2 .owl-theme .owl-nav > div {
	background-color: <?php echo esc_html( $primary_color );?> !important;
}

<?php /*--- VC: Owl Dots 1 ---*/ ?>
.rt-owl-dot-1 .owl-theme .owl-dots .owl-dot.active span,
.rt-owl-dot-1 .owl-theme .owl-dots .owl-dot:hover span {
	background-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Owl Title 1 ---*/ ?>
.rt-owl-title-1 .owl-title::after {
	background-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Owl Post Slider 1 ---*/ ?>
.rt-owl-post-1 .single-item .single-item-content h3 a:hover {
    color: <?php echo esc_html( $primary_color );?>;
}
.rt-owl-post-1 .single-item-meta .date {
    background-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Owl Post Slider 2 ---*/ ?>
.rt-owl-post-2 .single-item .single-item-content .overly .class-slider-ul-child li:first-child,
.rt-owl-post-2 .single-item-content .date {
    background-color: <?php echo esc_html( $primary_color );?>;
}
.rt-owl-post-2 .single-item .details a {
    border-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Owl Post Slider 3 ---*/ ?>
.rt-owl-post-3 .single-item .single-item-content h3 a:hover {
    color: <?php echo esc_html( $primary_color );?>;
}
.rt-owl-post-3 .single-item-meta .date {
    background-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Post Grid ---*/ ?>
.rt-post-grid .single-item .rt-date {
    background-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Owl Team Slider 1 ---*/ ?>
.rt-owl-team-1 .vc-overly ul li a {
    border-color: <?php echo esc_html( $primary_color );?>;
}
.rt-owl-team-1 .vc-overly ul li a:hover,
.rt-owl-team-1 .vc-team-meta {
    background-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Owl Team Slider 2 ---*/ ?>
.rt-owl-team-2 .vc-team-meta .name {
    background-color: <?php echo esc_html( $primary_color );?>;
}
.rt-owl-team-2 .vc-item .vc-overly {
    background-color: rgba(<?php echo esc_html( $primary_rgb );?>, 0.8);
}

<?php /*--- VC: Owl Team Slider 3 ---*/ ?>
.rt-owl-team-3 .vc-item .vc-overly {
	background-color: rgba(<?php echo esc_html( $primary_rgb );?>, 0.8);
}

<?php /*--- VC: Owl Team Slider 4 ---*/ ?>
.rt-owl-team-4 .vc-item:hover .name {
    color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Team Grid 1 ---*/ ?>
.rt-team-grid-1 .vc-overly ul li a {
    border-color: <?php echo esc_html( $primary_color );?>;
}
.rt-team-grid-1 .vc-overly ul li a:hover,
.rt-team-grid-1 .vc-meta {
    background-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Owl Class Slider 1 ---*/ ?>
.rt-owl-class-1 .single-item .single-item-content .overly .class-slider-ul-child li:first-child,
.rt-owl-class-1 .single-item:hover .single-item-meta {
    background-color: <?php echo esc_html( $primary_color );?>;
}
.rt-owl-class-1 .single-item .single-item-meta .author .fa {
    color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Owl Class Slider 2 ---*/ ?>
.rt-owl-class-2 .single-item .single-item-content .overly .class-slider-ul-child li:first-child {
    background-color: <?php echo esc_html( $primary_color );?>;
}
.rt-owl-class-2 .single-item:hover .single-item-meta .author .fa {
    color: <?php echo esc_html( $primary_color );?>;
}
.rt-owl-class-2 .single-item .single-item-content::after {
    background-color: rgba(<?php echo esc_html( $primary_rgb );?>, 0.8);
}

<?php /*--- VC: Class Grid 1 ---*/ ?>
.rt-class-grid-1 .vc-item .vc-overly .vc-grid-ul-child li:first-child,
.rt-class-grid-1 .vc-overly ul li a:hover,
.rt-class-grid-1 .vc-item:hover a.vc-meta {
    background-color: <?php echo esc_html( $primary_color );?>;
}
.rt-class-grid-1 .vc-overly ul li a {
    border: <?php echo esc_html( $primary_color );?>;
}
.rt-class-grid-1 a.vc-meta {
    color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Class Grid 2 ---*/ ?>
.rt-class-grid-2 .single-item .single-item-content::after {
    background-color: rgba(<?php echo esc_html( $primary_rgb );?>, 0.8);
}
.rt-class-grid-2 .single-item .single-item-meta h3 a {
    color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Owl Testimonial Slider 1 ---*/ ?>
.rt-owl-testimonial-1 .rt-vc-item .rt-vc-content h3:after {
    background-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Info Text 1 ---*/ ?>
.rt-info-text-1 i,
.rt-info-text-1 .media-heading a:hover {
    color: <?php echo esc_html( $primary_color );?>;
}
.rt-info-text-1 .rt-separator {
    background-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Info Text 2 ---*/ ?>
.rt-info-text-2 .media-heading a:hover {
    color: <?php echo esc_html( $primary_color );?>;
}
.rt-info-text-2 i,
.rt-info-text-2 .media-heading::after {
    background-color: <?php echo esc_html( $primary_color );?>;
}
.rt-info-text-2 .rt-separator {
    background-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Info Text 3 ---*/ ?>
.rt-info-text-3 i,
.rt-info-text-3 .media-heading a:hover {
    color: <?php echo esc_html( $primary_color );?>;
}
.rt-info-text-3 .media-heading::after {
    background-color: <?php echo esc_html( $primary_color );?>;
}
.rt-info-text-3 .rt-separator {
    background-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Class Schedule 1 ---*/ ?>
.rt-class-schedule-1,
.rt-class-schedule-1.schedule-no-background .class-schedule-tab ul,
.rt-class-schedule-1.schedule-no-background .nav-tabs li.active a,
.rt-class-schedule-1.schedule-no-background .nav-tabs li.active a:hover, 
.rt-class-schedule-1.schedule-no-background .nav-tabs li a:hover {
    background-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Owl Upcoming Class 1 ---*/ ?>
.rt-owl-upcoming-1 .rt-heading-left,
.rt-owl-upcoming-1 .rt-heading-right {
    background-color: <?php echo esc_html( $primary_color );?>;
}
.rt-owl-upcoming-1 .rt-meta i {
    color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Class Routine ---*/ ?>
.rt-routine .nav-tabs li.active a,
.rt-routine .nav-tabs li.active a:hover,
.rt-routine .nav-tabs li a:hover,
.rt-routine.rt-light .nav-tabs li.active a,
.rt-routine.rt-light .nav-tabs li.active a:hover,
.rt-routine.rt-light .nav-tabs li a:hover,
.rt-routine .rt-col-title > div,
.rt-routine.rt-light .rt-item {
    background-color: <?php echo esc_html( $primary_color );?>;
}
.rt-routine .rt-item-title {
    color: <?php echo esc_html( $primary_color );?>;
}
.rt-routine::-webkit-scrollbar-thumb {
    border-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: CTA ---*/ ?>
.rt-cta-1.default {
    background-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: CTA Signup 1 ---*/ ?>
.rt-cta-signup-1 .rt-right .rt-right-content a.rt-button {
    background-color: <?php echo esc_html( $primary_color )?>;
}

<?php /*--- VC: CTA Discount 1 ---*/ ?>
.rt-cta-discount-1 .rt-content .rt-button {
    border-color: <?php echo esc_html( $primary_color );?>;
}
.rt-cta-discount-1 .rt-button:hover {
    background-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: About 1 ---*/ ?>
.rt-about-1 .rt-left a.rt-button {
	background-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: About 3 ---*/ ?>
.rt-about-3 a.rt-button {
	background-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Pricing Box ---*/ ?>
.rt-pricing-box-1 .rt-price {
    color: <?php echo esc_html( $primary_color );?>;
}
.rt-pricing-box-1 .rt-btn a {
    border-color: <?php echo esc_html( $primary_color );?>;
}
.rt-pricing-box-1 .rt-btn a:hover {
    background-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Counter ---*/ ?>
.rt-counter-1 .rt-left .fa {
    background-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: Gallery ---*/ ?>
.rt-gallery-1 .rt-gallery-box .rt-gallery-content a i {
    color: <?php echo esc_html( $primary_color );?>;
}
.rt-gallery-1 .rt-gallery-box .rt-gallery-content a:hover,
.rt-gallery-1 .rt-gallery-tab a:hover,
.rt-gallery-1 .rt-gallery-tab .current {
    background-color: <?php echo esc_html( $primary_color );?>;
}
.rt-gallery-1 .rt-gallery-tab a,
.rt-gallery-1 .rt-gallery-tab a:hover,
.rt-gallery-1 .rt-gallery-tab .current {
    border-color: <?php echo esc_html( $primary_color );?>;
}

<?php /*--- VC: BMI Calculator ---*/ ?>
.rt-bmi-calculator .rt-bmi-submit:hover {
    background-color: <?php echo esc_html( $primary_color );?>;
}
.rt-bmi-calculator .bmi-chart th,
.rt-bmi-calculator .bmi-chart td {
    background-color: rgba(<?php echo esc_html( $primary_rgb );?>,.9);
}

<?php /*--- VC: Default Accordian ---*/ ?>
.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title > a:hover,
.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a {
    background-color: <?php echo esc_html( $primary_color );?> !important;
    border-color: <?php echo esc_html( $primary_color );?> !important;
}