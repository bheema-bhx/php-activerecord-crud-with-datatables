
<link href="media/css/bootstrap.min.css" rel="stylesheet">

<? 
include('config.php');

 
if (isset($_POST['broker_id'])) {

Invoice::add_invoice($_POST);

header("Location: index.php");
} 
?>
<div class="container">
<form action='' method='POST' onsubmit="return confirm('New Invoice is added')"> 
<fieldset>
					    <legend>New Invoice</legend>
					    
<p><b>Broker Id:</b><br /><input type='text' required="required" name='broker_id'/> 
<p><b>Customer Id:</b><br /><input type='text' required="required" name='customer_id'/> 

<p><b>Spot Silver:</b><br /><input type='text' name='spot_silver'/> 
<p><b>Spot Gold:</b><br /><input type='text' name='spot_gold'/> 
 
<p><b>Shipped To:</b><br /><textarea name='shipped_to'></textarea> 

<p><input type='submit' value='Add Invoice' /> <a href='index.php'><input type='button' value='Cancle' /></a>
</form> 
</div>
