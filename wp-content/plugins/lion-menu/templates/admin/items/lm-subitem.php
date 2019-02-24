<?php $tpl = new Template( __DIR__ ); ?>

<li class='list-group-item list-group-item-action' data-id='<?php echo $id; ?>' data-name='<?php echo $name; ?>'>

    <!-- Hamburger -->
    <i class="fas fa-bars"></i>
    <!-- Subitem Name -->
    <span class="ml-3 subitem-name"><?php echo $name; ?></span>
    <!-- Subitem Price -->
    <?php 
    if((!is_null($price)) && ($price !== "0.00")) {
        $price = number_format((float) $price, 2);
        if($price >= 1.00) {
            echo "<span class='fs-10 ml-3 subitem-price'>£$price</span>";
        } else {
            echo "<span class='fs-10 ml-3 subitem-price'>$price<span>p</span></span>";
        }
    }
    ?>
    
    <!-- Icons -->
    <div class='float-right'>
        <?php echo $tpl->render( 'lm-icon', array( "aClasses" => "edit-subitem", "modal" => "edit-subitem-modal", "tooltip" => "Edit", "iClasses" => "fa-edit mr-3", "w" => "550", "h" => "300" )); ?>
        <?php echo $tpl->render( 'lm-icon', array( "aClasses" => "delete-subitem", "modal" => "delete-subitem-modal", "tooltip" => "Delete", "iClasses" => "fa-trash-alt", "w" => "275", "h" => "215" )); ?>
    </div>

</li>
