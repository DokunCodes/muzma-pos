<?php
session_start();
include_once('includes/header.php');
include_once('includes/functions.php');
$cn=$_SESSION['bioname'];

check_again($cn);

$alt= $_GET['pid']; 
if($alt == sha1(alt)) unset($_SESSION['items']);


$inv=rand(1000,9999999);
if (!isset($_SESSION['bioname']))
{ header("location: index.php");}



 $timestamp = time();
 $date = strftime("%Y-%m-%d", $timestamp);
$date2 = shorty($timestamp);

if(isset($_GET['log']))
{	
unset($_SESSION['bioname']);
unset($_SESSION['items']);
header("location: index.php");
}





if(isset($_POST['sub']))
{
	$code = clean($_POST['barcode']);
$result=mysql_query("select * from product where serial_code=$code");
$n = mysql_num_rows($result);
if($n<=0){ $error = "Product Not found!! Try Again!!";}
else{

	if (!isset($_SESSION['items'])){$_SESSION['items']=array();}
		
	while($row=mysql_fetch_array($result))
	{
		$sc=$row['serial_code'];	
		$nam=$row['name'];
		$pq = $row['qty']; 
		$sp=$row['s_price'];
		$id=$row['p_id'];
		if(empty($q))$q=1;
	$checkqty = mysql_query("SELECT qty FROM product WHERE p_id='$id'");
	while($rows = mysql_fetch_array($checkqty))$p_qty = $rows['qty'];

	if($p_qty<=0){
echo "<script>alert('".$nam." has been exhausted in the stock. Sales can not be made on this product. Contact the Admin.')</script>";
		 continue;}
	else{
			if($p_qty>0 && $p_qty<=5){ 
	echo "<script>alert('".$nam." remains ".$pq." quantity in the stock please update as soon as possible.')</script>";}
		if(product_exists($id)) continue;
		$_SESSION['items'][] = array('scode'=>$sc, 'nam'=>$nam, 'price'=>$sp, 'pid'=>$id, 'qty'=>$q );
	
	}}}
}
 
 if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_product($_REQUEST['pid']);
	}
	else if($_REQUEST['command']=='clear'){
		unset($_SESSION['items']); 
		unset($_SESSION['cash']);
		unset($_SESSION['bal']);
		unset($_SESSION['disc']);
		unset($_SESSION['vat']);
  	}
	else if($_REQUEST['command']=='commit'){
		
			$max = count($_SESSION['items']);
			$tot = get_order_total();
			for($j=0;$j<$max;$j++)
			{
			
			$pid=$_SESSION['items'][$j]['pid'];
			$pname=get_product_name($pid);
			$scode =$_SESSION['items'][$j]['scode'];
			$price = $_SESSION['items'][$j]['price'];
			$q=$_SESSION['items'][$j]['qty'];
			$sub = $price * $q;
			$_SESSION['r_inv']=$u_inv = $inv;
					
	$csales = mysql_query("INSERT INTO sales values ('null','$cn','$u_inv','$date','$pname','$q','$sub')");
		 remove_qty($pid,$q);	
								
			}
			$cash = $_SESSION['cash'];
			$disc = $_SESSION['disc'];
			$vatc = $_SESSION['vat'];
			$bal = $_SESSION['bal'];
			
		mysql_query("INSERT INTO cash values ('null','$cn','$u_inv','$cash','$disc','$vatc','$tot','$bal','$date')");
	 echo "<script>alert('Transaction Successful... ')</script>"; 
	 
	 unset($_SESSION['items']); unset($inv);
			
	
	}
	else if($_POST['update']){
		$_SESSION['cash']=$cash = intval($_POST['cash']);
		$_SESSION['disc']=$disc = intval($_POST['discount']);
		$_SESSION['vat']= $vatc = intval($_POST['vatc']);
		
	
		$tmp = get_order_total() + $vatc;
		$_SESSION['bal']=$bal = ($cash  - $tmp) + $disc ;
		$max=count($_SESSION['items']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['items'][$i]['pid'];
			$pname=get_product_name($pid);
			$q=intval($_POST['item'.$pid]);
			if($q>0 && $q<=999){
				
				$_SESSION['items'][$i]['qty']=$q;
				$checkqty = qty($pid);
				$qq=$_SESSION['items'][$j]['qty'];
				if($q > $checkqty) {
echo "<script>alert('You can not make a sale of more than ".$checkqty." quantity on ".$pname." ')</script>"; 
	$_SESSION['items'][$i]['qty']=$checkqty;
	
	}
			}
			else{
				
				$error='Some Products not updated!, quantity must be a number between 1 and 999';
			}
		}
	
		}





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
     <meta name="description" content="Quality, Affordable Drugs" />
