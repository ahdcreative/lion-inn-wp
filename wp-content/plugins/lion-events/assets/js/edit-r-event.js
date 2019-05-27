/**
 * JQuery to handle when the icons are clicked on the Edit Regular Events page.
 * Set POST var's to the data-id of it's parent section / item.
 * Also sets form values in modals when EDIT is clicked on an item.
 * The .parent() / .sibling() paths start from the icon that was clicked.
 */

jQuery(function($) {

    var regular_events = new Quill('textarea#r-event-desc-input', {
        theme: 'snow'
    });

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
        $('input[name='+$inputName+']').val($value);
    }

    /**
     * Set Regular Event Desc field
     * So it's ready for the POST to DB
     */
    function setRegularEventDesc($inputName, $caller) {
        $desc = $($caller).parent().parent().siblings(".description").text();
        $('textarea[name='+$inputName+']').val($desc.trim());
        
        // regular_events.setText('Hello');
    }

    /**
     * Set Image URL
     */
    function setIconUrl($iconUrl, $caller) {
        $value = $($caller).parent().siblings().children('.'+$iconUrl).text();
        // Set POST var to current image url
        $('input[name="edit-event-icon"]').val($value);
        // Set label text to show current image url
        $('#edit-icon-selected-name').text($value);
    }

    /**
     * Set Edit Regular Event Modal Content
     * When 'Edit' Icon is clicked on a days event.
     */
    $(".edit-r-event").on("click", function() {
        setRegularEventId("edit-r-event", this);
        
        setRegularEventTitle('r-event-title', this);
        setIconUrl("event-icon-url", this);
        setRegularEventDesc('r-event-desc', this);
    });


    /**
     * Styling Tweaks for Regular Events Page
     * Remove active class from other days,
     * and set it for the day clicked
     */
    $('.r-event-day-text').on('click', function() {
        // If the day clicked is already active then just remove the class
        // i.e. user closing the active day
        if($(this).hasClass('active')) {
            $('.r-event-day-text').removeClass('active');
        } 
        // Else the user has clicked another day to open without closing the
        // one that is already open
        else {
            $('.r-event-day-text').removeClass('active');
            $(this).toggleClass('active');
        }
    });
});