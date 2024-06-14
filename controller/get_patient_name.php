<?php

    $patient = htmlspecialchars(stripslashes($_POST['patient']));

    // instantiate class
    include "../classes/dbh.php";
    include "../classes/select.php";

    $get_vendor = new selects();
    $rows = $get_vendor->fetch_details_like3('customers', 'last_name', 'other_names', 'phone_numbers', $patient);
?>
    <!-- <option value=""selected>Select a room</option> -->
    
<?php
    if(gettype($rows) == 'array'){
        foreach ($rows as $row) {
            
?>
    <div class="results">
        <a href="javascript:void(0)" onclick="addPatient(<?php echo $row->customer_id?>, '<?php echo $row->last_name.' '.$row->other_names?>')"><?php echo $row->last_name." ".$row->other_names?></a>
    </div>
    <!-- <option onclick="addPatient(<?php echo $row->customer_id?>, '<?php echo $row->last_name.' '.$row->other_names?>')"><?php echo $row->last_name.' '.$row->other_names?></option> -->
<?php
        }   
    }else{
        echo "<option value=''selected>No result found</option>";
    }
?>