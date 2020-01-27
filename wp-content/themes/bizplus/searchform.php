<?php
/**
 * Template for displaying search forms
 *
 */
?>

<?php global $bizplus_customizer_all_values; ?>
<form role="search" method="get" id="search-target" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-inner">
	<label>
		<span class="screen-reader-text"><?php esc_html_e('Search for:', 'bizplus' ); ?></span>
	    <input type="search" class="search-field" placeholder="<?php echo esc_html( $bizplus_customizer_all_values['bizplus-search-place-holder'], 'bizplus' ); ?>" value="" name="s">
    </label>
	    <input type="submit" class="search-submit" value="Search">
	</div>
</form>
