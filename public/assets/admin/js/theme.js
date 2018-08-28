$(document).ready(function(){
	$('.theme-option li.theme').click(function(){
		var theme = $(this).data('style');
		Theme(theme).saveTheme();
	})
});