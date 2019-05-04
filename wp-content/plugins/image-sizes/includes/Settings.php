<?php
/**
 * All settings facing functions
 */

namespace WPpeople\Image_Size;

/**
 * @package Plugin
 * @subpackage Settings
 * @author Nazmul Ahsan <n.mukto@gmail.com>
 */
class Settings {

    private $settings_api;

    function __construct() {
        $this->settings_api = new \WeDevs_Settings_API;
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
        add_menu_page( __( 'Image Sizes', 'image-sizes' ), __( 'Image Sizes', 'image-sizes' ), 'manage_options', 'image-sizes', array( $this, 'option_page' ), 'dashicons-image-crop', '10.5' );
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id'        => 'prevent_image_sizes',
                'title'     => __( 'Image Sizes', 'image-sizes' ),
            ),
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(

            'prevent_image_sizes' => array(
                array(
                    'name'    =>  'disables',
                    'label'   =>  __( 'Disable Image Sizes', 'image-sizes' ),
                    'type'    =>  'multicheck',
                    'desc'    =>  sprintf( __( 'Choose sizes that you want to prevent from generating.<br /><strong>Note:</strong> If you check all options, it will not generate any additional images. But, if you check no options, it will generate %d additional images along with the original image!<br /><strong style="color:red">Warning:</strong> Use with caution. Disabling any of the image sizes may break your theme\'s layout!', 'image-sizes' ), count( $this->image_sizes() ) - 1 ),
                    'options' => $this->image_sizes()
                ),
            ),

        );

        return $settings_fields;
    }

    function option_page() {
        ?>
        <div class="wrap mdc-image-sizes-wrap">
            <div id="poststuff">
                <div id="post-body" class="metabox-holder columns-2">
                    <div id="post-body-content">
                        <div class="meta-box-sortables ui-sortable">
                            <div class="postbox">
                                <h2 class="options-heading"><span><?php _e( 'Image Sizes Settings', 'image-sizes' ); ?></span></h2>
                                <div class="inside">
                                    <?php 
                                    $this->settings_api->show_navigation();
                                    $this->settings_api->show_forms();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="postbox-container-1" class="postbox-container">
                        <div class="meta-box-sortables">

                            <div class="postbox">
                                <div class="inside">
                                    <?php
                                    $contacts = array( 'promotion-plugin' );
                                    echo wppis_get_template( $contacts[ rand( 0, count( $contacts ) - 1 ) ] );
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <br class="clear">
            </div>
        </div>
    <?php
    }

    public function image_sizes() {
        global $_wp_additional_image_sizes;

        $sizes = array(
            'all'   => __( 'Select All', 'image-sizes' )
        );

        $thumb_crop = ( get_option( 'thumbnail_crop' ) == 1 ) ? __( 'cropped', 'image-sizes' ) : __( 'not cropped', 'image-sizes' );

        $sizes['thumbnail'] = sprintf( __( 'Thumbnail (Default, %dx%d pixel, %s)', 'image-sizes' ), get_option( 'thumbnail_size_w' ), get_option( 'thumbnail_size_h' ), $thumb_crop );

        $sizes['medium'] = sprintf( __( 'Medium (Default, %dx%d pixel, %s)', 'image-sizes' ), get_option( 'medium_size_w' ), get_option( 'medium_size_h' ), $thumb_crop );

        $sizes['medium_large'] = sprintf( __( 'Medium-large (Default, %dx%d pixel, %s)', 'image-sizes' ), get_option( 'medium_large_size_w' ), get_option( 'medium_large_size_h' ), $thumb_crop );

        $sizes['large'] = sprintf( __( 'Large (Default, %dx%d pixel, %s)', 'image-sizes' ), get_option( 'large_size_w' ), get_option( 'large_size_h' ), $thumb_crop );

        if( is_array( $_wp_additional_image_sizes ) && count( $_wp_additional_image_sizes ) ) :
        foreach ( $_wp_additional_image_sizes as $size => $data ) {
            $crop = ( $data['crop'] == 1 ) ? __( 'cropped', 'image-sizes' ) : __( 'not cropped', 'image-sizes' );
            $sizes[ $size ] = sprintf( __( '%s (Custom, %dx%d pixel, %s)', 'image-sizes' ), $size, $data['width'], $data['height'], $crop );

            $crop = '';
        }
        endif;

        return $sizes;
    }
}