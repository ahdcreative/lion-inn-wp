<li class='list-group-item list-group-item-action' data-id='<?php echo $id ?>'>
    <!-- Hamburger -->
    <i class="fas fa-bars"></i>
    <!-- Menu Name -->
    <span class="ml-3"><?php echo $name; ?></span>
    <!-- Edit & Delete Icons -->
    <div class='float-right'>
        <a href='#TB_inline?&width=400&height=300&inlineId=edit-menu-modal' class='thickbox button-link edit'>
            <i class='fas fa-edit mr-3' data-toggle='tooltip' title='Edit'></i>
        </a>
        <a href='#TB_inline?&width=400&height=300&inlineId=delete-menu-modal' class='thickbox button-link delete'>
            <i class='fas fa-trash-alt' data-toggle='tooltip' title='Delete'></i>
        </a>
    </div>
</li>
