<!-- Add Menu Modal -->
<div id="add-menu-modal" style="display:none;">

    <form action="#" method="post">
        <h1>Menu Name:</h1>
        <input type="text" name="menu-name" /> <br/>
        <input type="hidden" name="add-menu" /> <br/>
        <input type="submit" value="Add" class="btn btn-success" />
    </form>

</div>

<!-- Edit Menu Modal -->
<div id="edit-menu-modal" style="display:none;">
    
    <form action="#" method="post">
        <h1>Edit Menu Name: </h1>
        <input type="text" name="menu-name" /> <br/>
        <input type="hidden" name="edit-menu" /> <br/>
        <input type="submit" value="Save" class="btn btn-success" />
    </form>

</div>

<!-- Delete Menu Modal -->
<div id="delete-menu-modal" style="display:none;">

    <form action="#" method="post" class="row d-flex p-3">
        <h3 class="mb-4">Are you sure you want to delete this menu?</h3>
        <input type="hidden" name="delete-menu" /> <br/>
        <input type="submit" value="Delete" class="btn btn-danger ml-auto" />
    </form>

</div>


<!-- Edit Section Modal -->
<div id="edit-section-modal" style="display:none;">
    
    <form action="#" method="post">
        <h1>Edit Section Name: </h1>
        <input type="text" name="section-name" /> <br/>
        <input type="hidden" name="edit-section" /> <br/>
        <input type="submit" value="Save" class="btn btn-success" />
    </form>

</div>

<!-- Delete Section Modal -->
<div id="delete-section-modal" style="display:none;">

    <form action="#" method="post" class="row d-flex p-3">
        <h3 class="mb-4">Are you sure you want to delete this section?</h3>
        <input type="hidden" name="delete-section" /> <br/>
        <input type="submit" value="Delete" class="btn btn-danger ml-auto" />
    </form>

</div>


<!-- Add Item Modal -->
<div id="add-item-modal" style="display:none;">

    <form action="#" method="post" class="p-3">
        <h3>Add Item</h3>
        <input type="hidden" name="add-item" /> <br/>
        <div class="form-group row">
            <label for="item-name-input" class="col-4 col-form-label">Item Name:</label>
            <div class="col-8">
                <input type="text" class="form-control" id="item-name-input" name="item-name" placeholder="Enter Name">
            </div>
        </div>
        <div class="form-check form-check-inline mb-3">
            <input class="form-check-input" type="checkbox" value="" name="item-subsec" id="subsec-check">
            <label class="form-check-label" for="subsec-check">Subsection Title</label>
        </div>
        <div class="form-group row">
            <label for="price-input" class="col-4 col-form-label">Price:</label>
            <div class="col-8">
                <input type="text" class="form-control" id="price-input" name="item-price" placeholder="0.00">
            </div>
        </div>
        <div class="form-group">
            <label for="desc-input">Description:</label>
            <textarea class="form-control" id="desc-input" name="item-desc" rows="3"></textarea>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="" name="item-veg" id="veg-check">
            <label class="form-check-label" for="veg-check">Vegetarian</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="" name="item-gf" id="gf-check">
            <label class="form-check-label" for="gf-check">Gluten Free</label>
        </div>
        <div class="form-group d-flex row mt-4">
            <div class="ml-auto">
                <button type="reset" class="btn btn-outline-secondary mr-2">Reset</button>
                <input type="submit" value="Add" class="btn btn-success" />
            </div>
        </div>        
    </form>

</div>

