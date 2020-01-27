<?php
/**
 * bizplus Custom Metabox
 *
 * @package bizplus
 */
$bizplus_post_types = array(
    'post',
    'page'
);

add_action('add_meta_boxes', 'bizplus_add_layout_metabox');
function bizplus_add_layout_metabox() {
    global $post;
    $frontpage_id = esc_attr(get_option('page_on_front'));
    if( $post->ID == $frontpage_id ){
        return;
    }

    global $bizplus_post_types;
    foreach ( $bizplus_post_types as $post_type ) {
        add_meta_box(
            'bizplus_layout_options', // $id
            __( 'Layout options', 'bizplus' ), // $title
            'bizplus_layout_options_callback', // $callback
            $post_type, // $page
            'normal', // $context
            'high'// $priority
        );
    }

}
/* bizplus sidebar layout */
$bizplus_default_layout_options = array(
    'left-sidebar' => array(
        'value'     => 'left-sidebar',
        'thumbnail' => get_template_directory_uri() . '/inc/images/left-sidebar.png'
    ),
    'right-sidebar' => array(
        'value' => 'right-sidebar',
        'thumbnail' => get_template_directory_uri() . '/inc/images/right-sidebar.png'
    ),
    'no-sidebar' => array(
        'value'     => 'no-sidebar',
        'thumbnail' => get_template_directory_uri() . '/inc/images/no-sidebar.png'
    )
);
/* bizplus featured layout */
$bizplus_single_post_image_align_options = array(
    'full' => array(
        'value' => 'full',
        'label' => __( 'Full', 'bizplus' )
    ),
    'right' => array(
        'value' => 'right',
        'label' => __( 'Right ', 'bizplus' ),
    ),
    'left' => array(
        'value'     => 'left',
        'label' => __( 'Left', 'bizplus' ),
    ),
    'no-image' => array(
        'value'     => 'no-image',
        'label' => __( 'No Image', 'bizplus' )
    )
);

function bizplus_layout_options_callback() {

    global $post , $bizplus_default_layout_options, $bizplus_single_post_image_align_options;
    $bizplus_customizer_saved_values = bizplus_get_all_options(1);

    /*bizplus-single-post-image-align*/
    $bizplus_single_post_image_align = $bizplus_customizer_saved_values['bizplus-single-post-image-align'];

    /*bizplus default layout*/
    $bizplus_single_sidebar_layout = $bizplus_customizer_saved_values['bizplus-default-layout'];

    wp_nonce_field( basename( __FILE__ ), 'bizplus_layout_options_nonce' );
    ?>
    <table class="form-table page-meta-box">
        <!--Image alignment-->
        <tr>
            <td colspan="4"><em class="f13"><?php _e( 'Choose Sidebar Template', 'bizplus' ); ?></em></td>
        </tr>
        <tr>
            <td>
                <?php
                $bizplus_single_sidebar_layout_meta = get_post_meta( $post->ID, 'bizplus-default-layout', true );
                if( false != $bizplus_single_sidebar_layout_meta ){
                   $bizplus_single_sidebar_layout = $bizplus_single_sidebar_layout_meta;
                }
                foreach ($bizplus_default_layout_options as $field) {
                    ?>
                    <div class="hide-radio radio-image-wrapper" style="float:left; margin-right:30px;">
                        <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="bizplus-default-layout"
                               value="<?php echo esc_attr( $field['value'] ); ?>"
                            <?php checked( $field['value'], $bizplus_single_sidebar_layout ); ?>/>
                        <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                            <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" />
                        </label>
                    </div>
                <?php } // end foreach
                ?>
                <div class="clear"></div>
            </td>
        </tr>
        <tr>
            <td><em class="f13"><?php _e( 'You can set up the sidebar content', 'bizplus' ); ?> <a href="<?php echo esc_url( admin_url('/widgets.php') ); ?>"><?php _e( 'here', 'bizplus' ); ?></a></em></td>
        </tr>
        <!--Image alignment-->
        <tr>
            <td colspan="4"><?php _e( 'Featured Image Alignment', 'bizplus' ); ?></td>
        </tr>
        <tr>
            <td>
                <?php
                $bizplus_single_post_image_align_meta = get_post_meta( $post->ID, 'bizplus-single-post-image-align', true );
                if( false != $bizplus_single_post_image_align_meta ){
                    $bizplus_single_post_image_align = $bizplus_single_post_image_align_meta;
                }
                foreach ($bizplus_single_post_image_align_options as $field) {
                    ?>
                    <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="bizplus-single-post-image-align" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $bizplus_single_post_image_align ); ?>/>
                    <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                        <?php echo esc_html( $field['label'] ); ?>
                    </label>
                <?php } // end foreach
                ?>
                <div class="clear"></div>
            </td>
        </tr>
    </table>

<?php }

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function bizplus_save_sidebar_layout( $post_id ) {
    global $post;
    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'bizplus_layout_options_nonce' ] ) || !wp_verify_nonce( $_POST[ 'bizplus_layout_options_nonce' ], basename( __FILE__ ) ) ) {
        return;
    }

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( !current_user_can( 'edit_page', $post_id ) ) {
        return $post_id;
    }
    
    if(isset($_POST['bizplus-default-layout'])){
        $old = get_post_meta( $post_id, 'bizplus-default-layout', true);
        $new = sanitize_text_field($_POST['bizplus-default-layout']);
        if ($new && $new != $old) {
            update_post_meta($post_id, 'bizplus-default-layout', $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id,'bizplus-default-layout', $old);
        }
    }

    /*image align*/
    if(isset($_POST['bizplus-single-post-image-align'])){
        $old = get_post_meta( $post_id, 'bizplus-single-post-image-align', true);
        $new = sanitize_text_field($_POST['bizplus-single-post-image-align']);
        if ($new && $new != $old) {
            update_post_meta($post_id, 'bizplus-single-post-image-align', $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id,'bizplus-single-post-image-align', $old);
        }
    }
}
add_action('save_post', 'bizplus_save_sidebar_layout');
