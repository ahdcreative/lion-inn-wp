/**
 * Enable WYSIWYG functionality for the event description textareas
 */
jQuery(function($) {

    function quillEditor(caller) {
        return new Quill(caller, {
            theme: 'snow'
        });
    }

    // var regular_events = quillEditor('textarea#r-event-desc-input');
    var upcoming_event_add = quillEditor('textarea#u-event-add-desc-input');
    var upcoming_event_edit = quillEditor('textarea#u-event-edit-desc-input');
});