<!-- Edit Item Modal -->
<div id="edit-item-modal" style="display:none;">

    <form action="#" method="post" class="p-3">
        <h3>Edit Item</h3>
        <input type="hidden" name="edit-item" /> <br/>
        <div class="form-group row">
            <label for="item-name-input" class="col-4 col-form-label">Item Name:</label>
            <div class="col-8">
                <input type="text" class="form-control" id="item-name-input" name="item-name" placeholder="Enter Name">
            </div>
        </div>
        <div class="form-check form-check-inline mb-3">
            <input class="form-check-input" type="checkbox" value="" name="item-subsec" id="subsec-check">
            <label class="form-check-label" for="subsec-check">Subsection Title</label>
        </div>
        <div class="form-group row hideIfSubsec">
            <label for="price-input" class="col-4 col-form-label">Price:</label>
            <div class="col-8">
                <input type="text" class="form-control" id="price-input" name="item-price" placeholder="0.00">
            </div>
        </div>
        <div class="form-group">
            <label for="desc-input">Description:</label>
            <textarea class="form-control" id="desc-input" name="item-desc" rows="3"></textarea>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="" name="item-veg" id="veg-check">
            <label class="form-check-label" for="veg-check">Vegetarian</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="" name="item-gf" id="gf-check">
            <label class="form-check-label" for="gf-check">Gluten Free</label>
        </div>
        <div class="form-group d-flex row mt-4">
            <div class="ml-auto">
                <button type="reset" class="btn btn-outline-secondary mr-2">Reset</button>
                <input type="submit" value="Add" class="btn btn-success" />
            </div>
        </div>        
    </form>

</div>

<!-- Delete Item Modal -->
<div id="delete-item-modal" style="display:none;">

    <form action="#" method="post" class="row d-flex p-3">
        <h3 class="mb-4">Are you sure you want to delete this item?</h3>
        <input type="hidden" name="delete-item" /> <br/>
        <input type="submit" value="Delete" class="btn btn-danger ml-auto" />
    </form>

</div>

<!-- Add Subitem Modal -->
<div id="add-subitem-modal" style="display:none;">

    <form action="#" method="post" class="p-3">
        <h3>Add Subitem</h3>
        <input type="hidden" name="add-subitem" /> <br/>
        <div class="form-group row">
            <label for="item-name-input" class="col-4 col-form-label">Item Name:</label>
            <div class="col-8">
                <input type="text" class="form-control" id="item-name-input" name="subitem-name" placeholder="Enter Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="price-input" class="col-4 col-form-label">Price:</label>
            <div class="col-8">
                <input type="text" class="form-control" id="price-input" name="subitem-price" placeholder="0.00">
            </div>
        </div>
        <div class="form-group d-flex row mt-4">
            <div class="ml-auto">
                <button type="reset" class="btn btn-outline-secondary mr-2">Reset</button>
                <input type="submit" value="Add" class="btn btn-success" />
            </div>
        </div>        
    </form>

</div>

<!-- Edit Subitem Modal -->
<div id="edit-subitem-modal" style="display:none;">

    <form action="#" method="post" class="p-3">
        <h3>Edit Subitem</h3>
        <input type="hidden" name="edit-subitem" /> <br/>
        <div class="form-group row">
            <label for="item-name-input" class="col-4 col-form-label">Item Name:</label>
            <div class="col-8">
                <input type="text" class="form-control" id="subitem-name-input" name="item-name" placeholder="Enter Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="price-input" class="col-4 col-form-label">Price:</label>
            <div class="col-8">
                <input type="text" class="form-control" id="price-input" name="subitem-price" placeholder="0.00">
            </div>
        </div>
        <div class="form-group d-flex row mt-4">
            <div class="ml-auto">
                <button type="reset" class="btn btn-outline-secondary mr-2">Reset</button>
                <input type="submit" value="Add" class="btn btn-success" />
            </div>
        </div>        
    </form>

</div>

<!-- Delete Subitem Modal -->
<div id="delete-subitem-modal" style="display:none;">

    <form action="#" method="post" class="row d-flex p-3">
        <h3 class="mb-4">Are you sure you want to delete this subitem?</h3>
        <input type="hidden" name="delete-subitem" /> <br/>
        <input type="submit" value="Delete" class="btn btn-danger ml-auto" />
    </form>

</div>
