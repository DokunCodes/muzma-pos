<?php
include_once('includes/header.php');
include_once('includes/functions.php');
if (!isset($_SESSION['bioname']))
{ header("location: index.php");}

?>
<div id="printable">
  <div id="logo3">
  </div>
  <h3>Company Name</h3>
   <p><i>The new unity modern market shopping complex along ait road off kollinton b/stop, Alagbado, Lagos.</i></p>

 <table border="0" cellpadding="0" cellspacing="1" width="100%">
 <tr>
 <th align="left"> Cashier Name: </th>
 <td><?php echo $_SESSION['bioname'];?></td>
 </tr>
 <tr>
 <th align="left"> Date:</th>
 <td><?php echo $date2;?></td>
 </tr>
 </table> 
 <br /> 
 <p>Invoice: <?php echo $_SESSION['r_inv']?></p>
  <br /> 
  <table border="0" cellpadding="2" cellspacing="1" width="100%">
    <tr>
    <th>&nbsp;</th>
    <th>Product Name</th>
    <th>Unit Price(N)</th>
    <th>Quantity</th>
    <th>Sub Total(N)</th>
</tr>

  <?php  
			$max = count($_SESSION['items']);
			
			$i=0;
			
			while($i<$max)
			{	
			
			$pid=$_SESSION['items'][$i]['pid'];
			$pname=get_product_name($pid);
			$scode =$_SESSION['items'][$i]['scode'];
			$price = $_SESSION['items'][$i]['price'];
			$q=$_SESSION['items'][$i]['qty'];
			
		
	?>
     <tr>
     <td align="center"><?php echo $i+1;?></td>
    <td align="left"><?php echo $pname;?></td>
    <td align="center"><?php echo 'N'.$price;?></td> 
    <td align="center"><?php echo $q; ?></td>  
    <td align="center"><?php echo 'N'.number_format($price*intval($q),2); ?></td>
   </tr>
    <?php
			
		
		$i++;}
			?>
       </table>     
 <br />
   <br /> 
  <br />
</table>

 <table border="0" cellpadding="0" cellspacing="1" width="100%">
 <tr>
 <th align="left"> Cash Collected: </th>
 <td><?php echo 'N'. number_format($cash,2);?></td>
 </tr>
   <tr>
 <th align="left">Discount:</th>
 <td><?php echo 'N'. number_format($disc,2);?></td>
 </tr>
    <tr>
 <th align="left">VAT Charges:</th>
 <td><?php echo 'N'. number_format($vatc,2);?></td>
 </tr>
    <tr>
 <th align="left">Sales Total:</th>
 <td><?php echo 'N'. number_format(get_order_total(),2);?></td>
 </tr>
 <tr>
 <th align="left"> Balance:</th>
 <td><?php echo 'N'. number_format($bal,2);?></td>

 </table>
 <br /> 
  <br />
<p>NB: <i> Items Satisfactorily paid for is non-refundable </i></p>
<br />
 <p><i> Thank you for patronising us at Muzma Pharmacy, Hope to see you again. For any complaint,suggestion or advice you can call - 08022554127,07035173522</i></p>
<br /> 
<br />
</div>	