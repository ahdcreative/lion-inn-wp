<?php $tpl = new LETemplate( __DIR__ ); ?>

<div class="card col-12">
    <!-- Day Button -->
    <div class="card-header" id="<?php echo strtolower($day); ?>">
        <div>
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#<?php echo $day . $id; ?>" aria-expanded="true" aria-controls="<?php echo $day . $id; ?>">
                <?php echo $day; ?>
            </button>            
        </div>
    </div>

    <!-- Content for that day's event -->
    <div id="<?php echo $day . $id; ?>" class="collapse show" aria-labelledby="<?php echo strtolower($day); ?>" data-parent="#regular-events">
        <div class="card-body">
            <div class="row">
                <!-- Event Title -->
                <h3><?php echo $title; ?></h3>
                <!-- Icons -->
                <div class="mt-1 ml-3">
                    <?php echo $tpl->render( 'le-icon', array( "classes" => "fas fa-check-circle toPublish mr-3", "tooltip" => "Published")); ?>            
                    <?php echo $tpl->render( 'le-icon-link', array( "aClasses" => "edit-event", "modal" => "edit-r-event-modal", "tooltip" => "Edit", "iClasses" => "fa-edit mr-3", "w" => "600", "h" => "600" )); ?>
                </div>
            </div>
            <!-- Event Description -->
            <div class="row">
                <p><?php echo $description; ?></p>
            </div>            
        </div>
    </div>
</div>



