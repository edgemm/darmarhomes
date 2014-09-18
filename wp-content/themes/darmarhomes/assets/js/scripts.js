/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
* Copyright by WebMan - www.webmandesign.eu
*
* Theme scripts
*****************************************************
*/

/*
*****************************************************
*      NO SPAM JQUERY EXTENSION
*****************************************************
*/
jQuery.fn.nospam = function( settings ) {

	return this.each( function() {

		var e     = null,
		    $this = jQuery( this );

		// 'normal'
		if ( jQuery( this ).is( 'a[data-address]' ) ) {
			e = $this.data( 'address' ).split( '' ).reverse().join( '' ).replace( '[at]', '@' ).replace( /\//g, '.' );
		} else {
			e = $this.text().split( '' ).reverse().join( '' ).replace( '[at]', '@' ).replace( /\//g, '.' );
		}

		if ( e ) {
			if ( $this.is( 'a[data-address]' ) ) {
				$this.attr( 'href', 'mailto:' + e );
				$this.text( e );
			} else {
				$this.text( e );
			}
		}

	} );

};





jQuery( function() {



/*
*****************************************************
*      DEFAULT ACTIONS
*****************************************************
*/
jQuery( '.no-js' ).removeClass( 'no-js' );

//setting call to action text padding
var boxedPadding = ( jQuery( 'body' ).hasClass( 'boxed' ) ) ? ( ( jQuery( '#wrap' ).outerWidth() - 960 ) / 2 ) : ( 0 );
jQuery( '.cta' ).not( '.no-btn' ).css({ paddingRight : ( jQuery( '.cta .btn' ).outerWidth() + 60 + boxedPadding ) }).find( '.cta-text' ).css({ width: '100%' }); //the final width settings is for Safari 4

//link effect
jQuery( '.main a > img, .widget a > img' ).hover( function() {
		jQuery( this ).stop().animate( { opacity: 0.33 }, 250 );
	}, function() {
		jQuery( this ).stop().animate( { opacity: 1 }, 250 );
	} );

//social links effect
jQuery( '.social-links a' ).css({ opacity: 0.5 });
jQuery( '.social-links a' ).hover( function() {
		jQuery( this ).stop().animate( { opacity: 1 }, 250 ).siblings().stop().animate( { opacity: 0.2 }, 250 );
	}, function() {
		jQuery( this ).stop().animate( { opacity: 0.5 }, 250 ).siblings().stop().animate( { opacity: 0.5 }, 250 );
	} );



/*
*****************************************************
*      APPLY TIPSY
*****************************************************
*/
if ( jQuery().tipsy ) {
	jQuery( '.show-tooltip, .show-tooltip-child-links a' ).tipsy( {
			fade    : true,
			gravity : 's',
			title   : 'title',
			offset  : 10,
			opacity : 0.95
		} );
} // /tipsy



/*
*****************************************************
*      MENU
*****************************************************
*/
jQuery( '#nav-main li' ).hover( function() {
		jQuery( this ).find( '> ul' ).stop( true, true ).fadeIn();
	}, function() {
		jQuery( this ).find( '> ul' ).stop( true, true ).fadeOut();
	});



/*
*****************************************************
*      VIDEO SLIDER COVER IMAGE
*****************************************************
*/
jQuery( '#video-slider.has-cover .video-container' ).hide();
jQuery( '#video-slider.has-cover .video-cover' ).click( function() {
		var srcAtt = jQuery( '#video-slider.has-cover .video-container iframe' ).attr( 'src' );

		jQuery( this ).hide().prev( '.video-container' ).show();

		if ( -1 == srcAtt.indexOf( '?' ) )
			srcAtt += '?autoplay=1';
		else
			srcAtt += '&amp;autoplay=1';
		jQuery( '#video-slider.has-cover .video-container iframe' ).attr( 'src', srcAtt );
	});




/*
*****************************************************
*      PORTFOLIO LIST EFFECT
*****************************************************
*/
/* also reapplied in portfolio.js on QuickSand animation */
jQuery( '.portfolio-content .desc' ).css( { left: -220, top: -220 } );
jQuery( '.portfolio-content li' ).hover( function(){
		jQuery( this ).find( '.desc' ).stop().animate( { left: 0, top: 0 }, 150 );
	}, function(){
		jQuery( this ).find( '.desc' ).stop().animate( { left: -220, top: -220 }, 150 );
	});

//Portfolio filter
jQuery( '#portfolio-filterable .portfolio-nav.hide-filter-cats' ).hover( function() {
		jQuery( '.portfolio-nav.hide-filter-cats li' ).stop( true, true ).fadeIn();
	}, function() {
		jQuery( '.portfolio-nav.hide-filter-cats li' ).not( '.active').stop( true, true ).fadeOut();
	});



/*
*****************************************************
*      PORTFOLIO SLIDER
*****************************************************
*/
var portfolioSlideDuration = jQuery( '.portfolio-slider' ).data( 'duration' );
if ( jQuery().simpleSlider ) {
	jQuery( '.portfolio-slider' ).simpleSlider( {
		transitionTime: 400,
		slideDuration: portfolioSlideDuration
	} );
} // /slimpleSlider



/*
*****************************************************
*      APPLY PRETTYPHOTO
*****************************************************
*/
if ( jQuery().prettyPhoto ) {
	var thumbnails = 'a[href$=".bmp"],a[href$=".gif"],a[href$=".jpg"],a[href$=".jpeg"],a[href$=".png"],a[href$=".BMP"],a[href$=".GIF"],a[href$=".JPG"],a[href$=".JPEG"],a[href$=".PNG"]',
	    zoomObjects = jQuery( thumbnails + ', a[data-modal]' ),
	    autoplayGallery = false;

	if ( 1 < zoomObjects.length ) {
		zoomObjects.attr('rel', 'prettyPhoto[gallery]');
		autoplayGallery = true;
	}

	zoomObjects.prettyPhoto( {
		show_title         : false,
		theme              : 'pp_default',
		slideshow          : 7000,
		autoplay_slideshow : autoplayGallery,
		deeplinking        : true,
		overlay_gallery    : false,
		social_tools       : false
		} );

	zoomObjects.find( 'img' ).wrap( '<span class="zoomable" />' );
	jQuery( 'a img.alignleft' ).removeClass( 'alignleft' ).parent( '.zoomable' ).addClass( 'alignleft' );
	jQuery( 'a img.alignright' ).removeClass( 'alignright' ).parent( '.zoomable' ).addClass( 'alignright' );
	jQuery( 'a img.aligncenter' ).removeClass( 'aligncenter' ).parent( '.zoomable' ).addClass( 'aligncenter' );

	zoomObjects.hover( function() {
			jQuery( this ).find( '.zoomable img' ).stop().animate( { opacity: 0.33 }, 250 );
		}, function() {
			jQuery( this ).find( '.zoomable img' ).stop().animate( { opacity: 1 }, 250 );
		} );
} // /prettyPhoto



/*
*****************************************************
*      CONTACT BUTTON ACTION
*****************************************************
*/
jQuery( '#contact-link' ).click( function() {
	jQuery( this ).attr( 'hideFocus', 'true' ).parent().toggleClass( 'active' );
	jQuery( '#contact-section .contact-content' ).slideToggle();
	return false;
} );



/*
*****************************************************
*      APPLY EMAIL SPAM PROTECTION
*****************************************************
*/
jQuery( 'a.email-nospam' ).nospam();



/*
*****************************************************
*      CREATE TABS
*****************************************************
*/
if ( jQuery( 'div.tabs-wrapper' ).length ) {

(function() {
	var tabObject = jQuery( 'div.tabs-wrapper > ul' );

	i = 0;
	tabObject.each( function( item ) {
		var out         = '';
		    tabsWrapper = jQuery( this );

		tabsWrapper.find( '.tab-heading' ).each( function( subitem ) {
			i++;
			var tabItem      = jQuery( this ),
			    tabItemId    = tabItem.closest( 'li' ).attr( 'id', 'tab-item-' + i ),
			    tabItemTitle = tabItem.text();

			tabItem.addClass( 'hide' );
			out += '<li><a href="#tab-item-' + i + ' ">' + tabItemTitle + '</a></li>';
		} );

		tabsWrapper.before( '<ul class="tabs">' + out + '</ul>' );
	} );

})();

var tabsWrapper        = jQuery( '.tabs ' ),
    tabsContentWrapper = jQuery( '.tabs + ul' );

tabsWrapper.find( 'li:first-child' ).addClass( 'active' ); //make first tab active
tabsContentWrapper.children().hide();
tabsContentWrapper.find( 'li:first-child' ).show();

tabsWrapper.find( 'a' ).click( function() {
	var $this     = jQuery( this ),
	    targetTab = $this.attr( 'href' ).replace(/.*#(.*)/, "#$1"); //replace is for IE7

	$this.parent().addClass( 'active' ).siblings( 'li' ).removeClass( 'active' );
	jQuery( 'li' + targetTab ).fadeIn().siblings( 'li' ).hide();

	return false;
} );

} // /if tabs



/*
*****************************************************
*      CREATE ACCORDIONS
*****************************************************
*/
var autoAccordionDuration = 5000;
if ( jQuery( 'div.accordion-wrapper' ).length ) {

(function() {
	var accordionObject = jQuery( 'div.accordion-wrapper > ul > li' );

	accordionObject.each( function( item ) {
		jQuery( this ).find( '.accordion-heading' ).siblings().wrapAll( '<div class="accordion-content" />' );
	} );

})();

jQuery( '.accordion-content' ).slideUp();
jQuery( 'div.accordion-wrapper > ul > li:first-child .accordion-content' ).slideDown().parent().addClass( 'active' );

jQuery( '.accordion-heading' ).click( function() {
	var $this = jQuery( this );

	$this.next( '.accordion-content' ).slideDown().parent().addClass( 'active' ).siblings( 'li' ).removeClass( 'active' );
	$this.closest( '.accordion-wrapper' ).find( 'li:not(.active) > .accordion-content' ).slideUp();
} );

//Automatic accordion
var hoveringElements = jQuery( 'div.accordion-wrapper.auto > ul' ),
    notHovering      = true;

hoveringElements.hover( function() {
	notHovering = false;
}, function() {
	notHovering = true;
});

function autoAccordionFn() {
	if ( notHovering === true ) {

	var $this         = jQuery( 'div.accordion-wrapper.auto > ul' ),
	    count         = $this.children().length,
	    currentActive = $this.find( 'li.active' ),
	    currentIndex  = currentActive.index() + 1,
	    nextIndex     = ( currentIndex + 1 ) % count;

	$this.find( 'li' ).eq( nextIndex - 1 ).find( '.accordion-heading' ).trigger( 'click' );

	}
} // /autoAccordionFn

var autoAccordion    = setInterval( autoAccordionFn, autoAccordionDuration );

} // /if accordion



/*
*****************************************************
*      CREATE TOGGLES
*****************************************************
*/
if ( jQuery( 'div.toggle-wrapper' ).length ) {

(function() {
	var toggleObject = jQuery( 'div.toggle-wrapper' );

	toggleObject.each( function( item ) {
		jQuery( this ).find( '.toggle-heading' ).siblings().wrapAll( '<div class="toggle-content" />' );
	} );

})();

jQuery( 'div.toggle-content' ).slideUp();

jQuery( '.toggle-heading' ).click( function() {
	jQuery( this ).next( 'div.toggle-content' ).slideToggle().parent().toggleClass( 'active' );
} );

} // /if toggle



/*
*****************************************************
*      YOUTUBE EMBED FIX
*****************************************************
*/
jQuery( 'iframe[src*="youtube.com"]' ).each( function( item ) {
		var srcAtt = jQuery( this ).attr( 'src' );
		if ( -1 == srcAtt.indexOf( '?' ) )
			srcAtt += '?wmode=transparent';
		else
			srcAtt += '&amp;wmode=transparent';
		jQuery( this ).attr( 'src', srcAtt );
	} );



} );