<div id="general_dashboard">
<div class="dashboard_all">
    <h3><i class="fas fa-home"></i> Dashboard</h3>
    <?php 
        if($role === "Admin"){
    ?>
    
    <div id="dashboard">
        <div class="cards" id="card1">
            <a href="javascript:void(0)" onclick="showPage('daily_prescriptions.php')">
                <div class="infos">
                    <p><i class="fas fa-user-injured"></i> Daily Prescriptions</p>
                    <p>
                    <?php
                        $get_sales = new selects();
                        $rows = $get_sales->fetch_count_curDate1ConGr('prescriptions', 'post_date', 'drug_status', 2, 'invoice');
                        echo $rows;
                         
                    ?>
                    </p>
                </div>
            </a>
        </div> 
        <div class="cards" id="card1" style="background:#000">
            <a href="javascript:void(0)" onclick="showPage('monthly_visits.php')"class="page_navs">
                <div class="infos">
                    <p><i class="fas fa-users-cog"></i> Monthly Visits</p>
                    <p>
                    <?php
                        $get_cost = new selects();
                        $costs = $get_cost->fetch_count_curMonConGr('prescriptions', 'date(post_date)', 'drug_status', 2, 'invoice');
                            echo $costs;
                        
                    ?>
                    </p>
                </div>
            </a>
        </div> 
        <div class="cards" id="card2" style="background: var(--moreColor)">
            <a href="javascript:void(0)" class="page_navs" onclick="showPage('sent_messages.php')">
                <div class="infos">
                    <p><i class="fas fa-chart-line"></i> Outgoing message</p>
                    <p>
                    <?php
                        $get_sales = new selects();
                        $rows = $get_sales->fetch_count_curDate('messages', 'post_date');
                        echo $rows;
                       
                    ?>
                    </p>
                </div>
            </a>
        </div> 
        <div class="cards" id="card0">
            <a href="javascript:void(0)" class="page_navs">
                <div class="infos">
                    <p><i class="fas fa-calendar-check"></i> Scheduled</p>
                    <p>
                    <?php
                        echo 0;
                    ?>
                    </p>
                </div>
            </a>
            <!-- <a href="javascript:void(0)" class="page_navs" onclick="showPage('pay_debt.php')">
                <div class="infos">
                    <p><i class="fas fa-calendar"></i> Receivables</p>
                    <p>
                    <?php
                        $receivables = new selects();
                        $dues = $receivables->fetch_sum_double('debtors', 'amount', 'debt_status', 0, 'store', $store_id);
                        foreach($dues as $due){
                            echo "₦".number_format($due->total);
                        }
                    ?>
                    </p>
                </div>
            </a> -->
        </div> 
        
        
    </div>
    <?php
        }else if($role == "Sales Rep"){
    ?>
    <div id="dashboard">
    <div class="cards" id="card4" style="background:#000">
            <a href="javascript:void(0)" class="page_navs">
                <div class="infos">
                    <p><i class="fas fa-chart-line"></i> Target for <?php echo date("F")?></p>
                    <p>
                    <?php
                        //get total sales
                        $get_sales = new selects();
                        $rows = $get_sales->fetch_details_curmonth($user_id);
                        echo "₦".number_format($rows->amount, 2);
                    ?>
                    </p>
                </div>
            </a>
        </div> 
        <div class="cards" id="card1">
            <a href="javascript:void(0)" onclick="showPage('sales_rep_report.php')">
                <div class="infos">
                    <p><i class="fas fa-coins"></i> My Daily Sales</p>
                    <p>
                    <?php
                        $get_sales = new selects();
                        $rows = $get_sales->fetch_sum_curdate2Con1Neg('sales', 'total_amount', 'post_date', 'posted_by', $user_id, 'sales_status', 0);
                        foreach($rows as $row){
                            $amount = $row->total;
                        }
                        
                            echo "₦".number_format($amount, 2);
                            
                        
                    ?>
                    </p>
                </div>
            </a>
        </div> 
        
        <div class="cards" id="card2" style="background: var(--moreColor)">
            <a href="javascript:void(0)" onclick="showPage('rep_monthly_revenue.php')" class="page_navs">
                <div class="infos">
                    <p><i class="fas fa-money-bill"></i> Monthly Revenue</p>
                    <p>
                    <?php
                        $get_sales = new selects();
                        $rows = $get_sales->fetch_sum_curMonCon('payments', 'amount_paid', 'post_date', 'sold_by', $user_id);
                        foreach($rows as $row){
                            $amount = $row->total;
                        }
                        
                            echo "₦".number_format($amount, 2);
                            
                        
                    ?>
                    </p>
                </div>
            </a>
        </div> 
        <div class="cards" id="card5">
            <a href="javascript:void(0)" class="page_navs">
                <div class="infos">
                    <p><i class="fas fa-hand-holding-dollar"></i> Pending Commission</p>
                    <p>
                    <?php
                        //get total sales
                        $get_sales = new selects();
                        $rows = $get_sales->fetch_sum_curMon2Con('sales', 'commission', 'post_date', 'posted_by', $user_id, 'sales_status', 1);
                        foreach($rows as $row){
                            $commission = $row->total;
                        }
                        echo "₦".number_format($commission, 2);
                    ?>
                    </p>
                </div>
            </a>
           
        </div> 
        
        <div class="cards" id="card0">
            <a href="javascript:void(0)" class="page_navs">
                <div class="infos">
                    <p><i class="fas fa-hand-holding-dollar"></i> Available Commission</p>
                    <p>
                    <?php
                        //get total sales
                        $get_sales = new selects();
                        $rows = $get_sales->fetch_sum_curMon2Con('sales', 'commission', 'post_date', 'posted_by', $user_id, 'sales_status', 2);
                        foreach($rows as $row){
                            $commission = $row->total;
                        }
                        echo "₦".number_format($commission, 2);
                    ?>
                    </p>
                </div>
            </a>
           
        </div> 
        <div class="cards" id="card4">
            <a href="javascript:void(0)" onclick="showPage('customer_bonus.php')"class="page_navs">
                <div class="infos">
                    <p><i class="fas fa-award"></i> Customer Bonus</p>
                    <p>
                    <?php
                        //get total sales
                        $get_sales = new selects();
                        $rows = $get_sales->fetch_count_curMonCon('bonus',  'post_date', 'sales_rep', $user_id);
                        
                        echo $rows;
                    ?>
                    </p>
                </div>
            </a>
           
        </div> 
    </div>
    <?php
        }else{
    ?>
    <div id="dashboard">
        <div class="cards" id="card0">
            <a href="javascript:void(0)" class="page_navs">
                <div class="infos">
                    <p><i class="fas fa-users"></i> Customers</p>
                    <p>
                    <?php
                        //get total customers
                       $get_cus = new selects();
                       $customers =  $get_cus->fetch_count_2condDateGro('sales', 'sales_status', 2, 'posted_by', $user_id, 'post_date', 'invoice');
                       echo $customers;
                    ?>
                    </p>
                </div>
            </a>
        </div> 
        <div class="cards" id="card4">
            <a href="javascript:void(0)" onclick="showPage('expire_soon.php')">
                <div class="infos">
                    <p><i class="fas fa-coins"></i> Soon to expire</p>
                    <p>
                        <?php
                            $get_soon_expired = new selects();
                            $soon_expired = $get_soon_expired->fetch_expire_soon('inventory', 'expiration_date', 'quantity', 'store', $store_id);
                            echo $soon_expired;
                        ?>
                    </p>
                </div>
            </a>
        </div> 
        <div class="cards" id="card3">
            <a href="javascript:void(0)" onclick="showPage('expired_items.php')" class="page_navs">
                <div class="infos">
                    <p><i class="fas fa-money-check"></i> Expired items</p>
                    <p>
                        <?php
                            $get_expired = new selects();
                            $expired = $get_expired->fetch_expired('inventory', 'expiration_date', 'quantity', 'store', $store_id);
                            echo $expired;
                        ?>
                    </p>
                </div>
            </a>
        </div> 
        <div class="cards" id="card2" style="background: var(--moreColor)">
            <a href="javascript:void(0)" class="page_navs" onclick="showPage('reached_reorder.php')">
                <div class="infos">
                    <p><i class="fas fa-hand-holding-dollar"></i> Out of stock</p>
                    <p>
                        <?php
                            $out_stock = new selects();
                            $stock = $out_stock->fetch_count_2cond('inventory', 'quantity', 0, 'store', $store_id);
                            echo $stock;
                        ?>
                    </p>
                </div>
            </a>
        </div> 
            
    </div>
    <?php }?>
