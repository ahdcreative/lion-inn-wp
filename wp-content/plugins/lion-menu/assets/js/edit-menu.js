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
    function setCheckbox($inputName, $className, $caller) {
        $checked = ($($caller).parent().siblings($className).length)?(1):(0);
        ($checked)?($('input[name='+$inputName+']').prop('checked', true)):($('input[name='+$inputName+']').prop('checked', false));

        return $checked;
    }

    /**
     * Set text input value to $inputName
     */
    function setTextInput($inputName, $caller) {
        $value = $($caller).parent().siblings('.'+$inputName).text();
        $('input[name='+$inputName+']').val($value);
    }
    
    /**
     * Handle Add, Edit & Delete Forms
     */
    $(".edit-menu").on("click", function() {
        setPostVar("edit-menu", this);

        // Set form values to current item values
        setTextInput("menu-name", this);
        setCheckbox("publish-menu", ".toPublish", this);
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
        setTextInput("section-name", this);

        $side = $(this).parent().siblings(".side").text();
        ($side == 1)?($('input[id="section-right-radio"]').prop('checked', true)):($('input[id="section-left-radio"]').prop('checked', true));

        setCheckbox("publish-section", ".toPublish", this);
    });
    $(".delete-section").on("click", function() {
        setPostVar("delete-section", this);
    });
    
    $(".add-item").on("click", function() {
        setPostVar("add-item", this);
        // Ensure form values are empty
        $('input[name="item-name"]').val('');
        $('input[name="item-subsec"]').prop('checked', false);
        $('input[name="item-note"]').prop('checked', false);
        $('input[name="item-price"]').val('');
        $('textarea[name="item-desc"]').val('');
        $('input[name="item-veg"]').prop('checked', false);
        $('input[name="item-gf"]').prop('checked', false);

        // Ensure all form inputs are being shown
        $(".hideIfSubsec").show(this.unchecked);
        $(".hideIfNote").show(this.unchecked);
    });
    $(".edit-item").on("click", function() {
        setPostVar("edit-item", this);
        
        // Set form values to current item values
        setTextInput("item-name", this);
        setCheckbox("publish-item", ".toPublish", this);
        $subsec = setCheckbox("item-subsec", ".isSubsec", this);
        $note = setCheckbox("item-note", ".isNote", this);

        // Display relevant input fields depending on item type
        if($subsec && !$note) {
            $(".hideIfNote").show(this.unchecked);
            $(".hideIfSubsec").hide(this.unchecked);
        } else if($note && !$subsec) {
            $(".hideIfSubsec").show(this.unchecked);
            $(".hideIfNote").hide(this.unchecked);

            $desc = $(this).parent().siblings(".desc").children("i").text();
            $('textarea[name="item-desc"]').val($desc);
        } else {
            $(".hideIfSubsec").show(this.unchecked);
            $(".hideIfNote").show(this.unchecked);
            
            $price = $(this).parent().siblings(".veg-gf-price").children(".price").text();
            // Remove symbols 
            $price = $price.replace('£', '');
            $price = $price.replace('p', '');
            // set value
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
        setTextInput("subitem-name", this);
        setTextInput("subitem-price", this);
        setCheckbox("publish-subitem", ".toPublish", this);
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

    // If Note checkbox is ticked, hide inputs
    $('#add-note-check').click(function() {
        $(".hideIfNote").toggle(this.unchecked);
    });
    $('#edit-note-check').click(function() {
        $(".hideIfNote").toggle(this.unchecked);
    });
    
});