jQuery(function($) {
    var group = $('ol.menus').sortable({
        group: 'serialization',
        onDrop: function ($item, container, _super) {
            var data = group.sortable('serialize').get();
        
            var jsonString = JSON.stringify(data, null, ' ');
        
            _super($item, container);

            console.log(jsonString);
        }
    });

});
