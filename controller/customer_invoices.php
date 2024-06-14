
<?php
    include "../classes/dbh.php";
    include "../classes/select.php";
    include "../classes/update.php";
    
    if(isset($_GET['invoice'])){
        $invoice = $_GET['invoice'];
       
        //get invoice details

?>


<div class="displays all_details">
    <!-- <div class="info"></div> -->
    
    <div class="guest_name">
        <h4>Items on Invoice => 
            <?php echo $invoice?> (<?php
                //get invoice status
                $get_stat = new selects();
                $stats = $get_stat->fetch_details_group('sales', 'sales_status', 'invoice', $invoice);
                if($stats->sales_status == 2){
                    echo "<span style='color:green'>PAID <i class='fas fa-check'></i></span>";
                }else{
                    echo "<span style='color:red'>PENDING <i class='fas fa-close'></i></span>";
                }
            ?>)
        </h4>
        <div class="displays allResults" id="payment_det">
        
            <div class="payment_details">
                <h3>Invoice Details</h3>
                <table id="guest_payment_table" class="searchTable">
                    <thead>
                        <tr>
                            <td>S/N</td>
                            <td>Item</td>
                            <td>Quantity</td>
                            <td>Unit price</td>
                            <td>Amount</td>
                            <td>Commission</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $n = 1;
                            $get_items = new selects();
                            $rows = $get_items->fetch_details_cond('sales', 'invoice', $invoice);
                            foreach($rows as $row){
                        ?>
                        <tr>
                            <td style="text-align:center; color:red;"><?php echo $n?></td>
                            <td>
                                <?php 
                                    //get item name
                                    $get_name = new selects();
                                    $names = $get_name->fetch_details_group('items', 'item_name', 'item_id', $row->item);
                                    echo strtoupper($names->item_name);
                                ?>
                            </td>
                            <td style="text-align:center; color:var(--otherColor)"><?php echo $row->quantity?></td>
                            <td><?php echo number_format($row->price, 2);?></td>
                            <td><?php echo number_format($row->total_amount, 2)?></td>
                            <td style="color:red"><?php echo number_format($row->commission, 2)?></td>
                            
                        </tr>
                        
                        <?php $n++; }?>
                    </tbody>
                </table>
            </div>
            <div class="amount_due">
                <h2>Total Amount: 
                <?php
                    //get total amount
                    $get_total = new selects();
                    $details = $get_total->fetch_sum_single('sales', 'total_amount', 'invoice', $invoice);
                    foreach($details as $detail){
                        echo "₦".number_format($detail->total, 2);
                    }
                ?>
                </h2>

                
            </div>
            <div class="amount_due" style="padding:0 20px;">
                <h2 style="color:green!important">Total Commission: 
                <?php
                    //get total amount
                    $get_total = new selects();
                    $details = $get_total->fetch_sum_single('sales', 'commission', 'invoice', $invoice);
                    foreach($details as $detail){
                        echo "₦".number_format($detail->total, 2);
                    }
                ?>
                </h2>

                
            </div>
            
    </div>
    
</div>
<?php
            }
        
   
?>