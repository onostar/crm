<?php
    include "../classes/dbh.php";
    include "../classes/select.php";
?>
<div id="update_customer" class="displays">
    <div class="info"></div>
    <div class="add_user_form" style="width:70%">
        <h3>Add New Patient</h3>
        <!-- <form method="POST" id="addUserForm"> -->
        <form class="addUserForm">
            <div class="inputs" style="gap:.5rem;">
                <div class="data" style="width:30%">
                    <label for="customer">Last Name</label>
                    <input type="text" name="last_name" id="last_name" placeholder="Patient's surname" required>
                </div>
                <div class="data" style="width:30%">
                    <label for="other_names">Other Name</label>
                    <input type="text" name="other_names" id="other_names" placeholder="Patient's other names" required>
                </div>
                <div class="data" style="width:30%">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" id="dob">
                </div>
                <div class="data" style="width:30%">
                    <label for="phone_number">Phone number</label>
                    <input type="text" name="phone_number" id="phone_number" placeholder="0033421100" required>
                </div>
                <div class="data" style="width:30%">
                    <label for="Address">Address</label>
                    <input type="text" name="address" id="address" required>
                </div>
                <div class="data" style="width:30%">
                    <label for="email">Email address</label>
                    <input type="text" name="email" id="email" placeholder="example@mail.com" required>
                </div>
                <div class="data" style="width:30%">
                    <!-- <label for="customer_store">Select store</label> -->
                    <input type="hidden" name="customer_store" id="customer_store" value='1'>
                </div>
                <div class="data" style="width:30%">
                    <button type="submit" id="add_customer" name="add_customer" onclick="addCustomer()">Add Customer <i class="fas fa-plus"></i></button>
                </div>
            </div>
        </form>    
    </div>
</div>
