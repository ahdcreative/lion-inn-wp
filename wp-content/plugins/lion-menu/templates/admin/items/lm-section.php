<?php 
    $icon_tpl = new LMTemplate( __DIR__ );
    $list_tpl = new LMTemplate( plugin_dir_path( __DIR__ ) );
    
    $name = str_replace('\\', '', $name);
?>

<li class='list-group-item list-group-item-action no-position' data-id='<?php echo $id; ?>' data-name='<?php echo $name; ?>' data-side='<?php echo $side; ?>'>
    <!-- Hamburger -->
    <i class="fas fa-bars"></i>
    <!-- Section Name -->
    <span class="ml-3 section-name"><?php echo $name; ?></span>

    <!-- 
        Publish / Not Published Icon 
        I think this needs a of explanation.
        if the parent isn't published:
            but the current section is set to be published in the DB,
            ensure the toPublish class is still set, as this is used to
            populate the edit section modal form correctly.
            Then set the sections toPublish value to not published,
            so the same logic can be used by the child items.
        Users may want the items published / not within a menu, 
        but disable a menu so nothing appears yet / for now.
        This ensures that when the user re-publishes a menu,
        the same settings are used as were before for each
        individual menu item.
    -->
    <?php
    if(!$isParentPublished) {
        $publishClass = ($toPublish ? 'toPublish' : '');
        echo $icon_tpl->render( 'lm-icon', array( "classes" => "fas fa-times-circle $publishClass ml-2", "tooltip" => "Not Published"));
        $toPublish = $isParentPublished;
    } else if($toPublish) {
        echo $icon_tpl->render( 'lm-icon', array( "classes" => "fas fa-check-circle toPublish ml-2", "tooltip" => "Published"));
    } else {
        echo $icon_tpl->render( 'lm-icon', array( "classes" => "fas fa-times-circle ml-2", "tooltip" => "Not Published"));
    }
    ?>

    <!-- Icons -->
    <div class='float-right'>
        <?php echo $icon_tpl->render( 'lm-icon-link', array( "aClasses" => "add-item", "modal" => "add-item-modal", "tooltip" => "Add Item", "iClasses" => "fa-plus mr-3", "w" => "550", "h" => "500" )); ?>
        <?php echo $icon_tpl->render( 'lm-icon-link', array( "aClasses" => "edit-section", "modal" => "edit-section-modal", "tooltip" => "Edit", "iClasses" => "fa-edit mr-3", "w" => "400", "h" => "250" )); ?>
        <?php echo $icon_tpl->render( 'lm-icon-link', array( "aClasses" => "delete-section", "modal" => "delete-section-modal", "tooltip" => "Delete", "iClasses" => "fa-trash-alt", "w" => "275", "h" => "215" )); ?>
    </div>

    <!-- Hidden side span - Needed for Form Autofill -->
    <span class='side' hidden><?php echo $side; ?></span>

    <!-- Print Items in Section -->
    <?php

    $db = new LMSQLManager();

    $items = $db->get( "item" , array( "parent_section" => $id ));

    echo $list_tpl->render( 'lm-list' , array( "listOf" => $items,  "type" => "ITEMS", "isParentPublished" => $toPublish, "classes" => "list-group my-2" ));    

    ?>
</li>