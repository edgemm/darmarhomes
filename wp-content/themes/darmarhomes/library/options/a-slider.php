<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* WebMan Options Panel - Sliders section
*****************************************************
*/

$prefix = 'slider-';

$easingOptions = array(
	'none'             => __( 'No easing', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),

	'easeInBack'       => __( 'Back In', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
	'easeOutBack'      => __( 'Back Out', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
	'easeInOutBack'    => __( 'Back In Out', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),

	'easeInBounce'     => __( 'Bounce In', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
	'easeOutBounce'    => __( 'Bounce Out', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
	'easeInOutBounce'  => __( 'Bounce In Out', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),

	'easeInCirc'       => __( 'Circ In', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
	'easeOutCirc'      => __( 'Circ Out', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
	'easeInOutCirc'    => __( 'Circ In Out', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),

	'easeInCubic'      => __( 'Cubic In', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
	'easeOutCubic'     => __( 'Cubic Out', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
	'easeInOutCubic'   => __( 'Cubic In Out', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),

	'easeInElastic'    => __( 'Elastic In', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
	'easeOutElastic'   => __( 'Elastic Out', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
	'easeInOutElastic' => __( 'Elastic In Out', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),

	'easeInExpo'       => __( 'Expo In', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
	'easeOutExpo'      => __( 'Expo Out', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
	'easeInOutExpo'    => __( 'Expo In Out', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),

	'easeInQuad'       => __( 'Quad In', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
	'easeOutQuad'      => __( 'Quad Out', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
	'easeInOutQuad'    => __( 'Quad In Out', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),

	'easeInQuart'      => __( 'Quart In', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
	'easeOutQuart'     => __( 'Quart Out', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
	'easeInOutQuart'   => __( 'Quart In Out', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),

	'easeInQuint'      => __( 'Quint In', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
	'easeOutQuint'     => __( 'Quint Out', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
	'easeInOutQuint'   => __( 'Quint In Out', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),

	'easeInSine'       => __( 'Sine In', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
	'easeOutSine'      => __( 'Sine Out', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
	'easeInOutSine'    => __( 'Sine In Out', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
);

array_push( $options,

array(
	"type" => "section-open",
	"section-id" => "slider",
	"title" => __( 'Slider', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
),

	array(
		"type" => "sub-tabs",
		"parent-section-id" => "slider",
		"list" => array(
			__( 'General', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			__( 'Nivo Slider', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			__( 'Kwicks Accordion', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			__( 'Roundabout Slider', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			__( 'Simple Slider', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			)
	),



	array(
		"type" => "sub-section-open",
		"sub-section-id" => "slider-1",
		"title" => __( 'General', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "heading3",
			"content" => __( 'General slider settings', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"class" => "first"
		),
		array(
			"type" => "slider",
			"id" => $prefix."max-number",
			"label" => __( 'Maximum number of slides', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Set the maximum number of slides (note that more slides in slider means more time to load the page)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => 8,
			"min" => 1,
			"max" => 50,
			"step" => 1,
			"validate" => "absint"
		),
		array(
			"type" => "hrtop"
		),
	array(
		"type" => "sub-section-close"
	),



	array(
		"type" => "sub-section-open",
		"sub-section-id" => "slider-2",
		"title" => __( 'Nivo Slider', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "heading3",
			"content" => __( 'Nivo Slider customization', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"class" => "first"
		),

		array(
			"type" => "slider",
			"id" => $prefix."nivo-"."pauseTime",
			"label" => __( 'Slide display time', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Time of slide being displayed (in miliseconds)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => 5000,
			"min" => 500,
			"max" => 12000,
			"step" => 250,
			"validate" => "absint"
		),
		array(
			"type" => "slider",
			"id" => $prefix."nivo-"."animSpeed",
			"label" => __( 'Transition speed', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Speed of transition effect between slides (in miliseconds)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => 400,
			"min" => 50,
			"max" => 2000,
			"step" => 50,
			"validate" => "absint"
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."nivo-"."manualAdvance",
			"label" => __( 'Disable automatic animation', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Only manual slide switching will be available', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"value" => "true"
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."nivo-"."pauseOnHover",
			"label" => __( 'Pause on hover', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Stop animation on mouse hovering the slider', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"value" => "true"
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."nivo-"."randomStart",
			"label" => __( 'Start at random slide', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Start animation on random slide', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"value" => "true"
		),
		array(
			"type" => "hr"
		),

		array(
			"type" => "select",
			"id" => $prefix."nivo-"."effect",
			"label" => __( 'Animation effect', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Choose Nivo slider animation effect', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"options" => array(
				'sliceDown'          => __( 'Slice down', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'sliceDownLeft'      => __( 'Slice down (right to left)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'sliceUp'            => __( 'Slice up', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'sliceUpLeft'        => __( 'Slice up (right to left)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'sliceUpDown'        => __( 'Slice up and down', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'sliceUpDownLeft'    => __( 'Slice up and down (right to left)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'fold'               => __( 'Folding', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'fade'               => __( 'Fading', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'slideInRight'       => __( 'Slide in', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'slideInLeft'        => __( 'Slide in from right', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'boxRain'            => __( 'Rain', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'boxRainReverse'     => __( 'Rain reverse', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'boxRainGrow'        => __( 'Rain grow', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'boxRainGrowReverse' => __( 'Rain grow reverse', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'boxRandom'          => __( 'Random boxes', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'random'             => __( 'Random', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
				),
			"default" => "sliceDown"
		),
		array(
			"type" => "slider",
			"id" => $prefix."nivo-"."slices",
			"label" => __( 'Slices count', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Number of slices for "Slice" animations', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => 8,
			"min" => 1,
			"max" => 16,
			"step" => 1,
			"validate" => "absint"
		),
		array(
			"type" => "slider",
			"id" => $prefix."nivo-"."boxCols",
			"label" => __( 'Box columns count', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Horizontal number of boxes for "Rain" and "Boxes" animations', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => 8,
			"min" => 1,
			"max" => 16,
			"step" => 1,
			"validate" => "absint"
		),
		array(
			"type" => "slider",
			"id" => $prefix."nivo-"."boxRows",
			"label" => __( 'Box rows count', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Vertical number of boxes for "Rain" and "Boxes" animations', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => 4,
			"min" => 1,
			"max" => 12,
			"step" => 1,
			"validate" => "absint"
		),
		array(
			"type" => "hr"
		),

		array(
			"type" => "checkbox",
			"id" => $prefix."nivo-"."controlNav",
			"label" => __( 'Enable navigation buttons', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Use slides navigation buttons', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"value" => "true"
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."nivo-"."directionNavHide",
			"label" => __( 'Hide navigation arrows', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Displays prev/next slide navigation only when mouse hovers over the slider', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"value" => "true"
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."nivo-"."directionNav",
			"label" => __( 'Disable navigation arrows', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Do not use the default prev/next navigation', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"value" => "false"
		),
		array(
			"type" => "hrtop"
		),
	array(
		"type" => "sub-section-close"
	),



	array(
		"type" => "sub-section-open",
		"sub-section-id" => "slider-3",
		"title" => __( 'Kwicks Accordion', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "heading3",
			"content" => __( 'Kwicks Accordion customization', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"class" => "first"
		),

		array(
			"type" => "slider",
			"id" => $prefix."kwicks-"."duration",
			"label" => __( 'Transition speed', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Speed of transition effect between slides (in miliseconds)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => 400,
			"min" => 50,
			"max" => 2000,
			"step" => 50,
			"validate" => "absint"
		),
		array(
			"type" => "hr"
		),
		array(
			"type" => "slider",
			"id" => $prefix."kwicks-"."min",
			"label" => __( 'Minimal slide width', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Shrunk slide width minimal in pixels', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => 90,
			"min" => 50,
			"max" => 480,
			"step" => 10,
			"validate" => "absint"
		),
		array(
			"type" => "select",
			"id" => $prefix."kwicks-"."easing",
			"label" => __( 'Easing effect', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Choose Kwicks Accordion easing effect', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"options" => $easingOptions,
			"default" => "none"
		),
		array(
			"type" => "hrtop"
		),
	array(
		"type" => "sub-section-close"
	),



	array(
		"type" => "sub-section-open",
		"sub-section-id" => "slider-4",
		"title" => __( 'Roundabout Slider', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "heading3",
			"content" => __( 'Roundabout Slider customization', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"class" => "first"
		),

		array(
			"type" => "slider",
			"id" => $prefix."roundabout-"."autoplayDuration",
			"label" => __( 'Slide display time', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Time of slide being displayed (in miliseconds)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => 5000,
			"min" => 500,
			"max" => 12000,
			"step" => 250,
			"validate" => "absint"
		),
		array(
			"type" => "slider",
			"id" => $prefix."roundabout-"."duration",
			"label" => __( 'Transition speed', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Speed of transition effect between slides (in miliseconds)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => 400,
			"min" => 50,
			"max" => 2000,
			"step" => 50,
			"validate" => "absint"
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."roundabout-"."autoplay",
			"label" => __( 'Disable automatic animation', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Only manual slide switching will be available', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"value" => "false"
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."roundabout-"."autoplayPauseOnHover",
			"label" => __( 'Pause on mouse hover', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Stops the automatic rotation when mouse hovers over slider', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"value" => "true"
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."roundabout-"."reflect",
			"label" => __( 'Switch direction', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Changes automatic rotation direction (left to right)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"value" => "true"
		),
		array(
			"type" => "hr"
		),

		array(
			"type" => "select",
			"id" => $prefix."roundabout-"."shape",
			"label" => __( 'Animation effect', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Choose Roundabout slider animation effect', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"options" => array(
				'lazySusan'         => __( 'Lazy Susan', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				//'waterWheel'      => __( 'Water Wheel', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'figure8'           => __( 'Figure 8', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'square'            => __( 'Square', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				//'conveyorBeltLeft'  => __( 'Conveyor Belt (Left)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				//'conveyorBeltRight' => __( 'Conveyor Belt (Right)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'diagonalRingLeft'  => __( 'Diagonal Ring (Left)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'diagonalRingRight' => __( 'Diagonal Ring (Right)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'rollerCoaster'     => __( 'Roller Coaster', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				'tearDrop'          => __( 'Tear Drop', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				//'theJuggler'        => __( 'The Juggler', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
				//'goodbyeCruelWorld' => __( 'Goodbye Cruel World', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
				),
			"default" => "lazySusan"
		),
		array(
			"type" => "select",
			"id" => $prefix."roundabout-"."easing",
			"label" => __( 'Easing effect', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Choose Roundabout slider easing effect', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"options" => $easingOptions,
			"default" => "none"
		),
		array(
			"type" => "slider",
			"id" => $prefix."roundabout-"."tilt",
			"label" => __( 'Animation tilting', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Sets the tilt of the slides during certain animation effects', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => 0,
			"min" => -300,
			"max" => 300,
			"step" => 1,
			"validate" => "int",
			"zero" => true
		),
		array(
			"type" => "slider",
			"id" => $prefix."roundabout-"."minOpacity",
			"label" => __( 'The backmost slide opacity', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Set the lowes transparency of the background slides in % against focused slide', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => 40,
			"min" => 5,
			"max" => 100,
			"step" => 5,
			"validate" => "absint"
		),
		array(
			"type" => "slider",
			"id" => $prefix."roundabout-"."minScale",
			"label" => __( 'The backmost slide size', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Set the smallest size of the background slides in % against focused slide', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => 40,
			"min" => 5,
			"max" => 100,
			"step" => 5,
			"validate" => "absint"
		),
		array(
			"type" => "hr"
		),

		array(
			"type" => "checkbox",
			"id" => $prefix."roundabout-"."enableDrag",
			"label" => __( 'Enable dragging', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Allows controlling the animation by dragging slides on touch screens', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"value" => "false"
		),
		array(
			"type" => "space"
		),
		array(
			"type" => "slider",
			"id" => $prefix."roundabout-"."dropDuration",
			"label" => __( 'Dragging transition speed', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Speed of transitioning between slides (in miliseconds) when dragging', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => 600,
			"min" => 50,
			"max" => 2000,
			"step" => 50,
			"validate" => "absint"
		),
		array(
			"type" => "hrtop"
		),
	array(
		"type" => "sub-section-close"
	),



	array(
		"type" => "sub-section-open",
		"sub-section-id" => "slider-5",
		"title" => __( 'Simple Slider', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "heading3",
			"content" => __( 'Simple Slider customization', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"class" => "first"
		),

		array(
			"type" => "slider",
			"id" => $prefix."simple-"."slideDuration",
			"label" => __( 'Slide display time', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Time of slide being displayed (in miliseconds)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => 5000,
			"min" => 500,
			"max" => 12000,
			"step" => 250,
			"validate" => "absint"
		),
		array(
			"type" => "slider",
			"id" => $prefix."simple-"."transitionTime",
			"label" => __( 'Transition speed', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Speed of transition effect between slides (in miliseconds)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => 400,
			"min" => 50,
			"max" => 2000,
			"step" => 50,
			"validate" => "absint"
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

?>