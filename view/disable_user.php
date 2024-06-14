<?php

    include "../classes/dbh.php";
    include "../classes/select.php";


?>
    <div class="info"></div>
<div class="displays allResults" id="disable_user">
    <h2>Disable user account</h2>
    <hr>
    <div class="search">
        <input type="search" id="searchDisable" placeholder="Enter keyword" onkeyup="searchData(this.value)">
    </div>
    <table id="disable_table" class="searchTable">
        <thead>
            <tr>
                <td>S/N</td>
                <td>Full Name</td>
                <td>Username</td>
                <td>User role</td>
                <td>Date created</td>
                
            </tr>
        </thead>
        <tbody>
            <?php
                $n = 1;
                $get_users = new selects();
                $details = $get_users->fetch_details_2cond1neg('users', 'status', 'user_role', 0, "Admin");
                if(gettype($details) === 'array'){
                foreach($details as $detail):
            ?>
            <tr>
                <td><a style="box-shadow:2px 2px 2px #c4c4c4; padding:5px 10px; text-align:center; color:red!important;" href="javascript:void(0)" title="Disable user account" onclick="disableUser('<?php echo $detail->user_id?>')"><?php echo $n?></a></td>
                <td><?php echo $detail->full_name;?></td>
                <td><?php echo $detail->username;?></td>
                <td><?php echo $detail->user_role;?></td>
                <td><?php echo date("jS M, Y", strtotime($detail->reg_date));?></td>
                
            </tr>
            <?php $n++; endforeach;}?>
        </tbody>
    </table>
    
    <?php
        if(gettype($details) == "string"){
            echo "<p class='no_result'>'$details'</p>";
        }
    ?>
</div>