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
    <!-- Edit & Delete Icons -->
    <div class='float-right'>
        <a href='#TB_inline?&width=550&height=300&inlineId=edit-subitem-modal' class='thickbox button-link edit-subitem'>
            <i class='fas fa-edit mr-3' data-toggle='tooltip' title='Edit'></i>
        </a>
        <a href='#TB_inline?&width=275&height=215&inlineId=delete-subitem-modal' class='thickbox button-link delete-subitem'>
            <i class='fas fa-trash-alt' data-toggle='tooltip' title='Delete'></i>
        </a>
    </div>

</li>
