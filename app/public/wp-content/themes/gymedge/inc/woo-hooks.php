<?php
// Function - Short description
// Use excerpt when description doesn't exist
if ( ! function_exists( 'woocommerce_template_single_excerpt' ) ) {
	function woocommerce_template_single_excerpt() {
		global $post;
		if ( ! $post->post_excerpt && !GymEdge::$options['wc_show_excerpt'] ) {
			return false;
		}

		echo '<div class="short-description">';
		if ( ! $post->post_excerpt ) {
			the_excerpt();
		}
		else {
			wc_get_template( 'single-product/short-description.php' );
		}
		echo '</div>';
	}
}

/* Header cart count number */
add_filter( 'woocommerce_add_to_cart_fragments', 'gymedge_header_cart_count' );
function gymedge_header_cart_count( $fragments ) {
	global $woocommerce;
	ob_start();?>
	<span class="cart-icon-num"><?php echo WC()->cart->get_cart_contents_count();?></span>
	<?php
	$fragments['span.cart-icon-num'] = ob_get_clean();
	return $fragments;
}

/* Breadcrumb */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

add_filter( 'woocommerce_breadcrumb_defaults', 'gymedge_wc_breadcrumb' );
function gymedge_wc_breadcrumb( $defaults ){
	$args = array(
		'delimiter'   => '<span class="breadcrumb-seperator">&#47;</span>',
		'wrap_before' => '',
		'wrap_after'  => '',
		'before'      => '<span>',
		'after'       => '</span>',
		'home'        => $defaults['home']
	);
	return $args;
}

/* Modify responsive smallscreen size */
add_filter( 'woocommerce_style_smallscreen_breakpoint', 'gymedge_smallscreen_breakpoint' );
function gymedge_smallscreen_breakpoint(){
	return '767px';
}

/* Shop hide default page title */
add_filter( 'woocommerce_show_page_title', 'gymedge_wc_hide_page_title' );
function gymedge_wc_hide_page_title(){
	return false;
}

/* Shop products per page */
add_filter( 'loop_shop_per_page', 'gymedge_wc_loop_shop_per_page' );
function gymedge_wc_loop_shop_per_page(){
	return GymEdge::$options['wc_num_product'];
}

/* Shop/Archive Wrapper */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', 'gymedge_wc_wrapper_start', 10 );
function gymedge_wc_wrapper_start() {
	get_template_part( 'wc-template-parts/content', 'shop-header' );
}

add_action( 'woocommerce_after_main_content', 'gymedge_wc_wrapper_end', 10 );
function gymedge_wc_wrapper_end() {
	get_template_part( 'wc-template-parts/content', 'shop-footer' );
}

/* Shop top tab */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

add_action( 'woocommerce_before_shop_loop', 'gymedge_wc_shop_topbar', 20 );
function gymedge_wc_shop_topbar(){
	get_template_part( 'wc-template-parts/content', 'shop-top' );
}

/* Shop loop */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

add_action( 'woocommerce_shop_loop_item_title', 'gymedge_wc_loop_product_title', 10 );
function gymedge_wc_loop_product_title(){
	echo '<h3><a href="' . get_the_permalink() . '" class="woocommerce-LoopProduct-link">' . get_the_title() . '</a></h3>';
}

add_filter( 'loop_shop_columns', 'gymedge_wc_loop_shop_columns' );
add_filter( 'woocommerce_upsells_columns', 'gymedge_wc_loop_shop_columns' );
function gymedge_wc_loop_shop_columns(){
	if ( GymEdge::$layout == 'full-width' ) {
		return 4;
	}
	return 3;
}

add_action( 'woocommerce_before_shop_loop_item_title', 'gymedge_wc_shop_thumb_area', 11 );
function gymedge_wc_shop_thumb_area(){
	get_template_part( 'wc-template-parts/content', 'shop-thumb' );
}

add_action( 'woocommerce_before_shop_loop_item_title', 'gymedge_wc_shop_info_wrap_start', 12 );
function gymedge_wc_shop_info_wrap_start(){
	echo '<div class="product-info-area">';
}

