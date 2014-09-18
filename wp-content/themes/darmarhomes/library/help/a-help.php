<?php
/*
*****************************************************
* WEBMAN'S WORDPRESS THEME FRAMEWORK
* Created by WebMan - www.webmandesign.eu
*
* Contextual help texts
*****************************************************
*/

$prefix = 'wm-help-';


/* Shortcodes help text */
$helpShortcodesText = '
	<!-- buttons -->
	<div class="shortcode-help">
		<h3 title="' . __( 'Displays button', WM_THEME_TEXTDOMAIN_HELP ) . '">' . __( 'Buttons', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
		<div class="shortcode-help-content">
			<p>
			' . __( 'Example:', WM_THEME_TEXTDOMAIN_HELP ) . '<br />
			<code class="example">
			[button url="http://www.google.com" type="" size="medium" color="cccccc" background="555555"]' . __( 'Visit Google.com', WM_THEME_TEXTDOMAIN_HELP ) . '[/button]
			</code>
			</p>
			<p>' . sprintf( __( 'Place the button title between %1$s and %2$s', WM_THEME_TEXTDOMAIN_HELP ), '<code>[button]</code>', '<code>[/button]</code>' ) . '</p>
			<table class="attributes" cellspacing="0">
			<tbody>
				<tr>
					<td><code>url</code></td>
					<td><small>' . __( 'URL', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'URL address of the button link', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
				<tr>
					<td><code>type</code></td>
					<td><small>' . __( 'predefined', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'You can use one of the predefined values:', WM_THEME_TEXTDOMAIN_HELP ) . ' gray, green, blue, orange, red ' . __( 'or leave empty for default', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
				<tr>
					<td><code>size</code></td>
					<td><small>' . __( 'predefined', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'You can use one of the predefined values:', WM_THEME_TEXTDOMAIN_HELP ) . ' medium, large ' . __( 'or leave empty for default', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
				<tr>
					<td><code>color</code></td>
					<td><small>' . __( 'hex', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'Hexadecimal value of button text color - without "#"', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
				<tr>
					<td><code>background</code></td>
					<td><small>' . __( 'hex', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'Hexadecimal value of button background color - without "#"', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>

	<!-- columns -->
	<div class="shortcode-help">
		<h3 title="' . __( 'Format text to columns', WM_THEME_TEXTDOMAIN_HELP ) . '">' . __( 'Columns', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
		<div class="shortcode-help-content">
			<p>
			' . __( 'Example:', WM_THEME_TEXTDOMAIN_HELP ) . '<br />
			<code class="example">
			[column type="1/4" last="1"]' . __( 'Column content goes here', WM_THEME_TEXTDOMAIN_HELP ) . '[/column]
			</code>
			</p>
			<p>' . sprintf( __( 'Place the column content between %1$s and %2$s', WM_THEME_TEXTDOMAIN_HELP ), '<code>[column]</code>', '<code>[/column]</code>' ) . '</p>
			<table class="attributes" cellspacing="0">
			<tbody>
				<tr>
					<td><code>type</code></td>
					<td><small>' . __( 'predefined', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'You can use one of the predefined values:', WM_THEME_TEXTDOMAIN_HELP ) . ' 1/2, 1/3, 2/3, 1/4, 3/4, 1/5, 2/5, 3/5, 4/5, 1/6, 5/6 ' . __( 'or leave empty for default', WM_THEME_TEXTDOMAIN_HELP ) . ' (1/2)</td>
				</tr>
				<tr>
					<td><code>last</code></td>
					<td><small>' . __( 'boolean', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'Set this for the last column in a column row (set "1"). Leave empty or remove the option for standard column. <br />Row exapmles:<br />', WM_THEME_TEXTDOMAIN_HELP ) . '
					1/2 - 1/4 - 1/4 last<br />
					1/3 - 1/3 - 1/3 last<br />
					1/5 - 1/5 - 2/5 - 1/5 last
					</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>

	<!-- devider -->
	<div class="shortcode-help">
		<h3 title="' . __( 'Displays specific Content Module', WM_THEME_TEXTDOMAIN_HELP ) . '">' . __( 'Content module', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
		<div class="shortcode-help-content">
			<p>
			' . __( 'Example:', WM_THEME_TEXTDOMAIN_HELP ) . '<br />
			<code class="example">
			[content_module id="123" no_thumb="1" no_link="" no_title="1" button_text="My button text" layout="center"]
			</code>
			</p>
			<p>' . __( 'No closing shortcode tag required', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
			<table class="attributes" cellspacing="0">
			<tbody>
				<tr>
					<td><code>id</code></td>
					<td><small>' . __( 'number', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'ID of specific Content Module custom post', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
				<tr>
					<td><code>no_thumb</code></td>
					<td><small>' . __( 'boolean', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'If set, no thumbnail image of Custom Module post is displayed', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
				<tr>
					<td><code>no_link</code></td>
					<td><small>' . __( 'boolean', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'If set, no custom link is applied', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
				<tr>
					<td><code>no_title</code></td>
					<td><small>' . __( 'boolean', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'If set, Custom Module title is hidden', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
				<tr>
					<td><code>button_text</code></td>
					<td><small>' . __( 'text', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'If set, button will be displayed. Requires custom link to be set in Custom Module post and enabled in this shortcode.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
				<tr>
					<td><code>layout</code></td>
					<td><small>' . __( 'text', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'Use either "center" or leave blank for default layout', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>

	<!-- devider -->
	<div class="shortcode-help">
		<h3 title="' . __( 'Displays vertical content devider (simple line or with top of the page link)', WM_THEME_TEXTDOMAIN_HELP ) . '">' . __( 'Devider', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
		<div class="shortcode-help-content">
			<p>
			' . __( 'Example:', WM_THEME_TEXTDOMAIN_HELP ) . '<br />
			<code class="example">
			[devider type="space" height="60" no_border=""]
			</code>
			</p>
			<p>' . __( 'No closing shortcode tag required', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
			<table class="attributes" cellspacing="0">
			<tbody>
				<tr>
					<td><code>type</code></td>
					<td><small>' . __( 'predefined', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'You can use one of the predefined values:', WM_THEME_TEXTDOMAIN_HELP ) . ' space, top ' . __( 'or leave empty for default', WM_THEME_TEXTDOMAIN_HELP ) . ' (space)</td>
				</tr>
				<tr>
					<td><code>height</code></td>
					<td><small>' . __( 'number', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'Sets the height of the empty space after devider (in pixels)', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
				<tr>
					<td><code>no_border</code></td>
					<td><small>' . __( 'boolean', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'If set, no devider border is displayed', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>

	<!-- dropcaps -->
	<div class="shortcode-help">
		<h3 title="' . __( 'Formats letter (or text) as dropcap', WM_THEME_TEXTDOMAIN_HELP ) . '">' . __( 'Dropcaps', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
		<div class="shortcode-help-content">
			<p>
			' . __( 'Example:', WM_THEME_TEXTDOMAIN_HELP ) . '<br />
			<code class="example">
			[dropcap type="round"]A[/dropcap]
			</code>
			</p>
			<p>' . sprintf( __( 'Place a character between %1$s and %2$s', WM_THEME_TEXTDOMAIN_HELP ), '<code>[dropcap]</code>', '<code>[/dropcap]</code>' ) . '</p>
			<table class="attributes" cellspacing="0">
			<tbody>
				<tr>
					<td><code>type</code></td>
					<td><small>' . __( 'predefined', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'You can use one of the predefined values:', WM_THEME_TEXTDOMAIN_HELP ) . ' basic, round, square ' . __( 'or leave empty for default', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>

	<!-- lists -->
	<div class="shortcode-help">
		<h3 title="' . __( 'Changes style of unordered list bullets', WM_THEME_TEXTDOMAIN_HELP ) . '">' . __( 'Lists', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
		<div class="shortcode-help-content">
			<p>
			' . __( 'Example:', WM_THEME_TEXTDOMAIN_HELP ) . '<br />
			<code class="example">
			[list type="star"] * HTML: ' . __( 'Place unordered list here', WM_THEME_TEXTDOMAIN_HELP ) . ' * [/list]
			</code>
			</p>
			<p>' . sprintf( __( 'Place an unorderd list between %1$s and %2$s', WM_THEME_TEXTDOMAIN_HELP ), '<code>[list]</code>', '<code>[/list]</code>' ) . '</p>
			<table class="attributes" cellspacing="0">
			<tbody>
				<tr>
					<td><code>type</code></td>
					<td><small>' . __( 'predefined', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'You can use one of the predefined values:', WM_THEME_TEXTDOMAIN_HELP ) . ' arrow, arrow-invert, star, star-invert, check, check-invert, plus, plus-invert ' . __( 'or leave empty for default', WM_THEME_TEXTDOMAIN_HELP ) . ' (arrow)</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>

	<!-- markers -->
	<div class="shortcode-help">
		<h3 title="' . __( 'Highlights selected text', WM_THEME_TEXTDOMAIN_HELP ) . '">' . __( 'Markers', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
		<div class="shortcode-help-content">
			<p>
			' . __( 'Example:', WM_THEME_TEXTDOMAIN_HELP ) . '<br />
			<code class="example">
			[marker type="gray" color="" background=""]' . __( 'Marker content goes here', WM_THEME_TEXTDOMAIN_HELP ) . '[/marker]
			</code>
			</p>
			<p>' . sprintf( __( 'Place the marked text between %1$s and %2$s', WM_THEME_TEXTDOMAIN_HELP ), '<code>[marker]</code>', '<code>[/marker]</code>' ) . '</p>
			<table class="attributes" cellspacing="0">
			<tbody>
				<tr>
					<td><code>type</code></td>
					<td><small>' . __( 'predefined', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'You can use one of the predefined values:', WM_THEME_TEXTDOMAIN_HELP ) . ' gray, green, blue, orange, red ' . __( 'or leave empty for default', WM_THEME_TEXTDOMAIN_HELP ) . ' (gray)</td>
				</tr>
				<tr>
					<td><code>color</code></td>
					<td><small>' . __( 'hex', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'Hexadecimal value of marked text color - without "#"', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
				<tr>
					<td><code>background</code></td>
					<td><small>' . __( 'hex', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'Hexadecimal value of marker background color - without "#"', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>

	<!-- message boxes -->
	<div class="shortcode-help">
		<h3 title="' . __( 'Displays message box', WM_THEME_TEXTDOMAIN_HELP ) . '">' . __( 'Message boxes', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
		<div class="shortcode-help-content">
			<p>
			' . __( 'Example:', WM_THEME_TEXTDOMAIN_HELP ) . '<br />
			<code class="example">
			[msg type="green" icon="check"]' . __( 'Message box content goes here', WM_THEME_TEXTDOMAIN_HELP ) . '[/msg]
			</code>
			</p>
			<p>' . sprintf( __( 'Place the message box text between %1$s and %2$s', WM_THEME_TEXTDOMAIN_HELP ), '<code>[msg]</code>', '<code>[/msg]</code>' ) . '</p>
			<table class="attributes" cellspacing="0">
			<tbody>
				<tr>
					<td><code>type</code></td>
					<td><small>' . __( 'predefined', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'You can use one of the predefined values:', WM_THEME_TEXTDOMAIN_HELP ) . ' gray, green, blue, orange, red ' . __( 'or leave empty for default', WM_THEME_TEXTDOMAIN_HELP ) . ' (gray)</td>
				</tr>
				<tr>
					<td><code>icon</code></td>
					<td><small>' . __( 'predefined', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'You can use one of the predefined values:', WM_THEME_TEXTDOMAIN_HELP ) . ' info, question, check, warning</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>

	<!-- pullquotes -->
	<div class="shortcode-help">
		<h3 title="' . __( 'Displays quotes aligned left or right from surrounding content', WM_THEME_TEXTDOMAIN_HELP ) . '">' . __( 'Pullquotes', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
		<div class="shortcode-help-content">
			<p>
			' . __( 'Example:', WM_THEME_TEXTDOMAIN_HELP ) . '<br />
			<code class="example">
			[pullquote align="left"]' . __( 'Pullquote content goes here', WM_THEME_TEXTDOMAIN_HELP ) . '[/pullquote]
			</code>
			</p>
			<p>' . sprintf( __( 'Place the quoted text between %1$s and %2$s', WM_THEME_TEXTDOMAIN_HELP ), '<code>[pullquote]</code>', '<code>[/pullquote]</code>' ) . __( 'Do not place BLOCKQUOTE HTML tag inside [pullquote][/pullquote] shortcode.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
			<table class="attributes" cellspacing="0">
			<tbody>
				<tr>
					<td><code>align</code></td>
					<td><small>' . __( 'predefined', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'You can use one of the predefined values:', WM_THEME_TEXTDOMAIN_HELP ) . ' left, right ' . __( 'or leave empty for default', WM_THEME_TEXTDOMAIN_HELP ) . ' (left)</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>
	';

