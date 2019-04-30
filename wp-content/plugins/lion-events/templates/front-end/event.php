<!-- Template for each 'Upcoming Event' event -->
<?php 
    include( WP_PLUGIN_DIR . '/lion-events/templates/admin/items/months.php' );
    // Debugging functions
    require_once( WP_PLUGIN_DIR . '/lion-events/includes/le-debug.php' );

    $name = str_replace('\\', '', $name);

    $startdate = explode('-', $event_start_date);
    $startyear = $startdate[0];
    $startmonthnum = $startdate[1];
    $startmonth = $months[strval($startdate[1])];
    $startday = $startdate[2];

    $enddate = explode('-', $event_end_date);
    $endyear = $enddate[0];
    $endmonthnum = $enddate[1];
    $endmonth = $months[strval($enddate[1])];
    $endday = $enddate[2];
?>

<div class="row mt-3">
    <div class="date col-2 col-lg-1">
        <p class="month mb-0"><?php echo $startmonth ?></p>
        <hr class="text-left bg-light my-0"/>
        <p class="day mt-0"><?php echo $startday ?></p>

        <?php
            if($event_end_date !== "0000-00-00") {
                echo "
                    <p class='my-2'>to</p>
                    <p class='month mb-0'>$endmonth</p>
                    <hr class='text-left bg-light my-0'/>
                    <p class='day mt-0'>$endday</p>
                ";
            }
        ?>
    </div>

    <div class="image col-10 col-lg-5">
        <img id="<?php echo $id ?>" src="<?php echo content_url() . '/uploads/' . $image_url; ?>" alt="<?php echo $name; ?>" class="event-image" />
    </div>

    <div class="info col-8 offset-2 col-lg-4 offset-lg-0">
        <h2 class="event-title mb-0 mt-1 mt-lg-0"><?php echo $name; ?></h2>
        <hr class="text-left bg-light my-1 my-lg-2"/>
        <p class="my-1 mt-lg-0">
            <?php echo $description_sml; ?>
        </p>
        <hr class="text-left bg-light my-1 my-lg-2"/>
        <p>
            <?php echo $description_lrg; ?>
        </p>
    </div>
</div>

<hr />