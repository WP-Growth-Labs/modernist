jQuery(window).on('load', function($) {

	// Images loaded is zero because we're going to process a new set of images.
  var imagesLoaded = 0
  // Total images is still the total number of <img> elements on the page.
  var totalImages = $("img").length

  // Step through each image in the DOM, clone it, attach an onload event
  // listener, then set its source to the source of the original image. When
  // that new image has loaded, fire the imageLoaded() callback.
  $("img").each(function (idx, img) {
    $("<img>").on("load", imageLoaded).attr("src", $(img).attr("src"))
  })

  // Do exactly as we had before -- increment the loaded count and if all are
  // loaded, call the allImagesLoaded() function.
  function imageLoaded() {
    imagesLoaded++;
    if (imagesLoaded == totalImages) {
		setTimeout(function() {

      		allImagesLoaded();

      		console.log('done');

      	}, 1000);
    }
  }

  function allImagesLoaded() {

		$('#page .block-separator').each(function() {

		    var currentSeparator = $(this);
		    var padding = parseInt( $(this).outerHeight() / 2 );

		    var oldPrevPadding = parseInt( $(this).prev().css('padding-bottom').replace("px", "") );
		    var prevPadding = oldPrevPadding + padding;
		    $(this).prev().css('padding-bottom', prevPadding + 'px');
		    $(this).css('margin-top', '-' + padding + 'px');
		    
		    if( $(this).next() ) {
			    
			    var oldNextPadding = parseInt( $(this).next().css('padding-top').replace("px", "") );
			    var nextPadding = oldNextPadding + padding;
			    $(this).css('margin-bottom', '-' + padding + 'px');
			    $(this).next().css('padding-top', nextPadding + 'px');

			};
		});
	};

}(jQuery));