<!-- Save Button in Admin Page - to Save Menu Ranking -->
<form action="#" method="POST">
    <input type="hidden" value="" name="rankings" />
    <input type="submit" value="Save" />
</form>

<!-- Sortable Serialized List -->
<script>
    jQuery(function($) {

        var group = $('ol.sortable').sortable({
            group: 'serialization',
            onDrop: function ($item, container, _super) {
                // Get list info
                var ranks = group.sortable('serialize').get();
                
                // Convert to string, remove outside [] as there are 2 of each
                var ranks_json = JSON.stringify(ranks, null, ' ');
                ranks_json = ranks_json.replace('[', '');
                ranks_json = ranks_json.replace(']', '');
            
                // Updates list
                _super($item, container);                

                console.log(ranks_json);

                // Set hidden input value to json ranks so it can be used in POST request
                $('input[name="rankings"]').val(ranks_json);
            } 
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

        echo "<br/> Print_r - ";
        print_r($rankings);
        
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