$helpShortcodesInteractive = '
	<!-- accordion -->
	<div class="shortcode-help">
		<h3 title="' . __( 'Displays accordion type content revealer', WM_THEME_TEXTDOMAIN_HELP ) . '">' . __( 'Accordion', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
		<div class="shortcode-help-content">
			<p>
			' . __( 'Example:', WM_THEME_TEXTDOMAIN_HELP ) . '<br />
			<code class="example">
			[accordion auto="1"][accordion_item title="' . __( 'Accordion item title', WM_THEME_TEXTDOMAIN_HELP ) . '"]' . __( 'Accordion item content', WM_THEME_TEXTDOMAIN_HELP ) . '[/accordion_item][/accordion]
			</code>
			</p>
			<p>' . sprintf( __( 'Place the accordion item content between %1$s and %2$s', WM_THEME_TEXTDOMAIN_HELP ), '<code>[accordion_item]</code>', '<code>[/accordion_item]</code>' ) . '</p>
			<p>' . sprintf( __( 'Wrap all accordion items in %1$s and %2$s', WM_THEME_TEXTDOMAIN_HELP ), '<code>[accordion]</code>', '<code>[/accordion]</code>' ) . '</p>
			<table class="attributes" cellspacing="0">
			<tbody>
				<tr>
					<td><code>auto</code></td>
					<td><small>' . __( 'boolean', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( '"1" = create automatic accordion, empty = use defaul accordion', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
				<tr>
					<td><code>title</code></td>
					<td><small>' . __( 'text', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'Accordion item title. Clicking the title reveals the accordion section.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>

	<!-- map -->
	<div class="shortcode-help">
		<h3 title="' . __( 'Displays Google Map with specific location', WM_THEME_TEXTDOMAIN_HELP ) . '">' . __( 'Map', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
		<div class="shortcode-help-content">
			<p>
			' . __( 'Example:', WM_THEME_TEXTDOMAIN_HELP ) . '<br />
			<code class="example">
			[map location="' . __( 'My address 1, City, Country', WM_THEME_TEXTDOMAIN_HELP ) . '" width="640" height="360" zoom="14" bubble="1"]
			</code>
			</p>
			<p>' . __( 'No closing shortcode tag required', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
			<table class="attributes" cellspacing="0">
			<tbody>
				<tr>
					<td><code>location</code></td>
					<td><small>' . __( 'text', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'Your address (separate address details with comma)', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
				<tr>
					<td><code>width</code></td>
					<td><small>' . __( 'number', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'Map width in pixels', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
				<tr>
					<td><code>height</code></td>
					<td><small>' . __( 'number', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'Map height in pixels', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
				<tr>
					<td><code>zoom</code></td>
					<td><small>' . __( 'number', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'Map zoom on location (values 5 to 19)', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
				<tr>
					<td><code>bubble</code></td>
					<td><small>' . __( 'boolean', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( '"1" = show, empty = hide. Displays map bubble over location.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>

	<!-- tabs -->
	<div class="shortcode-help">
		<h3 title="' . __( 'Displays tabbed content', WM_THEME_TEXTDOMAIN_HELP ) . '">' . __( 'Tabs', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
		<div class="shortcode-help-content">
			<p>
			' . __( 'Example:', WM_THEME_TEXTDOMAIN_HELP ) . '<br />
			<code class="example">
			[tabs][tab title="' . __( 'Tab title', WM_THEME_TEXTDOMAIN_HELP ) . '"]' . __( 'Tab content', WM_THEME_TEXTDOMAIN_HELP ) . '[/tab][/tabs]
			</code>
			</p>
			<p>' . sprintf( __( 'Place the tab content between %1$s and %2$s', WM_THEME_TEXTDOMAIN_HELP ), '<code>[tab]</code>', '<code>[/tab]</code>' ) . '</p>
			<p>' . sprintf( __( 'Wrap all tab items in %1$s and %2$s', WM_THEME_TEXTDOMAIN_HELP ), '<code>[tabs]</code>', '<code>[/tabs]</code>' ) . '</p>
			<table class="attributes" cellspacing="0">
			<tbody>
				<tr>
					<td><code>title</code></td>
					<td><small>' . __( 'text', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'Tab item title. Clicking the title switches the tab section.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>

	<!-- toggle -->
	<div class="shortcode-help">
		<h3 title="' . __( 'Displays content toggler', WM_THEME_TEXTDOMAIN_HELP ) . '">' . __( 'Toggle', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
		<div class="shortcode-help-content">
			<p>
			' . __( 'Example:', WM_THEME_TEXTDOMAIN_HELP ) . '<br />
			<code class="example">
			[toggle title="' . __( 'Toggle title', WM_THEME_TEXTDOMAIN_HELP ) . '"]' . __( 'Toggle content', WM_THEME_TEXTDOMAIN_HELP ) . '[/toggle]
			</code>
			</p>
			<p>' . sprintf( __( 'Place the toggle content between %1$s and %2$s', WM_THEME_TEXTDOMAIN_HELP ), '<code>[toggle]</code>', '<code>[/toggle]</code>' ) . '</p>
			<table class="attributes" cellspacing="0">
			<tbody>
				<tr>
					<td><code>title</code></td>
					<td><small>' . __( 'text', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'Toggle item title. Clicking the title reveals the toggle section content.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>

	<!-- videos -->
	<div class="shortcode-help">
		<h3 title="' . __( 'Displays embeded video', WM_THEME_TEXTDOMAIN_HELP ) . '">' . __( 'Video', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
		<div class="shortcode-help-content">
			<p>
			' . __( 'Example:', WM_THEME_TEXTDOMAIN_HELP ) . '<br />
			<code class="example">
			[embed width="640" height="360"]' . __( 'Video URL', WM_THEME_TEXTDOMAIN_HELP ) . '[/embed]
			</code>
			</p>
			<p>' . sprintf( __( 'Place the video URL link between %1$s and %2$s and make sure WordPress does not apply automatic link on it.', WM_THEME_TEXTDOMAIN_HELP ), '<code>[embed]</code>', '<code>[/embed]</code>' ) . '</p>
			<table class="attributes" cellspacing="0">
			<tbody>
				<tr>
					<td><code>width</code></td>
					<td><small>' . __( 'number', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'Video width in pixels', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
				<tr>
					<td><code>height</code></td>
					<td><small>' . __( 'number', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'Video height in pixels', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>
	';

