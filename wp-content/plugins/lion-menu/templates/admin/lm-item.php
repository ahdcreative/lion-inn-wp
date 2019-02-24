<li class="list-group-item list-group-item-action <?php echo ($subsection)?('purpleBg'):(''); ?>" data-id="<?php echo $id; ?>" data-name="<?php echo $name; ?>">

    <!-- Hamburger -->
    <i class="fas fa-bars"></i>
    <!-- Menu Name -->
    <span class="ml-3 item-name"><?php echo $name; ?></span>
    <!-- Edit & Delete Icons -->
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
    <div class="row ml-3 desc">
        <i class="ml-3 fs-10"><?php echo $description; ?></i>
    </div>

    <!-- Veggie, Gluten and Price -->
    <div class="row ml-3 d-flex w-75 veg-gf-price">
        <div class="ml-3 veg-gf">
            <?php 
            if($vegetarian) {
                echo "<img class='mx-2 icon veg-icon' src='". plugins_url() . '/lion-menu/assets/images/vegetarian.png' . "' alt='Image of Vegetarian Icon' />";
            }
            if($gluten_free) {
                echo "<img class='mx-2 icon gf-icon' src='". plugins_url() . '/lion-menu/assets/images/gluten-free.png' . "' alt='Image of Gluten Free Icon' />";
            } 
            ?>
        </div>

        <?php 
        if((!is_null($price)) && ($price !== "0.00")) {
            echo "<p class='fs-14 ml-auto price'>£$price</p>";
        }
        ?>
    </div>

    <!-- Hidden isSubsection - Needed for Form Autofill -->
    <?php
    if($subsection) {
        echo "<span class='isSubsec' hidden></span>";
    }
    ?>

    <!-- Subitems -->
    <?php

    $db = new SQLManager();
    $tpl = new Template( __DIR__ );

    // Print Items in Section
    $subitems = $db->get("subitem", $id);
    echo $tpl->render( 'lm-list' , array( "listOf" => $subitems,  "type" => "SUBITEMS", "classes" => "list-group", "isSubsec" => $subsection ));

    ?>

</li>