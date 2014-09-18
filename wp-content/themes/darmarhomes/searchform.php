<!-- Search form -->
<form method="get" id="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<fieldset>
	<label for="search-field" class="assistive-text invisible"><?php _e( 'Search for:', WM_THEME_TEXTDOMAIN ); ?></label>
	<input type="text" class="text" name="s" id="search-field" placeholder="<?php echo esc_attr( wm_option( 'general-search-placeholder' ) ); ?>" />
	<input type="submit" class="submit" value="<?php _e( 'Search', WM_THEME_TEXTDOMAIN ); ?>" id="search-submit" />
</fieldset>
</form> <!-- /search-form -->