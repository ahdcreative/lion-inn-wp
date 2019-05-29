<?php 
    $tpl = new LMTemplate( __DIR__ );

    $name = str_replace('\\', '', $name);
?>

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
        <!-- 
        Publish / Not Published Icon 
        Refer to lm-section.php comment for explanation of below if else.
        -->
        <?php
        if(!$isParentPublished) {
            $publishClass = ($toPublish ? 'toPublish' : '');
            echo $tpl->render( 'lm-icon', array( "classes" => "fas fa-times-circle $publishClass mr-3", "tooltip" => "Not Published"));
            $toPublish = $isParentPublished;
        } else if($toPublish) {
            echo $tpl->render( 'lm-icon', array( "classes" => "fas fa-check-circle toPublish mr-3", "tooltip" => "Published"));
        } else {
            echo $tpl->render( 'lm-icon', array( "classes" => "fas fa-times-circle mr-3", "tooltip" => "Not Published"));
        }
        ?>
        <?php echo $tpl->render( 'lm-icon-link', array( "aClasses" => "edit-subitem", "modal" => "edit-subitem-modal", "tooltip" => "Edit", "iClasses" => "fa-edit mr-3", "w" => "550", "h" => "350" )); ?>
        <?php echo $tpl->render( 'lm-icon-link', array( "aClasses" => "delete-subitem", "modal" => "delete-subitem-modal", "tooltip" => "Delete", "iClasses" => "fa-trash-alt", "w" => "275", "h" => "215" )); ?>
    </div>

</li>
