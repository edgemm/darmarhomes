/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
* Copyright by WebMan - www.webmandesign.eu
*
* Simple slider
*****************************************************
*/
jQuery.fn.simpleSlider = function( options ) {

	return this.each( function() {

		var e                = null,
		    imgList          = jQuery( this ).addClass( 'simpleSlider' ),
		    transitionTime   = ( options.transitionTime ) ? options.transitionTime : 400,
		    slideDuration    = ( options.slideDuration ) ? options.slideDuration : 5000,
		    slideHeight      = imgList.find( 'figure:first-child img' ).height(),
		    slideCount       = imgList.children( 'figure' ).length,
		    notHovering      = true,
		    hoveringElements = '.simpleSlider figure, .simpleSlider-nav',
		    showImg          = false;

		imgList.height( slideHeight ).find( 'figure:first-child' ).addClass( 'active' );

		//Animation
		var simpleSlider = function ( imgList, showImg, slideCount, slideHeight, transitionTime ) {
			if ( true === notHovering ) {
				var currentActive = imgList.find( 'figure.active' ),
				    currentIndex  = currentActive.index() + 1,
				    nextIndex     = ( showImg ) ? ( showImg % slideCount ) : ( ( currentIndex + 1 ) % slideCount ),
				    sliderHeight  = imgList.find( 'figure' ).eq( nextIndex - 1 ).find( 'img' ).height();

				//animate
				currentActive.stop()
					.animate({ opacity: 0 }, transitionTime, function() {
							jQuery( this ).css({ top: slideHeight, opacity: 0 });
						} );

				imgList.find( 'figure' )
					.eq( nextIndex - 1 )
					.stop()
					.css({ top: 0, opacity: 0 })
					.addClass( 'active' )
					.animate({ opacity: 1.0 }, transitionTime )
					.siblings( 'figure' )
					.removeClass( 'active' );

				if ( imgList.hasClass( 'dynamic-height' ) )
					imgList.animate({ height: sliderHeight }, 250 );

				jQuery( '.simpleSlider-nav a' ).eq( nextIndex - 1 ).addClass( 'active' ).siblings( 'a' ).removeClass( 'active' );

				showImg = false;
			} // /if notHovering
		}; // /simpleSlider

		//animation navigation
		imgList.append( '<div class="simpleSlider-nav">' );
		if ( 1 < slideCount ) {
			for ( var i = 1; i <= slideCount; i++ ) {
				jQuery( '.simpleSlider-nav' ).append( '<a>' + i + '</a>' );
			}
		}

		jQuery( '.simpleSlider-nav a:first-child' ).addClass( 'active' );

		jQuery( '.simpleSlider-nav a' ).click( function() {
			if ( ! jQuery( this ).hasClass( 'active' ) ) {
				showImg = jQuery( this ).index() + 1;
				notHovering = true;

				simpleSlider( imgList, showImg, slideCount, slideHeight, transitionTime );

				notHovering = false;

				return false;
			} // /if .active
		} );

		//autoplay/pause on mouseover
		jQuery( hoveringElements ).hover( function() {
			notHovering = false;
		}, function() {
			notHovering = true;
		} );

		var switchSlide = function(){
			showImg = false;
			simpleSlider( imgList, showImg, slideCount, slideHeight, transitionTime );
		};

		if ( 1 < slideCount )
			setInterval( switchSlide, slideDuration );

	} );

};