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