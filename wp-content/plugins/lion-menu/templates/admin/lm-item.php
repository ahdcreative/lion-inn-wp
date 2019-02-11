<!-- FOOD ITEM -  Soup, Pie, etc -->

<!-- Hamburger -->
<i class="fas fa-bars"></i>
<!-- Menu Name -->
<span class="ml-3"><?php echo $name; ?></span>
<!-- Edit & Delete Icons - MORE ICONS WILL NEED TO GO HERE FOR THE OTHER FUNCTIONALITY -->
<div class='float-right'>
    <a href='#TB_inline?&width=550&height=300&inlineId=add-subitem-modal' class='thickbox button-link add-subitem'>
        <i class='fas fa-plus mr-3' data-toggle='tooltip' title='Add Subitem'></i>
    </a>
    <a href='#TB_inline?&width=550&height=500&inlineId=edit-item-modal' class='thickbox button-link edit-item'>
        <i class='fas fa-edit mr-3' data-toggle='tooltip' title='Edit'></i>
    </a>
    <a href='#TB_inline?&width=275&height=215&inlineId=delete-item-modal' class='thickbox button-link delete-item'>
        <i class='fas fa-trash-alt' data-toggle='tooltip' title='Delete'></i>
    </a>
</div>

<!-- Description -->
<div class="row ml-3">
    <i class="ml-3 fs-10"><?php echo $description; ?></i>
</div>

<!-- Veggie, Gluten and Price -->
<div class="row ml-3 d-flex w-75">
    <div class="ml-3">
        <?php 
        if($vegetarian) {
            echo "<img class='mx-2 icon' src='". plugins_url() . '/lion-menu/assets/images/vegetarian.png' . "' alt='Image of Vegetarian Icon' />";
        }
        if($gluten_free) {
            echo "<img class='mx-2 icon' src='". plugins_url() . '/lion-menu/assets/images/gluten-free.png' . "' alt='Image of Gluten Free Icon' />";
        } 
        ?>
    </div>

    <p class="fs-14 ml-auto">£<?php echo $price; ?></p>
</div>