jQuery(document).ready(function($){

	'use strict',

	// For classic editor
	$('#post-formats-select input').on('change', checkFormate);

	function checkFormate(){

		var formate = $('#post-formats-select input:checked').attr('value');

		if(typeof formate != 'undefined'){
			$('div[id^=tt-post-format-]').hide();
			$('div[id^=tt-post-format-'+formate+']').stop(true,true).fadeIn(600);
		}
	}

	// For gutenberg editor
	function NomineePostFormate(){
		$('div[id^=tt-post-format-]').hide();

		var selected = $('.components-select-control__input').attr('value');

		$('div[id^=tt-post-format-'+selected+']').stop(true,true).fadeIn(600);

		$('.components-select-control__input').on('change', function(){

			$('div[id^=tt-post-format-]').hide();

			$('div[id^=tt-post-format-'+this.value+']').stop(true,true).fadeIn(600);
			
		});
	}

	$(window).on('load', function(){
		'use strict',
		checkFormate();
		NomineePostFormate();

		$('.edit-post-sidebar__panel-tabs > ul > li:first-child .edit-post-sidebar__panel-tab').on('click', function(){
			setTimeout(function(){
				NomineePostFormate();
			}, 300);
		});
	});
});