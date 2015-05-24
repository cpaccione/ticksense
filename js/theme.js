(function($){

$(window).load(function() {
	$('.featured-masonry ul').masonry({
		columnWidth: 188,
		itemSelector: 'li.masonry-item'
	});
});

})(jQuery)