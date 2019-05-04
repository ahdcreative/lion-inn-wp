<?php $tpl = new LETemplate( __DIR__ . '/items' ); ?>

<div class="accordion" id="regular-events">

    <!-- Print Regular Events Days -->
    <?php

    $db = new LESQLManager();

    $days = $db->get( "r_event" );

    foreach($days as $day) {
        echo $tpl->render( 'le-day' , $day );
    }

    ?>

</div>