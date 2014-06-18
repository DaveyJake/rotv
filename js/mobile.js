(function($) {
    var $window = $(window),
        $html = $('html'),
        $body = $('body');

    function resize() {
        if ($window.width() < 641) {
            return $body.addClass('mobile');
        }
        $body.removeClass('mobile');
    }

    $window.resize(resize).trigger('resize');

	$('#page').prepend('<div class="date-divider"><span id="today"></span> - <span id="final-day"></span></div>');

	var mobileSchedule = document.createElement('ul');
	$(mobileSchedule).attr('class', 'mobile-schedule');

	$('.program-wrapper').each(function(){
		var date = $(this).children('.date').html();
		var prog = $(this).children('.program').html();
		var documentary = $(this).children('.documentary').html();
		var movie = $(this).children('.movie').html();
		var tvShow = $(this).children('.tv-show').html();
		var progDesc = $(this).children('.program-description').html();
		var progTitle = $(this).children('.program-title').html();
		var time = $(this).children('.time').html();
		var network = $(this).children('.network').html();

		
		
	});

})(jQuery);