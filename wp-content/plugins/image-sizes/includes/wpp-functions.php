<?php
if( ! function_exists( 'pri' ) ) :
function pri( $data ) {
    echo '<pre>';
    if( is_object( $data ) || is_array( $data ) ) {
        print_r( $data );
    }
    else {
        var_dump( $data );
    }
    echo '</pre>';
}
endif;

if( ! function_exists( 'wpp_get_option' ) ) :
function wpp_get_option( $key, $section, $default = '' ) {

    $options = get_option( $key );

    if ( isset( $options[ $section ] ) ) {
        return $options[ $section ];
    }

    return $default;
}
endif;

if( ! function_exists( 'wpp_get_template' ) ) :
function wppis_get_template( $slug ) {
    ob_start();
    include_once dirname( WPPIS ) . "/templates/{$slug}.php";
    $content = ob_get_clean();
    ob_flush();
    return $content;
}
endif;