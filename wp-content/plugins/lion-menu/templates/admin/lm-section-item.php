<!-- Hamburger -->
<i class="fas fa-bars"></i>
<!-- Menu Name -->
<span class="ml-3"><?php echo $name; ?></span>
<!-- Edit & Delete Icons - MORE ICONS WILL NEED TO GO HERE FOR THE OTHER FUNCTIONALITY -->
<div class='float-right'>
    <a href='#TB_inline?&width=550&height=500&inlineId=add-item-modal' class='thickbox button-link add-item'>
        <i class='fas fa-plus mr-3' data-toggle='tooltip' title='Add Item'></i>
    </a>
    <a href='#TB_inline?&width=400&height=300&inlineId=edit-section-modal' class='thickbox button-link edit-section'>
        <i class='fas fa-edit mr-3' data-toggle='tooltip' title='Edit'></i>
    </a>
    <a href='#TB_inline?&width=275&height=215&inlineId=delete-section-modal' class='thickbox button-link delete-section'>
        <i class='fas fa-trash-alt' data-toggle='tooltip' title='Delete'></i>
    </a>
</div>