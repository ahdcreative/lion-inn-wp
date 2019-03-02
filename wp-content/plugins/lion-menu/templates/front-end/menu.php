<?php $tpl = new Template( __DIR__ ); ?>

<div class="tab-pane fade <?php if($isFirst) { echo "show active"; } ?>" id="<?php echo strtolower($name); ?>" role="tabpanel" aria-labelledby="<?php echo strtolower($name); ?>-tab">
    
    <div class="row">

        <?php

            $db = new SQLManager();

            $sections = $db->get( "section" , array ( "parent_menu" => $id, "toPublish" => 1 ) );

            echo $tpl->render( 'list' , array( "listOf" => $sections, "type" => "SECTIONS", "side" => 0, "classes" => "left col-lg-6" ));
            
            echo $tpl->render( 'list' , array( "listOf" => $sections, "type" => "SECTIONS", "side" => 1, "classes" => "right col-lg-4 offset-lg-2" ));
        
        ?>

    </div>

</div>