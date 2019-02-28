<?php 
    /**
     * Handle List Generation on the Front-End of the Site
     * 
     * TODO - document all possible $var's that can be passed to this template
     * (to prevent any confusion in future)
     */

    $tpl = new Template( __DIR__ );
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
            break;

        case "SECTIONS":                       
            foreach($listOf as $sec) {
                if($sec->side == $side) {
                    $sec->classes = $classes;
                    echo $tpl->render( 'section' , $sec );
                }
            }
            break;

        case "ITEMS":
            foreach($listOf as $item) {
                echo $tpl->render( 'item' , $item );
            }
            break;

        case "SUBITEMS":
            foreach($listOf as $subitem) {
                echo $tpl->render( 'subitem' , $subitem );
            }
            break;

    }

?>
