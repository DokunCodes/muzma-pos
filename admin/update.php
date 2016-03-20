<?php

session_start();
include_once('include/head.php');
error_reporting(0);

$id = $_GET['ff'];
 $timestamp = time();
$date2 = shorty($timestamp);
	
$pc = mysql_query("SELECT p_id FROM product");
while($goo=mysql_fetch_array($pc))
{
	$check = $goo['p_id'];
	$uid = sha1($check);
	
	if($id === $uid)
	{
		$query2 = mysql_query("SELECT * FROM product WHERE p_id='$check'");
		while($re = mysql_fetch_array($query2))
		{
			$scode = $re['serial_code'];
			$pname = $re['name'];
			$cp = $re['c_price'];
			$sp = $re['s_price'];
			$st = $re['sat_price'];
			$stqty = $re['temp'];
			$q = $re['qty'];
			$d = $re['l_date'];
			$val = $re['l_value'];
			
		}
	}
		
		
	
}

if(isset($_POST['update']))
{

	 $sc = $_POST['scode'];
	 	$qq=mysql_query("SELECT qty,name FROM product WHERE serial_code='$sc'");
		while($re = mysql_fetch_array($qq)){$q = $re['qty']; $pname=$re['name']; }
	 $sprice = intval($_POST['sprice']);
	 $cprice = intval($_POST['cprice']);
	 $sat = intval($_POST['sat']);
	 $satqty = intval($_POST['satqty']);
	 $qty = intval($_POST['qty']);
  if($sprice=="" || $cprice=="" || $qty=="")
  { $error = "Values are the same. No changes made..";}
  else 
  {   $new = $q + $qty;
	 mysql_query("UPDATE product SET c_price='$cprice',temp='$satqty',s_price='$sprice',sat_price='$sat',sat_qty='$satqty',qty='$new',l_date='$date2',l_value='$qty'
	  WHERE serial_code='$sc'");
	   mysql_query("INSERT INTO report values ('null','$pname','$qty','$date2')");
	if(!mysql_affected_rows())$error="Error!! Server down. Please Try again.. ".mysql_error();	 
	 	 else $error="Update Successful.."; $q="";
  }
	
	
}


?>


<form method="post" action="update.php">
<h3 align="center">Update Product</h3>
<hr style="border:2px;" />
<h3>Last Update done: <?Php echo $d; ?></h3>
<h3>Last Update Quantity Value: <?Php echo $val; ?></h3>
<h3 style="float:right"><a href="view.php" style="color:#F00"> View Update Report</a></h3>
<p><h2><?php echo $sec; ?></h2></p>
<table width="70%" cellpadding="5" cellspacing="10" border="0">
<tr>
<td colspan="2" align="center" id="inf"><?php echo $error; ?></td>
</tr>
<tr>
<td><h3>Product Name</h3></td>
<td><input type="text" id="newtext" name="pname"  value="<?php  echo $pname; ?>" disabled /></td>
</tr>
<tr>
<td><h3>Bar Code</h3></td>
<td><input type="text" id="newtext" name="scode" value="<?php echo $scode; ?>"   /> </td>
</tr>
<tr>
<td><h3>Cost Price</h3></td>
<td><input type="text" id="newtext" name="cprice" value="<?php   echo $cp; ?>" 
onclick="if(this.value=='<?php echo $cp;?>'){this.value=''}" 
onblur="if(this.value==''){ this.value='<?php echo $cp;?>'}" /></td>
</tr>
<tr>
<td><h3>Selling Price</h3></td>
<td><input type="text" id="newtext" name="sprice" value="<?php  echo $sp; ?>" 
onclick="if(this.value=='<?php echo $sp;?>'){this.value=''}" 
onblur="if(this.value==''){ this.value='<?php echo $sp;?>'}"
/></td>
</tr>
<tr>
<td><h3>Satchet Price</h3></td>
<td><input type="text" id="newtext" name="sat" value="<?php  echo $st; ?>" 
onclick="if(this.value=='<?php echo $sat;?>'){this.value=''}" 
onblur="if(this.value==''){ this.value='<?php echo $sat;?>'}"
/></td>
</tr>

<tr>
<td><h3>Satchet Quantity/Pack</h3></td>
<td><input type="text" id="newtext" name="satqty" value="<?php  echo $stqty; ?>" 
onclick="if(this.value=='<?php echo $stqty;?>'){this.value=''}" 
onblur="if(this.value==''){ this.value='<?php echo $satqty;?>'}"
/></td>
</tr>

<tr>
<td><h3>Stock Quantity</h3></td>
<td><input type="text" id="newtext" name="qty" value="<?php  echo $q; ?>"
onclick="if(this.value=='<?php echo $q;?>'){this.value=''}" 
onblur="if(this.value==''){ this.value='<?php echo $q;?>'}"
 /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="update"  type="submit" value="Update" class="log_submit"  />

</table>




</form>


<?php

include_once('include/foot.php'); 

?>