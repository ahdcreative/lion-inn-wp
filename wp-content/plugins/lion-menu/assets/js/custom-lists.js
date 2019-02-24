jQuery(function($) {
                
    // Sortable Serialized List
    var single = $('ol.sortable').sortable({
        group: 'serialization',
        handle: '.fa-bars',
        onDrop: function ($item, container, _super) {
            // Get list info
            var ranks = single.sortable('serialize').get();
            
            // Convert to string, remove outside [] as there are 2 of each
            var ranks_json = JSON.stringify(ranks, null, ' ');
            ranks_json = ranks_json.replace('[', '');
            ranks_json = ranks_json.replace(']', '');

            // console.log(ranks_json);
        
            // Updates list
            _super($item, container);
            
            // Set hidden input value to json ranks so it can be used in POST request
            $('input[name="rankings"]').val(ranks_json);
        } 
    });


    // Nested Sortable Serialized List
    // Handles both list sides (i.e. sections on left and right side) as they are 2 separate lists.
    var oldContainer;
    var nested = $('ol.nested-sortable').sortable({
        group: 'serialization',
        handle: '.fa-bars',
        afterMove: function (placeholder, container) {
            if(oldContainer != container){
                if(oldContainer) {
                    oldContainer.el.removeClass("active");
                }

                container.el.addClass("active");

                oldContainer = container;
            }
        },
        onDrop: function ($item, container, _super) {
            // Get menu list info
            var menu_item_ranks = nested.sortable('serialize').get();

            // Convert to string, remove outside [] as there are 2 of each
            var menu_item_ranks_json = JSON.stringify(menu_item_ranks, null, ' ');

            // console.log(menu_item_ranks_json);

            // Set hidden input value to json ranks so it can be used in POST request
            $('input[name="menu_item_rankings"]').val(menu_item_ranks_json);

            container.el.removeClass("active");
            _super($item, container);
        }
    });

});
