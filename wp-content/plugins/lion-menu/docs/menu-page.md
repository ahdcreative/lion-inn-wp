# Menu Page in Admin Panel

## Overview

The plugin's admin page is located at 'Menu' on the left sidebar.

This opens a page with a list of the menu's that are created.  It prints a friendly message if no menu's have been created.

The user can select 'Add Menu' to create a new menu, or select 'Save' to save any changes made to the menu list.

The menu page is created in the plugin constructor.  The ```add_action``` function calls my custom ```admin_menu_pages``` function which sets up all admin pages for the plugin.

This in turn, calls ```add_menu_page``` functions and ```add_submenu_page``` functions to set up the individual pages. 

The ```menu_init``` function sets up the main menu page described above.  This prints the title, description, menu list and buttons.

The ```edit_menu_init``` function sets up the hidden 'Edit Menu' page. 

_TODO - add more information here for future pages and edit menu init page_

## The Menu List

Each menu item uses the ```lm-menu-item``` template.  These are wrapped inside a JQuery Sortable list which allows the user to move the menu items up and down.

Each menu item has the functionality to edit and delete that specific item.

### Edit Menu Items

Clicking the name of the menu, e.g. 'Standard', will redirect the user to the hidden subpage - Edit Menu.  This page will show all the menu items for that menu.

### Edit Menu Name

Selecting the edit icon, opens a modal with a text field to add a new name.  At the same time, this also sets a hidden form value to the ID of that menu item.

When the user clicks 'Save', this data is submitted via POST request, and the database is updated. 

All POST requests are handled in the ```post.php``` file.  The edit POST variable is called "edit".

### Delete Menu

Deleting an item works the same.  When the user selects the delete icon, a confirmation modal appears and the ID of that item is set as the value of a different hidden input.  Clicking delete submits the form via POST request and the item is deleted from the database.

## The Buttons

### Add Menu

Opens a modal with a text input to enter the menu name.  Clicking 'Add' submits a POST request and this item is added to the database.

### Save

Most of the menu functionality is saved to the database as soon as the button is clicked within the modal.

'Save' is used to save the order of the menu.

The hamburger icon on the left of each item is to signify that it can be moved up and down (although the user doesn't need to click here - they can click and hold anywhere on the item to move it).

Whenever the menu order is changed, JQuery sets a hidden input field called 'rankings' to the new order (located in lm-buttons.php).  This is within script.js. Clicking 'Save' submits this form data via POST request and updates the database.  Each item in the menu table has a field called 'rank' which represents the order that they should be printed.