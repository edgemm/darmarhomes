/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* WebMan Options Panel scripts
*****************************************************
*/

jQuery( function() {



/*
*****************************************************
*      DISPLAY FORM ONLY IF JS ACTIVE
*****************************************************
*/
jQuery( '.wm-wrap' ).removeClass( 'no-js' ).find( '.no-js' ).removeClass( 'no-js' );



/*
*****************************************************
*      TOGGLES
*****************************************************
*/
var toggleSections = jQuery( '.option.toggle' ).addClass( 'hide border-top' ),
		togglePatterns = jQuery( '.toggle-patterns' );

toggleSections.prev( 'h3, h4' ).addClass( 'toggle-heading' );

toggleSections.prev( 'h3, h4' ).click( function() {
		var $this = jQuery( this ).toggleClass( 'active' ),
		    toggleSection = $this.next( '.option.toggle' );

		if ( toggleSection.hasClass( 'hide' ) )
			toggleSection.removeClass( 'hide' ).hide();

		toggleSection.slideToggle( 250 );
	} );

togglePatterns.find( '.pattern-boxes' ).hide();
togglePatterns.find( '.main-label' ).click( function() {
		jQuery( this ).toggleClass( 'active' ).closest( '.toggle-patterns' ).find( '.pattern-boxes' ).slideToggle( 250 );
	} );

jQuery( '.wm-wrap .help' ).click( function() {
		jQuery( this ).find( 'em' ).fadeToggle().css({ display: 'block' });
	} );



/*
*****************************************************
*      COLORPICKER
*****************************************************
*/
function rgb2hex( rgb ) {
	if ( -1 == rgb.search( 'rgb' ) ) {
		return rgb; //in case the browser sends hex value already, just return it (IE7 does)
	} else {
		rgb = rgb.match( /^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/ );
		function hex( x ) {
			return ( '0' + parseInt( x ).toString( 16 ) ).slice( -2 );
		}
		return '#' + hex( rgb[1] ) + hex( rgb[2] ) + hex( rgb[3] );
	}
}

jQuery( '.color-wrapper' ).mouseenter( function() {
	var $this        = jQuery( this );
	    currentColor = rgb2hex( $this.find( '.color-select .color-display' ).css( 'backgroundColor' ) );

	$this.find( '.color-select' ).ColorPicker({
		onBeforeShow: function() {
			jQuery( this ).ColorPickerSetColor( currentColor );
			},
		onChange: function( hsb, hex, rgb ) {
			$this.find( '.color-select .color-display' ).css({ backgroundColor: '#' + hex });
			//$this.find('.color-text .color-code').text(hex);
			$this.find( '.color-text input[type="text"]' ).attr( 'value', hex );
			}
	});
} );



/*
*****************************************************
*      COLOR SKIN SELECTOR
*****************************************************
*/
jQuery( '#skin-selector input[type="radio"]' ).change( function() {
		var skinOptionsInputs = [
			'link-color',
			'color-bglight',
			'color-bglight-headings',
			'color-bgdark',
			'color-bgdark-headings',
			'type-gray-bg-color',
			'type-gray-color',
			'type-green-bg-color',
			'type-green-color',
			'type-blue-bg-color',
			'type-blue-color',
			'type-orange-bg-color',
			'type-orange-color',
			'type-red-bg-color',
			'type-red-color',
			'body-bg-color',
			'wrap-bg-color',
			'wrap-shadow',
			'header-bg-color',
			'slider-bg-color',
			'cta-bg-color',
			'main-heading-bg-color',
			'clients-bg-color',
			'footer-bg-color',
			'icon-scheme',
			'font-custom',
			'font-primary',
			'font-secondary'
			];

		//loop through the array
		for( var i in skinOptionsInputs ) {
			var valueChange = jQuery( this ).data( skinOptionsInputs[i] );
			valueChange = valueChange.substr(1);
			jQuery( '#wm-design-' + skinOptionsInputs[i] ).val( valueChange );
		}
	} );



/*
*****************************************************
*      FILE UPLOADER
*****************************************************
*/
jQuery( '.upload-image' ).click( function() {
	var targetFileUploader = jQuery( this ).parent().attr('id');

	//tb_show('', 'media-upload.php?type=image&TB_iframe=true');
	tb_show( 'Add/Choose Image', 'media-upload.php?post_id=&type=image&TB_iframe=true' );

	window.send_to_editor = function( html ) {
		var imgUrl     = jQuery( 'img', html ).attr( 'src' ),
		    imgIdRough = jQuery( 'img', html ).attr( 'class' ).split( ' ' ),
		    imgId      = '';

		for ( i = 0; i < imgIdRough.length; i++ ) {
			if ( -1 < imgIdRough[i].indexOf( 'wp-image-' ) ) {
				imgId = imgIdRough[i].replace( 'wp-image-', '' );
				break;
			}
		}

		jQuery( '#' + targetFileUploader + ' input[type="text"]' ).val( imgUrl );
		jQuery( '#' + targetFileUploader + ' input[type="hidden"]' ).val( imgId );
		jQuery( 'div.' + targetFileUploader ).removeClass( 'hide' ).find( 'a > img' ).attr( 'src', imgUrl );
		jQuery( 'div.' + targetFileUploader + ' > a' ).attr( 'href', imgUrl );

		tb_remove();
	}

	return false;
} );

//Call fancybox
jQuery( 'a.fancybox' ).fancybox({
	'padding'        : 0,
	'centerOnScroll' : false,
	'overlayOpacity' : 0.6,
	'overlayColor'   : '#000',
	'titleShow'      : false,
	'transitionIn'   : 'elastic',
	'transitionOut'  : 'elastic'
});



/*
*****************************************************
*      DYNAMICLY ADD ITEMS
*****************************************************
*/
jQuery( '.add-items .btn-add' ).click( function() {
	var $this         = jQuery( this ),
	    field         = $this.closest( 'div.add-items' ).find( 'ul li:last' ).clone(true),
	    fieldLocation = $this.closest( 'div.add-items' ).find( 'ul li:last' );

	if( fieldLocation.length < 1 ) {
		alert( 'Please, reload the page' );
		return false;
	}

	jQuery( '.input-field', field ).val( '' ).attr( 'name', function( index, name ) {
		return name.replace( /(\d+)/, function( fullMatch, n ) {
			return Number(n) + 1;
		} );
	} );

	field.insertAfter( fieldLocation, $this.closest( 'div.add-items' ) );

	return false;
} );

jQuery( '.add-items .rows .btn-remove' ).click( function() {
	jQuery( this ).parent().remove();
	return false;
} );

jQuery( '.add-items .rows' ).sortable({
	opacity : 0.6,
	revert  : true,
	cursor  : 'move',
	handle  : '.sort-handle'
});



/*
*****************************************************
*      BUTTON "DEFAULT VALUE"
*****************************************************
*/
jQuery( '.btn-default' ).click( function() {
	var $this              = jQuery( this ),
	    targetInputFieldID = $this.data( 'default' ),
	    targetDefaultValue = $this.find( 'span' ).text();

	if ( $this.hasClass( 'default-color' ) ) {

		$this.parent().next().find( '.color-display' ).css({ backgroundColor: '#' + targetDefaultValue });
		jQuery( '#' + targetInputFieldID ).attr( 'value', targetDefaultValue );

	} else if ( $this.hasClass( 'default-slider' ) ) {

		jQuery( '#' + targetInputFieldID + '-slider' ).slider( 'option', 'value', targetDefaultValue );
		jQuery( '#' + targetInputFieldID ).attr( 'value', targetDefaultValue );

	} else {

		jQuery( '#' + targetInputFieldID ).attr( 'value', targetDefaultValue );

	}
} );



/*
*****************************************************
*      MESSAGES
*****************************************************
*/
if ( jQuery( '#message' ).length ) {
	jQuery( '#message' ).addClass( 'wm-message' );
	jQuery( '.wm-message' ).hide().fadeIn( 300, function() {
		var $this     = jQuery( this ),
		    delayTime = ( $this.hasClass( 'delay-long') ) ? ( 10000 ) : ( 3500 );

		$this.delay( delayTime ).fadeOut( 300, function() {
			$this.remove();
		} );
	} );
}

jQuery( '.wm-wrap .confirm' ).click( function() {
		event.preventDefault()

    var btnUrl   = jQuery( this ).attr( 'href' ),
		    modalBox = jQuery( '.wm-wrap .modal-box' ).fadeIn();

		modalBox.find( 'span' ).click( function() {
				var modalAction = jQuery( this ).data( 'action' );

				if ( 'stay' === modalAction )
					modalBox.fadeOut();
				else
					window.location = btnUrl;
			} );
	} );



/*
*****************************************************
*      DATE PICKER
*****************************************************
*/
if ( jQuery().datepicker ) {
	jQuery( '.wm-wrap input[type="date"]' ).datepicker( {
			dateFormat : "yy-mm-dd"
		} );
	jQuery( '.wm-wrap input[type="date"].future' ).datepicker( "option", "minDate", new Date() );
	jQuery( '.wm-wrap input[type="date"].past' ).datepicker( "option", "maxDate", new Date() );
} // /datepicker



/*
*****************************************************
*      PATTERN PREVIEW
*****************************************************
*/
jQuery( '.wm-wrap .pattern-box span' ).click( function() {
		var $this      = jQuery( this ),
		    background = $this.attr( 'style' );

		$this.closest( '.pattern-boxes' ).find( '.pattern-preview div' ).attr( 'style', background ).fadeIn();
	} );



} );