(function($){

$(window).load(function() {
	$('.featured-masonry ul').masonry({
		columnWidth: 188,
		itemSelector: 'li.masonry-item'
	});
});

//Rollover Banner Titles
$('.masonry-item a').on('mouseenter', function(){
	$(this).find('.imagetitle').fadeTo(200, 1);
});

$('.masonry-item a').on('mouseleave', function(){
	$(this).find('.imagetitle').fadeTo(200, 0);
});

})(jQuery)