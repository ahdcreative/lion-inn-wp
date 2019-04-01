<?php $tpl = new LETemplate( __DIR__ . '/forms' ); ?>

<!-- Add Event Modal -->
<div id="add-event-modal" style="display:none;">

    <form action="#" method="post">
        <h3 class="mb-4">Add Event</h3>
        <input type="hidden" name="add-event" />

    </form>

</div>

<!-- Edit Menu Modal -->
<div id="edit-event-modal" style="display:none;">
    
    <form action="#" method="post">
        <h3 class="mb-4">Edit Event</h3>
        <input type="hidden" name="edit-event" />

    </form>

</div>

<!-- Delete Menu Modal -->
<?php echo $tpl->render( 'le-delete-modal', array( "id" => "delete-event-modal", "name" => "delete-event" )); ?>
