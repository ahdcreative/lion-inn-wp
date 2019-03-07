<?php $tpl = new Template( __DIR__ ); ?>

<li class='list-group-item list-group-item-action' data-id='<?php echo $id ?>'>

    <!-- Hamburger -->
    <i class="fas fa-bars"></i>
    <!-- Menu Name -->
    <a href="admin.php?page=lm-menu-edit-subpage&menu_id=<?php echo $id ?>" class="ml-3 menu-name"><?php echo $name; ?></a>

    <!-- Publish / Not Published Icon -->
    <?php
    if($toPublish) {
        echo $tpl->render( 'lm-icon', array( "classes" => "fas fa-check-circle toPublish ml-2", "tooltip" => "Published"));
    } else {
        echo $tpl->render( 'lm-icon', array( "classes" => "fas fa-times-circle ml-2", "tooltip" => "Not Published"));
    }
    ?>

    <!-- Icons -->
    <div class='float-right'>
        <?php echo $tpl->render( 'lm-icon-link', array( "aClasses" => "edit-menu", "modal" => "edit-menu-modal", "tooltip" => "Edit", "iClasses" => "fa-edit mr-3", "w" => "400", "h" => "250" )); ?>
        <?php echo $tpl->render( 'lm-icon-link', array( "aClasses" => "delete-menu", "modal" => "delete-menu-modal", "tooltip" => "Delete", "iClasses" => "fa-trash-alt", "w" => "275", "h" => "215" )); ?>
    </div>
    
</li>
