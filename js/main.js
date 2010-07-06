$(window).load(function() {
	var total = $('#slider img').length;
	var rand = Math.floor(Math.random()*total);

	$('#foto-slider').nivoSlider({
		effect:'sliceUp', //,sliceDown,sliceDownLeft,sliceUp,sliceUpLeft,sliceUpDown,sliceUpDownLeft,fold,fade,random
		slices:15,
		animSpeed:500,
		pauseTime:3000,
		startSlide:rand, //Set starting Slide (0 index)
		directionNav:false, //Next & Prev
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		controlNavThumbsFromRel:false, //Use image rel for thumbs
		controlNavThumbsSearch:'.jpg', //Replace this with...
		controlNavThumbsReplace:'_thumb.jpg', //...this in thumb Image src
		keyboardNav:false, //Use left & right arrows
		pauseOnHover:false, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
