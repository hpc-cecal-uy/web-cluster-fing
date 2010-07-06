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

$(document).ready(function(){
	  var currentPosition = 0;
	  var slideWidth = 560;
	  var slides = $('.slide');
	  var numberOfSlides = slides.length;

	  // Remove scrollbar in JS
	  $('#slidesContainer').css('overflow', 'hidden');

	  // Wrap all .slides with #slideInner div
	  slides
	    .wrapAll('<div id="slideInner"></div>')
	    // Float left to display horizontally, readjust .slides width
		.css({
	      'float' : 'left',
	      'width' : slideWidth
	    });

	  // Set #slideInner width equal to total width of all slides
	  $('#slideInner').css('width', slideWidth * numberOfSlides);

	  // Insert controls in the DOM
	  $('#slideshow')
	    .prepend('<span class="control" id="leftControl">Clicking moves left</span>')
	    .append('<span class="control" id="rightControl">Clicking moves right</span>');

	  // Hide left arrow control on first load
	  manageControls(currentPosition);

	  // Create event listeners for .controls clicks
	  $('.control')
	    .bind('click', function(){
	    // Determine new position
		currentPosition = ($(this).attr('id')=='rightControl') ? currentPosition+1 : currentPosition-1;
	    
		// Hide / show controls
	    manageControls(currentPosition);
	    // Move slideInner using margin-left
	    $('#slideInner').animate({
	      'marginLeft' : slideWidth*(-currentPosition)
	    });
	  });

	  // manageControls: Hides and Shows controls depending on currentPosition
	  function manageControls(position){
	    // Hide left arrow if position is first slide
		if(position==0){ $('#leftControl').hide(); } else{ $('#leftControl').show(); }
		// Hide right arrow if position is last slide
	    if(position==numberOfSlides-1){ $('#rightControl').hide() } else{ $('#rightControl').show(); }
	  }	
});