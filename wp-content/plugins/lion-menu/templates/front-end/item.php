<?php $tpl = new Template( __DIR__ ); ?>

<div class="item row mt-2">
    <div class="col-6 col-md-8 col-lg-6 col-xl-8 pr-0">
        <h3 class="item-title"><?php echo $name; ?></h3>
        <p><?php echo $description; ?></p>
    </div>
    <div class="col-3 col-md-2 col-lg-3 col-xl-2 mt-2 px-0">
        <?php 
            if($isVegetarian) {
                echo "Veg";
            }
            if($isGlutenFree) {
                echo "GF";
            } 
        ?>
    </div>
    <div class="col-3 col-md-2 col-lg-3 col-xl-2 pr-0 mt-2 text-center">
        <p class="price ml-md-4 py-1 pl-1 pr-2 px-md-2">
            <?php
                if((!is_null($price)) && ($price !== "0.00")) {
                    echo "£$price";
                }
            ?>
        </p>
    </div>
</div>

<!-- Print Items in Section -->
<?php

$db = new SQLManager();

$subitems = $db->get( "subitem" , array( "parent_item" => $id, "toPublish" => 1 ));

echo $tpl->render( 'list' , array( "listOf" => $subitems,  "type" => "SUBITEMS", "classes" => "" ));    

?>

<hr class="mt-1" />