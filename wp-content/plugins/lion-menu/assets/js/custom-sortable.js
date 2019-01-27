/**
 * Makes a list sortable and generates serialized JSON
 * to update the database with.
 */
jQuery(function($) {
    
    var group = $('ol.sortable').sortable({
        group: 'serialization',
        onDrop: function ($item, container, _super) {
            var data = group.sortable('serialize').get();
        
            var jsonString = JSON.stringify(data, null, ' ');
        
            _super($item, container);

            console.log(jsonString);

            // add POST here
        }
    });

});
