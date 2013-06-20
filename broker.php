<?php

include('config.php');

$broker_id = (int) $_GET['broker_id'];
$con = array('broker_id =?',$broker_id) ;
$res = Broker::show_broker($con);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Broker_details</title>
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
     
      
    <h3>Broker's Summary:</h3>  <a href='index.php' style= "margin-left:85%; ">Back to List</a>  
     
     <div>
            <table id="datatables2" class="display">
                <thead>
                    <tr>
                        <th>Broker_Id</th>
						<th>Email</th>							
						
                    </tr>
                </thead>
                <tbody>
                    <?php
						foreach ($res as $u)
							{
							$customers = Broker::find($u->broker_id)->broker_customer;
							$invoices = Broker::find($u->broker_id)->invoice;
								?><tr><td><?php echo $u->broker_id; ?></td>
										<td><?php echo $u->email; ?></td>
						
			  
			 
                         		</tr>
		
	  
 	<?php }  ?>
                </tbody>
            </table>
        </div>
        
        <?php
echo "<h3>Have relationship with following customers :</h3>";         
        foreach ($customers as $k) {
           echo $k ->customer_id;
           echo ", ";
          }
        echo "<br/>"; echo "<br/>";
        
echo "<h3>Have relationship with following Invoices :</h3>";        
        foreach ($invoices as $k) {
           echo $k ->invoice_id;
           echo ", ";
          }
        echo "<br/>";
        
        
        
       // var_dump(Broker::find(30)->invoice);
              //print_r ($broker = Broker::find(30)->customers);
# direct access to bc
//print_r($broker->broker_customer); # will print an array of bc object
         ?>
    </body>
</html>
