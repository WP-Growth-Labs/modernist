jQuery(document).ready(function($) {

	var win = $(window);
	var player = $('lottie-player');

	win.scroll(function(event) {
		player.each(function() {

			if( player.visible(true) && !player.hasClass('played') ) {

				//player.play();

			}

		});
	});

	win.load(function(event) {
		player.each(function() {

			if( player.visible(true) && !player.hasClass('played') ) {

				//player.play();

			}

		});
	});

}(jQuery));