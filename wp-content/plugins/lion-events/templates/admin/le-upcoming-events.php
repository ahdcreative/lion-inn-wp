<?php $tpl = new LETemplate( __DIR__ . '/items' ); ?>

<div class="container-fluid">

    <div class="accordion row" id="upcoming-events">

        <!-- Print Regular Events Days -->
        <?php

        $db = new LESQLManager();

        $events = $db->get( "u_event" );

        foreach($events as $ev) {
            echo $tpl->render( 'le-event' , $ev );
        }

        ?>

    </div>
    
</div>