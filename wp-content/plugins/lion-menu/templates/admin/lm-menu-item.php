<!-- A Menu from the main plugin admin page -->

<li class='list-group-item list-group-item-action' data-id='<?php echo $id ?>'>
    <!-- Hamburger -->
    <i class="fas fa-bars"></i>
    <!-- Menu Name -->
    <a href="admin.php?page=lm-menu-edit-subpage&menu_id=<?php echo $id ?>" class="ml-3"><?php echo $name; ?></a>
    <!-- Edit & Delete Icons -->
    <div class='float-right'>
        <a href='#TB_inline?&width=400&height=200&inlineId=edit-menu-modal' class='thickbox button-link edit-menu'>
            <i class='fas fa-edit mr-3' data-toggle='tooltip' title='Edit Name'></i>
        </a>
        <a href='#TB_inline?&width=275&height=215&inlineId=delete-menu-modal' class='thickbox button-link delete-menu'>
            <i class='fas fa-trash-alt' data-toggle='tooltip' title='Delete'></i>
        </a>
    </div>
</li>