$helpShortcodesOthers = '
	<!-- widget area -->
	<div class="shortcode-help">
		<h3 title="' . __( 'Displays specific widget area.', WM_THEME_TEXTDOMAIN_HELP ) . '">' . __( 'Widget area', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
		<div class="shortcode-help-content">
			<p>
			' . __( 'Example:', WM_THEME_TEXTDOMAIN_HELP ) . '<br />
			<code class="example">
			[widgets area="default"]
			</code>
			</p>
			<p>' . __( 'No closing shortcode tag required', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
			<table class="attributes" cellspacing="0">
			<tbody>
				<tr>
					<td><code>area</code></td>
					<td><small>' . __( 'text', WM_THEME_TEXTDOMAIN_HELP ) . '</small></td>
					<td>' . __( 'Widget area ID', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>
	';

$visualEditorShortcodes = '
	<h3>' . __( 'The [+] button - Simple Shortcode Generator', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
	<p>' . __( 'Although the theme supports the true what-you-see-is-what-you-get content editing by using the [Styles] button instead of shortcodes, there are times you just need to insert a shortcode. The Simple Shortcode Generator allows you to customize and include a selection of special shortcodes. You can use it to include these content elements:', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
	<ul>
	<li><strong>' . __( 'Content Module', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'customize and insert a Content Module custom post into the content of the current post/page', WM_THEME_TEXTDOMAIN_HELP ) . '</li>
	<li><strong>' . __( 'Video', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'customize and insert an embeded video into the post/page content', WM_THEME_TEXTDOMAIN_HELP ) . '</li>
	<li><strong>' . __( 'Google Map', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'customize and insert a map into the post or page content', WM_THEME_TEXTDOMAIN_HELP ) . '</li>
	<li><strong>' . __( 'Widget area', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'select, which widget area will be inserted (as horizontal section) into the post or page', WM_THEME_TEXTDOMAIN_HELP ) . '</li>
	<li><strong>' . __( 'Devider', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'set and iserted a vertical devider into the post or page', WM_THEME_TEXTDOMAIN_HELP ) . '</li>
	</ul>
	<p>' . __( 'Note that Simple Shortcode Generator does not work in Internet Explorer browsers, please use another one or check the contextual help for how to insert shortcodes manually.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>';

