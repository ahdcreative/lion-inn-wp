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


    // When Edit Icon is clicked - retrieve parent data-id (menu id)
    // Set hidden input value 'edit-menu' to this id so it knows which menu to update
    $(".edit-menu").on("click", function() {
        $parentListItemId = $(this).closest("li").data("id");
        $('input[name="edit-menu"]').val($parentListItemId);
    });
    // When Delete Icon is clicked - retrieve parent data-id (menu id)
    // Set hidden input value 'delete-menu' to this id so it knows which menu to delete
    $(".delete-menu").on("click", function() {
        $parentListItemId = $(this).closest("li").data("id");
        $('input[name="delete-menu"]').val($parentListItemId);
    });


    // When Edit Icon is clicked - retrieve parent data-id (section id)
    // Set hidden input value 'edit-section' to this id so it knows which section to update
    $(".edit-section").on("click", function() {
        $parentListItemId = $(this).closest("li").data("id");
        $('input[name="edit-section"]').val($parentListItemId);
    });
    // When Delete Icon is clicked - retrieve parent data-id (section id)
    // Set hidden input value 'delete-section' to this id so it knows which section to delete
    $(".delete-section").on("click", function() {
        $parentListItemId = $(this).closest("li").data("id");
        $('input[name="delete-section"]').val($parentListItemId);
    });


    // When Add Icon is clicked - retrieve parent data-id (item id)
    // Set hidden input value 'add-item' to this id so it knows which section to add the item to
    // Ensure form values are already empty
    $(".add-item").on("click", function() {
        $parentListItemId = $(this).closest("li").data("id");
        $('input[name="add-item"]').val($parentListItemId);
        
        $('input[name="edit-item"]').val('');
        $('input[name="item-name"]').val('');
        $('input[name="item-subsec"]').prop('checked', false);
        $('input[name="item-price"]').val('');
        $('textarea[name="item-desc"]').val('');
        $('input[name="item-veg"]').prop('checked', false);
        $('input[name="item-gf"]').prop('checked', false);
    });
    // When Edit Icon is clicked - retrieve parent data-id (item id)
    // Set hidden input value 'edit-item' to this id so it knows which item to update
    // Set existent values of menu item to values on the edit form
    $(".edit-item").on("click", function() {
        $parentListItemId = $(this).closest("li").data("id");
        $('input[name="edit-item"]').val($parentListItemId);
        
        $itemName = $(this).parent().siblings(".item-name").text();
        $('input[name="item-name"]').val($itemName);

        $subsec = ($(this).parent().siblings(".isSubsec").length)?(1):(0);
        ($subsec)?($('input[name="item-subsec"]').prop('checked', true)):($('input[name="item-subsec"]').prop('checked', false));

        // If item is a subsection, hide all of the other form fields
        if($subsec) {
            $(".hideIfSubsec").hide(this.unchecked);
        } else {
            $(".hideIfSubsec").show(this.unchecked);
            
            $price = $(this).parent().siblings(".veg-gf-price").children(".price").text();
            $('input[name="item-price"]').val($price);

            $desc = $(this).parent().siblings(".desc").children("i").text();
            $('textarea[name="item-desc"]').val($desc);

            $veg = ($(this).parent().siblings(".veg-gf-price").children(".veg-gf").children(".veg-icon").length)?(1):(0);
            ($veg)?($('input[name="item-veg"]').prop('checked', true)):($('input[name="item-veg"]').prop('checked', false));

            $gf = ($(this).parent().siblings(".veg-gf-price").children(".veg-gf").children(".gf-icon").length)?(1):(0);
            ($gf)?($('input[name="item-gf"]').prop('checked', true)):($('input[name="item-gf"]').prop('checked', false));
        }
    });
    // When Delete Icon is clicked - retrieve parent data-id (item id)
    // Set hidden input value 'delete-item' to this id so it knows which item to delete
    $(".delete-item").on("click", function() {
        $parentListItemId = $(this).closest("li").data("id");
        $('input[name="delete-item"]').val($parentListItemId);
    });


    // When Add Icon is clicked - retrieve parent data-id (item id)
    // Set hidden input value 'add-subitem' to this id so it knows which item to add the subitem to
    $(".add-subitem").on("click", function() {
        $parentListItemId = $(this).closest("li").data("id");
        $('input[name="add-subitem"]').val($parentListItemId);
    });
    // When Edit Icon is clicked - retrieve parent data-id (subitem id)
    // Set hidden input value 'edit-menu' to this id so it knows which subitem to update
    $(".edit-subitem").on("click", function() {
        $parentListItemId = $(this).closest("li").data("id");
        $('input[name="edit-subitem"]').val($parentListItemId);
    });
    // When Delete Icon is clicked - retrieve parent data-id (subitem id)
    // Set hidden input value 'delete-menu' to this id so it knows which subitem to delete
    $(".delete-subitem").on("click", function() {
        $parentListItemId = $(this).closest("li").data("id");
        $('input[name="delete-subitem"]').val($parentListItemId);
    });


    // If Subsection Title checkbox is clicked, hide all other inputs
    $('#add-subsec-check').click(function() {
        $(".hideIfSubsec").toggle(this.unchecked);
    });
    $('#edit-subsec-check').click(function() {
        $(".hideIfSubsec").toggle(this.unchecked);
    });
    
});