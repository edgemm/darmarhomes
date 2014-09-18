<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* WebMan Options Panel - Quick start guide section
*****************************************************
*/

$prefix = 'quickstart-';

if ( 2 > intval( get_option( WM_THEME_SETTINGS . '-installed' ) ) ) {

array_push( $options,

array(
	"type" => "section-open",
	"section-id" => "quickstart",
	"title" => __( 'Quick start', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
),

	array(
		"type" => "sub-tabs",
		"parent-section-id" => "quickstart",
		"list" => array(
			__( 'Quick start guide', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			)
	),

	array(
		"type" => "sub-section-open",
		"sub-section-id" => "quickstart-1",
		"title" => __( 'Quick start guide', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "intro",
			"content" => '<img src="' . WM_ASSETS_ADMIN . 'img/logos/logo-webman-icon-92x92.png" class="left" />Thank you for purchasing the <strong>"' . WM_THEME_NAME . '"</strong> theme created by <a href="http://www.webmandesign.eu" target="_blank">WebMan</a>. <br />This quick start guide will help you to set up the basic options. For more advanced settings feel free to explore other sections of this admin panel.'
		),

		array(
			"type" => "heading3",
			"content" => "Welcome!",
			"class" => "first"
		),
		array(
			"id" => $prefix."welcome",
			"type" => "inside-wrapper-open",
			"class" => "toggle"
		),
			array(
				"type" => "heading4",
				"content" => "Congratulation on your purchase of powerful <strong>" . WM_THEME_NAME . "</strong> professional portfolio WordPress theme. <br />Let's unleash the power of flexibility! Please take time to read the steps below for basic theme setup and customization.",
			),
			array(
				"type" => "paragraph",
				"content" => "You can customize huge amount of theme options directly from this <strong>WebMan Admin Panel</strong>. If you can not find the option you are looking for, it is highly probable the theme does the action automatically for you. If you still have problems to find or set the option though, use WordPress contextual help (see the tip below), read the theme documentation or contact WebMan's support directly.",
			),
			array(
				"type" => "paragraph",
				"content" => "Admin Panel consists of <em>main navigation panel</em> on the left which contains options categories, <em>admin panel header</em> (displays theme name and version, submit button and tabbed <em>category subnavigation</em>), <em>section screen</em> which contains all the settings options for the selected category and <em>footer</em> where you can find another submit button (and, if enabled, also reset button). Submit buttons are conveniently placed in upper right and lower right corner of the panel for easy access.<br />
				To switch the section screen select a category in the main navigation panel on the left and choose the sub section by clicking the tab in the header of each section screen. Options grouped under the section screen will be displayed.",
			),
			array(
				"type" => "hr"
			),
		array(
			"id" => $prefix."welcome",
			"type" => "inside-wrapper-close"
		),

		array(
			"type" => "heading3",
			"content" => "Basic setup",
		),
			array(
				"type" => "paragraph",
				"content" => '<span class="dropcap">1</span>' . "Start by setting up the WordPress basic settings. Click on <strong>Settings</strong> section in main WordPress admin menu on the left. Go through all the subsections and options there, although <strong>" . WM_THEME_NAME . "</strong> really requires to set the front and blog page in <strong>Settings / Reading > Front page display</strong> (if you haven't created any page yet return to this setting afterwards). For better Search Engine Optimization (SEO) it is also recommended to set up permalinks structure to 'Post name' (in <strong>Settings / Permalinks > Common Settings</strong>).",
			),
			array(
				"type" => "paragraph",
				"content" => '<span class="dropcap">2</span>' . "When you get the basic WordPress settings done, it is time to set up the theme itself.  The first recommended settings are related to website's branding. It is your website and thus you need to put your brand on it. You can do so in <strong>Design / Branding</strong> (and also in <strong>Design / Login</strong>) section of this Admin Panel. If you need to edit credits text (like copyright) in the website's footer section, customize the <strong>General / Basic > Credits (copyright) text</strong> option.",
			),
			array(
				"type" => "paragraph",
				"content" => '<span class="dropcap">3</span>' . "Now it is time to set up the blog. All the settings related to blog article listing can be found in <strong>Blog</strong> settings category of this Admin Panel. To further customize the blog page (like its content that will be displayed above the article list, adding a featured content slider, setting featured image, page subtitle,...) please edit the specific page that was set in the step 1 of this Basic setup instructions.",
			),
			/*
			array(
				"type" => "paragraph",
				"content" => '<span class="dropcap">4</span>' . "Other settings are totally up to you. Feel free to discover the Admin Panel and chage the options values to your needs. As an advice, it is recommended to set up comments (<strong>General / Basic > Comments</strong>), <abbr title='Search Engine Optimization'>SEO</abbr> (<strong>SEO / Basic SEO</strong>) and if you use website traffic analyzers like Google Analytics set also tracking scripts under <strong>General / Tracking</strong>.",
			),
			*/
			array(
				"type" => "heading4",
				"content" => "Don't forget to save your settings and... that's all! You are done with basic theme setup! <br />Enjoy <strong>" . WM_THEME_NAME . "</strong>!",
			),

		array(
			"type" => "hr"
		),
			array(
				"type" => "help",
				"topic" => "Do you often get lost? :)",
				"content" => "For such cases <strong>" . WM_THEME_NAME . "</strong> offers handy contextual help for almost every topic related to the theme. Just press <strong>Help</strong> in the upper right corner of the screen and related instructions will be revealed.",
			),
		array(
			"type" => "hrtop"
		),
	array(
		"type" => "sub-section-close"
	),

array(
	"type" => "section-close"
)

);

}

?>