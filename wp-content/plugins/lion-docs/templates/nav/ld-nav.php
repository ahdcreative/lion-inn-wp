<?php

// equivalent of list template file
// render all doc names with links to their files

// i.e.
// $pdf2 = plugins_url() . '/lion-docs/docs/test2.pdf';
// foreach() {
//      echo $nav->render('ld-nav-link', array('filename' => $pdf2, 'title' => 'Test 2'));
// }

?>

<div id="accordion">
    <div id="general-docs">
        <div id="general-heading">
            <a class="btn btn-link p-0" data-toggle="collapse" data-target="#collapse-general" aria-expanded="true" aria-controls="collapse-general">
                General
            </a>
        </div>

        <div id="collapse-general" class="collapse show ml-4" aria-labelledby="general-heading" data-parent="#accordion">
            Doc
        </div>
    </div>

    <div id="menu-docs">
        <div id="menu-heading">
            <a class="btn btn-link p-0" data-toggle="collapse" data-target="#collapse-menu" aria-expanded="true" aria-controls="collapse-menu">
                Menu
            </a>
        </div>

        <div id="collapse-menu" class="collapse show ml-4" aria-labelledby="menu-heading" data-parent="#accordion">
            Doc
        </div>
    </div>

    <div id="event-docs">
        <div id="event-heading">
            <a class="btn btn-link p-0" data-toggle="collapse" data-target="#collapse-event" aria-expanded="true" aria-controls="collapse-event">
                Events
            </a>
        </div>

        <div id="collapse-event" class="collapse show ml-4" aria-labelledby="event-heading" data-parent="#accordion">
            Doc
        </div>
    </div>
</div>