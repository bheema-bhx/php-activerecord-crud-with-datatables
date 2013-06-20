<link href="media/css/bootstrap.min.css" rel="stylesheet">
<? 
include('config.php'); 
if (isset($_GET['invoice_id']) ) { 
$invoice_id = (int) $_GET['invoice_id']; 
if (isset($_POST['customer_id'])) { 
                                
        Invoice::updater($invoice_id, $_POST);
                   
        header("Location: index.php");
 
		 
} 

$row = Invoice::find($invoice_id);

}
?>
<div class="container">
<form action='' method='POST' onsubmit="return confirm('Invoice is updated')"> 
<fieldset>
					    <legend>Edit Invoice: <?php echo $row->invoice_id; ?> </legend>
 
<p><b>Broker Id:</b><br /><input type='text' name='broker_id' value=' <?php echo $row->broker_id; ?>' /> 
<p><b>Customer Id:</b><br /><input type='text' name='customer_id' value=' <?php echo $row->customer_id; ?>' /> 
 <p><b>Spot Silver:</b><br /><input type='text' name='spot_silver' value=' <?php echo $row->spot_silver; ?>' /> 
<p><b>Spot Gold:</b><br /><input type='text' name='spot_gold' value=' <?php echo $row->spot_gold; ?>' /> 
<p><b>Shipped To:</b><br /><textarea name='shipped_to'><?php echo $row->shipped_to; ?></textarea> 
 
<p><input type='submit' value='Update Invoice' /><input type='hidden' value='1' name='' /> <a href='index.php'><input type='button' value='Cancle' /></a>
</form> 
</div>
 
