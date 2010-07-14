/*
 * FeatureList - simple and easy creation of an interactive "Featured Items" widget
 * Examples and documentation at: http://jqueryglobe.com/article/feature_list/
 * Version: 1.0.0 (01/09/2009)
 * Copyright (c) 2009 jQueryGlobe
 * Licensed under the MIT License: http://en.wikipedia.org/wiki/MIT_License
 * Requires: jQuery v1.3+
*/
;(function($) {
	$.fn.featureList = function(options) {
		var tabs	= $(this);
		var output	= $(options.output);

		new jQuery.featureList(tabs, output, options);

		return this;	
	};

	$.featureList = function(tabs, output, options) {
		function slide(nr) {
			tabs.removeClass('current').filter(":eq(" + nr + ")").addClass('current');

			/*output.filter(":visible").stop(true,true).fadeOut();
			output.filter(":eq(" + nr + ")").stop(true,true).fadeIn();*/

			output.filter(":visible").hide();
			output.filter(":eq(" + nr + ")").show();
		}

		tabs.click(function() {
			if ($(this).hasClass('current')) {
				return false;	
			}

			slide( tabs.index( this) );
		});
	};
})(jQuery);
