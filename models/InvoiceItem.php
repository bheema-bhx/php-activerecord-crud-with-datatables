<?php

class InvoiceItem extends ActiveRecord\Model
{
		public static $table_name="invoice_items";	
		public static $primary_key ="invoice_item_id";


		static $belongs_to = array(
	      array('invoice')
			);
			
	
public static function show_invoices($con)
	{
		$data = InvoiceItem::find('all',array('conditions' => $con));
		return $data;
	}	

public static function delete_item($id)
	{
      
    	$item = InvoiceItem::find($id);
    	if ($item === null)
        	return false;
       
    	$item->delete();
    		return true;
	}

}

	
		
?>





 
