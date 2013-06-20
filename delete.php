<?php 

include('config.php'); 

if (isset($_GET['invoice_id']) && isset($_GET['item_id']) ) {
	
		$item_id = (int) $_GET['item_id'];
		$invoice_id = (int) $_GET['invoice_id'];
		
		InvoiceItem::delete_item($item_id);
		
		header("Location: items.php?invoice_id=$invoice_id");
	
	
	
	}

else if (isset($_GET['invoice_id']) && !isset($_GET['item_id']) ) { 

		$invoice_id = (int) $_GET['invoice_id'];
	
		Invoice::delete_invoice($invoice_id);
	
		header("Location: index.php"); 
 

}

	
?> 

