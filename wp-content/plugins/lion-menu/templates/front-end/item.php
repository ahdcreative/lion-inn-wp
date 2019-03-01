<?php 
    $tpl = new Template( __DIR__ ); 
    
    if ($side == 0) {
        $textClasses = "col-6 col-md-8 col-lg-6 col-xl-8 pr-0";
        $iconClasses = "col-3 col-md-2 col-lg-3 col-xl-2 mt-2 px-0";
        $priceClasses = "col-3 col-md-2 col-lg-3 col-xl-2 pr-0 mt-2 text-center";
    } else if ($side == 1) {
        $textClasses = "col-6 col-md-8 col-lg-5 col-xl-6 pr-0";
        $iconClasses = "col-3 col-md-2 col-lg-3 col-xl-3 px-0";
        $priceClasses = "col-3 col-md-2 col-lg-4 col-xl-3 pr-0 text-center";
    } else {
        log_me("plugins/lion-inn/templates/front-end/item.php - side value of section is not 0 or 1 as expected.");
    }

    if ($isSubsectionTitle) {
        $purpleBg = 'purple-bg';
        $subHeading = 'main-sub-heading align-self-center';
    }
?>

<div class="item row mt-2 <?php echo $purpleBg; ?>">
    <div class="w-100 <?php echo $textClasses; ?>">
        <h3 class="item-title <?php echo $subHeading; ?>"><?php echo $name; ?></h3>
        <p><?php echo $description; ?></p>
    </div>
    <div class="<?php echo $iconClasses; ?>">
        <?php 
            if($isVegetarian) {
                echo "<img class='mx-2' src='" . plugins_url() . "/lion-menu/assets/images/vegetarian.png' alt='Image of Vegetarian Icon' />";
            }
            if($isGlutenFree) {
                echo "<img class='mx-2' src='" . plugins_url() . "/lion-menu/assets/images/gluten-free.png' alt='Image of Gluten Free Icon' />";
            } 
        ?>
    </div>
    <div class="<?php echo $priceClasses; ?>">
        <?php
            if((!is_null($price)) && ($price !== "0.00")) {
                echo "<p class='price ml-md-4 py-1 pl-1 pr-2 px-md-2'>£$price</p>";
            }
        ?>        
    </div>
</div>

<?php

$db = new SQLManager();

$subitems = $db->get( "subitem" , array( "parent_item" => $id, "toPublish" => 1 ));

echo $tpl->render( 'list' , array( "listOf" => $subitems,  "type" => "SUBITEMS", "classes" => "" ));    

?>

<hr class="mt-1" />