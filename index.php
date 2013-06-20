<?php

include('config.php');

$con = array('pickup =?','storage') ;
$data = Invoice::show_invoices($con);


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Invoice</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <script src="media/js/jquery.js" type="text/javascript"></script>
        <script src="media/js/jquery.dataTables.js" type="text/javascript"></script>
        
        <style type="text/css">
            @import "media/css/demo_table_jui.css";
            @import "media/themes/smoothness/jquery-ui-1.8.4.custom.css";
        </style>
        
        <style>
            *{
                font-family: arial;
            }
        </style>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
                $('#datatables').dataTable({
                    "sPaginationType":"full_numbers",
                    "aaSorting":[[2, "desc"]],
                    "bJQueryUI":true
                });
            })
            
        </script>
       
    </head>
    <body>
        <div>
            <table id="datatables" class="display">
                <thead>
                    <tr>
                        <th>Invoice_Id</th>
            <th>No.of Items</th>       
			<th>Broker_id</th>
			<th>Customer_id</th>
			<th>Spot_silver</th>
			<th>Spot_gold</th>
			<th>Shipped_to</th>
			<th>Edit</th>
			<th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
			foreach ($data as $u)
			{
				?><tr><td><a href="items?invoice_id=<?php echo $u->invoice_id; ?>" ><?php echo $u->invoice_id; ?></a></td>
					<?php $items = InvoiceItem::find('all',array('conditions' => array('invoice_id =?',$u->invoice_id)));?>
					<td><?php echo  $n = count($items); ?></td>
					<td><a href="broker?broker_id=<?php echo $u->broker_id; ?>" ><?php echo $u->broker_id; ?></a></td>
					<td><?php echo $u->customer_id; ?></td>
					<td><?php echo $u->spot_silver; ?></td>
					<td><?php echo $u->spot_gold; ?></td>
					<td><?php echo $u->shipped_to; ?></td>
					<td><a href="edit?invoice_id=<?php echo $u->invoice_id; ?>">Edit</a></td>
					<td><a onclick="return confirm('Are you Sure to delete Invoice')" href="delete?invoice_id=<?php echo $u->invoice_id; ?>">Delete</a></td>
			  
			 
                         </tr>
		
	  
 	<?php }  ?>
                </tbody>
            </table>
        </div>
        <a href="new.php">Add invoice</a>
        
     
     
    </body>
</html>
