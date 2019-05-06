/**
 * JQuery to handle when the icons are clicked on the Edit Regular Events page.
 * Set POST var's to the data-id of it's parent section / item.
 * Also sets form values in modals when EDIT is clicked on an item.
 * The .parent() / .sibling() paths start from the icon that was clicked.
 */
jQuery(function($) {

    /**
     * Set edit-r-event POST var with the ID
     * of that day so that the right day is 
     * updated in the DB.
     * Similar to setPostVar()
     */
    function setRegularEventId($inputName, $caller) {
        $dayId = $($caller).parent().data("id");
        $('input[name='+$inputName+']').val($dayId);
    }

    /**
     * Set Regular Event Title field
     * So it's ready for the POST to DB
     */
    function setRegularEventTitle($inputName, $caller) {
        $value = $($caller).parent().siblings(".title").text();
        console.log($value);
        $('input[name='+$inputName+']').val($value);
    }

    /**
     * Set Regular Event Desc field
     * So it's ready for the POST to DB
     */
    function setRegularEventDesc($inputName, $caller) {
        $desc = $($caller).parent().parent().siblings(".row").children(".description").text();
        $('textarea[name='+$inputName+']').froalaEditor('html.set', $desc);
    }

    /**
     * Set Edit Regular Event Modal Content
     * When 'Edit' Icon is clicked on a days event.
     */
    $(".edit-r-event").on("click", function() {
        setRegularEventId("edit-r-event", this);
        
        setRegularEventTitle('r-event-title', this);
        setRegularEventDesc('r-event-desc', this);
    }); 
});