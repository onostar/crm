<?php
    session_start();
    $input= htmlspecialchars(stripslashes($_GET['input']));
    // instantiate class
    include "../classes/dbh.php";
    include "../classes/select.php";
    $get_customer = new selects();
    $rows = $get_customer->fetch_details_like3('customers', 'last_name', 'other_names','phone_numbers', $input);
     if(gettype($rows) == 'array'){
        foreach($rows as $row):
        
    ?>

    <option onclick="showPage('edit_customer.php?customer=<?php echo $row->customer_id?>')">
        <?php echo $row->last_name." ".$row->other_names?>
    </option>
    
<?php
    endforeach;
     }else{
        echo "No resullt found";
     }
?>