<?php
add_filter( 'get_search_form', 'gymedge_search_form' );
if ( !function_exists( 'gymedge_search_form' ) ) {
	function gymedge_search_form(){
		$output =  '
		<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
			<div class="custom-search-input">
				<div class="input-group col-md-12">
				<input type="text" class="search-query form-control" placeholder="' . esc_attr__( 'Search here ...', 'gymedge' ) . '" value="' . get_search_query() . '" name="s" />
					<span class="input-group-btn">
						<button class="btn btn-danger" type="submit">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</span>
				</div>
			</div>
		</form>
		';
		return $output;
	}
}