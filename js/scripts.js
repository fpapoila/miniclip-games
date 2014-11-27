;(function($){
	// make the buttons pop open the game
	$(document).ready(function(){
		$('.mc-game-play').on('click', function(e) {
			e.preventDefault();

			var $this = $(this);
			var target = '#' + $this.data('target');

			$(target).show();

			return false;
		});

		// add close buttons to game containers
		$('.mc-game-popup').each(function(){
			var close = $('<a href="" class="mc-close-button">x</a>');

			close.on('click', function(e) {
				e.preventDefault();
				$(this).parent().hide();
				return false;
			});

			$(this).append(close);
		});

		$('.mc-game-popup').on('click', function(e) {
			e.preventDefault();
			e.stopPropagation();
			$(this).hide();
			return false;
		});
	});
})( jQuery );