add_action( 'woocommerce_after_shop_loop_item_title', 'gymedge_wc_shop_add_description', 12 );
function gymedge_wc_shop_add_description(){
	if ( is_shop() || is_product_category() || is_product_tag() ) {
		global $post;
		echo '<div class="shop-excerpt grid-hide"><div class="short-description">';
		the_excerpt();
		echo '</div></div>';	
	}

}

add_action( 'woocommerce_after_shop_loop_item', 'gymedge_wc_shop_info_wrap_end', 12 );
function gymedge_wc_shop_info_wrap_end(){
	echo '</div><div class="clear"></div>';
}

/* Single Product */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

add_action( 'woocommerce_single_product_summary', 'gymedge_wc_render_sku', 15 );
function gymedge_wc_render_sku(){ 
	get_template_part( 'wc-template-parts/content', 'product-sku' );
}

add_action( 'woocommerce_single_product_summary', 'gymedge_wc_render_meta', 40 );
function gymedge_wc_render_meta(){
	get_template_part( 'wc-template-parts/content', 'product-meta' );
}

add_action( 'init', 'gymedge_wc_show_or_hide_related_products' );
function gymedge_wc_show_or_hide_related_products(){
	// Show or hide related products
	if ( empty( GymEdge::$options['wc_related'] ) ) {
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	}
}

// Hide product data tabs
add_filter( 'woocommerce_product_tabs', 'gymedge_wc_hide_product_data_tab' );
function gymedge_wc_hide_product_data_tab( $tabs ){
	if ( empty( GymEdge::$options['wc_description'] ) ) {
		unset( $tabs['description'] );
	}
	if ( empty( GymEdge::$options['wc_reviews'] ) ) {
		unset( $tabs['reviews'] );
	}
	if ( empty( GymEdge::$options['wc_additional_info'] ) ) {
		unset( $tabs['additional_information'] );
	}
	return $tabs;
}

add_filter( 'woocommerce_product_review_comment_form_args', 'gymedge_wc_product_review_form' );
function gymedge_wc_product_review_form( $comment_form ){
	$commenter = wp_get_current_commenter();

	$comment_form['fields'] = array(
		'author' => '<div class="row"><div class="col-sm-6"><div class="comment-form-author form-group"><input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="' . __( 'Name *', 'gymedge' ) . '" aria-required="true" required /></div></div>',
		'email'  => '<div class="comment-form-email col-sm-6"><div class="form-group"><input id="email" class="form-control" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="' . __( 'Email *', 'gymedge' ) . '" aria-required="true" required /></div></div></div>',
	);

	$comment_form['comment_field'] = '';

	if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
		$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . __( 'Your Rating', 'gymedge' ) .'</label>
		<select name="rating" id="rating" aria-required="true" required>
			<option value="">' . __( 'Rate&hellip;', 'gymedge' ) . '</option>
			<option value="5">' . __( 'Perfect', 'gymedge' ) . '</option>
			<option value="4">' . __( 'Good', 'gymedge' ) . '</option>
			<option value="3">' . __( 'Average', 'gymedge' ) . '</option>
			<option value="2">' . __( 'Not that bad', 'gymedge' ) . '</option>
			<option value="1">' . __( 'Very Poor', 'gymedge' ) . '</option>
		</select></p>';
	}

	$comment_form['comment_field'] .= '<div class="col-sm-12 acurate"><div class="form-group comment-form-comment"><textarea id="comment" name="comment" class="form-control" placeholder="' . __( 'Your Review *', 'gymedge' ) . '" cols="45" rows="8" aria-required="true" required></textarea></div></div>';

	return $comment_form;
}

/* Cart */
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 );
add_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals' );

add_action( 'init', 'gymedge_wc_show_or_hide_cross_sells' );
function gymedge_wc_show_or_hide_cross_sells(){
	// Show or hide related cross sells
	if ( !empty( GymEdge::$options['wc_cross_sell'] ) ) {
		add_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10 );
	}
}

// Yith Quickview
if ( function_exists( 'YITH_WCQV_Frontend' ) ) {
	remove_action( 'woocommerce_after_shop_loop_item', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
	remove_action( 'yith_wcwl_table_after_product_name', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
}
