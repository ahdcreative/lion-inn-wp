<!-- Hamburger -->
<i class="fas fa-bars"></i>
<!-- Subitem Name -->
<span class="ml-3 subitem-name"><?php echo $name; ?></span>
<!-- Subitem Price -->
<div class="sub-price">
    <?php 
    if((!is_null($price)) && ($price !== "0.00")) {
        $price = number_format((float) $price, 2);
        if($price >= 1.00) {
            echo "<p class='fs-10 subitem-price'>£$price</p>";
        } else {
            echo "<p class='fs-10 subitem-price'>$price p</p>";
        }
    }
    ?>
</div>
<!-- Edit & Delete Icons - MORE ICONS WILL NEED TO GO HERE FOR THE OTHER FUNCTIONALITY -->
<div class='float-right'>
    <a href='#TB_inline?&width=550&height=300&inlineId=edit-subitem-modal' class='thickbox button-link edit-subitem'>
        <i class='fas fa-edit mr-3' data-toggle='tooltip' title='Edit'></i>
    </a>
    <a href='#TB_inline?&width=275&height=215&inlineId=delete-subitem-modal' class='thickbox button-link delete-subitem'>
        <i class='fas fa-trash-alt' data-toggle='tooltip' title='Delete'></i>
    </a>
</div>
