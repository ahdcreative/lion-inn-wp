<!-- Save Button in Admin Page - to Save Menu Ranking -->
<form action="#" method="POST">
    <input type="hidden" value="" name="rankings" />
    <input class="btn btn-success" type="submit" value="Save" />
</form>

<script>
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

        // When Menu Edit Icon is Clicked
        $('.fa-edit').click(function() {

        });

        // When Menu Delete Icon is Clicked
        $('.fa-trash-alt').click(function() {

        });

    });    
</script>

<?php 
    
    require_once( WP_PLUGIN_DIR . '/lion-menu/includes/lm-sql-manager.class.php' );

    // Handle POST Request - When 'Save' is clicked
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        if(!isset($_POST["rankings"])) {
            return;
        }

        // Remove '\' from JSON string & decode / convert to array
        $rankings = str_replace("\\", "", $_POST["rankings"]);
        $rankings = json_decode($rankings, true);

        if(!$rankings) return;
        
        // Update Database - set rank equal to it's turn ($i) in the $rankings list
        $i = 1;
        $db = new SQLManager();
        // Rankings array is formatted as Array ( [0] => Array ( [id] => 1 ) [1] => Array ( [id] => 7 )...
        // So a double loop is needed to access the menu id's.
        foreach($rankings as $key => $value) {
            foreach($value as $id => $rank) {
                $db->update("menu", array(
                        'rank' => $i
                    ), 
                    array('id' => $rank)
                );
            }
            $i++;
        }
    }
    
?>