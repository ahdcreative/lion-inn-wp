<?php 
    include( __DIR__ . "/months.php" );
    // Debugging functions
    require_once(plugin_dir_path(__DIR__) . '../../includes/le-debug.php');

    $tpl = new LETemplate( __DIR__ );

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

<div class="card m-0 p-0 col-10">

    <!-- Event Title Button -->
    <div class="r-event-day card-header bg-white p-0" id="<?php echo strtolower($id); ?>">
        <div>
            <button class="btn btn-link r-event-day-text py-3 text-left w-100 h-100" type="button" data-toggle="collapse" data-target="#<?php echo 'event-' . $id; ?>" aria-expanded="true" aria-controls="<?php echo 'event-' . $id; ?>">
                <?php echo $name; ?>

                <span class='grey-font fs-10 ml-4'>
                    <?php 
                        echo $startmonth;
                        echo ' '; 
                        echo $startday;
                    
                        if($event_end_date !== "0000-00-00") {
                            echo ' - ';
                            echo $endmonth;
                            echo ' '; 
                            echo $endday;
                        }
                    ?>
                </span>
            </button>            
        </div>
    </div>

    <!-- Content for that event -->
    <div id="<?php echo 'event-' . $id; ?>" class="collapse hide r-event-body pl-4" aria-labelledby="<?php echo strtolower($id); ?>" data-parent="#upcoming-events">
        <div class="card-body" data-id='<?php echo $id; ?>'>
            <div class="row">    
                <div class="date col-2 col-lg-1">
                    <p class="month mb-0 fs-12"><?php echo $startmonth ?></p>
                    <hr class="text-left bg-light my-0 hr-date"/>
                    <p class="day mt-0"><?php echo $startday ?></p>

                    <?php
                        if($event_end_date !== "0000-00-00") {
                            echo "
                                <p class='my-2'>to</p>
                                <p class='month mb-0 fs-12'>$endmonth</p>
                                <hr class='text-left bg-light my-0 hr-date'/>
                                <p class='day mt-0'>$endday</p>
                            ";
                        }
                    ?>

                    <span hidden class="event-start-date"><?php echo $startday . "/" . $startmonthnum . "/" . $startyear; ?></span>
                    <span hidden class="event-end-date"><?php echo $endday . "/" . $endmonthnum . "/" . $endyear; ?></span>
                </div>

                <!-- Event Image -->
                <?php
                    if($image_width >= $image_height) {
                        echo $tpl->render( 'le-hrztl-img', array('id' => $id, 'image_url' => $image_url, 'name' => $name));
                    } else {
                        echo $tpl->render( 'le-vert-img', array('id' => $id, 'image_url' => $image_url, 'name' => $name));
                    }
                ?>        
                
                <div class="info col-8 offset-2 col-lg-4 offset-lg-0">
                    <!-- Event Name -->
                    <span class="mb-0 mt-1 mt-lg-0 event-name purple-font"><?php echo $name; ?></span>            

                    <!-- Icons -->
                    <div class='float-right mt-3'>
                        <!-- Publish / Not Published Icon -->
                        <?php
                            if($toPublish) {
                                echo $tpl->render( 'le-icon', array( "classes" => "fas fa-check-circle toPublish mr-3", "tooltip" => "Published"));
                            } else {
                                echo $tpl->render( 'le-icon', array( "classes" => "fas fa-times-circle mr-3", "tooltip" => "Not Published"));
                            }
                        ?>
                        <?php echo $tpl->render( 'le-icon-link', array( "aClasses" => "edit-event", "modal" => "edit-event-modal", "tooltip" => "Edit", "iClasses" => "fa-edit mr-3", "w" => "600", "h" => "600" )); ?>
                        <?php echo $tpl->render( 'le-icon-link', array( "aClasses" => "delete-event", "modal" => "delete-event-modal", "tooltip" => "Delete", "iClasses" => "fa-trash-alt", "w" => "275", "h" => "215" )); ?>
                        <!-- If it's a single day event or not -->
                        <?php
                            if($isSingleDayEvent) {
                                echo "<span class='isSingleDayEvent' hidden></span>";
                            }
                        ?>
                    </div>

                    <!-- Description -->
                    <hr class="text-left bg-light my-1 my-lg-2 hr-desc"/>
                    <span class="my-1 mt-lg-0 desc"><?php echo $description; ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
