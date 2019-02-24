<?php $tpl = new Template( __DIR__ ); ?>

<li class='list-group-item list-group-item-action' data-id='<?php echo $id ?>'>
    <!-- Hamburger -->
    <i class="fas fa-bars"></i>
    <!-- Menu Name -->
    <a href="admin.php?page=lm-menu-edit-subpage&menu_id=<?php echo $id ?>" class="ml-3 menu-name"><?php echo $name; ?></a>
    <!-- Icons -->
    <div class='float-right'>
        <?php echo $tpl->render( 'lm-icon', array( "aClasses" => "edit-menu", "modal" => "edit-menu-modal", "tooltip" => "Edit", "iClasses" => "fa-edit mr-3", "w" => "400", "h" => "200" )); ?>
        <?php echo $tpl->render( 'lm-icon', array( "aClasses" => "delete-menu", "modal" => "delete-menu-modal", "tooltip" => "Delete", "iClasses" => "fa-trash-alt", "w" => "275", "h" => "215" )); ?>
    </div>
</li>
