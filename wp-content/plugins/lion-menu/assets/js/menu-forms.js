/**
 * JQuery to handle when the icons are clicked on the Edit Menu page.
 * Set POST var's to the data-id of it's parent section / item.
 * Also sets form values when EDIT is clicked on an item.
 * 
 * $(itemClicked) {what to do when clicked}
 */
jQuery(function($) {

    /**
     * Set hidden form variables to their parent list item's ID
     * to be used when inserting / updating items.
     */
    function setPostVar($inputName, $caller) {
        $parentListItemId = $($caller).closest("li").data("id");
        $('input[name='+$inputName+']').val($parentListItemId);
    }
    
    // When Edit Icon is clicked - retrieve parent data-id (menu id)
    // Set hidden input value 'edit-menu' to this id so it knows which menu to update
    $(".edit-menu").on("click", function() {
        setPostVar("edit-menu", this);
    });
    // When Delete Icon is clicked - retrieve parent data-id (menu id)
    // Set hidden input value 'delete-menu' to this id so it knows which menu to delete
    $(".delete-menu").on("click", function() {
        setPostVar("delete-menu", this);
    });


    // When Edit Icon is clicked - retrieve parent data-id (section id)
    // Set hidden input value 'edit-section' to this id so it knows which section to update
    $(".edit-section").on("click", function() {
        setPostVar("edit-section", this);
    });
    // When Delete Icon is clicked - retrieve parent data-id (section id)
    // Set hidden input value 'delete-section' to this id so it knows which section to delete
    $(".delete-section").on("click", function() {
        setPostVar("delete-section", this);
    });


    // When Add Icon is clicked - retrieve parent data-id (item id)
    // Set hidden input value 'add-item' to this id so it knows which section to add the item to
    // Ensure form values are already empty
    $(".add-item").on("click", function() {
        setPostVar("add-item", this);
        
        $('input[name="edit-item"]').val('');
        $('input[name="item-name"]').val('');
        $('input[name="item-subsec"]').prop('checked', false);
        $('input[name="item-price"]').val('');
        $('textarea[name="item-desc"]').val('');
        $('input[name="item-veg"]').prop('checked', false);
        $('input[name="item-gf"]').prop('checked', false);
    });
    // When Edit Icon is clicked - retrieve parent data-id (item id)
    // Set hidden input value 'edit-item' to this id so it knows which item to update
    // Set existent values of menu item to values on the edit form
    $(".edit-item").on("click", function() {
        setPostVar("edit-item", this);
        
        $itemName = $(this).parent().siblings(".item-name").text();
        $('input[name="item-name"]').val($itemName);

        $subsec = ($(this).parent().siblings(".isSubsec").length)?(1):(0);
        ($subsec)?($('input[name="item-subsec"]').prop('checked', true)):($('input[name="item-subsec"]').prop('checked', false));

        // If item is a subsection, hide all of the other form fields
        if($subsec) {
            $(".hideIfSubsec").hide(this.unchecked);
        } else {
            $(".hideIfSubsec").show(this.unchecked);
            
            $price = $(this).parent().siblings(".veg-gf-price").children(".price").text();
            $('input[name="item-price"]').val($price);

            $desc = $(this).parent().siblings(".desc").children("i").text();
            $('textarea[name="item-desc"]').val($desc);

            $veg = ($(this).parent().siblings(".veg-gf-price").children(".veg-gf").children(".veg-icon").length)?(1):(0);
            ($veg)?($('input[name="item-veg"]').prop('checked', true)):($('input[name="item-veg"]').prop('checked', false));

            $gf = ($(this).parent().siblings(".veg-gf-price").children(".veg-gf").children(".gf-icon").length)?(1):(0);
            ($gf)?($('input[name="item-gf"]').prop('checked', true)):($('input[name="item-gf"]').prop('checked', false));
        }
    });
    // When Delete Icon is clicked - retrieve parent data-id (item id)
    // Set hidden input value 'delete-item' to this id so it knows which item to delete
    $(".delete-item").on("click", function() {
        setPostVar("delete-item", this);
    });


    // When Add Icon is clicked - retrieve parent data-id (item id)
    // Set hidden input value 'add-subitem' to this id so it knows which item to add the subitem to
    $(".add-subitem").on("click", function() {
        setPostVar("add-subitem", this);
    });
    // When Edit Icon is clicked - retrieve parent data-id (subitem id)
    // Set hidden input value 'edit-menu' to this id so it knows which subitem to update
    $(".edit-subitem").on("click", function() {
        setPostVar("edit-subitem", this);

        $subitemName = $(this).parent().siblings(".subitem-name").text();
        $('input[name="subitem-name"]').val($subitemName);

        $subitemPrice = $(this).parent().siblings(".subitem-price").text();
        $('input[name="subitem-price"]').val($subitemPrice);
    });
    // When Delete Icon is clicked - retrieve parent data-id (subitem id)
    // Set hidden input value 'delete-menu' to this id so it knows which subitem to delete
    $(".delete-subitem").on("click", function() {
        setPostVar("delete-subitem", this);
    });


    // If Subsection Title checkbox is clicked, hide all other inputs
    $('#add-subsec-check').click(function() {
        $(".hideIfSubsec").toggle(this.unchecked);
    });
    $('#edit-subsec-check').click(function() {
        $(".hideIfSubsec").toggle(this.unchecked);
    });
    
});