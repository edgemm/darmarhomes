<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Hooks
*****************************************************
*/

/*
*****************************************************
*      HEADER
*****************************************************
*/
/*
* Before website's header
*/
function wm_before_header() {
	do_action( 'wm_before_header' );
}

/*
* After website's header
*/
function wm_after_header() {
	do_action( 'wm_after_header' );
}



/*
*****************************************************
*      CALL TO ACTION
*****************************************************
*/
/*
* Before call to action
*/
function wm_before_cta() {
	do_action( 'wm_before_cta' );
}

/*
* After call to action
*/
function wm_after_cta() {
	do_action( 'wm_after_cta' );
}



/*
*****************************************************
*      MAIN CONTENT AREA
*****************************************************
*/
/*
* Main content start
*/
function wm_before_main_content() {
	do_action( 'wm_before_main_content' );
}

/*
* Main content start
*/
function wm_start_main_content() {
	do_action( 'wm_start_main_content' );
}

/*
* Before post content
*/
function wm_before_post() {
	do_action( 'wm_before_post' );
}

/*
* After post content
*/
function wm_after_post() {
	do_action( 'wm_after_post' );
}

/*
* Post/page content start
*/
function wm_start_post() {
	do_action( 'wm_start_post' );
}

/*
* Post/page content end
*/
function wm_end_post() {
	do_action( 'wm_end_post' );
}

/*
* Before posts list
*/
function wm_before_list() {
	do_action( 'wm_before_list' );
}

/*
* After posts list
*/
function wm_after_list() {
	do_action( 'wm_after_list' );
}

/*
* Social sharing buttons hook
*/
function wm_sharing() {
	do_action( 'wm_sharing' );
}



/*
*****************************************************
*      SIDEBAR
*****************************************************
*/
/*
* Sidebar top
*/
function wm_start_sidebar() {
	do_action( 'wm_start_sidebar' );
}

/*
* Sidebar bottom
*/
function wm_end_sidebar() {
	do_action( 'wm_end_sidebar' );
}



/*
*****************************************************
*      FOOTER
*****************************************************
*/
/*
* Before website's footer
*/
function wm_before_footer() {
	do_action( 'wm_before_footer' );
}

/*
* After website's footer
*/
function wm_after_footer() {
	do_action( 'wm_after_footer' );
}

?>