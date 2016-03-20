<?php
error_reporting(0);
session_start();
$connect = mysql_connect("localhost","root","") or die(mysql_error().mysql_errno());
mysql_select_db("mumza");
include_once('../includes/functions.php');

//if (!isset($_SESSION['id_a']))
//{ header("location: ../Admin_muzma_pharmacy/index.php");}


if(isset($_GET['out']))
{	
unset($_SESSION['id_a']);
header("location: ../index.php");
}

if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_item($_REQUEST['pid']);
	}
	else if($_REQUEST['command']=='update' && $_REQUEST['pid']>0){
		$id = $_REQUEST['pid'];
		$price = clean(intval($_REQUEST['cprice']));
		$sprice = clean(intval($_REQUEST['sprice']));
		$qty = clean(intval($_REQUEST['itemqty']));
		$result=mysql_query("UPDATE product SET c_price='$price',s_price='$sprice',qty='$qty' WHERE p_id=$id");
		if($result)echo "<script>alert('Item Updated..')</script>";
		
		
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<link rel="stylesheet" type="text/css" href="../../css/calendar.css"/>
 <meta name="description" content="Quality, Affordable Drugs" />
<meta name="author" content="Adedokun Oluwaseyi Tosin > SeyiSkillZ" />
<meta name="Web Developer" content="Adedokun seyi Skillz 08089236423" />
        <title>Muzma Pharmacy</title>
<link rel="icon" type="image/png" href="../images/muzma.png" />
<script language="javascript">

	function del(pid){
	if(confirm('Do you really want to delete this item?')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function update(pid){
	if(confirm('You are about to update this item.Proceed-->')){
			document.form1.pid.value=pid;
			document.form1.command.value='update';
			document.form1.submit();
		}
	}
</script>


</head>
<body>
<div class="container" >
<div id="quick">
<form action="home.php" method="post">
<input name="txtsearch" type="text" value="Search Invoice"
onclick="if(this.value=='Search Invoice'){this.value=''}" onblur="if(this.value==''){ this.value='Search Invoice'}"
 /><input name="search" type="submit" id="searchbutton" value="" />
 </form>
 </div>
<div id="logo2">
</div>
<div class="nav" id="non-printable">
<ul>
<li><a href="report.php"> Todays Report</a></li>
<li><a href="product.php"> Add product</a></li>
<li><a href="stock.php"> Check Stock</a></li>
<li><a href="staff.php"> Add Staff</a></li>
<li><a href="vstaff.php"> View Staff</a></li>
<li><a href="include/head.php?out"> Log Out</a></li>
</ul>
</div>
<h3 id="non-printable">Welcome Admin</h3>