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