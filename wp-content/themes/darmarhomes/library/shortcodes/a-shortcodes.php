<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Shortcodes for WebMan Shortcodes Generator
*****************************************************
*/



//Get Content Module posts
$wm_modules_posts = get_posts( array(
	'post_type'   => 'wm_modules',
	'order'       => 'ASC',
	'orderby'     => 'title',
	'numberposts' => -1,
	) );
$modulePosts = array();
foreach ( $wm_modules_posts as $post ) {
	$modulePosts[$post->ID] = $post->post_title;
}



/*
* Shortcodes settings for Shortcode Generator
*/
$wmShortcodeGeneratorTabs = array(

	array(
		'id' => 'content_module',
		'name' => __( 'Content Module', WM_THEME_TEXTDOMAIN_ADMIN ),
		'settings' => array(
			'id' => array(
				'label' => __( 'Content Module', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'  => __( 'Select Content Module to displayed', WM_THEME_TEXTDOMAIN_ADMIN ),
				'value' => $modulePosts
				),
			'no_thumb' => array(
				'label' => __( 'Show thumb', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'  => __( 'Select whether you want the thumbnail image to be displayed', WM_THEME_TEXTDOMAIN_ADMIN ),
				'value' => array(
					''  => __( 'Show', WM_THEME_TEXTDOMAIN_ADMIN ),
					'1' => __( 'Hide', WM_THEME_TEXTDOMAIN_ADMIN )
					)
				),
			'no_link' => array(
				'label' => __( 'Apply link', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'  => __( 'Select whether you want the module custom link to be applied', WM_THEME_TEXTDOMAIN_ADMIN ),
				'value' => array(
					''  => __( 'Apply', WM_THEME_TEXTDOMAIN_ADMIN ),
					'1' => __( 'Disable', WM_THEME_TEXTDOMAIN_ADMIN )
					)
				),
			'no_title' => array(
				'label' => __( 'Module title', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'  => __( 'Select whether you want the module title to be displayed', WM_THEME_TEXTDOMAIN_ADMIN ),
				'value' => array(
					''  => __( 'Show', WM_THEME_TEXTDOMAIN_ADMIN ),
					'1' => __( 'Hide', WM_THEME_TEXTDOMAIN_ADMIN )
					)
				),
			'button_text' => array(
				'label'     => __( 'Button text', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'      => __( 'Insert more info link button text', WM_THEME_TEXTDOMAIN_ADMIN ),
				'maxlength' => 25,
				'value'     => ''
				),
			'layout' => array(
				'label' => __( 'Layout', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'  => __( 'Choose which layout to use', WM_THEME_TEXTDOMAIN_ADMIN ),
				'value' => array(
					''       => __( 'Default', WM_THEME_TEXTDOMAIN_ADMIN ),
					'center' => __( 'Centered', WM_THEME_TEXTDOMAIN_ADMIN )
					)
				),
			),
		'output'           => '[content_module id="++id++" no_thumb="++no_thumb++" no_link="++no_link++" no_title="++no_title++" button_text="++button_text++" layout="++layout++"]',
		'output-shortcode' => '[content_module id="++id++" no_thumb="++no_thumb++" no_link="++no_link++" no_title="++no_title++" button_text="++button_text++" layout="++layout++"]'
	),

	array(
		'id' => 'embed',
		'name' => __( 'Video', WM_THEME_TEXTDOMAIN_ADMIN ),
		'settings' => array(
			'url' => array(
				'label'     => __( 'Video URL', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'      => __( 'Insert video URL', WM_THEME_TEXTDOMAIN_ADMIN ),
				'value'     => ''
				),
			'width' => array(
				'label'     => __( 'Video width', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'      => __( 'Define video width (in pixels)', WM_THEME_TEXTDOMAIN_ADMIN ),
				'maxlength' => 4,
				'value'     => 640
				),
			'height' => array(
				'label'     => __( 'Video height', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'      => __( 'Define video height (in pixels)', WM_THEME_TEXTDOMAIN_ADMIN ),
				'maxlength' => 4,
				'value'     => 360
				)
			),
		'output'           => '[embed width="++width++" height="++height++"]++url++[/embed]',
		'output-shortcode' => '[embed width="++width++" height="++height++"]++url++[/embed]'
	),

	/*
	array(
		'id' => 'youtube',
		'name' => __( 'Youtube Video', WM_THEME_TEXTDOMAIN_ADMIN ),
		'settings' => array(
			'id' => array(
				'label'     => __( 'Video ID', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'      => __( 'Insert video ID obtained from YouTube', WM_THEME_TEXTDOMAIN_ADMIN ),
				'maxlength' => 12,
				'value'     => ''
				),
			'width' => array(
				'label'     => __( 'Video width', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'      => __( 'Define video width (in pixels)', WM_THEME_TEXTDOMAIN_ADMIN ),
				'maxlength' => 4,
				'value'     => 640
				),
			'height' => array(
				'label'     => __( 'Video height', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'      => __( 'Define video height (in pixels)', WM_THEME_TEXTDOMAIN_ADMIN ),
				'maxlength' => 4,
				'value'     => 360
				)
			),
		'output'           => '[youtube id="++id++" width="++width++" height="++height++"]',
		'output-shortcode' => '[youtube id="++id++" width="++width++" height="++height++"]'
	),

	array(
		'id' => 'vimeo',
		'name' => __( 'Vimeo Video', WM_THEME_TEXTDOMAIN_ADMIN ),
		'settings' => array(
			'id' => array(
				'label'     => __( 'Video ID', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'      => __( 'Insert video ID obtained from Vimeo', WM_THEME_TEXTDOMAIN_ADMIN ),
				'maxlength' => 10,
				'value'     => ''
				),
			'width' => array(
				'label'     => __( 'Video width', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'      => __( 'Define video width (in pixels)', WM_THEME_TEXTDOMAIN_ADMIN ),
				'maxlength' => 4,
				'value'     => 640
				),
			'height' => array(
				'label'     => __( 'Video height', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'      => __( 'Define video height (in pixels)', WM_THEME_TEXTDOMAIN_ADMIN ),
				'maxlength' => 4,
				'value'     => 360
				)
			),
		'output'           => '[vimeo id="++id++" width="++width++" height="++height++"]',
		'output-shortcode' => '[vimeo id="++id++" width="++width++" height="++height++"]'
	),
	*/

	array(
		'id' => 'googlemap',
		'name' => __( 'Google Map', WM_THEME_TEXTDOMAIN_ADMIN ),
		'settings' => array(
			'location' => array(
				'label' => __( 'Location', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'  => __( 'Type in the address', WM_THEME_TEXTDOMAIN_ADMIN ),
				'value' => ''
				),
			'width' => array(
				'label'     => __( 'Map width', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'      => __( 'Define map width (in pixels)', WM_THEME_TEXTDOMAIN_ADMIN ),
				'maxlength' => 4,
				'value'     => 240
				),
			'height' => array(
				'label'     => __( 'Map height', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'      => __( 'Define map height (in pixels)', WM_THEME_TEXTDOMAIN_ADMIN ),
				'maxlength' => 4,
				'value'     => 240
				),
			'zoom' => array(
				'label' => __( 'Zoom', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'  => __( 'Select map zoom', WM_THEME_TEXTDOMAIN_ADMIN ),
				'value' => array(
					'5' => 5,
					'6' => 6,
					'7' => 7,
					'8' => 8,
					'9' => 9,
					'10' => 10,
					'11' => 11,
					'12' => 12,
					'13' => 13,
					'14' => 14,
					'15' => 15,
					'16' => 16,
					'17' => 17,
					'18' => 18,
					'19' => 19
					)
				),
			'bubble' => array(
				'label' => __( 'Display bubble', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'  => __( 'Select whether you want the bubble to be visible', WM_THEME_TEXTDOMAIN_ADMIN ),
				'value' => array(
					''  => __( 'No', WM_THEME_TEXTDOMAIN_ADMIN ),
					'1' => __( 'Yes', WM_THEME_TEXTDOMAIN_ADMIN )
					)
				)
			),
		'output'           => '[map location="++location++" width="++width++" height="++height++" zoom="++zoom++" bubble="++bubble++"]',
		'output-shortcode' => '[map location="++location++" width="++width++" height="++height++" zoom="++zoom++" bubble="++bubble++"]'
	),

	array(
		'id' => 'widgetarea',
		'name' => __( 'Widget area', WM_THEME_TEXTDOMAIN_ADMIN ),
		'settings' => array(
			'area' => array(
				'label' => __( 'Area to display', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'  => __( 'Select a widget area from dropdown menu', WM_THEME_TEXTDOMAIN_ADMIN ),
				'value' => wm_widget_areas()
				)
			),
		'output'           => '[widgets area="++area++"]',
		'output-shortcode' => '[widgets area="++area++"]'
	),

	array(
		'id' => 'devider',
		'name' => __( 'Devider', WM_THEME_TEXTDOMAIN_ADMIN ),
		'settings' => array(
			'type' => array(
				'label' => __( 'Type of devider', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'  => __( 'Whether the devider is simple one or with "back to top" link', WM_THEME_TEXTDOMAIN_ADMIN ),
				'value' => array(
					''    => __( 'Spacer', WM_THEME_TEXTDOMAIN_ADMIN ),
					'top' => __( 'Spacer with top link', WM_THEME_TEXTDOMAIN_ADMIN )
					)
				),
			'height' => array(
				'label' => __( 'Space height', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'  => __( 'Height of empty space after devider (in pixels)', WM_THEME_TEXTDOMAIN_ADMIN ),
				'value' => array(
					''    => __( 'Default', WM_THEME_TEXTDOMAIN_ADMIN ),
					'0'   => 0,
					'10'  => 10,
					'20'  => 20,
					'30'  => 30,
					'40'  => 40,
					'50'  => 50,
					'60'  => 60,
					'70'  => 70,
					'80'  => 80,
					'90'  => 90,
					'100' => 100,
					'110' => 110,
					'120' => 120,
					'130' => 130,
					'140' => 140,
					'150' => 150,
					'160' => 160,
					'170' => 170,
					'180' => 180,
					'190' => 190,
					'200' => 200,
					'210' => 210,
					'220' => 220,
					'230' => 230,
					'240' => 240,
					'250' => 250,
					'260' => 260,
					'270' => 270,
					'280' => 280,
					'290' => 290,
					'300' => 300,
					'300' => 300,
					'310' => 310,
					'320' => 320,
					'330' => 330,
					'340' => 340,
					'350' => 350,
					'360' => 360,
					'370' => 370,
					'380' => 380,
					'390' => 390,
					'400' => 400
					)
				),
			'no_border' => array(
				'label' => __( 'Border', WM_THEME_TEXTDOMAIN_ADMIN ),
				'desc'  => __( 'Select whether you want to display or hide the border', WM_THEME_TEXTDOMAIN_ADMIN ),
				'value' => array(
					''  => __( 'Show', WM_THEME_TEXTDOMAIN_ADMIN ),
					'1' => __( 'Hide', WM_THEME_TEXTDOMAIN_ADMIN )
					)
				),
			),
		'output'           => '[devider type="++type++" height="++height++" no_border="++no_border++"]',
		'output-shortcode' => '[devider type="++type++" height="++height++" no_border="++no_border++"]'
	)

);

?>