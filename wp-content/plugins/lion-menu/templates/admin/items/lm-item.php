<?php 
    $icon_tpl = new Template( __DIR__ );
    $list_tpl = new Template( plugin_dir_path( __DIR__ ) );
?>

<li class="list-group-item list-group-item-action <?php echo ($isSubsectionTitle)?('purpleBg'):(''); ?>" data-id="<?php echo $id; ?>" data-name="<?php echo $name; ?>">

    <!-- Hamburger -->
    <i class="fas fa-bars"></i>
    <!-- Item Name -->
    <span class="ml-3 item-name"><?php echo $name; ?></span>

    <!-- Publish / Not Published Icon -->
    <?php
    if($toPublish) {
        echo $icon_tpl->render( 'lm-icon', array( "classes" => "fas fa-check-circle toPublish ml-2", "tooltip" => "Published"));
    } else {
        echo $icon_tpl->render( 'lm-icon', array( "classes" => "fas fa-times-circle ml-2", "tooltip" => "Not Published"));
    }
    ?>

    <!-- Icons -->
    <div class='float-right'>
        <?php echo $icon_tpl->render( 'lm-icon-link', array( "aClasses" => "add-subitem", "modal" => "add-subitem-modal", "tooltip" => "Add Subitem", "iClasses" => "fa-plus mr-3", "w" => "550", "h" => "350" )); ?>
        <?php echo $icon_tpl->render( 'lm-icon-link', array( "aClasses" => "edit-item", "modal" => "edit-item-modal", "tooltip" => "Edit", "iClasses" => "fa-edit mr-3", "w" => "550", "h" => "500" )); ?>
        <?php echo $icon_tpl->render( 'lm-icon-link', array( "aClasses" => "delete-item", "modal" => "delete-item-modal", "tooltip" => "Delete", "iClasses" => "fa-trash-alt", "w" => "275", "h" => "215" )); ?>
    </div>

    <!-- Description -->
    <div class="row ml-3 desc">
        <i class="ml-3 fs-10"><?php echo $description; ?></i>
    </div>

    <!-- Veggie, Gluten and Price -->
    <div class="row ml-3 d-flex w-75 veg-gf-price">
        <div class="ml-3 veg-gf">
            <?php 
            if($isVegetarian) {
                echo "<img class='mx-2 icon veg-icon' src='". plugins_url() . '/lion-menu/assets/images/vegetarian.png' . "' alt='Image of Vegetarian Icon' />";
            }
            if($isGlutenFree) {
                echo "<img class='mx-2 icon gf-icon' src='". plugins_url() . '/lion-menu/assets/images/gluten-free.png' . "' alt='Image of Gluten Free Icon' />";
            } 
            ?>
        </div>

        <?php 
        if((!is_null($price)) && ($price !== "0.00")) {
            echo "<p class='fs-14 ml-auto price'>£$price</p>";
        }
        ?>
    </div>

    <!-- Hidden isSubsection - Needed for Form Autofill -->
    <?php
    if($isSubsectionTitle) {
        echo "<span class='isSubsec' hidden></span>";
    }
    ?>

    <!-- Subitems -->
    <?php

    $db = new SQLManager();

    // Print Items in Section
    $subitems = $db->get("subitem", $id);
    echo $list_tpl->render( 'lm-list' , array( "listOf" => $subitems,  "type" => "SUBITEMS", "classes" => "list-group", "isSubsec" => $isSubsectionTitle ));

    ?>

</li>