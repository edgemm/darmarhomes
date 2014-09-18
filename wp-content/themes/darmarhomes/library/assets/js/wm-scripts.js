/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Admin scripts
*****************************************************
*/

jQuery(function() {



/*
*****************************************************
*      WIDGETS
*****************************************************
*/
jQuery( '#widgets-right div.widgets-holder-wrap' ).addClass( 'closed' );
jQuery( 'div[id*="wmcs-"]' ).prev( 'div.sidebar-name' ).addClass( 'custom-sidebar-name' );



/*
*****************************************************
*      HELP TOGGLES FOR WP 3.3- AND SHORTCODES
*****************************************************
*/
jQuery( 'div.contextual-help-tab-content.toggle-content, div.shortcode-help-content' ).hide();
jQuery( 'div.shortcode-help-content' ).prev( 'h3' ).addClass( 'small-toggle-title' );

jQuery( 'h2.contextual-help-tab-title.toggle-title, .small-toggle-title' ).click( function() {
	jQuery( this ).toggleClass( 'active' ).next( 'div.contextual-help-tab-content.toggle-content, div.shortcode-help-content' ).slideToggle().toggleClass( 'active' );
} );



/*
*****************************************************
*      GALLERY SETTINGS
*****************************************************
*/
jQuery( '#gallery-settings tbody tr:first-child' ).hide();
jQuery( '#gallery-settings select#columns option[value="1"], #gallery-settings select#columns option[value="2"], #gallery-settings select#columns option[value="7"], #gallery-settings select#columns option[value="8"], #gallery-settings select#columns option[value="9"]' ).remove();



/*
*****************************************************
*      APPLY TIPSY
*****************************************************
*/
if ( jQuery().tipsy ) {
	jQuery( '.tipsy' ).tipsy( {
			fade     : true,
			gravity  : 's',
			title    : 'title',
			offset   : 2,
			opacity  : 0.95,
			delayIn  : 500,
			delayOut : 0,
			fade     : false,
    	html     : false
		} );
} // /tipsy



});