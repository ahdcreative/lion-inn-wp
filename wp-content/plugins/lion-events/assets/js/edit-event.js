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
    $(".add-event").on("click", function() {
        setPostVar("add-event", this);
        // Ensure form values are empty
        $('input[name="event-name"]').val('');
        $('input[name="event-date"]').val('');
        $('input[name="publish-event"]').prop('checked', true);
        $('textarea[name="event-desc-sml"]').val('');
        $('textarea[name="event-desc-lrg"]').val('');
    });
    $(".edit-event").on("click", function() {
        setPostVar("edit-event", this);
        
        // Set form values to current item values
        setTextInput("event-name", this);
        setTextInput("event-date", this);
        setCheckbox("publish-event", ".toPublish", this);

        $desc_sml = $(this).parent().siblings(".desc-sml").text();
        $('textarea[name="event-desc-sml"]').val($desc_sml);

        $desc_lrg = $(this).parent().siblings(".desc-lrg").text();
        $('textarea[name="event-desc-lrg"]').val($desc_lrg);        
    });    
    $(".delete-event").on("click", function() {
        setPostVar("delete-event", this);
    });
    
});