<?php
    include "../classes/dbh.php";
    include "../classes/select.php";
?>

<div id="add_room" class="displays">
    <div class="info"></div>
    <div class="add_user_form" style="width:50%">
        <h3 style="background:var(--moreColor)">Create items</h3>
        <!-- <form method="POST" id="addUserForm"> -->
        <section class="addUserForm" enctype="multipart/form-data" id="addForm">
            <div class="inputs">
                <input type="hidden" name="department" id="department" value="1">
                <!-- <input type="hidden" name="item_category" id="item_category" value="1"> -->
                <!-- <div class="data" style="width:100%; margin:10px 0;">
                    <label for="department">Category</label>
                    <select name="department" id="department" onchange="getCategory(this.value)">
                        <option value=""selected required>Select item category</option>
                        <?php
                            $get_dep = new selects();
                            $rows = $get_dep->fetch_details('departments');
                            foreach($rows as $row){
                        ?>
                        <option value="<?php echo $row->department_id?>"><?php echo $row->department?></option>
                        <?php } ?>
                    </select>
                </div> -->
                <div class="data" style="margin:10px 0">
                    <label for="item_category"> Sub-Category</label>
                    <select name="item_category" id="item_category">
                        <option value=""selected required>Select item sub-category</option>
                        <?php
                            $get_dep = new selects();
                            $rows = $get_dep->fetch_details_cond('categories', 'department', 1);
                            foreach($rows as $row){
                        ?>
                        <option value="<?php echo $row->category_id?>"><?php echo $row->category?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="data" style="margin:10px 0">
                    <label for="item"> Item Name</label>
                    <input type="text" name="item" id="item" required placeholder="Input item name">
                </div>
                <div class="data" style="margin:10px 0">
                    <label for="item"> Description</label>
                    <textarea name="description" id="description" placeholder="Details of items"></textarea>
                </div>
                <div class="data" style=" margin:10px 0">
                    <label for="item"> Dosage / Administration</label>
                    <textarea name="dosage" id="dosage" placeholder="Product dosage and administration"></textarea>
                </div>
                <!-- <div class="data" style="width:100%; margin:10px 0">
                    <label for="barcode"> Barcode</label>
                    <input type="text" name="barcode" id="barcode" required placeholder="Input item barcode">
                </div> -->
                <div class="data">
                    <label for="photo">Upload First photo</label>
                    <input type="file" name="photo" id="photo">
                </div>
                <div class="data">
                    <label for="photo">Upload Second photo</label>
                    <input type="file" name="photo2" id="photo2">
                </div>
                <div class="data" style="width:60%;">
                    <label for="photo">Upload Third photo</label>
                    <input type="file" name="photo3" id="photo3">
                </div>
                <div class="data" style="width:30%;">
                    <button type="submit" id="add_item" name="add_item" onclick="addItem()">Add item <i class="fas fa-save"></i></button>
                </div>
            </div>
        </section>    
    </div>
</div>
