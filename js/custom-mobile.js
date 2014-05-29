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


		if(documentary||movie||tvShow){
			function chkTrailer(){
				var trailer = $('.trailer').html();
				if(trailer){
					$('.program-mobile > h3 > span').css('display','none');
					return trailer;
				}
			}
			$(this).append('<div class="program-mobile"><h3>'+ progTitle +'</h3><p>'+ prog + chkTrailer() +'</p><p>'+date+' - '+time+' ET - '+network+'</p></div>');
		}
		else if($('.live')) {
			$(this).append('<div class="program-mobile live"><h3>'+prog+'</h3><p>'+progDesc+'</p><p>'+date+' - '+time+' ET - '+network+'</p></div>');	
		}
		else { $(this).append('<div class="program-mobile"><h3>'+prog+'</h3><p>'+progDesc+'</p><p>'+date+' - '+time+' ET - '+network+'</p></div>'); }
		
	});

})(jQuery);