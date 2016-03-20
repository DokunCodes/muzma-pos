<?php
	session_start();
include_once('include/head.php');
error_reporting(0);
if(isset($_POST['add']))
{
	 $timestamp = time();
$date2 = shorty($timestamp);
	
	$bcode = $_POST['bcode'];
	$pname = $_POST['pname'];
	$cprice = intval($_POST['cprice']);
	$sprice = intval($_POST['sprice']);
	$sat = intval($_POST['sat']);
	$satqty = intval($_POST['satqty']);
	$qty = intval($_POST['qty']);
	if(!$bcode || !$pname || !$cprice || !$sprice || !$qty)
	{
		$error = "Please fill all required fields!!";
	}
	else if(product_exist($bcode)=="yes")
	{
		$error="Product Already Exist!!";
	}
	else{
	 mysql_query("INSERT INTO product values ('null','$bcode','$pname','$cprice','$sprice','$sat','$satqty','$satqty','$qty','$date2','$qty')");
	 mysql_query("INSERT INTO report values ('null','$pname','$qty','$date2')");
	if(!mysql_affected_rows()){ $error="Error Adding Product, Please try again!!".mysql_error();}	
	else{ $error =$pname." Succesfully Added."; 
		$bcode="";$pname="";$sprice="";$cprice="";$qty=""; $sat=""; $satqty="";}
		
	}

}



?>

<form method="post" action="product.php" >
<h3 align="center">Add Product</h3>
<hr style="border:2px;" />
<p><h2><?php echo $sec; ?></h2></p>
<table width="70%" cellpadding="5" cellspacing="10" border="0">
<tr>
<td colspan="2" align="center" id="inf"><?php echo $error; ?></td>
</tr>
<tr>
<td><h3>Bar Code</h3></td>
<td><input type="text" id="newtext" name="bcode"  value="<?php  echo $bcode; ?>" /></td>
</tr>
<tr>
<td><h3>Product Name</h3></td>
<td><input type="text" id="newtext" name="pname" value="<?php echo $pname; ?>" /></td>
</tr>
<tr>
<td><h3>Cost Price</h3></td>
<td><input type="text" id="newtext" name="cprice" value="<?php   echo $cprice; ?>" /></td>
</tr>
<tr>
<td><h3>Selling Price</h3></td>
<td><input type="text" id="newtext" name="sprice" value="<?php  echo $sprice; ?>" /></td>
</tr>
<tr>
<td><h3>Satchet Price</h3></td>
<td><input type="text" id="newtext" name="sat" value="<?php  echo $sat; ?>" /></td>
</tr>
<tr>
<td><h3>Satchet Quantity/Pack</h3></td>
<td><input type="text" id="newtext" name="satqty" value="<?php  echo $satqty; ?>" /></td>
</tr>
<tr>
<td><h3>Stock Quantity</h3></td>
<td><input type="text" id="newtext" name="qty" value="<?php  echo $qty; ?>" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="add"  type="submit" value="Add" class="log_submit"  />

</table>




</form>



<?php
include_once('include/foot.php');

?>