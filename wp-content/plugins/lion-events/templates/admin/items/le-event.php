<?php 
    $tpl = new LMTemplate( __DIR__ ); 

    $name = str_replace('\\', '', $name);
?>

<li class='list-group-item list-group-item-action w-75' data-id='<?php echo $id ?>'>

    <!-- Event Name -->
    <span class="ml-3 event-name"><?php echo $name; ?></span>

    <!-- Event Date -->
    <span class="ml-3 event-date"><?php echo $event_date; ?></span>

    <!-- Publish / Not Published Icon -->
    <?php
    if($toPublish) {
        echo $tpl->render( 'le-icon', array( "classes" => "fas fa-check-circle toPublish ml-2", "tooltip" => "Published"));
    } else {
        echo $tpl->render( 'le-icon', array( "classes" => "fas fa-times-circle ml-2", "tooltip" => "Not Published"));
    }
    ?>

    <!-- Icons -->
    <div class='float-right'>
        <?php echo $tpl->render( 'le-icon-link', array( "aClasses" => "edit-event", "modal" => "edit-event-modal", "tooltip" => "Edit", "iClasses" => "fa-edit mr-3", "w" => "600", "h" => "550" )); ?>
        <?php echo $tpl->render( 'le-icon-link', array( "aClasses" => "delete-event", "modal" => "delete-event-modal", "tooltip" => "Delete", "iClasses" => "fa-trash-alt", "w" => "275", "h" => "215" )); ?>
    </div>
    
    <!-- Small Description -->
    <p class="desc-sml"><?php echo $description_sml; ?></p>

    <!-- Large Description -->
    <p class="desc-lrg"><?php echo $description_lrg; ?></p>

</li>
