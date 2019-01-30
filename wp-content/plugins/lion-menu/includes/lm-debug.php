<?php

/**
 * Print to debug.log file
 */
function log_me($message) {
    if (WP_DEBUG === true) {
        if (is_array($message) || is_object($message)) {
            error_log(print_r($message, true));
        } else {
            error_log($message);
        }
    }
}

function console_log($toPrint) {
    echo "<script>console.log('$toPrint');</script>";
}