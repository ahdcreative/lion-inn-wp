<?php $tpl = new Template( __DIR__ ); ?>

<div class="mt-5">

    <h1 class="great-vibes m-0"><?php echo $name; ?></h1>

    <?php

        /**
         * Print Items in section
         */

        $db = new SQLManager();

        $items = $db->get( "item" , array( "parent_section" => $id, "toPublish" => 1 ));

        echo $tpl->render( 'list' , array( "listOf" => $items,  "type" => "ITEMS", "classes" => "", "side" => $side ));    

    ?>

</div>