jQuery(document).ready(function($) {

	$('.tab-navigation .desktop .tab-nav-item span, .tab-navigation .mobile select').on('click change', function(e) {

		if( $(this).is('span') ) {
			var target = $(this).parent().attr('data-target');
		} else {
			var target = $(this).val();
		}

		$(this).parent().addClass('active');
		$(this).parent().siblings().removeClass('active');

		console.log(target);
		$(this).parents('.tab-navigation').siblings('.tab-panels').children().removeClass('active').fadeOut('fast');
		$(this).parents('.tab-navigation').siblings('.tab-panels').children('*[data-panel="' + target + '"]').addClass('active').fadeIn('slow');

		$(this).parents('.tab-navigation').siblings('.tab-ctas').children().removeClass('active').hide();
		$(this).parents('.tab-navigation').siblings('.tab-ctas').children('*[data-cta="' + target + '"]').addClass('active').show();

	});
	
}(jQuery));