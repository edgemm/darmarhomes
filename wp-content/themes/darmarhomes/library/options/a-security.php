<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* WebMan Options Panel - Security section
*****************************************************
*/

$prefix = 'security-';

array_push( $options,

array(
	"type" => "section-open",
	"section-id" => "security",
	"title" => __( 'Security', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
),

	array(
		"type" => "sub-tabs",
		"parent-section-id" => "security",
		"list" => array(
			__( 'Security settings', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
			)
	),

	array(
		"type" => "sub-section-open",
		"sub-section-id" => "security-1",
		"title" => __( 'Security settings', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
	),
		array(
			"type" => "heading3",
			"content" => __( 'Basic WordPress security', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"class" => "first"
		),
		array(
			"type" => "info",
			"content" => __( 'For security reasons it is recommended to check all the options below. Uncheck only ifs you really need the option to be enabled.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "space"
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."login-error",
			"label" => __( 'Replace login errors', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Login error messages will be replaced with generic one', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => "true"
		),
		array(
			"type" => "space"
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."wp-version",
			"label" => __( 'Disable WordPress version', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'WordPress version will be removed from HTML head', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => "true"
		),
		array(
			"type" => "space"
		),
		array(
			"type" => "checkbox",
			"id" => $prefix."live-writer",
			"label" => __( 'Disable Windows Live Writer support', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"desc" => __( 'Eliminate potentional security risk by removing Windows Live Writer support', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			"default" => "true"
		),
		array(
			"type" => "hr"
		),
		array(
			"type" => "heading3",
			"content" => __( 'WordPress security tips', WM_THEME_TEXTDOMAIN_ADMIN_PANEL )
		),
		array(
			"type" => "paragraph",
			"content" => '<p>' . __( 'You can improve your WordPress installation by these aditional steps:', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>' .
				'<ul class="bullets">' .
				'<li>' . __( 'Set the Authentication Unique Keys and Salts in "wp-config.php" file', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</li>' .
				'<li>' . __( 'Set the $table_prefix variable in "wp-config.php" file (do not use the default value "wp_")', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</li>' .
				'<li>' . __( 'Do not use "admin" as user name and set strong passwords', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</li>' .
				'<li>' . __( 'After installation remove "wp-admin/install.php" file', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</li>' .
				'<li>' . __( 'Keep backups of the database and WordPress installation', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</li>' .
				'<li>' . __( 'Keep your WordPress installation up to date', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</li>' .
				'</ul>' .
				'<p>' . __( 'To take the additional security steps it is recommended to install additional security plugins like:', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>' .
				'<ul class="bullets">' .
				'<li><a href="http://wordpress.org/extend/plugins/wp-security-scan/">WP Security Scan</a></li>' .
				'<li><a href="http://wordpress.org/extend/plugins/ultimate-security-checker/">Ultimate Security Checker</a></li>' .
				'<li><a href="http://wordpress.org/extend/plugins/secure-wordpress/">Secure WordPress</a></li>' .
				'<li><a href="http://wordpress.org/extend/plugins/better-wp-security/">Better WP Security</a></li>' .
				'<li><a href="http://wordpress.org/extend/plugins/login-lockdown/">Login LockDown</a></li>' .
				'<li><a href="http://wordpress.org/extend/plugins/wp-db-backup/">WP-DB-Backup</a></li>' .
				'</ul>'
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