<?php
/**
 * Template Name: Menu
 */
?>

<?php get_header(); ?>

<body class="montserrat">

    <div class="container menu">

        <div class="header row mt-2">
            <div class="col-2 my-auto p-0">
                <a class="btn btn-lg btn-back py-1 px-2" href="../">
                    <i class="fas fa-angle-left"></i>
                    Back
                </a>
            </div>
            <a class="col-2 offset-7 offset-sm-8 text-right p-0" href="../">
                <img src="<?php echo get_bloginfo('template_directory'); ?>/images/logo.png" width="75px" height="75px" alt="The Lion Inn Logo">
            </a>
        </div>

        <!-- Clickable Tabs -->
        <ul class="nav nav-tabs row menu-options text-center mt-4" id="myTab" role="tablist">

            <!-- Loop through all menus and print menu title to nav -->
            <?php $i = 1; while( have_groups( 'menus' ) ): the_group() ?>

                <li class="nav-item col-1 p-0">
                    <a class="nav-link p-0 d-flex flex-column <?php if($i == 1) { echo "active"; } ?>" id="<?php echo strtolower( get_sub_value( 'menu_title' )) ?>-tab" data-toggle="tab" href="#<?php echo strtolower( get_sub_value( 'menu_title' )) ?>" role="tab" aria-controls="<?php echo strtolower( get_sub_value( 'menu_title' )) ?>" aria-selected="true">
                        <h4 class="m-0 my-auto"><?php the_sub_value( 'menu_title' ) ?></h4>

                    </a>
                </li>

            <?php $i++; endwhile ?>

        </ul>

        <div class="filters row py-2">
            <div class="gluten offset-1">
                <img class="mx-2" src="<?php echo get_bloginfo('template_directory'); ?>/images/gluten-free.png" alt="Image of Gluten Free Icon" />
                <p>Gluten Free</p>
            </div>

            <div class="vegetarian offset-1">
                <img class="mx-2" src="<?php echo get_bloginfo('template_directory'); ?>/images/vegetarian.png" alt="Image of Vegetarian Icon" />
                <p>Vegetarian</p>
            </div>
        </div>


        <!-- Menu information (based off of which nav-tab is selected) -->
        <div class="menu-items tab-content mt-5 pl-0" id="myTabContent" style="background-color: #FFF;">

            <?php

                if (class_exists( 'LionMenu' )) {

                    $lionMenu = new LionMenu();

                    if(method_exists($lionMenu, 'render_menu')) {

                        $lionMenu->render_menu();

                    } else {

                        echo "<h3>Error loading menu.</h3>";
                        console_log("Error loading menu.");

                    }

                } else {

                    echo "<h3>Class doesn't exist (i.e. plugin not installed or something).</h3>";
                    console_log("Class doesn't exist.");

                }

            ?>            

        </div>

    </div> <!-- End container -->

    <?php get_footer(); ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
