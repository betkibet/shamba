<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 *
 * @package bizplus
 * @since BizPlus 1.0.0
 */


/**
 * bizplus_action_after_content hook
 * @since BizPlus 1.0.0
 *
 * @hooked null
 */
do_action( 'bizplus_action_after_content' );

/**
 * bizplus_action_before_footer hook
 * @since BizPlus 1.0.0
 *
 * @hooked bizplus_before_footer - 10
 */
do_action( 'bizplus_action_before_footer' );

/**
 * bizplus_action_widget_before_footer hook
 * @since BizPlus 1.0.0
 *
 * @hooked bizplus_widget_before_footer - 10
 */
do_action( 'bizplus_action_widget_before_footer' );

/**
 * bizplus_action_footer hook
 * @since BizPlus 1.0.0
 *
 * @hooked bizplus_footer - 10
 */
do_action( 'bizplus_action_footer' );

/**
 * bizplus_action_after_footer hook
 * @since BizPlus 1.0.0
 *
 * @hooked null
 */
do_action( 'bizplus_action_after_footer' );

/**
 * bizplus_action_after hook
 * @since BizPlus 1.0.0
 *
 * @hooked bizplus_page_end - 10
 */
do_action( 'bizplus_action_after' );
?>
<?php wp_footer(); ?>
</body>
</html>