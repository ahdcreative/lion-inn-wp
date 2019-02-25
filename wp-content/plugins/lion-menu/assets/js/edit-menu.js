/**
 * JQuery to handle when the icons are clicked on the Edit Menu page.
 * Set POST var's to the data-id of it's parent section / item.
 * Also sets form values when EDIT is clicked on an item.
 */
jQuery(function($) {

    /** 
     * When $(.iconClicked) {set hidden input value ready to parent item's ID for form submission} 
     */
    function setPostVar($inputName, $caller) {
        $parentListItemId = $($caller).closest("li").data("id");
        $('input[name='+$inputName+']').val($parentListItemId);
    }

    /**
     * Checking length of DOM item identifies if it exists
     * The span with .toPublish is only rendered if the item set to be published.
     */
    function setToPublish($inputName, $caller) {
        $toPublish = ($($caller).parent().siblings(".toPublish").length)?(1):(0);
        ($toPublish)?($('input[name='+$inputName+']').prop('checked', true)):($('input[name='+$inputName+']').prop('checked', false));
    }
    
    /**
     * Handle Add, Edit & Delete Forms
     */
    $(".edit-menu").on("click", function() {
        setPostVar("edit-menu", this);

        // Set form values to current item values
        $menuName = $(this).parent().siblings(".menu-name").text();
        $('input[name="menu-name"]').val($menuName);

        setToPublish("publish-menu", this);
    });
    $(".delete-menu").on("click", function() {
        setPostVar("delete-menu", this);
    });

    $(".add-section").on("click", function() {
        setPostVar("add-section", this);
        // Ensure form values are empty
        $('input[name="section-name"]').val('');
        $('input[name="section-side"]').prop('checked', false);
    });
    $(".edit-section").on("click", function() {
        setPostVar("edit-section", this);

        // Set form values to current item values
        $sectionName = $(this).parent().siblings(".section-name").text();
        $('input[name="section-name"]').val($sectionName);

        $side = $(this).parent().siblings(".side").text();
        ($side == 1)?($('input[id="section-right-radio"]').prop('checked', true)):($('input[id="section-left-radio"]').prop('checked', true));

        setToPublish("publish-section", this);
    });
    $(".delete-section").on("click", function() {
        setPostVar("delete-section", this);
    });
    
    $(".add-item").on("click", function() {
        setPostVar("add-item", this);
        // Ensure form values are empty
        // $('input[name="edit-item"]').val('');
        $('input[name="item-name"]').val('');
        $('input[name="item-subsec"]').prop('checked', false);
        $('input[name="item-price"]').val('');
        $('textarea[name="item-desc"]').val('');
        $('input[name="item-veg"]').prop('checked', false);
        $('input[name="item-gf"]').prop('checked', false);
    });
    $(".edit-item").on("click", function() {
        setPostVar("edit-item", this);
        
        // Set form values to current item values
        $itemName = $(this).parent().siblings(".item-name").text();
        $('input[name="item-name"]').val($itemName);

        $subsec = ($(this).parent().siblings(".isSubsec").length)?(1):(0);
        ($subsec)?($('input[name="item-subsec"]').prop('checked', true)):($('input[name="item-subsec"]').prop('checked', false));

        setToPublish("publish-item", this);

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
    $(".delete-item").on("click", function() {
        setPostVar("delete-item", this);
    });

    $(".add-subitem").on("click", function() {
        setPostVar("add-subitem", this);
    });
    $(".edit-subitem").on("click", function() {
        setPostVar("edit-subitem", this);

        // Set form values to current item values
        $subitemName = $(this).parent().siblings(".subitem-name").text();
        $('input[name="subitem-name"]').val($subitemName);

        $subitemPrice = $(this).parent().siblings(".subitem-price").text();
        $('input[name="subitem-price"]').val($subitemPrice);

        setToPublish("publish-subitem", this);
    });
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