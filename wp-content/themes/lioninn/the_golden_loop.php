<!-- Loop through all menus (standard, pizza, dessert, etc) -->
<?php while( have_groups( 'menus' ) ): the_group() ?>

    <!-- Loop through sections within a menu (grazing, starters, sides, etc) -->
    <?php while( have_groups( 'sections' ) ): the_group() ?>

        <?php if( 'main_section' == get_group_type() ): ?>

            <!-- Print title of section (grazing, starters, sides, etc) -->
            <h3><?php the_sub_value( 'section_title' ) ?></h3>

            <!-- Loop through all dishes in that section -->
            <?php while( have_groups( 'dishes' ) ): the_group() ?>

                <?php if( 'menu_sub_title' == get_group_type() ): ?>

                    <!-- section sub titles (pasta, toppings) -->
                    <p><?php the_sub_value( 'sub_title' ) ?></p>

                <?php endif ?>

                <?php if( 'additional_information' == get_group_type() ): ?>

                    <!-- additional information about the menu / a section -->
                    <p><?php the_sub_value( 'information' ) ?></p>

                <?php endif ?>

                <?php if( 'dish_item' == get_group_type() ): ?>

                    <!-- Print dish information -->
                    <p><?php the_sub_value( 'dish_name' ) ?></p>
                    <p><?php the_sub_value( 'description' ) ?></p>
                    <?php if( get_sub_value( 'vegetarian' ) ): ?>
                        <img class="mx-2" src="<?php echo get_bloginfo('template_directory'); ?>/images/vegetarian.png" alt="Image of Vegetarian Icon" />
                    <?php endif ?>
                    <?php if( get_sub_value( 'gluten_free' ) ): ?>
                        <img class="mx-2" src="<?php echo get_bloginfo('template_directory'); ?>/images/gluten-free.png" alt="Image of Gluten Free Icon" />
                    <?php endif ?>
                    <p><?php the_sub_value( 'price' ) ?></p>

                <?php endif ?>

            <?php endwhile ?>

        <?php endif ?>

    <?php endwhile ?>

<?php endwhile ?>
