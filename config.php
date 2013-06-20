<?php
ini_set('display_errors',"1");
error_reporting(~0);
require_once 'php-activerecord/ActiveRecord.php';

// initialize ActiveRecord
ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory(__DIR__ . '/models');
     $cfg->set_connections(array('development' => 'mysql://root:password@localhost/metals_dev'));

	// you can change the default connection with the below
    //$cfg->set_default_connection('production');
});

?>
