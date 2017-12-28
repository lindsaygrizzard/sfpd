<?php
global $product;
do_action( 'woocommerce_product_meta_start' );
$cats_html = wc_get_product_category_list( $product->get_id(), ', ', '<div class="product-meta"><span>' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'gymedge' ) . '</span> ', '</div>' );
$tags_html = wc_get_product_tag_list( $product->get_id(), ', ', '<div class="product-meta"><span>' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'gymedge' ) . '</span> ', '</div>' );
echo wp_kses_post( $cats_html );
echo wp_kses_post( $tags_html );
do_action( 'woocommerce_product_meta_end' );