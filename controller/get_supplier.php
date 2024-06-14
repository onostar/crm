<?php

    $supplier = htmlspecialchars(stripslashes($_POST['supplier']));

    // instantiate class
    include "../classes/dbh.php";
    include "../classes/select.php";

    $get_vendor = new selects();
    $rows = $get_vendor->fetch_details_like('vendors', 'vendor', $supplier);
?>
    <!-- <option value=""selected>Select a room</option> -->
    
<?php
    if(gettype($rows) == 'array'){
        foreach ($rows as $row) {
            
?>
    <option onclick="addvendor(<?php echo $row->vendor_id?>, '<?php echo $row->vendor?>')"><?php echo $row->vendor?></option>
<?php
        }   
    }else{
        echo "<option value=''selected>No result found</option>";
    }
?>