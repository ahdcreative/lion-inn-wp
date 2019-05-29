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
        // isValidTarget: function ($item, container) {
        //     return true
        // },
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
            // VERY IMPORTANT - stops scroll animation
            $('html, body').stop();

            // Get menu list info
            var menu_item_ranks = nested.sortable('serialize').get();

            // Set new sides
            for (var i = 0; i < menu_item_ranks.length; i++) {
                for (var j = 0; j < menu_item_ranks[i].length; j++) {
                    menu_item_ranks[i][j].side = (i == 0 ? 0 : 1);
                }
            }

            // Convert to string, remove outside [] as there are 2 of each
            var menu_item_ranks_json = JSON.stringify(menu_item_ranks, null, ' ');

            // console.log(menu_item_ranks_json);

            // Set hidden input value to json ranks so it can be used in POST request
            $('input[name="menu_item_rankings"]').val(menu_item_ranks_json);

            container.el.removeClass("active");
            _super($item, container);
        }
    });

    $(window).mousemove(function (e) {
        // this is needed for some reason - prevents animation continuing after it shouldn't
        $('html, body').animate({});
        
        // define areas for when it should scroll up and down
        var bodyRect = document.body.getBoundingClientRect(); // get screen / window size
        var bottomArea = bodyRect.height - 50;
        var topArea = 100;
        
        if($('.dragged').length === 1) {
            var elemRect = document.querySelector('.dragged').getBoundingClientRect();
            
            // scroll down when cursor is near bottom of screen
            if (elemRect.top > bottomArea) {
                $('html, body').animate({
                    scrollTop: 10000 // adjust - number of px to scroll down
                }, 20000); // increase this to slow the scroll
            }
            // scroll up when cursor is near top of screen
            else if (elemRect.top < topArea) {
                console.log(elemRect.top + '<' + topArea);
                // Up
                $('html, body').animate({
                    scrollTop: 0 // 0 = top
                }, 7000); // again, adjust for speed
            }
            // ensure no scroll animation is happening when mouse is anywhere other than top or bottom areas
            else {
                $('html, body').stop();
            }
        }
    });

});
