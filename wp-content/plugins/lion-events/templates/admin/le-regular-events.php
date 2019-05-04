<?php $tpl = new LETemplate( __DIR__ . '/items' ); ?>

<div class="container-fluid">

    <div class="accordion row" id="regular-events">

        <!-- Print Regular Events Days -->
        <?php

        $db = new LESQLManager();

        $days = $db->get( "r_event" );

        foreach($days as $day) {
            echo $tpl->render( 'le-day' , $day );
        }

        ?>

    </div>
    
</div>