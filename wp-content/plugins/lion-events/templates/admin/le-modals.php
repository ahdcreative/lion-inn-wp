<?php 
    $tpl = new LETemplate( __DIR__ . '/forms' );
?>

<!-- UPCOMING EVENTS -->
<!-- Add Event Modal -->
<div id="add-event-modal" style="display:none;">

    <form action="#" method="post">
        <h3 class="mb-4">Add Event</h3>
        <input type="hidden" name="add-event" />
        <?php echo $tpl->render( 'le-text-input', array( "id" => "event-name-input", "name" => "event-name", "label" => "Event Name", "placeholder" => "Enter Name" )); ?>
        <?php echo $tpl->render( 'le-date-input', array( "id" => "event-start-date-input", "name" => "event-start-date", "label" => "Event Start Date", "placeholder" => "Enter Start Date" )); ?>
        <?php echo $tpl->render( 'le-date-input', array( "id" => "event-end-date-input", "name" => "event-end-date", "label" => "Event End Date", "placeholder" => "Enter End Date", "optClasses" => "hideIfSingleDate" )); ?>
        <?php echo $tpl->render( 'le-checkbox-input', array( "id" => "single-date-check", "name" => "single-date-event", "label" => "Single Day Event", "optClasses" => "mb-3 isSingleDate" )); ?>
        <?php echo $tpl->render( 'le-checkbox-input', array( "id" => "publish-event-check", "name" => "publish-event", "label" => "Publish", "optClasses" => "mb-3" )); ?>
        <?php echo $tpl->render( 'le-image-select', array( "id" => "add-event-image-select", "label_id" => "add-image-selected-name", "name" => "add-event-image", "label" => "No Image Selected", "height" => "add-event-img-height", "width" => "add-event-img-width" )); ?>
        <?php echo $tpl->render( 'le-textarea-input', array( "id" => "u-event-add-desc-input", "name" => "add-event-desc", "label" => "Description")); ?>
        <?php echo $tpl->render( 'le-form-buttons', array( "value" => "Add" )); ?>
    </form>

</div>

<!-- Edit Event Modal -->
<div id="edit-event-modal" style="display:none;">
    
    <form action="#" method="post">
        <h3 class="mb-4">Edit Event</h3>
        <input type="hidden" name="edit-event" />
        <?php echo $tpl->render( 'le-text-input', array( "id" => "event-name-input", "name" => "event-name", "label" => "Event Name", "placeholder" => "Enter Name" )); ?>
        <?php echo $tpl->render( 'le-date-input', array( "id" => "event-start-date-input", "name" => "event-start-date", "label" => "Event Start Date", "placeholder" => "Enter Start Date" )); ?>
        <?php echo $tpl->render( 'le-date-input', array( "id" => "event-end-date-input", "name" => "event-end-date", "label" => "Event End Date", "placeholder" => "Enter End Date", "optClasses" => "hideIfSingleDate" )); ?>
        <?php echo $tpl->render( 'le-checkbox-input', array( "id" => "single-date-check", "name" => "single-date-event", "label" => "Single Day Event", "optClasses" => "mb-3 isSingleDate" )); ?>
        <?php echo $tpl->render( 'le-checkbox-input', array( "id" => "publish-event-check", "name" => "publish-event", "label" => "Publish", "optClasses" => "mb-3" )); ?>
        <?php echo $tpl->render( 'le-image-select', array( "id" => "edit-event-image-select", "label_id" => "edit-image-selected-name", "name" => "edit-event-image", "label" => "No Image Selected", "height" => "edit-event-img-height", "width" => "edit-event-img-width" )); ?>
        <?php echo $tpl->render( 'le-textarea-input', array( "id" => "u-event-edit-desc-input", "name" => "edit-event-desc", "label" => "Description")); ?>
        <?php echo $tpl->render( 'le-form-buttons', array( "value" => "Edit" )); ?>
    </form>

</div>

<!-- Delete Event Modal -->
<div id="delete-event-modal" style="display:none;">

    <form action="#" method="post" class="row d-flex p-3">
        <h3 class="mb-4">Are you sure you want to delete this?</h3>
        <input type="hidden" name="delete-event" /> <br/>
        <input type="submit" value="Delete" class="btn btn-danger ml-auto" />
    </form>

</div>


<!-- REGULAR EVENTS -->
<!-- Edit Regular Weekly Event Modal -->
<div id="edit-r-event-modal" style="display:none;">
    
    <form action="#" method="post">
        <h3 class="mb-4">Edit Event</h3>
        <input type="hidden" name="edit-r-event" />
        <?php echo $tpl->render( 'le-text-input', array( "id" => "r-event-title-input", "name" => "r-event-title", "label" => "Event Name", "placeholder" => "Enter Name" )); ?>
        <?php echo $tpl->render( 'le-image-select', array( "id" => "edit-event-icon-select", "label_id" => "edit-icon-selected-name", "name" => "edit-event-icon", "label" => "No Image Selected" )); ?>
        <?php echo $tpl->render( 'le-textarea-input', array( "id" => "r-event-desc-input", "name" => "r-event-desc", "label" => "Description", "optClasses" => "mt-3" )); ?>
        <?php echo $tpl->render( 'le-form-buttons', array( "value" => "Edit" )); ?>
    </form>

</div>
