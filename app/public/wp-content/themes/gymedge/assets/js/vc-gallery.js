(function($){
	"use strict";

	$(document).ready(function() {
		$('.rt-gallery-1 .rt-gallery-box').magnificPopup({
			delegate: 'a',
			type: 'image',
			gallery:{enabled:true}
		});
	});
	
	$(window).on('load',function(){
		var $rtGalleryContainer = $('.rt-gallery-1 .rt-gallery-wrapper');
		$rtGalleryContainer.isotope({
			filter: '*',
			animationOptions: {
				duration: 750,
				easing: 'linear',
				queue: false
			}
		});
		$('.rt-gallery-tab a').on('click',function(){
			$(this).closest('.rt-gallery-tab').find('.current').removeClass('current');
			$(this).addClass('current');     
			var selector = $(this).attr('data-filter');
			$rtGalleryContainer.isotope({
				filter: selector,
				animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false
				}
			});
			return false;
		}); 
	});
	
})(jQuery);

