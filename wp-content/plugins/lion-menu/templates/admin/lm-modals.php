<!-- Add Menu Modal -->
<div id="add-menu-modal" style="display:none;">

    <form action="#" method="post">
        <h1>Menu Name:</h1>
        <input type="text" name="menu-name" /> <br/>
        <input type="hidden" name="add" /> <br/>
        <input type="submit" value="Add" class="btn btn-success" />
    </form>

</div>

<!-- Edit Menu Modal -->
<div id="edit-menu-modal" style="display:none;">
    
    <form action="#" method="post">
        <h1>Edit Name: </h1>
        <input type="text" name="menu-name" /> <br/>
        <input type="hidden" name="edit" /> <br/>
        <input type="submit" value="Save" class="btn btn-success" />
    </form>

</div>

<!-- Delete Menu Modal -->
<div id="delete-menu-modal" style="display:none;">

    <form action="#" method="post">
        <h3>Are you sure you want to delete this menu?</h3>
        <input type="hidden" name="menu-name" /> <br/>
        <input type="hidden" name="delete" /> <br/>
        <input type="submit" value="Delete" class="btn btn-danger" />
    </form>

</div>
