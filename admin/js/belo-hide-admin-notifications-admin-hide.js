(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 * This enables you to define handlers, for when the DOM is ready:
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	jQuery(document).ready(function(){
		jQuery("#adminmenu .update-plugins").replaceWith('');
		jQuery("body.wp-admin .plugin-update.colspanchange").replaceWith('');
		jQuery("body.wp-admin .notice.elementor-message.elementor-message-dismissed").replaceWith('');
		jQuery("body.wp-admin:not(.theme-editor-php) .notice").replaceWith('');
	});

})( jQuery );
