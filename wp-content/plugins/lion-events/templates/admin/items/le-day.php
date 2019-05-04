<?php $tpl = new LETemplate( get_home_path() . 'wp-content/plugins/lion-events/templates/admin/forms' ); ?>

<div class="card">
    <!-- Day Button -->
    <div class="card-header" id="<?php echo strtolower($day); ?>">
        <h5 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#<?php echo $day . $id; ?>" aria-expanded="true" aria-controls="<?php echo $day . $id; ?>">
                <?php echo $day; ?>
            </button>
        </h5>
    </div>

    <!-- Content for that day's event -->
    <div id="<?php echo $day . $id; ?>" class="collapse show" aria-labelledby="<?php echo strtolower($day); ?>" data-parent="#regular-events">
        <div class="card-body">
            <h3><?php echo $title; ?></h3>
            <p><?php echo $description; ?></p>
            <?php echo $tpl->render( 'le-textarea-input', array( "id" => "ID", "name" => "Name", "label" => "Label")); ?>
        </div>
    </div>
</div>



