<?php
/**
 * The default template for displaying header
 *
 * @package bizplus
 * @since BizPlus 1.0.0
 */

/**
 * bizplus_action_before_head hook
 * @since BizPlus 1.0.0
 *
 * @hooked bizplus_set_global -  0
 * @hooked bizplus_doctype -  10
 */
do_action( 'bizplus_action_before_head' );?>



<head>

	<?php
	/**
	 * bizplus_action_before_wp_head hook
	 * @since BizPlus 1.0.0
	 *
	 * @hooked bizplus_before_wp_head -  10
	 */
	do_action( 'bizplus_action_before_wp_head' );

	wp_head();

	/**
	 * bizplus_action_after_wp_head hook
	 * @since BizPlus 1.0.0
	 *
	 * @hooked null
	 */
	do_action( 'bizplus_action_after_wp_head' );
	?>

</head>

<body <?php body_class(); ?>>

<!-- loader -->
<div id="load-wrap">
	<svg height="80" width="80" viewBox="-180 -180 360 360">
	  <g><circle r="160"></circle></g>
	</svg>
	<svg id="move-stroke" height="80" width="80" viewBox="-180 -180 360 360">
	  <g><circle r="160"></circle></g>
	</svg>
</div>
<!-- loader ends -->

<?php
/**
 * bizplus_action_before hook
 * @since BizPlus 1.0.0
 *
 * @hooked bizplus_page_start - 15
 */
do_action( 'bizplus_action_before' );

/**
 * bizplus_action_before_header hook
 * @since BizPlus 1.0.0
 *
 * @hooked bizplus_skip_to_content - 10
 */
do_action( 'bizplus_action_before_header' );

/**
 * bizplus_action_header hook
 * @since BizPlus 1.0.0
 *
 * @hooked bizplus_after_header - 10
 */
do_action( 'bizplus_action_header' );

/**
 * bizplus_action_before_content hook
 * @since BizPlus 1.0.0
 *
 * @hooked null
 */
do_action( 'bizplus_action_before_content' );
?>
