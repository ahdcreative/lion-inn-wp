<?php 
    /**
     * Handle List Generation on the Front-End of the Site
     * 
     * TODO - document all possible $var's that can be passed to this template
     * (to prevent any confusion in future)
     */

    $tpl = new LMTemplate( __DIR__ );
?>

<?php

    switch($type) {

        case "MENUS":
            $i = 1;
            foreach($listOf as $menu) {
                $menu->isFirst = ($i == 1)?(1):(0);
                echo $tpl->render( 'menu' , $menu );
                $i++;
            }
            $i = 1;
            break;

        case "SECTIONS":
            echo "<div class='$classes'>";
            foreach($listOf as $sec) {
                if($sec->side == $side) {
                    echo $tpl->render( 'section' , $sec );
                }
            }
            echo "</div>";
            break;

        case "ITEMS":
            foreach($listOf as $item) {
                $item->side = $side;
                
                if($item->type == 'item') {
                    echo $tpl->render( 'item' , $item );
                } else if($item->type == 'subtitle') {
                    echo $tpl->render( 'subtitle' , $item );
                } else if($item->type == 'note') {
                    echo $tpl->render( 'note' , $item );
                } else {
                    echo "Unknown item type.";
                }   
            }
            break;

        case "SUBITEMS":
            foreach($listOf as $subitem) {
                echo $tpl->render( 'subitem' , $subitem );
            }
            break;

        case "NAV":
            $i = 1;
            foreach($listOf as $nav_item) {
                // set first as active
                $nav_item->isFirst = ($i == 1)?(1):(0);
                // >5 menu's, change col widths on xs, sm & md devices
                if(sizeof($listOf) <= 5) {
                    $nav_item->classes = 'col';
                } else {
                    $nav_item->classes = 'col-3';
                }

                echo $tpl->render( 'nav-item' , $nav_item );
                $i++;
            }
            break;

    }

?>