<meta name="author" content="Adedokun Oluwaseyi Tosin > SeyiSkillZ" />
<meta name="Web Developer" content="Adedokun seyi Skillz 08089236423" />
        <title>POS System</title>
        <link rel="icon" type="image/png" href="images/muzma.png" />
           
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        
<script language="javascript">

	function del(pid){
	if(confirm('Do you really want to delete this item?')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_sales(){
		if(confirm('This will empty this Sale Session!! continue?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function commit_sales(){
		if(confirm('Are you Sure you want to commit sales!! continue?')){
			document.form1.command.value='commit';
			document.form1.submit(); 
			window.print();
		
			
		}
	}

</script>        
	    </head>
        <body>
<div class="container" id="non-printable">

 <span id="logout"><a href="main.php?log=<?php echo sha1(log);?>">Log Out</a> </span>
<div id="logo1">
<img src="Admin_muzma_pharmacy/<?php echo $_SESSION['img'];?>" width="120" height="120" />
</div>
<div id="logo2">
</div>

<?php echo "<h2> Welcome ".$_SESSION['bioname']."</h2>";?>
<span id="inf">Please use the barcode scanner to scan the item(s).. OR <a href="alt.php?pid=<?php echo sha1(main)?>" style="color:#F00">Sell by Sachets</a></span>
	<form  method="post" action="main.php" name="form1">
		
   <div id="searchForm">
   <fieldset>
    <input type="hidden" name="command" />
    <input type="hidden" name="pid" />
           	<input id="s" type="text" autofocus="autofocus" name="barcode" />
            <input type="submit" hidden="hidden" name="sub" id="hid"  />
                   <table border="1" width="200" height="30"  align="right">
                   	<tr>
                   		<td>Total Sales: N </td>
                   	</tr>
                   </table>         
             </fieldset>
    </div>
    <?php  echo "<h2>".$error."</h2>";
	
	if(!isset($_POST['command']) || count($_SESSION['items'])==0)
	{ continue;}
	 ?> 
    
    <table border="0" cellpadding="5px" cellspacing="1px" style="font-size:14px; background-color:#E1E1E1" width="100%">
    <tr bgcolor="#FFFFFF">
    <th>&nbsp;</th>
    <th>Serial</th>
    <th>Product Name</th>
    <th>Unit Price(N)</th>
    <th>Quantity</th>
    <th>Sub Total(N)</th>
    <th>Options</th>
    </tr>
    <?php  
			$max = count($_SESSION['items']);
			
			
			
			for($i=0; $i<$max; $i++)
			{	
			
			$pid=$_SESSION['items'][$i]['pid'];
			$pname=get_product_name($pid);
			$scode =$_SESSION['items'][$i]['scode'];
			$price = $_SESSION['items'][$i]['price'];
			$q=$_SESSION['items'][$i]['qty'];
			
			
			
		
	?>
     <tr bgcolor="#FFFFFF">
     <td align="center"><?php echo $i+1;?></td>
    <td align="center"><?php echo $scode; ?></td>
    <td align="center"><?php echo $pname;?></td>
    <td align="center"><?php echo 'N'.$price;?></td> 
    <td align="center"><input type="text" name="item<?php echo $pid;?>" value="<?php echo $q?>" maxlength="3" size="2" /></td>  
    <td align="center"><?php echo 'N'.number_format($price*intval($q),2); ?></td>
    <td align="center"><a href="javascript:del(<?php echo $pid;?>)"><img src="images/button_delete.gif" width="16" height="16" alt="Remove" /></a></td>
    </tr>
    <?php
			
		
		}
			?>
    <tr>
    <td align="right" colspan="6">
    <h3 id="ad">Cash Collected (N):</h3>&nbsp;&nbsp;
    <input type="text" id="newtext2" name="cash"  value="<?php echo $cash;?>"
     onclick="if(this.value=='<?php echo $cash;?>'){this.value=''}" onblur="if(this.value==''){ this.value='<?php echo $cash;?>'}" />
 	</td>
    </tr>
    
     <tr>
    <td align="right" colspan="6">
    <h3 id="ad">Discount (N):</h3>&nbsp;&nbsp;
    <input type="text" id="newtext2" name="discount"  value="<?php echo $disc;?>"
     onclick="if(this.value=='<?php echo $disc;?>'){this.value=''}" onblur="if(this.value==''){ this.value='<?php echo $disc;?>'}" />
 	</td>
    </tr>
    
     <tr>
    <td align="right" colspan="6">
    <h3 id="ad">VAT Charges (N):</h3>&nbsp;&nbsp;
    <input type="text" id="newtext2" name="vatc"  value="<?php echo $vatc;?>"
     onclick="if(this.value=='<?php echo $vatc;?>'){this.value=''}" onblur="if(this.value==''){ this.value='<?php echo $vatc;?>'}" />
 	</td>
    </tr>
    
    <tr><td align="right" colspan="6">
    <h3 id="ad">Balance (N):</h3>&nbsp;&nbsp;
    <input type="text" id="newtext2" name="bal"  value="N<?php echo number_format($bal,2);?>" disabled="disabled" 
     />
    </td></tr>
     <tr><td colspan="6">&nbsp;</td></tr>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr><td><h3>Sales Total: N<?php echo number_format(get_order_total(),2)?></h3></td>
    <td colspan="6" align="right">
    <input type="button" class="log_submit" value="Clear Sales" onclick="clear_sales()" />&nbsp;
    <input type="submit" class="log_submit" name="update" value="Update" />&nbsp;
    <input type="submit" class="log_submit" name="sales" value="Confirm Sales" onclick="commit_sales()"  />
    
    </td></tr>
    
    </table>
    </form>
 <div class="footer">YourCompanyName&copy;2014 <span style="float:right"><a href="#" title="Developer - +2348068179988, onyemahmichael@gmail.com">Powered by MyComanyName</a></span></div>
     

    </div> 
    <?php
 require_once('receipt.php');
 ?>
   </body>
</html>