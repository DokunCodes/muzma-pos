<?php
function clean($value)
{
	return mysql_real_escape_string($value);
}

function shorty($a)
{
return date("j F Y", $a);	
}



function qty($x)
{
	$y = clean($x);
$sel = mysql_query("SELECT qty FROM product WHERE p_id='$y'");
$n= mysql_affected_rows();
		if($n<=0){
			return "no";
		}else
		{  while($row=mysql_fetch_array($sel))
			{
			return $row['qty'];
			}
	
}}


function qty2($x)
{
	$y = clean($x);
$sel = mysql_query("SELECT sat_qty FROM product WHERE p_id='$y'");
$n= mysql_affected_rows();
		if($n<=0){
			return "no";
		}else
		{  while($row=mysql_fetch_array($sel))
			{
			return $row['sat_qty'];
			}
	
}}


function remove_qty($x,$z)
{
	$id = clean($x);
	$qty = intval(clean($z));
	$db_qty = intval(qty($id));
$new_qty = $db_qty - $qty;
$sel = mysql_query("UPDATE product SET qty='$new_qty' WHERE p_id='$id'");
$n= mysql_affected_rows($sel);
if($n<0){ echo mysql_error();}
	
	
	
}


function remove_sat($x,$z)
{
	$id = clean($x);
	$qty = intval(clean($z));
$db_qty = intval(qty2($id));
$new_qty = $db_qty - $qty;

$sele = mysql_query("UPDATE product SET sat_qty='$new_qty' WHERE p_id='$id'");
$ne= mysql_affected_rows($sele);
if($ne<0){ echo mysql_error();}
 
 $r = mysql_query("SELECT sat_qty,qty,temp FROM product WHERE p_id='$id'");
 while($row=mysql_fetch_array($r))
 {$sat_q = $row['sat_qty']; $qty3 = $row['qty']; $tmp =$row['temp']; }	 
  if($sat_q == 0){
	  --$qty3;
	$sel = mysql_query("UPDATE product SET sat_qty='$tmp',qty='$qty3' WHERE p_id='$id'"); 
	$n= mysql_affected_rows($sel);
if($n<0){ echo mysql_error();}
	
  }
	
}



function user_exist($u,$p){
		$uu = clean($u); $pp = clean($p);
		$ppp = sha1($pp);
		$sel=mysql_query("SELECT * FROM staff where uname='$uu' && pword='$ppp' && logon='yes'");
		$n=mysql_affected_rows();
		if($n<=0){
			return "no";
		}else
		{  while($row=mysql_fetch_array($sel))
			{session_start(); 
			$_SESSION['bioname']=$row['oname'];
			$_SESSION['img'] = $row['pix'];
			return "yes";}}
			
}

function check_again($a)
{
$sele=mysql_query("SELECT * FROM staff where oname='$a' && logon='no'");
		$nm=mysql_num_rows($sele);
		if($nm>0){
			 unset($_SESSION['bioname']);
			 unset($_SESSION['items']);
			header("location: index.php");
		}	
	
	
}

function admin_exist($u,$p){
		$uu = clean($u); $pp = clean($p);
		$ppp = $pp;
		$sel=mysql_query("SELECT * FROM admin where uname='$uu' && pword='$ppp'");
		$n=mysql_affected_rows();
		if($n<=0){
			return "no";
		}else
		{  return "yes";}
			
}

function product_exist($a){
		$sel=mysql_query("SELECT * FROM product where serial_code='$a'");
		$n=mysql_affected_rows();
		if($n<=0){
			return "no";
		}else{ return "yes";}
			
}
function profile_exist($a,$b){
		$sel=mysql_query("SELECT * FROM users where email='$a' && phone='$b'");
		$n=mysql_affected_rows();
		if($n<=0){
			return "no";
		}else{ return "yes";}
			
}

function get_product_name($pid){
		$result=mysql_query("select name from product where p_id=$pid");
		$row=mysql_fetch_array($result);
		return $row['name'];
	}


	function product_exists($pid){
		$pid=intval($pid);
		$max=count($_SESSION['items']);
		$flag=0;
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['items'][$i]['pid']){
				$flag=1;
				break;
			}
		}
		return $flag;
	}
	
	function get_price($pid){
		$result=mysql_query("select s_price from product where p_id=$pid");
		$row=mysql_fetch_array($result);
		return $row['s_price'];
	}
	
	
	function get_satprice($pid){
		$result=mysql_query("select sat_price from product where p_id=$pid");
		$row=mysql_fetch_array($result);
		return $row['sat_price'];
	}
	
	function remove_item($pid){
		$result=mysql_query("Delete from product where p_id=$pid");
		if($result) return "yes";
		else return "no";
		
	}
	

	
	function remove_product($pid){
		$pid=intval($pid);
		$max=count($_SESSION['items']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['items'][$i]['pid']){
				unset($_SESSION['items'][$i]);
				break;
			}
		}
		$_SESSION['items']=array_values($_SESSION['items']);
	}
	function get_order_total(){
		$max=count($_SESSION['items']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['items'][$i]['pid'];
			$q=$_SESSION['items'][$i]['qty'];
			$price=get_price($pid);
			$sum+=$price*$q;
		}
		return $sum;
	}
	
	
	function get_order_total2(){
		$max=count($_SESSION['items']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['items'][$i]['pid'];
			$q=$_SESSION['items'][$i]['qty'];
			$price=get_satprice($pid);
			$sum+=$price*$q;
		}
		return $sum;
	}
	
	
	function phone_exist($x,$y){
		$sel=mysql_query("select phone,email from staff where phone='$x' and email='$y'");
		$n=mysql_affected_rows();
		if($n<=0){
			return "no";
		}else return "yes";}
		
		

?>