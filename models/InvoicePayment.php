<?php
class InvoicePayment extends ActiveRecord\Model
{

public static $table_name="invoice_payments";
public static $primary_key = 'payment_id';

static $belongs_to = array(
        array(
            'invoice',
            'foreign_key' => 'invoice_id',
            'primary_key' => 'invoice_id',
            'class_name' => 'Invoice'
        )
    );   
 
    
}
?>
