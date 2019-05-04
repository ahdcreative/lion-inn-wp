/**
 * JQuery to handle when the icons are clicked on the Edit Menu page.
 * Set POST var's to the data-id of it's parent section / item.
 * Also sets form values in modals when EDIT is clicked on an item.
 * The .parent() / .sibling() paths start from the icon that was clicked.
 * All inputs are forced to be empty when 'add' is clicked.
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
        $checked = ($($caller).siblings($className).length)?(1):(0);
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
     * Set date input value
     */
    function setDateInput($inputName, $caller) {
        $value = $($caller).parent().parent().siblings().children('.'+$inputName).text();
        $separatedDate = $value.split("/");
        $('input[name='+$inputName+']').val($separatedDate[2] + "-" + $separatedDate[1] + "-" + $separatedDate[0]);
    }

    /**
     * Set Image URL
     */
    function setImageUrl($imageUrl, $caller) {
        $value = $($caller).parent().parent().siblings().children('.'+$imageUrl).text();
        // Set POST var to current image url
        $('input[name="edit-event-image"]').val($value);
        // Set label text to show current image url
        $('#edit-image-selected-name').text($value);
    }
    
    /**
     * Handle Add, Edit & Delete Forms
     */
    $(".add-event").on("click", function() {
        setPostVar("add-event", this);
        // Ensure form values are empty
        $('input[name="event-name"]').val('');
        $('input[name="event-start-date"]').val('');
        $('input[name="event-end-date"]').val('');
        $('input[name="add-event-image"]').val('');
        $('input[name="add-event-img-height"]').val('');
        $('input[name="add-event-img-width"]').val('');
        $('#add-image-selected-name').text('No Image Selected');
        $('input[name="single-date-event"]').prop('checked', false);
        $('input[name="publish-event"]').prop('checked', true);
        $('textarea[name="event-desc"]').val('');

        // Ensure all form inputs are being shown
        $(".hideIfSingleDate").show(this.unchecked);
    });
    $(".edit-event").on("click", function() {
        setPostVar("edit-event", this);
        
        // Set form values to current item values
        setTextInput("event-name", this);
        setDateInput("event-start-date", this);
        setDateInput("event-end-date", this);
        setImageUrl("event-image-url", this);
        $isSingleDayEvent = setCheckbox("single-date-event", ".isSingleDayEvent", this);
        setCheckbox("publish-event", ".toPublish", this);

        // Hide end date if single event day is ticked
        if($isSingleDayEvent) {
            $(".hideIfSingleDate").hide(this.unchecked);
        } else {
            $(".hideIfSingleDate").show(this.unchecked);
        }

        $desc = $(this).parent().siblings(".desc").text();
        $('textarea[name="event-desc"]').val($desc);    
    });    
    $(".delete-event").on("click", function() {
        setPostVar("delete-event", this);
    });

    /**
     * Hide End Date Input when Checkbox Clicked
     */
    $(".isSingleDate").click(function() {
        $(".hideIfSingleDate").toggle(this.unchecked);
    });
});