$visualEditorStyles = '
	<h3>' . __( 'The [Styles] button', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
	<p>' . __( 'As the theme supports the true what-you-see-is-what-you-get content editing, you can use the [Styles] button to create post/page content elements on the go. [Styles] button lets you create these content elements:', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
	<ul>
	<li><strong>' . __( 'Basic styles', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'you can frame the image with "Framed image" style (just select the image and apply the style) or remove top margin from headings or paragraphs by applying the "No top margin" style on the element.', WM_THEME_TEXTDOMAIN_HELP ) . '</li>
	<li><strong>' . __( 'Accordion', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'to insert an accordion create an unordered list, select it and apply "Accordion wrapper" style. Create an accordion section toggle title by selecting the first few words (or sentence) in each section (list item) and apply the "Section title" style. Additionally you can make the accordion automatic by applying "- automatic accordion" style.', WM_THEME_TEXTDOMAIN_HELP ) . '</li>
	<li><strong>' . __( 'Buttons', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'create a link element and apply the preffered button style. To make the button larger, apply the "- medium size" or "- large size" styles on the button.', WM_THEME_TEXTDOMAIN_HELP ) . '</li>
	<li><strong>' . __( 'Code', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'wraps the selected text in the CODE HTML inline tag.', WM_THEME_TEXTDOMAIN_HELP ) . '</li>
	<li><strong>' . __( 'Columns', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'select unformated text and apply the column size. Do not forget to apply the "- last column in row" style on the last column in a row of columns.', WM_THEME_TEXTDOMAIN_HELP ) . '</li>
	<li><strong>' . __( 'Dropcaps', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'select the first letter of a paragraph and apply preffered dropcap style.', WM_THEME_TEXTDOMAIN_HELP ) . '</li>
	<li><strong>' . __( 'List items', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'create an unordered list, select it and apply preffered list style.', WM_THEME_TEXTDOMAIN_HELP ) . '</li>
	<li><strong>' . __( 'Markers', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'select a part of text and apply a marker to highlight it.', WM_THEME_TEXTDOMAIN_HELP ) . '</li>
	<li><strong>' . __( 'Message boxes', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'select an unformated text and apply a message box style. You can add an icon just by applying the icon styles on the created message box.', WM_THEME_TEXTDOMAIN_HELP ) . '</li>
	<li><strong>' . __( 'Pullquotes', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'select an unformated text and apply preffered pullquote style.', WM_THEME_TEXTDOMAIN_HELP ) . '</li>
	<li><strong>' . __( 'Tabs', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'to insert tabs create an unordered list, select it and apply "Tabs wrapper" style. To create a tab title (the actual tab), select the first few words in each section (list item) and apply the "Section title" style.', WM_THEME_TEXTDOMAIN_HELP ) . '</li>
	<li><strong>' . __( 'Toggle', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'select a heading followed by text elements and apply "Toggle wrapper" style. Then select the heading inside toggle wrapper and apply "Section title" (note that section title must be the first element in the toggle). Note that there has to be at least an empty line (or different content element) betweent toggles created with the [Styles] button. If you need the sequence of toggles withou a line space or other text between them, use [toggle] shortcode.', WM_THEME_TEXTDOMAIN_HELP ) . '</li>
	</ul>
	<p>' . __( 'Note that if you still preffer shortcodes against [Styles] button styles, you can find all supported shortcodes instructions in the appropriate section of this contextual help.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>';