</div>
<?php 
    if($role === "Admin"){
?>
<!-- management summary -->
<div id="paid_receipt" class="management">
    <hr>
    <div class="daily_monthly">
        <!-- daily revenue summary -->
        <div class="daily_report allResults">
            <h3 style="background:var(--otherColor)">Daily Encounters</h3>
            <table>
                <thead>
                    <tr>
                        <td>S/N</td>
                        <td>Date</td>
                        <td>Customers</td>
                        <td>Revenue</td>
                        <td>Commission</td>
                    </tr>
                </thead>
                <?php
                    $n = 1;
                    $get_daily = new selects();
                    $dailys = $get_daily->fetch_daily_sales($store_id);
                    if(gettype($dailys) == "array"){
                    foreach($dailys as $daily):

                ?>
                <tbody>
                    <tr>
                        <td><?php echo $n?></td>
                        <td><?php echo date("jS M, Y",strtotime($daily->post_date))?></td>  
                        <td style="text-align:center; color:var(--otherColor)"><?php echo $daily->customers?></td>
                        <td style="color:green;"><?php echo "₦".number_format($daily->revenue)?></td>
                        <td style="color:red;"><?php echo "₦".number_format($daily->commission, 2)?></td>
                    </tr>
                </tbody>
                <?php $n++; endforeach; }?>

                
            </table>
            <?php
                if(gettype($dailys) == "string"){
                    echo "<p class='no_result'>'$dailys'</p>";
                }
            ?>
        </div>
        <!-- monthly revenue summary -->
        <div class="monthly_report allResults">
            
            <div class="monthly_encounter" style="margin:0 0 20px;">
                <h3 style="background:rgb(117, 32, 12)!important">Monthly Encounters</h3>
                <table>
                    <thead>
                        <tr>
                            <td>S/N</td>
                            <td>Month</td>
                            <td>Customers</td>
                            <td>Amount</td>
                            <td>Commission</td>
                            <!-- <td>Daily Average</td> -->
                        </tr>
                    </thead>
                    <?php
                        $n = 1;
                        $get_monthly = new selects();
                        $monthlys = $get_monthly->fetch_monthly_sales($store_id);
                        if(gettype($monthlys) == "array"){
                        foreach($monthlys as $monthly):

                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $n?></td>
                            <td><?php echo date("M, Y", strtotime($monthly->post_date))?></td>
                            <td style="text-align:center; color:var(--otherColor"><?php echo $monthly->customers?></td>
                            <td style="text-align:center; color:green"><?php echo "₦".number_format($monthly->revenue)?></td>
                            <td style="text-align:center; color:red"><?php
                               /*  $average = $monthly->revenue/$monthly->daily_average;
                                echo "₦".number_format($average, 2); */
                                echo "₦".number_format($monthly->commission, 2);
                            ?></td>
                        </tr>
                    </tbody>
                    <?php $n++; endforeach; }?>

                    
                </table>
                <?php 
                    if(gettype($monthlys) == "string"){
                        echo "<p class='no_result'>'$monthlys'</p>";
                    }
                ?>
            </div>
            <div class="chart">
                <!-- chart for technical group -->
                <?php
                $get_monthly = new selects();
                $monthlys = $get_monthly->fetch_monthly_sales($store_id);
                if(gettype($monthlys) == "array"){
                    foreach($monthlys as $monthly){
                        $revenue[] = $monthly->revenue;
                        $month[] = date("M, Y", strtotime($monthly->post_date));
                    }
                }
                ?>
                <h3 style="background:var(--moreColor)">Monthly statistics</h3>
                <canvas id="chartjs_bar2"></canvas>
            </div>
        </div>
        
    </div>
</div>

<?php 
    }else if($role == "Sales Rep"){
?>
<div id="paid_receipt" class="management">
    <hr>
    <div class="daily_monthly">
        <!-- daily revenue summary -->
        <div class="daily_report allResults">
            <h3 style="background:var(--otherColor)">Daily Encounters</h3>
            <table>
                <thead>
                    <tr>
                        <td>S/N</td>
                        <td>Date</td>
                        <td>Revenue</td>
                        <td>Commission</td>
                    </tr>
                </thead>
                <?php
                    $n = 1;
                    $get_daily = new selects();
                    $dailys = $get_daily->fetch_daily_rep_sales($user_id);
                    if(gettype($dailys) == "array"){
                    foreach($dailys as $daily):

                ?>
                <tbody>
                    <tr>
                        <td><?php echo $n?></td>
                        <td><?php echo date("jS M, Y",strtotime($daily->post_date))?></td>  
                        <!-- <td style="text-align:center; color:var(--otherColor)"><?php echo $daily->customers?></td> -->
                        <td style="color:green;"><?php echo "₦".number_format($daily->revenue, 2)?></td>
                        <td style="color:red;"><?php echo "₦".number_format($daily->commission, 2)?></td>
                    </tr>
                </tbody>
                <?php $n++; endforeach; }?>

                
            </table>
            <?php
                if(gettype($dailys) == "string"){
                    echo "<p class='no_result'>'$dailys'</p>";
                }
            ?>
        </div>
        <!-- monthly revenue summary -->
        <div class="monthly_report allResults">
            <div class="monthly_encounter" style="margin:0 0 20px;">
                <h3 style="background:rgb(117, 32, 12)!important">Monthly Encounters</h3>
                <table>
                    <thead>
                        <tr>
                            <td>S/N</td>
                            <td>Month</td>
                            <td>Customers</td>
                            <td>Amount</td>
                            <td>Commission</td>
                        </tr>
                    </thead>
                    <?php
                        $n =1;
                        $get_monthly = new selects();
                        $monthlys = $get_monthly->fetch_monthly_rep_sales($user_id);
                        if(gettype($monthlys) == "array"){
                        foreach($monthlys as $monthly):

                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $n?></td>
                            <td><?php echo date("M, Y", strtotime($monthly->post_date))?></td>
                            <td style="text-align:center; color:var(--otherColor"><?php echo $monthly->customers?></td>
                            <td style="text-align:center; color:green"><?php echo "₦".number_format($monthly->revenue, 2)?></td>
                            <td style="text-align:center; color:red"><?php
                                
                                echo "₦".number_format($monthly->commission, 2);
                            ?></td>
                        </tr>
                    </tbody>
                    <?php $n++; endforeach; }?>

                    
                </table>
                <?php 
                    if(gettype($monthlys) == "string"){
                        echo "<p class='no_result'>'$monthlys'</p>";
                    }
                ?>
            </div>
            <div class="chart">
                <!-- chart for technical group -->
                <?php
                $get_monthly = new selects();
                $monthlys = $get_monthly->fetch_monthly_rep_sales($user_id);
                if(gettype($monthlys) == "array"){
                    foreach($monthlys as $monthly){
                        $revenue[] = $monthly->revenue;
                        $month[] = date("M, Y", strtotime($monthly->post_date));
                    }
                }
                ?>
                <h3 style="background:var(--moreColor)">Monthly Revenue statistics</h3>
                <canvas id="chartjs_bar2"></canvas>
            </div>
            
        </div>
        
    </div>
</div>
<?php 
    }else{
?>
<div class="check_out_due">
    <hr>
    <div class="displays allResults" id="check_out_guest">
       
        <h3 style="background:var(--otherColor)">My Daily transactions</h3>
        <table id="check_out_table" class="searchTable" style="width:100%;">
            <thead>
                <tr style="background:var(--moreColor)">
                    <td>S/N</td>
                    <td>Invoice</td>
                    <td>Item</td>
                    <td>Qty</td>
                    <td>Unit sales</td>
                    <td>Amount</td>
                    <td>Payment mode</td>
                    <td>Time</td>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    $n = 1;
                    $get_users = new selects();
                    $details = $get_users->fetch_details_date2Cond('sales', 'date(post_date)', 'sales_status', 2, 'posted_by', $user_id);
                    if(gettype($details) === 'array'){
                    foreach($details as $detail):
                ?>
                <tr>
                    <td style="text-align:center; color:red;"><?php echo $n?></td>
                    <td style="color:green"><?php echo $detail->invoice?></td>
                    <td>
                        <?php
                            $get_name = new selects();
                            $name = $get_name->fetch_details_group('items', 'item_name', 'item_id', $detail->item);
                            echo $name->item_name;
                        ?>
                    </td>
                    <td style="text-align:center; color:var(--otherColor)"><?php echo $detail->quantity?></td>
                    <td><?php echo "₦".number_format($detail->price)?></td>
                    <td><?php echo "₦".number_format($detail->total_amount)?></td>
                    <td>
                        <?php
                            //get payment mode
                            $get_mode = new selects();
                            $mode = $get_mode->fetch_details_group('payments', 'payment_mode', 'invoice', $detail->invoice);
                            //check if invoice is more than 1
                            $get_mode_count = new selects();
                            $rows = $get_mode_count->fetch_count_cond('payments', 'invoice', $detail->invoice);
                                if($rows >= 2){
                                    echo "Multiple payment";
                                }else{
                                    echo $mode->payment_mode;

                                }
                            ?>
                    </td>
                    <td><?php echo date("h:i:sa", strtotime($detail->post_date))?></td>
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
</div>
<?php
    }
?>
</div>