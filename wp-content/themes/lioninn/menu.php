<?php
/**
 * Template Name: Menu
 */
?>

<?php get_header(); ?>

<body class="montserrat">

    <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
        endif;
    ?>

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

            <!-- Loop through all menus (standard, pizza, dessert, etc) -->
            <?php $i = 1; while( have_groups( 'menus' ) ): the_group() ?>

                <div class="tab-pane fade show <?php if($i == 1) { echo "active"; } ?>" id="<?php echo strtolower( get_sub_value( 'menu_title' )) ?>" role="tabpanel" aria-labelledby="<?php echo strtolower( get_sub_value( 'menu_title' )) ?>-tab">
                    <div class="row">
                        <!-- Left Side - Print 'Main Section's -->
                        <div class="left col-lg-6">

                            <!-- Loop through sections within a menu (grazing, starters, sides, etc) -->
                            <?php $j = 1; while( have_groups( 'sections' ) ): the_group() ?>

                                <?php if( 'main_section' == get_group_type() ): ?>

                                    <div class="<?php echo strtolower( get_sub_value( 'section_title' )) ?> <?php if($j > 1) { echo "mt-5"; } ?>">

                                        <!-- Print title of section (grazing, starters, sides, etc) -->
                                        <h1 class="great-vibes m-0"><?php the_sub_value( 'section_title' ) ?></h1>
                                        <hr class="mt-2"/>

                                        <!-- Loop through all dishes in that section -->
                                        <?php while( have_groups( 'dishes' ) ): the_group() ?>

                                            <!-- section sub titles (pasta, toppings) - purple backgrounds with white text -->
                                            <?php if( 'menu_sub_title' == get_group_type() ): ?>

                                                <div class="<?php echo strtolower( get_sub_value( 'sub_title' )) ?>">
                                                    <h2 class="main-sub-heading p-2"><?php the_sub_value( 'sub_title' ) ?></h2>
                                                </div>

                                            <?php endif ?>

                                            <!-- additional information about the menu / a section -->
                                            <?php if( 'additional_information' == get_group_type() ): ?>

                                                <div class="note">
                                                    <p><?php the_sub_value( 'information' ) ?></p>
                                                </div>

                                            <?php endif ?>

                                            <!-- Print dish information -->
                                            <?php if( 'dish_item' == get_group_type() ): ?>

                                                <!-- Single menu item - each of its values -->
                                                <div class="item row mt-2">
                                                    <div class="col-6 col-md-8 col-lg-6 col-xl-8 pr-0">
                                                        <h3 class="item-title"><?php the_sub_value( 'dish_name' ) ?></h3>
                                                        <p><?php the_sub_value( 'description' ) ?></p>
                                                    </div>
                                                    <div class="col-3 col-md-2 col-lg-3 col-xl-2 mt-2 px-0">
                                                        <?php if( get_sub_value( 'vegetarian' ) ): ?>
                                                            <img class="mx-2" src="<?php echo get_bloginfo('template_directory'); ?>/images/vegetarian.png" alt="Image of Vegetarian Icon" />
                                                        <?php endif ?>
                                                        <?php if( get_sub_value( 'gluten_free' ) ): ?>
                                                            <img class="mx-2" src="<?php echo get_bloginfo('template_directory'); ?>/images/gluten-free.png" alt="Image of Gluten Free Icon" />
                                                        <?php endif ?>
                                                    </div>
                                                    <div class="col-3 col-md-2 col-lg-3 col-xl-2 pr-0 mt-2 text-center">
                                                        <?php if( get_sub_value( 'price' ) ): ?>
                                                            <p class="price ml-md-4 py-1 pl-1 pr-2 px-md-2">£<?php the_sub_value( 'price' ) ?></p>
                                                        <?php endif ?>
                                                    </div>
                                                </div>

                                                <hr class="mt-0" />

                                            <?php endif ?>

                                        <?php endwhile ?>

                                    </div>

                                <?php endif ?>

                            <?php $j++; endwhile ?>

                        </div>

                        <!-- SIDES -->
                        <div class="sides right col-lg-4 offset-lg-2">

                            <!-- Loop through sections within a menu (grazing, starters, sides, etc) -->
                            <?php while( have_groups( 'sections' ) ): the_group() ?>

                                <?php if( 'side_section' == get_group_type() ): ?>

                                    <!-- Print title of section (grazing, starters, sides, etc) -->
                                    <h1 class="great-vibes m-0"><?php the_sub_value( 'side_section_title' ) ?></h1>
                                    <hr class="mt-2"/>

                                    <!-- Loop through all dishes in that section -->
                                    <?php while( have_groups( 'side_dishes' ) ): the_group() ?>

                                        <!-- section sub titles (pasta, toppings) - purple backgrounds with white text -->
                                        <?php if( 'menu_sub_title' == get_group_type() ): ?>

                                            <div class="<?php echo strtolower( get_sub_value( 'sub_title' )) ?>">
                                                <h2 class="main-sub-heading p-2"><?php the_sub_value( 'sub_title' ) ?></h2>
                                            </div>

                                        <?php endif ?>

                                        <!-- additional information about the menu / a section -->
                                        <?php if( 'additional_information' == get_group_type() ): ?>

                                            <div class="note">
                                                <p><?php the_sub_value( 'information' ) ?></p>
                                            </div>

                                        <?php endif ?>

                                        <!-- Print dish information -->
                                        <?php if( 'side_dish_item' == get_group_type() ): ?>

                                            <!-- Single side menu item - each of its values -->
                                            <div class="item row mt-2">
                                                <div class="col-6 col-md-8 col-lg-5 col-xl-6 pr-0">
                                                    <h3 class="item-title"><?php the_sub_value( 'side_dish_name' ) ?></h3>
                                                    <p><?php the_sub_value( 'side_description' ) ?></p>
                                                </div>
                                                <div class="col-3 col-md-2 col-lg-3 col-xl-3 px-0">
                                                    <?php if( get_sub_value( 'vegetarian' ) ): ?>
                                                        <img class="mx-2" src="<?php echo get_bloginfo('template_directory'); ?>/images/vegetarian.png" alt="Image of Vegetarian Icon" />
                                                    <?php endif ?>
                                                    <?php if( get_sub_value( 'gluten_free' ) ): ?>
                                                        <img class="mx-2" src="<?php echo get_bloginfo('template_directory'); ?>/images/gluten-free.png" alt="Image of Gluten Free Icon" />
                                                    <?php endif ?>
                                                </div>
                                                <div class="col-3 col-md-2 col-lg-4 col-xl-3 pr-0 text-center">
                                                    <?php if( get_sub_value( 'price' ) ): ?>
                                                        <p class="price ml-md-4 py-1 pl-1 pr-2 px-md-2">£<?php the_sub_value( 'price' ) ?></p>
                                                    <?php endif ?>
                                                </div>
                                            </div>

                                            <!-- Loop through add-ons for dish -->
                                            <?php if( get_sub_value( 'add_ons' ) ): ?>
                                                
                                                <?php while( have_groups( 'add_ons' ) ): the_group() ?>

                                                    <div class="sub-item row">
                                                        <div class="col-6 col-md-8 col-lg-5 col-xl-6 pr-0">
                                                            <?php if( get_sub_value( 'add_on_name' ) ): ?>
                                                                <p><?php the_sub_value( 'add_on_name' ) ?></p>
                                                            <?php endif ?>
                                                        </div>
                                                        <div class="col-3 col-md-2 col-lg-3 col-xl-3 px-0"></div>
                                                        <div class="col-3 col-md-2 pr-0 text-center text-md-right">
                                                            <?php if( get_sub_value( 'add_on_price' ) ): ?>
                                                                <p class="sub-price mr-3">+<?php the_sub_value( 'add_on_price' ) ?>p</p>
                                                            <?php endif ?>
                                                        </div>
                                                    </div>

                                                <?php endwhile ?>

                                            <?php endif ?>

                                            <hr class="mt-0" />

                                        <?php endif ?>

                                    <?php endwhile ?>

                                <?php endif ?>

                            <?php endwhile ?>

                        </div>

                    </div>

                </div>

            <?php $i++; endwhile ?>

        </div>

    </div> <!-- End container -->

    <?php get_footer(); ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
