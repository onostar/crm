<?php
    session_start();
    $posted = $_SESSION['user_id'];
    $title = ucwords(htmlspecialchars(stripslashes($_POST['title'])));
    $message = ucwords(htmlspecialchars(stripslashes(($_POST['message']))));
    $patient = ucwords(htmlspecialchars(stripslashes(($_POST['customer']))));
    $date = date("Y-m-d H:i:a");

    $data = array(
        'subject' => $title,
        'patient' => $patient,
        'message' => $message,
        'post_date' => $date,
        'posted_by' => $posted
    );
    //instantiate class
    
    include "../classes/dbh.php";
    include "../classes/select.php";
    include "../classes/inserts.php";

   
    //send message
    $add_data = new add_data('messages', $data);
    $add_data->create_data();
    if($add_data){
        echo "<p style='text-align:center; color:#fff;background:green;padding:8px;font-size:1rem;'>Message sent successfully! <i class='fas fa-thumbs-up'></i></p>";
    }
    