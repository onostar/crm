<?php

    $customer = htmlspecialchars(stripslashes($_POST['customer']));
    $posted_by = htmlspecialchars(stripslashes($_POST['posted_by']));
    $invoice = ucwords(htmlspecialchars(stripslashes(($_POST['invoice']))));
    $drug = ucwords(htmlspecialchars(stripslashes(($_POST['drug']))));
    $details = htmlspecialchars(stripslashes(($_POST['details'])));
    $date = date("Y-m-d H:i:a");
    $data = array(
        'customer' => $customer,
        'posted_by' => $posted_by,
        'invoice' => $invoice,
        'details' => $details,
        'drug' => $drug,
        'post_date' => $date
    );
    // instantiate class
    include "../classes/dbh.php";
    include "../classes/select.php";
    include "../classes/inserts.php";

    //get customer details
    $get_customer = new selects();
    $rowss = $get_customer->fetch_details_cond('customers', 'customer_id', $customer);
    foreach($rowss as $rows){
        $customer_name = $rows->last_name . " ".$rows->other_names;
    }
   //check if drug exists
   $check = new selects();
   $results = $check->fetch_count_2cond('prescriptions', 'drug', $drug, 'invoice', $invoice);
   if($results > 0){
       echo "<p class='exist'><span>$drug</span> already exists for this prescription!</p>";
    include "prescription_details.php";
   }else{
       //create customer
       $add_data = new add_data('prescriptions', $data);
       $add_data->create_data();
       if($add_data){
?>
<div class="notify"><p><span><?php echo $drug?></span> added to prescription order</p></div>   

<?php
    include "prescription_details.php";
       }
   }