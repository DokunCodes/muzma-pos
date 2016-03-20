<?php
	session_start();
include_once('include/head.php');
error_reporting(0);
if(isset($_POST['c_date']))
{
$date= $_POST['date5'];	
}
else{
 $timestamp = time();
$date = strftime("%Y-%m-%d", $timestamp);
	
	
}

?>
<div class="calender">
<?php include('calender.php');?>
</div>
<?php

echo "<div id='printable2'><br />";
echo"<h3>Sales Report For: ".$date."</h3>";
$nme = mysql_query("SELECT DISTINCT cashier FROM sales WHERE date='$date'");
while($rows = mysql_fetch_array($nme))
{ $name[] = $rows['cashier'];}
$max = count($name);

for($k=0;$k<$max;$k++)
{
	$b = $name[$k];
$find = mysql_query("SELECT * FROM sales WHERE date='$date' && cashier='$b' ORDER BY invoice");

?>
<br />
<h3> Cashier Name: <?php echo $name[$k];?> </h3>
<hr /><br />
<table width="100%" cellpadding="10" cellspacing="10" border=0>
<tr>
<th align="left">S/N</th>
<th align="left">Invoice No</th>
<th align="left">Item Sold</th>
<th align="left">Quantity</th>
<th align="left">Profit</th>
<th align="left">Sub-total</th>


</tr>
<?php
$j=1;
while($res = mysql_fetch_array($find))
{ 
$p =$res['product'];
$sat = $res['qty'];
if(stripos($sat,"Sachets")!= true)
{
$pro = mysql_query("SELECT c_price,s_price FROM product WHERE name='$p'");
while($r=mysql_fetch_array($pro)){$cost=  $r['s_price'] - $r['c_price']; }
}

$total+=$res['subtotal'];

echo"
<tr>
<td>".$j."</td>
<td>".$res['invoice']."</td>
<td>".$res['product']."</td>
<td>".$res['qty']."</td>
<td>".number_format($res['qty'] * $cost,2)."</td>
<td>".number_format($res['subtotal'],2)."</td>
</tr>

";
$tot_profit += $res['qty'] * $cost;
$j++;
}?>

</table>
<span style="text-align:right"><h3><?php echo"Total Profit: N". number_format($tot_profit,2);?></h3></span>
<span style="text-align:right"><h3><?php echo"Total Sales: N". number_format($total,2);?></h3></span>



<?php
 unset($total);
 unset($tot_profit);
 }?>
 
 <a href="javascript:onclick(window.print())" id="non-printable"> Print Report</a>
 <?php
include_once('include/foot.php'); 

?>