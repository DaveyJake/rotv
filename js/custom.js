(function($){

	$time = $('td.time');
	$time.each(function(){
		var $this = $(this);
		var timeText = $this.text();
		var num = /[0-9:]+/;
		var timeNumbers = timeText.match(num).join(''); 
		var txt = /[ampAMP]{2}/;
		var ampm = timeText.match(txt).join('');

		$this.text(timeNumbers+' '+ampm);
		
	});

})(jQuery);