<?php

include('config.php');

$invoice_id = (int) $_GET['invoice_id'];
$con = array('invoice_id =?',$invoice_id) ;
$res = InvoiceItem::show_invoices($con);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Invoice_Items</title>
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
                $('#datatables2').dataTable({
                    "sPaginationType":"full_numbers",
                    "aaSorting":[[2, "desc"]],
                    "bJQueryUI":true
                });
            })
            
        </script>
       
    </head>
    <body>
     
      
      <a href='index.php' style= "margin-left:85%; ">Back to List</a>  
     
     <div>
            <table id="datatables2" class="display">
                <thead>
                    <tr>
                        <th>Invoice_Id</th>
			<th>Item_Id</th>
			<th>Item</th>
			<th>Price</th>
			
			<th>Quantity</th>
			<th>Cost_factor</th>
			<th>Approved</th>
			<th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
			foreach ($res as $u)
			{
				?><tr><td><?php echo $u->invoice_id; ?></td>
					<td><?php echo $u->invoice_item_id; ?></td>
					<td><?php echo $u->item; ?></td>
					<td><?php echo $u->price; ?></td>
					<td><?php echo $u->quantity; ?></td>
					<td><?php echo $u->cost_factor; ?></td>
					<td><?php echo $u->is_custom_approved; ?></td>
					
					
					<td><a onclick="return confirm('Are you Sure to delete Item')" href="delete?item_id=<?php echo $u->invoice_item_id; ?>&invoice_id=<?php echo $u->invoice_id; ?>">Delete</a></td>
			  
			 
                         </tr>
		
	  
 	<?php }  ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
