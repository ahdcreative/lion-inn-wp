<?php
/**
 * All admin facing functions
 */

namespace WPpeople\Image_Size;

/**
 * if accessed directly, exit.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * @package Plugin
 * @subpackage Admin
 * @author Nazmul Ahsan <n.mukto@gmail.com>
 */
class Admin {

    /**
     * Constructor function
     */
    public function __construct( $name, $version ) {
        $this->name = $name;
        $this->version = $version;
    }
    
    /**
     * Enqueue JavaScripts and stylesheets
     */
    public function enqueue_scripts() {
        wp_enqueue_style( $this->name, plugins_url( '/assets/css/admin.min.css', WPPIS ), '', $this->version, 'all' );

        wp_enqueue_script( $this->name, plugins_url( '/assets/js/admin.min.js', WPPIS ), array( 'jquery' ), $this->version, true );
    }

    /**
     * Internationalization
     */
    public function i18n() {
        load_plugin_textdomain( 'image-sizes', false, dirname( plugin_basename( WPPIS ) ) . '/languages/' );
    }

    /**
     * unset image size(s)
     *
     * @since 1.0
     */
    public function image_sizes( $sizes ){
        $disables = wpp_get_option( 'prevent_image_sizes', 'disables' ) ? : array();
        if( count( $disables ) ) :
        foreach( $disables as $disable ){
            unset( $sizes[ $disable ] );
        }
        endif;
        return $sizes;
    }

    /**
     * @disabled 2.0.2
     */
    public function send_message() {
        $data = $_POST;
        if( !wp_verify_nonce( $data['_wpp_nonce'], 'need-help' ) ) {
            wp_die( __( 'Unauthorized!', 'image-sizes' ) );
        }
        
        $to         = 'n.mukto@gmail.com';
        $subject    = $data['subject'] ? : __( 'Need help', 'image-sizes' );
        
        $name       = $data['your-name'] ? : __( 'Site Admin', 'image-sizes' );
        $email      = $data['email'] ? : get_option( 'admin_email' );
        $site       = get_bloginfo();
        $headers    = array( 'Content-Type: text/html; charset=UTF-8', "From: {$name} from {$site} <{$email}>");
        
        $message    = $data['message'] ? : __( 'Message from a plugin user.', 'image-sizes' );
        $message   .= '<p><i>' . __( 'Email:', 'image-sizes' ) . '</i>' . " {$data['email']}" . '</p>';
        $message   .= '<p><i>' . __( 'Site URL:', 'image-sizes' ) . '</i>' . " {$data['url']}" . '</p>';
        $message   .= '<p><i>' . __( 'Sent From:', 'image-sizes' ) . '</i>' . " {$data['referer-site']}" . '</p>';

        wp_mail( $to, $subject, $message, $headers );
        wp_die();
    }

    /**
     * @since 2.0.2
     *
     */
    public function admin_notices() {

        if( !current_user_can( 'manage_options' ) ) return;

        if( isset( $_GET['page'] ) && $_GET['page'] == 'image-sizes' ) {
            update_option( 'image-sizes_configured', 1 );
        }

        if( get_option( 'image-sizes_configured' ) != 1 ) :
            if( get_option( 'prevent_image_sizes' ) != '' ) {
                $heading = sprintf( __( 'Hey %s, thanks for using \'Image Sizes\' plugin!', 'image-sizes' ), get_userdata( get_current_user_id() )->display_name );
                $message = __( 'We have made some minor changes and recommend to review your settings again. All you need to do is to hit the \'Save Changes\' button once again!', 'image-sizes' );
            }
            else {
                $heading = sprintf( __( 'Hey %s, thanks for installing \'Image Sizes\' plugin!', 'image-sizes' ), get_userdata( get_current_user_id() )->display_name );
                $message = __( 'Please go to the settings page and choose the sizes you want to prevent from generating!', 'image-sizes' );
            }
        ?>
        <div class="notice notice-success">
            <p><strong><?php echo $heading; ?></strong></p>
            <div>
                <?php echo $message; ?>
            </div>
            <p>
                <a class="button button-primary" href="<?php echo admin_url( 'admin.php?page=image-sizes' ); ?>"><?php _e( 'Go to the settings page', 'image-sizes' ); ?></a>
            </p>
        </div>
        <?php
        endif;
    }
}