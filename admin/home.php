<?php

include_once('include/head.php');
error_reporting(0);
if (isset($_POST['search']))
{
	$txt = clean($_POST['txtsearch']);
	$go = mysql_query("SELECT * FROM sales WHERE invoice LIKE '%$txt%'");
	$n=mysql_num_rows($go);
		if($n<=0){$error = "No Search Result Found!! Try using another term.".mysql_error();}
		else {
			$error = $n . "  Search result(s) found!".mysql_error();}
			$go2 = mysql_query("SELECT * FROM cash WHERE invoice LIKE '%$txt%'");
			while($ro = mysql_fetch_array($go2))
			{
				$cash = $ro['cash'];
				$total = $ro['total'];
				$disc = $ro['disc'];
				$bal = $ro['bal'];
				$vat = $ro['vat'];
				$d_sold = $ro['dat'];	
			}
	
}

?>
<br />
<h3><?php echo $error;?></h3>
<table width="100%" cellpadding="10" cellspacing="10" border=0>
<tr>
<th align="left">Invoice No</th>
<th align="left">Items Bought</th>
<th align="left">Quantity</th>
<th align="left">Sub-total</th>
</tr>
<?php
while($row = mysql_fetch_array($go))
{ 
$cashier = $row['cashier'];
echo "<tr>
<td>".$row['invoice']."</td>
<td>".$row['product']."</td>
<td>".$row['qty']."</td>
<td>".$row['subtotal']."</td></tr>";}?>
</table>
<h3>Cashier: <?php echo $cashier;?></h3> 
<h3>Date Sold: <?php echo $d_sold;?></h3> 
<h3>Cash Collected:N <?php echo number_format(($cash),2);?></h3> 
<h3>Total Purchase:N <?php echo number_format($total,2);?></h3>
<h3>Discount:N <?php echo number_format($disc,2);?></h3>
<h3>VAT:N <?php echo number_format($vat,2);?></h3>  
<h3>Balance:N <?php echo number_format($bal,2);?></h3> 
<?php
include_once('include/foot.php');

?>