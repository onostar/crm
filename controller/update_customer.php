<?php
    $customer_id = htmlspecialchars(stripslashes($_POST['customer_id']));
    $last_name = ucwords(htmlspecialchars(stripslashes($_POST['last_name'])));
    $other_names = ucwords(htmlspecialchars(stripslashes($_POST['other_names'])));
    $phone = htmlspecialchars(stripslashes($_POST['phone_number']));
    $address = ucwords(htmlspecialchars(stripslashes(($_POST['address']))));
    $email = htmlspecialchars(stripslashes(($_POST['email'])));
    $dob = htmlspecialchars(stripslashes(($_POST['dob'])));
    // $store = htmlspecialchars(stripslashes(($_POST['customer_store'])));

   
    // instantiate class
    include "../classes/dbh.php";
    include "../classes/update.php";

       //update customer
       $update_data = new Update_table();
       $update_data->update_six('customers', 'last_name', $last_name, 'other_names', $other_names, 'phone_numbers',$phone, 'customer_address', $address, 'customer_email', $email, 'dob', $dob, 'customer_id', $customer_id);
       if($update_data){
           echo "<div class='success'><p>$last_name $other_names</span> details updated successfully! <i class='fas fa-thumbs-up'></i></p></div>";
       }
   