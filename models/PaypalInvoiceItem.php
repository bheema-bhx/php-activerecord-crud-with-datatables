<?php
class PaypalInvoiceItem extends ActiveRecord\Model
{

public static $table_name="paypal_invoice_item";
//public static $primary_key = 'customer_id';

static $belongs_to = array(
        array(
            'paypal_invoice',
            'foreign_key' => 'invoice_id',
            'primary_key' => 'invoice_id',
            'class_name' => 'PaypalInvoice'
        )
    );   
 
    
}
?>
