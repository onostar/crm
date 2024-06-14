<div class="displays allResults" id="stocked_items">
    <!-- <h2>Items in sales order</h2> -->
    <table id="addsales_table" class="searchTable">
        <thead>
            <tr style="background:var(--moreColor)">
                <td>S/N</td>
                <td>Drug</td>
                <td>Prescription</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php
                $n = 1;
                $get_items = new selects();
                $details = $get_items->fetch_details_cond('prescriptions','invoice', $invoice);
                if(gettype($details) === 'array'){
                foreach($details as $detail):
            ?>
            <tr>
                <td style="text-align:center; color:red;"><?php echo $n?></td>
                <td style="color:var(--moreClor);">
                    <?php
                        
                        echo $detail->drug;
                    ?>
                </td>
                <td>
                    <?php
                        
                        echo $detail->details;
                    ?>
                </td>
                <td>
                    <a style="color:#fff; background:var(--otherColor);border-radius:15px;padding:5px 8px;" href="javascript:void(0)" title="Update prescription" onclick="updatePrescrip('<?php echo $detail->prescription_id?>')"><i class="fas fa-pen"></i></a>
                    <a style="color:red; font-size:1rem" href="javascript:void(0) "title="delete purchase" onclick="deletePrescrip('<?php echo $detail->prescription_id?>', '<?php echo $invoice?>')"><i class="fas fa-trash"></i></a>
                </td>
               
            </tr>
            
            <?php $n++; endforeach;}?>
        </tbody>
    </table>
    <?php
        if(gettype($details) == "array"){
    ?>
    <button onclick="postPrescription('<?php echo $invoice?>')" style="background:green; padding:10px; border-radius:15px;font-size:.9rem; box-shadow:1px 1px 1px #222;">Post & Print <i class="fas fa-paper-plane"></i></button>
    <?php }?>
</div> 