<!-- Hamburger -->
<i class="fas fa-bars"></i>
<!-- Menu Name -->
<span class="ml-3"><?php echo $name; ?></span>
<!-- Edit & Delete Icons - MORE ICONS WILL NEED TO GO HERE FOR THE OTHER FUNCTIONALITY -->
<div class='float-right'>
    <a href='#TB_inline?&width=400&height=300&inlineId=edit-subitem-modal' class='thickbox button-link edit-subitem'>
        <i class='fas fa-edit mr-3' data-toggle='tooltip' title='Edit'></i>
    </a>
    <a href='#TB_inline?&width=400&height=300&inlineId=delete-subitem-modal' class='thickbox button-link delete-subitem'>
        <i class='fas fa-trash-alt' data-toggle='tooltip' title='Delete'></i>
    </a>
</div>