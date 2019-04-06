<?php 
    require_once( __DIR__ . "\months.php" );    
    // Debugging functions
    require_once(plugin_dir_path(__DIR__) . '../../includes/le-debug.php');

    $tpl = new LMTemplate( __DIR__ ); 

    $name = str_replace('\\', '', $name);

    $date = explode('-', $event_date);
    $year = $date[0];
    $month = $months[strval($date[1])];
    $day = $date[2];

    le_console_log($month);
?>

<li class='list-group-item list-group-item-action' data-id='<?php echo $id ?>'>

    <div class="row">
    
        <div class="date col-2 col-lg-1">
            <p class="month mb-0"><?php echo $month ?></p>
            <hr class="text-left bg-light my-0"/>
            <p class="day mt-0"><?php echo $day ?></p>
        </div>

        <!-- Event Image -->
        <div class="image col-10 col-lg-5">
            <img src="https://media-cdn.tripadvisor.com/media/photo-s/10/e2/be/d8/angel-s-steak-pub-interior.jpg" alt="Image of the Burns Poster" class="event-image" />
        </div>

        <div class="info col-8 offset-2 col-lg-4 offset-lg-0">
            <!-- Event Name -->
            <h2 class="event-title mb-0 mt-1 mt-lg-0 event-name"><?php echo $name; ?></h2>

            <!-- Small Description -->
            <hr class="text-left bg-light my-1 my-lg-2"/>
            <p class="my-1 mt-lg-0 desc-sml"><?php echo $description_sml; ?></p>

            <!-- Large Description -->
            <hr class="text-left bg-light my-1 my-lg-2"/>
            <p class="desc-lrg"><?php echo $description_lrg; ?></p>
        </div>
    
    </div>

</li>

