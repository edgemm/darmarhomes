/*
*****************************************************
*      WEBMAN SHORTCODES SCRIPTS
*****************************************************
*/
jQuery( function() {



/*
*****************************************************
*      ADD JQUERY UI DIALOG
*****************************************************
*/
if ( jQuery().dialog ) {
	jQuery( '#wm-shortcode-generator' ).dialog({
		modal       : true,
		dialogClass : 'wp-dialog',
		width       : 480,
		height      : 540,
		autoOpen    : false,
		title       : 'WebMan Simple Shortcode Generator 1.0'
	});
}



/*
*****************************************************
*      REALTIME PARAMETERS CHANGE
*****************************************************
*/
function realTimeChange( target ) {
	var countChildren = jQuery( target + ' table tr' ).length - 1,
	    outHtml       = jQuery( target + ' ' + referenceHtmlElement ).val(),
	    outShortcode  = jQuery( target + ' ' + referenceShortcodeElement ).val(),
	    prefixRemove  = target + '-';

	for ( i = 1; i <= countChildren; i++ ) {
		var inputField  = jQuery( target + ' table tr.item-' + i + ' input' ),
		    selectField = jQuery( target + ' table tr.item-' + i + ' select' );

		if ( inputField.length ) {

			var getPropertyName  = '#' + inputField.attr( 'name' ),
			    getPropertyName  = getPropertyName.replace( prefixRemove, '' ),
			    getPropertyValue = inputField.val();

		} else {

			var getPropertyName  = '#' + selectField.attr( 'name' ),
			    getPropertyName  = getPropertyName.replace( prefixRemove, '' ),
			    getPropertyValue = selectField.val();

		}

		var textToReplace = '++' + getPropertyName + '++';
		    outHtml = outHtml.replace( textToReplace, getPropertyValue );
		    outShortcode = outShortcode.replace( textToReplace, getPropertyValue );

		//replacing output HTML
		jQuery( target + ' ' + outputHtmlElement ).val( outHtml );
		//replacing output shortcode
		jQuery( target + ' ' + outputShortcodeElement ).text( outShortcode );
	}
} // /realTimeChange



/*
*****************************************************
*      VARIABLES AND DEFAULT SETTINGS
*****************************************************
*/
var generator                 = jQuery( '#wm-shortcode-generator' ),
    outputHtmlElement         = '.wm-shortcode-html-output',
    outputShortcodeElement    = '.wm-shortcode-output',
    referenceHtmlElement      = '.wm-shortcode-html-reference',
    referenceShortcodeElement = '.wm-shortcode-reference',
    target = generator.find( '.wm-tabs li:first a' ).attr( 'href' );

generator.find( '.wm-tabs li:first' ).addClass( 'active' ).siblings().removeClass( 'active' );
generator.find( '.tab-content:first' ).show().siblings( '.tab-content' ).hide();

realTimeChange( target );



/*
*****************************************************
*      TABS SWITCHING
*****************************************************
*/
generator.find( '.wm-tabs a' ).click( function() {
	var target = jQuery( this ).attr( 'href' );

	jQuery( this ).parent().addClass( 'active' ).siblings().removeClass( 'active' ); //activate tab
	jQuery( target ).fadeIn().show().siblings( '.tab-content' ).hide(); //display section

	realTimeChange( target );

	return false; //prevent page reload
} );



/*
*****************************************************
*      APPLY SELECT AND INPUT CHANGES
*****************************************************
*/
jQuery( 'select, input[type="text"]' ).change( function () {
	var target = jQuery( '#wm-shortcode-generator .wm-tabs li.active a' ).attr( 'href' );

	realTimeChange( target );
} ).change();



/*
*****************************************************
*      SENDING THE OUTPUT TO CONTENT
*****************************************************
*/
jQuery( '.send-to-generator' ).click( function( e ) {
	var parentElement = jQuery( this ).data( 'parent' ),
	    outputThis    = jQuery( '#' + parentElement + ' ' + outputHtmlElement ).val();

	if ( ! jQuery( '#' + parentElement + ' ' + outputHtmlElement ).hasClass( 'dont-close' ) )
		jQuery( '#wm-shortcode-generator' ).dialog( 'close' );

	send_to_editor( outputThis );
	return false;
} );



} );