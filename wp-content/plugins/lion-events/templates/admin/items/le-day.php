<?php $tpl = new LETemplate( __DIR__ ); ?>

<div class="card m-0 p-0 col-8">

    <!-- Day Button -->
    <div class="card-header" id="<?php echo strtolower($day); ?>">
        <div>
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#<?php echo $day . $id; ?>" aria-expanded="true" aria-controls="<?php echo $day . $id; ?>">
                <?php echo $day; ?>
            </button>            
        </div>
    </div>

    <!-- Content for that day's event -->
    <div id="<?php echo $day . $id; ?>" class="collapse hide pl-4" aria-labelledby="<?php echo strtolower($day); ?>" data-parent="#regular-events">
        <div class="card-body">
            <div class="row">
                <!-- Event Title -->
                <h3 class="title"><?php echo $title; ?></h3>
                <!-- Icons -->
                <div class="mt-1 ml-3" data-id="<?php echo $id; ?>">
                    <?php echo $tpl->render( 'le-icon', array( "classes" => "fas fa-check-circle toPublish mr-3", "tooltip" => "Published")); ?>            
                    <?php echo $tpl->render( 'le-icon-link', array( "aClasses" => "edit-r-event", "modal" => "edit-r-event-modal", "tooltip" => "Edit", "iClasses" => "fa-edit mr-3", "w" => "600", "h" => "400" )); ?>
                </div>
            </div>
            <!-- Event Description -->
            <div class="row">
                <p class="description"><?php echo $description; ?></p>
            </div>            
        </div>
    </div>

</div>



