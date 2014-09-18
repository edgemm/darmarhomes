/*
*****************************************************
*      WEBMAN TINYMCE BUTTON
*****************************************************
*/
if ( ! jQuery.browser.msie ) {

(function() {
	tinymce.create( 'tinymce.plugins.wmShortcodes', {
		/**
		* Initializes the plugin, this will be executed after the plugin has been created.
		* This call is done before the editor instance has finished it's initialization so use the onInit event
		* of the editor instance to intercept that event.
		*
		* @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
		* @param {string} url Absolute URL to where the plugin is located.
		*/
		init : function( ed, url ) {
			// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');
			ed.addCommand( 'wmShortcodes', function() {
				jQuery( '#wm-shortcode-generator' ).dialog( 'open' );
			} );

			// Register example button
			ed.addButton( 'wm_mce_button', {
				title : 'Simple Shortcode Generator',
				image : url + '/../../img/shortcodes/add.png',
				cmd   : 'wmShortcodes'
			} );
		},
		/**
		* Returns information about the plugin as a name/value array.
		* The current keys are longname, author, authorurl, infourl and version.
		*
		* @return {Object} Name/value array containing information about the plugin.
		*/
		getInfo : function() {
			return {
				longname  : 'Simple Shortcode Generator',
				author    : 'WebMan - www.webmandesign.eu',
				authorurl : 'http://www.webmandesign.eu',
				infourl   : '',
				version   : '1.0'
			};
		}
	} );

	// Register plugin
	tinymce.PluginManager.add( 'wm_mce_button', tinymce.plugins.wmShortcodes );
})();

} // /MS IE check (issue with shortcode insertion on cursor position in Internet Explorer)