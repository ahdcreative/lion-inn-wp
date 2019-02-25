<?php 
    $icon_tpl = new Template( __DIR__ );
    $list_tpl = new Template( plugin_dir_path( __DIR__ ) );
?>

<li class='list-group-item list-group-item-action no-position' data-id='<?php echo $id; ?>' data-name='<?php echo $name; ?>'>
    <!-- Hamburger -->
    <i class="fas fa-bars"></i>
    <!-- Section Name -->
    <span class="ml-3 section-name"><?php echo $name; ?></span>

    <!-- Icons -->
    <div class='float-right'>
        <?php echo $icon_tpl->render( 'lm-icon', array( "aClasses" => "add-item", "modal" => "add-item-modal", "tooltip" => "Add Item", "iClasses" => "fa-plus mr-3", "w" => "550", "h" => "500" )); ?>
        <?php echo $icon_tpl->render( 'lm-icon', array( "aClasses" => "edit-section", "modal" => "edit-section-modal", "tooltip" => "Edit", "iClasses" => "fa-edit mr-3", "w" => "400", "h" => "250" )); ?>
        <?php echo $icon_tpl->render( 'lm-icon', array( "aClasses" => "delete-section", "modal" => "delete-section-modal", "tooltip" => "Delete", "iClasses" => "fa-trash-alt", "w" => "275", "h" => "215" )); ?>
    </div>

    <!-- Hidden side span - Needed for Form Autofill -->
    <span class='side' hidden><?php echo $side; ?></span>

    <!-- Hidden publish span - Needed for Form Autofill -->
    <?php
    if($toPublish) {
        echo "<span class='toPublish' hidden></span>";
    }
    ?>

    <!-- Print Items in Section -->
    <?php

    $db = new SQLManager();

    $items = $db->get("item", $id);

    echo $list_tpl->render( 'lm-list' , array( "listOf" => $items,  "type" => "ITEMS", "classes" => "list-group my-2" ));    

    ?>
</li>