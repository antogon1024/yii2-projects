$(document).ready(function(){
	(function(){
		function test(){
			var h = $('.wrap').height() - $('#w0').outerHeight(true);
			$("#main-row").children().each(function(){
				$(this).css('height', h+'px');
			});
		}
		
		$(window).resize(function() {
			test();
		});
		
		test();
	})();	
});