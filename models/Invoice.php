<?php

class Invoice extends ActiveRecord\Model
{

public static $table_name="invoice";	
public static $primary_key ="invoice_id";

 public static $has_many = array(
        array('invoice_items', 'select' => 'invoice_item_id')
    );


 static $belongs_to = array(
        array(
            'broker',
            'foreign_key' => 'invoice_id',
            'primary_key' => 'broker_id',
            'class_name' => 'Broker'
        )
    );

    
public static function updater($id, $new_info)
	{
      
    	$invoice = Invoice::find($id);
    	if ($invoice === null)
        	return false;
       
    	$invoice->update_attributes($new_info);
    		return true;
	}


public static function add_invoice($new_info)
	{
      Invoice::create($new_info);    	      
    	
    		return true;
	}
	
public static function delete_invoice($id)
	{
      
    	$invoice = Invoice::find($id);
    	if ($invoice === null)
        	return false;
       
    	$invoice->delete();
    		return true;
	}



public static function show_invoices($con)
	{
		$data = Invoice::find('all',array('conditions' => $con));
		return $data;
	}	
	
public static function item_details($id)
	{
		$data  = InvoiceItem::find($id,array('joins' => array('invoice')));
		return $data;
	}
	

}

?>
