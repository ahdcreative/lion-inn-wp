jQuery(function($) {
                
    // Sortable Serialized List
    var group = $('ol.sortable').sortable({
        group: 'serialization',
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

    // Disable sortable list when icons are hovered over or clicked
    $('.fa-edit').on('click mouseover', function () { $('ol.sortable').sortable('disable'); });
    $('.fa-trash-alt').on('click mouseover', function () { $('ol.sortable').sortable('disable'); });
    // Re-enable up release    
    $('.fa-edit').on('mouseleave', function () { $('ol.sortable').sortable('enable'); });
    $('.fa-trash-alt').on('mouseleave', function () { $('ol.sortable').sortable('enable'); });

    // When Edit Icon is clicked - retrieve parent data-id (menu id)
    // Set hidden input value 'edit' to this id so it knows which menu to update
    $(".edit").on("click", function() {
        $parentListItemId = $(this).closest("li").data("id");
        $('input[name="edit"]').val($parentListItemId);
    });
    // When Delete Icon is clicked - retrieve parent data-id (menu id)
    // Set hidden input value 'delete' to this id so it knows which menu to delete
    $(".delete").on("click", function() {
        $parentListItemId = $(this).closest("li").data("id");
        $('input[name="delete"]').val($parentListItemId);
    });


    // Nested Sortable Serialized List
    var group = $('ol.nested-sortable').sortable({
        group: 'nested',
        handle: 'i.item-move',
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



});