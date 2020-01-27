<?php
/**
* Returns word count of the sentences.
*
* @since @since bizplus 1.0.0
*/
if ( ! function_exists( 'bizplus_words_count' ) ) :
	function bizplus_words_count( $length = 25, $bizplus_content = null ) {
		$length = absint( $length );
		$source_content = preg_replace( '`\[[^\]]*\]`', '', $bizplus_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '...' );
		return $trimmed_content;
	}
endif;