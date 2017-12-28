jQuery(document).ready(function($){
	'use strict';

	// ColorPicker, Datepicker, Timepickers
	var $postmetaContainer = $(".rt-postmeta-container");
	executePickers($postmetaContainer);

	// initialize conditionals
	$( ".rt-postmeta-container .rt-postmeta-dependent" ).each(function() {
		var name  = $( this ).data('required');
		var value = $( this ).data('required-value');

		var $input = $( "input[name=" + name +"]" );
		var inputType = $input.attr('type');

		var fieldValue = null;

		// radio
		if ( inputType == 'radio' ) {
			fieldValue = $( "input[name=" + name +"]:checked" ).val();
		}

		//action
		if ( value != fieldValue ) {
			$( this ).hide();
		}
	});

	// radio field onchange conditional
	$( ".rt-postmeta-container input[type=radio]" ).on('change', function() {
		var name = $( this ).attr('name');
		var value = $( this ).val();

		// hide
		$( '.rt-postmeta-container tr[data-required="'+name+'"]' )
		.filter(function () {
			return $(this).data("required-value") != value;
		}).hide();

		// show
		$( '.rt-postmeta-container tr[data-required="'+name+'"]' )
		.filter(function () {
			return $(this).data("required-value") == value;
		}).show();

	});

	/*Repeater*/

	// Generate close button
	var repeaterCloseHtml = '<a class="rt-postmeta-repeater-close"></a>'
	$(".rt-postmeta-repeater tr:last-child td").append(repeaterCloseHtml);

	// Close button action
	$(".rt-postmeta-repeater-wrap").on('click', '.rt-postmeta-repeater-close', function(event) {
		$(this).closest('.rt-postmeta-repeater').fadeOut("fast", function(){ $(this).remove(); })
	});

	// Add more button action
	$( ".rt-postmeta-container .rt-postmeta-repeater-addmore" ).on('click', 'button', function(event) {

		// Num Data
		var $wrapper = $(this).closest('.rt-postmeta-repeater-wrap');
		var oldNum = $wrapper.data('num');
		var newNum = oldNum + 1;
		$wrapper.data('num', newNum);

		// Generate contents
		var $repeaterContent = $wrapper.find(".rt-postmeta-repeater:first-child");

		var inputField = $wrapper.data('fieldname');;

		inputField = inputField.split('[')[0];
		var replaceString = inputField + '\\[hidden\\]';
		var replaceWith   = inputField + '[' + oldNum +']';
		var replaceString = new RegExp (replaceString , "g");

		var repeaterHtml = $repeaterContent[0].innerHTML.replace(replaceString, replaceWith);

		var newElement =  document.createElement('table');
		newElement.className = 'rt-postmeta-repeater';
		newElement.innerHTML = repeaterHtml;

		// Execute contents
		$(this).closest('.rt-postmeta-repeater-addmore').before(newElement);

		// Pickers
		var $pickerWrapper = $wrapper.find(".rt-postmeta-repeater:last-child");
		executePickers($(newElement));

		return false;
	});

	// Enable Sortable
	$(".rt-postmeta-repeater-wrap").sortable({
		items: '.rt-postmeta-repeater',
		cursor: "move"
	});

	function executePickers($wrapperObj) {
		$wrapperObj.find(".rt-metabox-colorpicker").wpColorPicker();
		$wrapperObj.find(".rt-metabox-datepicker" ).datepicker({
			dateFormat : "MM dd, yy"
		});

		$wrapperObj.find('.rt-metabox-timepicker').timepicker({'step': '15'});
		$wrapperObj.find('.rt-metabox-timepicker-24').timepicker({'timeFormat': 'H:i','step': '15'});
	}

	// Image upload field
	$("body").on('click', '.rt_upload_image', function(event) {
		var btnClicked = $(this);
		var custom_uploader = wp.media({
			multiple: false
		}).on("select", function () {
			var attachment = custom_uploader.state().get("selection").first().toJSON();
			btnClicked.closest(".rt_metabox_image").find(".custom_upload_image").val(attachment.id);
			btnClicked.closest(".rt_metabox_image").find(".custom_preview_image").attr("src", attachment.url).show();
			btnClicked.closest(".rt_metabox_image").find(".rt_remove_image_wrap").show();

		}).open();
		
	});
	$("body").on('click', '.rt_remove_image', function(event) {
		event.preventDefault();
		$(this).closest(".rt_metabox_image").find(".custom_upload_image").val("");
		$(this).closest(".rt_metabox_image").find(".custom_preview_image").attr("src", "").hide();
		$(this).closest(".rt_metabox_image").find(".rt_remove_image_wrap").hide();
		return false;
	});

});