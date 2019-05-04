/**
 * Scripts to manage the media functionality in the events plugin.
 * Used to select / change images used for events.
 */
jQuery(function($) {

    /**
     * Add Event Media Modal
     */
    $('#add-event-image-select').on('click', function() {
        var images = wp.media({
            title: "Select Event Image",
            multiple: false
        }).open().on('select', function(e) {
            var selectedImage = images.state().get('selection').first();
            selectedImage = selectedImage.toJSON();

            // Strip url so we only have the last part
            var url_segments = selectedImage.url.split("/");
            var image_url = url_segments.pop(); 

            // Set url as value of hidden input value ready for POST request to add to DB
            $('input[name="add-event-image"').val(image_url);
            $('#add-image-selected-name').text(image_url);
        });
    });

    /**
     * Edit Event Media Modal
     */
    $('#edit-event-image-select').on('click', function() {
        var images = wp.media({
            title: "Select Event Image",
            multiple: false
        }).open().on('select', function(e) {
            var selectedImage = images.state().get('selection').first();
            selectedImage = selectedImage.toJSON();

            // Strip url so we only have the last part
            var url_segments = selectedImage.url.split("/");
            var image_url = url_segments.pop();

            $('input[name="edit-event-image"').val(image_url);
            $('#edit-image-selected-name').text(image_url);         
        });
    });

});