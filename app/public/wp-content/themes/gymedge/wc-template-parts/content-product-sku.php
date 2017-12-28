<?php
global $product;?>
<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
	<div class="sku">
		<span><?php _e( 'SKU:', 'gymedge' ); ?>: <?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'gymedge' ); ?></span>
	</div>
<?php endif;