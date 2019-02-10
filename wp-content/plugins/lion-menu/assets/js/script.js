jQuery(function($) {
                
    // Sortable Serialized List
    var group = $('ol.sortable').sortable({
        group: 'serialization',
        handle: '.fa-bars',
        onDrop: function ($item, container, _super) {
            // Get list info
            var ranks = group.sortable('serialize').get();
            
            // Convert to string, remove outside [] as there are 2 of each
            var ranks_json = JSON.stringify(ranks, null, ' ');
            ranks_json = ranks_json.replace('[', '');
            ranks_json = ranks_json.replace(']', '');

            console.log(ranks_json);
        
            // Updates list
            _super($item, container);
            
            // Set hidden input value to json ranks so it can be used in POST request
            $('input[name="rankings"]').val(ranks_json);
        } 
    });

    // When Edit Icon is clicked - retrieve parent data-id (menu id)
    // Set hidden input value 'edit-menu' to this id so it knows which menu to update
    $(".edit").on("click", function() {
        $parentListItemId = $(this).closest("li").data("id");
        $('input[name="edit-menu"]').val($parentListItemId);
    });
    // When Delete Icon is clicked - retrieve parent data-id (menu id)
    // Set hidden input value 'delete-menu' to this id so it knows which menu to delete
    $(".delete").on("click", function() {
        $parentListItemId = $(this).closest("li").data("id");
        $('input[name="delete-menu"]').val($parentListItemId);
    });


    // Nested Sortable Serialized List
    // Handles both list sides (i.e. sections on left and right side) as they are 2 separate lists.
    var oldContainer;
    var group = $('ol.nested-sortable').sortable({
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
            var menu_item_ranks = group.sortable('serialize').get();

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