<?php
class Broker extends ActiveRecord\Model
{

public static $table_name="brokers";
public static $primary_key = 'broker_id';

    static $has_many = array(
        array(
            'invoice',
            'foreign_key' => 'broker_id',
            'primary_key' => 'broker_id',
            'class_name' => 'Invoice'
        ),
        array(
            'broker_customer',
            'foreign_key' => 'broker_id',
            'primary_key' => 'broker_id',
            
            'class_name' => 'BrokerCustomer'
        )
        );
 
    
public static function show_broker($con)
	{
		$data = Broker::find('all',array('conditions' => $con));
		return $data;
	}	


}
?>
