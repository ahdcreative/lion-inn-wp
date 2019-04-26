<?php

// Debugging functions
require_once(plugin_dir_path(__DIR__) . '../../includes/le-debug.php');

$image_id = get_option( 'myprefix_image_id' );
le_console_log($image_id);
if( intval( $image_id ) > 0 ) {
    // Change with the image size you want to use
    $image = wp_get_attachment_image( $image_id, 'medium', false, array( 'id' => 'myprefix-preview-image' ) );
} else {
    // Some default image
    $image = '<img id="myprefix-preview-image" src="https://media-cdn.tripadvisor.com/media/photo-s/10/e2/be/d8/angel-s-steak-pub-interior.jpg" />';
}

?>

<!-- Event Image -->
<div class="image col-10 col-lg-6">
    <?php echo $image; ?>
    <input type="hidden" name="myprefix_image_id" id="myprefix_image_id" value="<?php echo esc_attr( $image_id ); ?>" class="regular-text" />
    <input type='button' class="button-primary mt-1" value="<?php esc_attr_e( 'Select Image', 'mytextdomain' ); ?>" id="myprefix_media_manager"/>
</div>  