$helpTexts = array(



	/*
	* PAGES
	*/
	'page' => array(
		array(
			'tabId'      => $prefix . 'page-templates',
			'tabTitle'   => __( 'Page Templates', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' =>	'<p>' . __( 'The theme comes with several predefined page templates:', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<h3>' . __( 'Blog page', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'This is not actually a page template. It is assigned to a page when "Posts page" is set under WordPress <strong>Settings / Reading > Front page displays</strong>. This theme (unlike other ones) allows to set specific blog page settings and even add a content that will be displayed above the articles list.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<h3>' . __( 'About page with team view', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'About page is standard page which displays a list of team members (from Team custom post) below the page content.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<h3>' . __( 'Contact page', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'On Contact page template your contact info and map are displayed. If you wish to display a contact form on the page, install a plugin that allows you to create forms (like Contact Form 7) and insert the form in the page content (as shortcode).', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<h3>' . __( 'Fully widgetized', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'This page template allows to create page layout from separated widget areas. As you can add any amount of widget areas in the theme admin panel and every widget in every widget area is automatically aligned, you can create amazing countless layouts with ease of drag and drop functionality.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<h3>' . __( 'Portfolio page', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'Portfolio page template displays a list of portfolio items and lets you set how the list is displayed.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<h3>' . __( 'Sitemap / archives page', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'Sitamap page lists portfolio categories, blog categories, tag archives and monthly archives. Also contains a dedicated widget area "Sitemap / Archives" that will be displayed under the page content.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>',
		),
		array(
			'tabId'      => $prefix . 'page-settings',
			'tabTitle'   => __( 'Page Settings', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' =>	'<p>' . __( 'The display of the option groups (tabs) below depends on the page template assigned.', WM_THEME_TEXTDOMAIN_HELP ) . '</p><p>' . __( 'Besides the standard page attributes it is possible to set these options:', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<h3>' . __( 'General', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'General tab lets you disable the breadcrumbs navigation specifically for this page, hide the main page title or add a subtitle.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<h3>' . __( 'Slider', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'Under Slider tab you can enable the featured content slider for this page. Simply choose one from several different slider types and tweak the options revealed. If you want the slider to display the page image gallery, just attach images to the page, save or update the page and set "Slider Content" to "Page image gallery". All attached images will be displayed below, so you can choose which will be displayed in slider. If you add an image later, always save or update the page. Images will be added to the selection after page reloads. If you decided to populate the slider with Slides custom post, you can choose specific category to display slides from.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<h3>' . __( 'Gallery', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'In this tab you can exclude images from the gallery inserted in the page content. By default, WordPress offers no easy way to do so, just by adding a parameter of image IDs to exclude to [gallery] shortcode. This theme allows you to simply select images (again, you need to save or update the page to see all the images below) you want to hide from the gallery within the page content. Afterwards you can choose to display these excluded images in separate gallery below the page content (you can additionally set the number of gallery columns for this one too). Alternativelly, the theme makes it also easier to remove images from [gallery] shortcode just by passing the parameter "remove" where you specify the position numbers of pictures you want to remove, separated by comma. For example, if you need to exclude third, fifth and sixth image from the gallery, just type [gallery remove="3,5,6"].', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<h3>' . __( 'Sidebar', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'Sidebar tab lets you choose the widget area to be displayed as sidebar on this page and the position of the sidebar. If you do not change these settings, theme defaults will be applied.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<h3>' . __( 'Design <br /><small>(only when boxed website layout used)</small>', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'Design tab lets you set the custom background image for this page.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<h3>' . __( 'Callout <br /><small>(only when enabled in Callout section of admin panel)</small>', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'Callout tab lets you override the default callout area settings for this page.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<h3>' . __( 'Portfolio <br /><small>(on Portfolio page template)</small>', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'You can choose to display filterable portfolio, where all portfolio items will be listed on the page and they can be filtered out by the category, or standard paginated portfolio list. Or you can select specific portfolio category of items to be displayed on this page (you can create multiple portfolios this way, note that filterable option will not work when the category is selected). If you want, you can override the default portfolio list layout too.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<h3>' . __( 'Contact <br /><small>(on Contact page template)</small>', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'Under Contact tab you can set the exact map location by inserting the map link obtained from Google Maps, map zoom (which overrides the one that was set on Google Maps website) and fill in your contact information. If you do not enter the map URL, your address will be used to determine the location on the map. JavaScript antispam filter is applied on your email address to prevent email harvesting.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<h3>' . __( 'Widget Areas <br /><small>(on Fully widgetized page template)</small>', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'Under this tab you can set the widget area sections displayed on Fully Widgetized page template. Some amazing layouts can be done when used wisely.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>',
		),
		array(
			'tabId'      => $prefix . 'visual-editor-styles',
			'tabTitle'   => __( '[Styles] button', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $visualEditorStyles,
		),
		array(
			'tabId'      => $prefix . 'visual-editor-shortcodes',
			'tabTitle'   => __( '[+] button', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $visualEditorShortcodes,
		),
		array(
			'tabId'      => $prefix . 'shortcodes-text',
			'tabTitle'   => __( 'Text and Layout Shortcodes', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $helpShortcodesText,
		),
		array(
			'tabId'      => $prefix . 'shortcodes-interactive',
			'tabTitle'   => __( 'Interactive and Animated Shortcodes', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $helpShortcodesInteractive,
		),
		array(
			'tabId'      => $prefix . 'shortcodes-others',
			'tabTitle'   => __( 'Other Shortcodes', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $helpShortcodesOthers,
		),
		array(
			'tabId'      => $prefix . 'slides-gallery',
			'tabTitle'   => __( 'Slider images', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' =>	'<p>' . __( 'If you are uploading gallery images to be used for slider, note that they should be at least 1200 px &times; 360 px. However, as you can set the website box padding (in admin panel under "Layout" section), the visible portion of the slider image will differ. Good rule of thumb is to keep the focus of the image in the central 960 px &times; 360 px area (framed with dashed border on the illustration bellow) while the rest of the image should be considered as background.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<p><img src="' . WM_ASSETS_ADMIN . '/img/slide.png" alt="" /></p>',
		),
	),
	'edit-page' => array(
		array(
			'tabId'      => $prefix . 'columns',
			'tabTitle'   => __( 'Table Columns', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' =>	'<p>' . __( 'You can remove specific columns from the table in Screen Options.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<table class="attributes" cellspacing="0">
				<tbody>
					<tr>
						<td>' . __( 'Title', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Displays page title. Click to edit the page.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Author', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Page creator name. Click to display pages from the author.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Comments', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Number of comments added to the page. Click to display all comments for the page.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Date', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'The date when the page was created and publish state.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Page template', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'The name of the page template if assigned.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Image', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Displays page featured image. Click to edit the page.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
				</tbody>
				</table>',
		),
	),



	/*
	* POSTS
	*/
	'post' => array(
		array(
			'tabId'      => $prefix . 'post-formats',
			'tabTitle'   => __( 'Post Formats', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' =>	'<h3>' . __( 'How to use post formats?', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'Please enable the Excerpt area in Screen Options as this is required with some post formats.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<p><strong>' . __( 'Standard', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'Standard post. You can also set featured image.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<p><strong>' . __( 'Gallery', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'This is standard post format, but can contain an image gallery. You can place the image gallery into the post content with Post editor or use the Post settings options to place the gallery after the post content. Do not forget to set featured image.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<p><strong>' . __( 'Link', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'Please place the URL address into the excerpt field. You can place the link description into the Post editor. Link will be applied on the post title in the posts list.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<p><strong>' . __( 'Quote', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'Please place the quoted text into the excerpt field. Place the quote source into the Post editor (you can use basic stylings, links). Quote will be displayed in the posts list without the post title.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<p><strong>' . __( 'Status', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'Please place the status into the Post editor. Status posts will be displayed in the posts list and can be displayed also in the website header area right from logo. Post title will not be displayed. Status post should be a short text, similar to Facebook statuses or tweets on Twitter.com.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<p><strong>' . __( 'Video', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'Please place the full video URL into the excerpt field (check the <a href="http://codex.wordpress.org/Embeds#Can_I_Use_Any_URL_With_This.3F" target="_blank">list of supported video portals</a>). You can place the video description into Post editor. Video will be displayed also in the posts list with full post content.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>',
		),
		array(
			'tabId'      => $prefix . 'post-settings',
			'tabTitle'   => __( 'Post Settings', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' =>	'<h3>' . __( 'Image gallery', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'To create an image gallery, attach images to the post and insert the gallery directly into Post editor. If you need to exclude some images from the gallery, Post settings area allows you to do so easily just by selecting them and saving the post. You can also choose to insert these excluded images after the post content (you may also want to set the number of columns). Alternativelly, the theme makes it also easier to remove images from [gallery] shortcode just by passing the parameter "remove" where you specify the position numbers of pictures you want to remove, separated by comma. For example, if you need to exclude third, fifth and sixth image from the gallery, just type [gallery remove="3,5,6"].', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<h3>' . __( 'Post author information', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'If post author information is enabled by the theme, you can hide this information for each post specifically.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<h3>' . __( 'Sidebar', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'Sidebar tab lets you choose the widget area to be displayed as sidebar on this post and the position of the sidebar. If you do not change these settings, theme defaults or blog page settings will be applied.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>',
		),
		array(
			'tabId'      => $prefix . 'visual-editor-styles',
			'tabTitle'   => __( '[Styles] button', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $visualEditorStyles,
		),
		array(
			'tabId'      => $prefix . 'visual-editor-shortcodes',
			'tabTitle'   => __( '[+] button', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $visualEditorShortcodes,
		),
		array(
			'tabId'      => $prefix . 'shortcodes-text',
			'tabTitle'   => __( 'Text and Layout Shortcodes', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $helpShortcodesText,
		),
		array(
			'tabId'      => $prefix . 'shortcodes-interactive',
			'tabTitle'   => __( 'Interactive and Animated Shortcodes', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $helpShortcodesInteractive,
		),
		array(
			'tabId'      => $prefix . 'shortcodes-others',
			'tabTitle'   => __( 'Other Shortcodes', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $helpShortcodesOthers,
		),
	),
	'edit-post' => array(
		array(
			'tabId'      => $prefix . 'columns',
			'tabTitle'   => __( 'Table Columns', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' =>	'<p>' . __( 'You can remove specific columns from the table in Screen Options.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<table class="attributes" cellspacing="0">
				<tbody>
					<tr>
						<td>' . __( 'Image', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Displays post featured image. Click to edit the post.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Title', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Displays post title. Click to edit the post.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Author', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Post creator name. Click to display posts from the author.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Categories', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Categories, the post is assigned to.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Tags', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Tags, the post was tagged with.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Comments', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Number of comments added to the post. Click to display all comments for the post.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Date', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'The date when the post was created and its publish state.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
				</tbody>
				</table>',
		),
	),



	/*
	* CP PORTFOLIO
	*/
	'wm_portfolio' => array(
		array(
			'tabId'      => $prefix . 'portfolio-settings',
			'tabTitle'   => __( 'Portfolio Settings', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' =>	'<h3>' . __( 'How the portfolio is displayed?', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'Portfolio item (project) details page consists of portfolio item title (and subtitle), item preview and item gallery, item attributes and description. Below each portfolio item content there is dedicated widget area "Portfolio Item" ready to be displayed (just assign some widgets to the area) and section of related portfolio items list (can be disabled in theme admin panel).', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<p>' . __( 'Besides the basic information (portfolio item title, description - content, featured image and categories) it is possible to set these options:', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<h3>' . __( 'General', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'You need to set the portfolio type first. Choose from single image, image slider or video. For all types you need to set featured image. Single image type will display featured image as portfolio preview. Image slider type will display image gallery slider in portfolio preview area. Video will be displayed in preview area on video portfolio item type (to display the video, enter the full video URL into the field (check the <a href="http://codex.wordpress.org/Embeds#Can_I_Use_Any_URL_With_This.3F" target="_blank">list of supported video portals</a>)).', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<p>' . __( 'If the project is web-based, you can enter the project URL link, that will be displayed in portfolio attributes area.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<p>' . __( 'If you keep the database of clients, it is simple to choose the client from the dropdown. Otherwise you can use attributes area to set client among other attributes.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<p>' . __( 'Portfolio attributes will let you add any amount of attribute-value sets for the project. You can use it for example to set client name, date of the project, used technology,...', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<h3>' . __( 'Design', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'Under design tab you can set the background image for each portfolio project page individually. Though, this is only possible when boxed website layout used.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<h3>' . __( 'Others', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'Others tab lets you set the image gallery displayed below portfolio preview. You can also hide the main title or add a subtitle.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>

				<h3>' . __( 'List image', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'When you use single image portfolio type it displays featured image as the main portfolio item preview image. In case of heigh featured images you may not be satisfied with the crop applied on the image displayed in portfolio list. This option will let you set the different image used in portfolio list.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>',
		),
		array(
			'tabId'      => $prefix . 'visual-editor-styles',
			'tabTitle'   => __( '[Styles] button', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $visualEditorStyles,
		),
		array(
			'tabId'      => $prefix . 'visual-editor-shortcodes',
			'tabTitle'   => __( '[+] button', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $visualEditorShortcodes,
		),
		array(
			'tabId'      => $prefix . 'shortcodes-text',
			'tabTitle'   => __( 'Text and Layout Shortcodes', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $helpShortcodesText,
		),
		array(
			'tabId'      => $prefix . 'shortcodes-interactive',
			'tabTitle'   => __( 'Interactive and Animated Shortcodes', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $helpShortcodesInteractive,
		),
		array(
			'tabId'      => $prefix . 'shortcodes-others',
			'tabTitle'   => __( 'Other Shortcodes', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $helpShortcodesOthers,
		),
	),
	'edit-wm_portfolio' => array(
		array(
			'tabId'      => $prefix . 'columns',
			'tabTitle'   => __( 'Table Columns', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' =>	'<p>' . __( 'You can remove specific columns from the table in Screen Options.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<table class="attributes" cellspacing="0">
				<tbody>
					<tr>
						<td>' . __( 'Image', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Displays portfolio item featured image. Click to edit the portfolio item. Please assign featured images to every portfolio item (also video items).', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Portfolio item', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Displays portfolio item title. Click to edit the portfolio item.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Published', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'The date when the portfolio item was created and its publish state.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Created by', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Portfolio item creator name. Click to display portfolio items from the author.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Type', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Portfolio item type (whether it is Single image, Image slider or Video).', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Category', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Portfolio categories, the item was assigned to. Portfolio categories are required for portfolio filtering.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Custom link', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Displays custom portfolio link URL, if set.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
				</tbody>
				</table>',
		),
	),



	/*
	* CP CLIENTS
	*/
	'wm_clients' => array(
		array(
			'tabId'      => $prefix . 'client-settings',
			'tabTitle'   => __( 'Clients Settings', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' =>	'<p>' . __( "In this section you can keep simple database of your clients. Clients can be easily assigned to every project just by selecting a client from dropdown list when editing portfolio item. Random selection of clients will be displayed in the list at the bottom of the website.", WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<p>' . __( "To add a new client, simply enter the client's name, set the clients website URL (no link will be applied if left empty) and upload a client logo into featured image area.", WM_THEME_TEXTDOMAIN_HELP ) . '</p>',
		),
	),
	'edit-wm_clients' => array(
		array(
			'tabId'      => $prefix . 'columns',
			'tabTitle'   => __( 'Table Columns', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' =>	'<p>' . __( 'You can remove specific columns from the table in Screen Options.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<table class="attributes" cellspacing="0">
				<tbody>
					<tr>
						<td>' . __( 'Logo', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Displays the client logo (featured image).', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Client name', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Company or individual client name. Click to edit the client info.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Published', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'The date when the client info was added and its publish state.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Created by', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Client info creator name. Click to display clients added by the author.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Client URL', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( "Displays the client's website URL.", WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
				</tbody>
				</table>',
		),
	),



	/*
	* CP SLIDES
	*/
	'wm_slides' => array(
		array(
			'tabId'      => $prefix . 'slides-settings',
			'tabTitle'   => __( 'Slide Settings', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' =>	'<p>' . __( 'Slides can be used to populate the featured content slider (other option is to populate slider with image gallery). You can assign slides to different slide categories and then select specific category to populate the featured content slider.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<p>' . __( "Simply set the slide title, slide featured image, link to more information (will be applied on the slide image and button), button text (when set, button will be displayed). You can also assign slide to a category and set short slide description and choose the slide caption text animation (the default animation is Fading).", WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<p>' . __( 'Note that slider images should be at least 1200 px &times; 360 px. However, as you can set the website box padding (in admin panel under "Layout" section), the visible portion of the slider image will differ. Good rule of thumb is to keep the focus of the image in the central 960 px &times; 360 px area (framed with dashed border on the illustration bellow) while the rest of the image should be considered as background.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<p><img src="' . WM_ASSETS_ADMIN . '/img/slide.png" alt="" /></p>',
		),
	),
	'edit-wm_slides' => array(
		array(
			'tabId'      => $prefix . 'columns',
			'tabTitle'   => __( 'Table Columns', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' =>	'<p>' . __( 'You can remove specific columns from the table in Screen Options.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<table class="attributes" cellspacing="0">
				<tbody>
					<tr>
						<td>' . __( 'Image', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Displays slide featured image. Click to edit the slide. Please assign featured image to every slide.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Slide title', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Displays slide item title. Click to edit the slide.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Published', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'The date when the slide was created and its publish state.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Created by', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Slide creator name. Click to display slides from the author.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Category', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Slide categories, the item was assigned to. You can select specific category when displaying the slider.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Slide link', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Displays custom slide link URL, if set.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
				</tbody>
				</table>',
		),
	),



	/*
	* CP CONTENT MODULES
	*/
	'wm_modules' => array(
		array(
			'tabId'      => $prefix . 'content-module-settings',
			'tabTitle'   => __( 'Content Module Settings', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' =>	'<p>' . __( 'Content Module is special type of content that can be displayed anywhere on the website - in page/post content, in widget area. It can be used as featured area, for example, or even as icon box (selection of icons is available). Just remember, the Content Module is not meant to be fully featured post (you can not directly access its content). It is usually short text to supplement the page or post. Used wisely can do magic.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<p>' . __( "Enter the content module title, set custom more link. Choose the content module type - content or icon module. You can set featured image for both types of content, however icon module allows you to choose from selection of icons (if featured image set, it will be prioritized against chosen icon, but displayed the same way as icon).", WM_THEME_TEXTDOMAIN_HELP ) . '</p>',
		),
		array(
			'tabId'      => $prefix . 'visual-editor-styles',
			'tabTitle'   => __( '[Styles] button', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $visualEditorStyles,
		),
		array(
			'tabId'      => $prefix . 'visual-editor-shortcodes',
			'tabTitle'   => __( '[+] button', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $visualEditorShortcodes,
		),
		array(
			'tabId'      => $prefix . 'shortcodes-text',
			'tabTitle'   => __( 'Text and Layout Shortcodes', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $helpShortcodesText,
		),
		array(
			'tabId'      => $prefix . 'shortcodes-interactive',
			'tabTitle'   => __( 'Interactive and Animated Shortcodes', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $helpShortcodesInteractive,
		),
		array(
			'tabId'      => $prefix . 'shortcodes-others',
			'tabTitle'   => __( 'Other Shortcodes', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $helpShortcodesOthers,
		),
	),
	'edit-wm_modules' => array(
		array(
			'tabId'      => $prefix . 'columns',
			'tabTitle'   => __( 'Table Columns', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' =>	'<p>' . __( 'You can remove specific columns from the table in Screen Options.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<table class="attributes" cellspacing="0">
				<tbody>
					<tr>
						<td>' . __( 'Image [type]', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Displays content module featured image and its type (if normal content module used, no type is displayed, if module is of type "Icon module", the type will be displayed in [] brackets). Click the image to edit the module.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Content module', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Displays content module title. Click to edit the module.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Published', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'The date when the content module was created and its publish state.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Created by', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Content module creator name. Click to display modules from the author.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'More info link', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Displays custom content module link URL, if set.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Shortcode', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'You can easily display this Content Module in post or page. Just copy this shortcode and insert it into the post content. (For more information on other options check contextual help for [content_module] shortcode when editing the post.)', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
				</tbody>
				</table>',
		),
	),



	/*
	* CP TEAM
	*/
	'wm_team' => array(
		array(
			'tabId'      => $prefix . 'team-member-settings',
			'tabTitle'   => __( 'Team Member Settings', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' =>	'<p>' . __( 'Team members will be displayed on the special "About" page tamplate.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<p>' . __( "Enter member's full name, upload member's photo (as featured image), set member's position in the team (like Web Designer, for example), short biographical information (will be displayed when mouse hovers over the person in team members list on About page) and basic social networking links.", WM_THEME_TEXTDOMAIN_HELP ) . '</p>',
		),
	),
	'edit-wm_team' => array(
		array(
			'tabId'      => $prefix . 'columns',
			'tabTitle'   => __( 'Table Columns', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' =>	'<p>' . __( 'You can remove specific columns from the table in Screen Options.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<table class="attributes" cellspacing="0">
				<tbody>
					<tr>
						<td>' . __( 'Image', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Displays team member photo (featured image).', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Name', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Team member name. Click to edit the member info.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Published', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'The date when the team member info was added and its publish state.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Created by', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Team member info creator name. Click to display team members added by the author.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'Position', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Position, role of the team member.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
					<tr>
						<td>' . __( 'About', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
						<td>' . __( 'Team member information text.', WM_THEME_TEXTDOMAIN_HELP ) . '</td>
					</tr>
				</tbody>
				</table>',
		),
	),



	/*
	* WIDGETS
	*/
	'widgets' => array(
		array(
			'tabId'      => $prefix . 'widget-colors',
			'tabTitle'   => __( 'Different Colors?', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' =>	'<h3>' . __( 'Why the colors are strange?', WM_THEME_TEXTDOMAIN_HELP ) . '</h3>
				<p>' . __( 'This is just a matter of preference. It seems to help to find the right widget and widget area faster. WebMan widgets are coloured dark to separate them from WordPress default and other widgets. Also every custom widget area created in the theme admin panel is coloured blue (these can be removed, added, reordered - do anything from within theme admin panel).', WM_THEME_TEXTDOMAIN_HELP ) . '</p>',
		),
		array(
			'tabId'      => $prefix . 'shortcodes-text',
			'tabTitle'   => __( 'Text and Layout Shortcodes', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $helpShortcodesText,
		),
		array(
			'tabId'      => $prefix . 'shortcodes-interactive',
			'tabTitle'   => __( 'Interactive and Animated Shortcodes', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $helpShortcodesInteractive,
		),
		array(
			'tabId'      => $prefix . 'shortcodes-others',
			'tabTitle'   => __( 'Other Shortcodes', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => $helpShortcodesOthers,
		),
	),



	/*
	* MENUS
	*/
	'nav-menus' => array(
		array(
			'tabId'      => $prefix . 'general',
			'tabTitle'   => __( 'Theme Menu Locations', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' =>
				'<p>' . __( 'The theme allows you to create as many menus as you want. However these menus can be placed only into two predefined positions.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<p><strong>' . __( 'Main navigation', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'This is main navigation area in the header of the website. The menu can be nested and hierarchically organised. Subtle animation is applied when revealing submenu items, but the menu will work even with JavaScript disabled.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>
				<p><strong>' . __( 'Footer navigation', WM_THEME_TEXTDOMAIN_HELP ) . '</strong> - ' . __( 'This is navigation area displayed in the website footer just above credits. Just first hierarchical level of the menu will be displayed, so no need for nested items.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>',
		),
	),



	/*
	* USER PROFILE
	*/
	'profile' => array(
		array(
			'tabId'      => $prefix . 'contact-info',
			'tabTitle'   => __( 'Contact Info', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => '<p>' . __( 'The new contact info fields were added by the theme: Twitter link, Facebook link and Google+ link.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>',
		),
		array(
			'tabId'      => $prefix . 'bio',
			'tabTitle'   => __( 'Biography', WM_THEME_TEXTDOMAIN_HELP ),
			'tabContent' => '<p>' . __( 'Please enter your Biographical Info if you are displaying post author details on the website below posts.', WM_THEME_TEXTDOMAIN_HELP ) . '</p>',
		),
	),



	/*
	* ADMIN PANEL
	*/
	'toplevel_page_' . WM_THEME_SHORTNAME . '-options' => array(
		array(
			'tabId'      => $prefix . 'general',
			'tabTitle'   => __( 'WebMan Admin Panel', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			'tabContent' => '<h3>' . __( 'How to use WebMan Admin Panel', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</h3>
				<p>' . __( 'Welcome to beautiful WebMan Admin Panel. It is as easy to use as it gets and offers several different intuitive options fields and input types which help to set the right option values.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p>' . __( 'Admin Panel consists of <em>main navigation panel</em> on the left which contains options categories, <em>admin panel header</em> (displays theme name and version, submit button and tabbed <em>category subnavigation</em>), <em>section screen</em> which contains all the settings options for the selected category and <em>footer</em> where you can find another submit button (and, if enabled, also reset button). Submit buttons are conveniently placed in upper right and lower right corner of the panel for easy access. ', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p>' . __( 'To switch the section screen select a category in the main navigation panel on the left and choose the sub section by clicking the tab in the header of each section screen. Options grouped under the section screen will be displayed.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>',
		),
		array(
			'tabId'      => $prefix . 'section-general',
			'tabTitle'   => __( 'General options', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			'tabContent' => '
				<h3>' . __( 'Basic tab', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</h3>
				<p>' . __( 'You can set the basic and generalized theme settings here, like footer credits text, disabling certain custom posts, set privileges to custom posts, set comments defaults and other settings.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p><strong>' . __( 'Recommended to set?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</strong><br />' .
				__( 'Credits (copyright) text, Custom posts treatment, Comments', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) .
				'</p>

				<h3>' . __( 'Widget areas tab', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</h3>
				<p>' . __( 'Yes, you can create any number of widget areas very easily. Just pres the [+] button, type in the name of the new widget area and save the settings. The areas will be added below the predefined ones and coloured blue to separate them visually from the predefined widget areas. Please note, that when you rename already created widget area, all the widgets assigned to it will be lost, so make sure you first "backup" the widgets by dragging them into "Inactive Widgets" area of widgets management screen. To delete the area simply press the [x] button left from widget area title.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p><strong>' . __( 'Recommended to set?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</strong><br />' .
				__( 'This is completely optional setting.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) .
				'</p>

				<h3>' . __( 'Tracking tab', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</h3>
				<p>' . __( 'You can place custom JavaScript code in these fields. Like Google Analytics script. Please enter the script enclosed in HTML script tags. Where you place the script (whether into HTML head or page footer) is up to you, although recommended placement is in the footer.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p><strong>' . __( 'Recommended to set?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</strong><br />' .
				__( 'This is completely optional setting.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) .
				'</p>

				<h3>' . __( 'Export / import tab', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</h3>
				<p>' . __( 'You can even export all your settings. Just copy the string in Export field and paste it into an external text file. Anytime in the future you can restore those settings by copying them from the external file and pasting them into import field and save the settings. Note that by importing new settings you will loose all current ones.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p><strong>' . __( 'Recommended to set?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</strong><br />' .
				__( 'It is recommended to keep the backup copy of your settings, but it is completely optional.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) .
				'</p>',
		),
		array(
			'tabId'      => $prefix . 'section-cta',
			'tabTitle'   => __( 'Callout options', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			'tabContent' => '
				<h3>' . __( 'Callout tab', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</h3>
				<p>' . __( 'Callout (or call to action) area is displayed on homepage (by default) in between the website header and content area. You can place a simple welcome text here, or direct the visitor to your product or landing page by placing a button after text. In this tab you can set all the options related to callout area.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p><strong>' . __( 'Recommended to set?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</strong><br />' .
				__( 'Well, this is completely optional', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) .
				'</p>',
		),
		array(
			'tabId'      => $prefix . 'section-slider',
			'tabTitle'   => __( 'Slider options', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			'tabContent' => '
				<p>' . __( 'The theme allows you to choose from several different featured content sliders. You can find settings options for each one of them in this section. Other settings related to slider can be set on per Page basis.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p><strong>' . __( 'Recommended to set?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</strong><br />' .
				__( 'Definitelly have a look...', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) .
				'</p>'
		),
		array(
			'tabId'      => $prefix . 'section-blog',
			'tabTitle'   => __( 'Blog options', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			'tabContent' => '
				<h3>' . __( 'Blog tab', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</h3>
				<p>' . __( 'Here you will find all the settings related to your blog.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p><strong>' . __( 'Recommended to set?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</strong><br />' .
				__( 'Please, go through all of these settings and tweak them to your needs.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) .
				'</p>',
		),
		array(
			'tabId'      => $prefix . 'section-social',
			'tabTitle'   => __( 'Social Links options', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			'tabContent' => '
				<h3>' . __( 'Social networking tab', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</h3>
				<p>' . __( "Please use WebMan's unique way of adding a social networking links into the theme. Social icons will be displayed on the right side of website header, but you can disable them altogether by setting the option below.", WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p>' . __( "To add a new social link just press the [+] button and type in the link. That's really it :). The theme will automatically assign the social network icon (not all social networks are recognized by the theme, of course - check the Social Networking option description for the list of supported networks).", WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p>' . __( 'For RSS prepend the link with "rss:". If you set the RSS link here, it will be used as the main website RSS link.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p><strong>' . __( 'Recommended to set?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</strong><br />' .
				__( 'This is optional', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) .
				'</p>',
		),
		array(
			'tabId'      => $prefix . 'section-layout',
			'tabTitle'   => __( 'Layout options', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			'tabContent' => '
				<h3>' . __( 'Layout settings tab', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</h3>
				<p>' . __( 'Here you can set the main website layout and tweek its basic attributes. Also set the global portfolio layout settings (for portfolio items list and portfolio item detail page).', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p><strong>' . __( 'Recommended to set?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</strong><br />' .
				__( 'Website layout, Box padding, Portfolio list layout', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) .
				'</p>

				<h3>' . __( 'Website sections tab', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</h3>
				<p>' . __( 'You can set the layout of several website sections here. Start with website header which displays a special "hidden" area, that can be used for quick contact information or anything else, and status posts area. Continue with settings of main heading, callout and slider area display order. The last available settings on this screen is clients (or partners,...) list section.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p><strong>' . __( 'Recommended to set?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</strong><br />' .
				__( 'Status area margin, Special menu area title, Clients section title', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) .
				'</p>',
		),
		array(
			'tabId'      => $prefix . 'section-design',
			'tabTitle'   => __( 'Design options', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			'tabContent' => '
				<h3>' . __( 'Design tab', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</h3>
				<p>' . __( 'Website can be designed to your needs. Start by selecting the website color skin. (Note that after changing the color skin you will loose any color or font changes you made after saving the options.)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p>' . __( 'Althouth the website color skin is set, you can override its colors by setting them below. All text colors will be set automatically to assure the best readability (you can tweak the Background color brightness treshold to change how automatic color works).', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p>' . __( 'Please set the icons that you wish to use on the website.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p>' . __( 'The theme allows you to set the main HTML container, main website container, header, slider, callout, main heading, clients section and footer background (and text) colors. For background you can set the color, background image (and its position) or background pattern. The pattern takes priority against the background image and color. For automatic text color please set the background color even if you are using the background image or pattern. Try to match the background color to background image (or pattern) color feel.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p><strong>' . __( 'Recommended to set?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</strong><br />' .
				__( 'Website color skin, Custom icons packs', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) .
				'</p>

				<h3>' . __( 'Branding tab', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</h3>
				<p>' . __( 'As the website is all about you, it is important to brand it as much as possible. WebMan allows you to set the website logo, its position, favicon and touch icon. And yes, you can even brand WordPress admin area - set the admin page logo and footer text.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p><strong>' . __( 'Recommended to set?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</strong><br />' .
				__( 'Definitelly take a look at these settings...', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) .
				'</p>

				<h3>' . __( 'Login tab', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</h3>
				<p>' . __( 'Just like the design of the website you can actually style the WordPress login screen. The WebMan Admin Panel allows you to set custom login logo, login page background, login form background and login button color. All the text colors will be set automatically for the best contrast with the background color.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p><strong>' . __( 'Recommended to set?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</strong><br />' .
				__( 'Login logo, Logo container height', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) .
				'</p>

				<h3>' . __( 'Fonts tab', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</h3>
				<p>' . __( 'You can set most of the font related settings here, even include a new custom fonts (just place the HTML link tag for your custom font stylesheet into the Custom font embeding field). It is possible to manipulate the font stacks used by the theme - just remember to separate each font with a comma (as you would in CSS stylesheet). Then assign these font stacks to general website and headings font family and set their sizes.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p><strong>' . __( 'Recommended to set?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</strong><br />' .
				__( 'Basic font size', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) .
				'</p>

				<h3>' . __( 'CSS styles tab', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</h3>
				<p>' . __( 'Here you can set the basic (and advanced) CSS stuff. It is strongly recommended to enable CSS minimization as it speeds up website loading time. Into Custom CSS field you can place your custom CSS code that will be included in the main theme CSS stylesheet file.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p><strong>' . __( 'Recommended to set?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</strong><br />' .
				__( 'Minimize CSS', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) .
				'</p>',
		),
		array(
			'tabId'      => $prefix . 'section-seo',
			'tabTitle'   => __( 'SEO Settings options', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			'tabContent' => '
				<h3>' . __( 'Basic SEO tab', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</h3>
				<p>' . __( 'The theme is optimized for search engine and do lots of SEO trickery automatically behind the scene. Although it needs some help, so please take time to set the default meta keywords and description of your website. You can even set the meta title separator that will be displayed in the browser title bar.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p><strong>' . __( 'Recommended to set?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</strong><br />' .
				__( 'Default meta keywords, Default meta description', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) .
				'</p>

				<h3>' . __( 'Breadcrumbs tab', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</h3>
				<p>' . __( 'Breadcrumbs navigation is displayed just above the main page content. It makes it easier to follow the website page hierarchy and it is recommended also as good search engine optimization tool to ease the website crawling.', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p><strong>' . __( 'Recommended to set?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</strong><br />' .
				__( 'Portfolio list page', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) .
				'</p>',
		),
		array(
			'tabId'      => $prefix . 'section-security',
			'tabTitle'   => __( 'Security options', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ),
			'tabContent' => '
				<h3>' . __( 'Security settings tab', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</h3>
				<p>' . __( 'For better WordPress security it is recommended to go through these settings and take the appropriate actions. There are some usefull WordPress security tips at the bottom too ;)', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</p>
				<p><strong>' . __( 'Recommended to set?', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) . '</strong><br />' .
				__( 'Replace login errors, Disable WordPress version, Disable Windows Live Writer support', WM_THEME_TEXTDOMAIN_ADMIN_PANEL ) .
				'</p>',
		),
	),

);

?>