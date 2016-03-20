<?php

session_start();
include_once('include/head.php');
error_reporting(0);

$id = clean($_GET['nn12354555655']);

	
$pc = mysql_query("SELECT staff_id FROM staff");
while($goo=mysql_fetch_array($pc))
{
	$check = $goo['staff_id'];
	$uid = sha1($check);
	
	if($id === $uid)
	{
		$query2 = mysql_query("SELECT uname,pword FROM staff WHERE staff_id='$check'");
		while($re = mysql_fetch_array($query2))
		{
			$_SESSION['mm']=$u = $re['uname'];
			$_SESSION['pp']=$p = $re['pword'];
						
		}
	}
		
		
	
}

if(isset($_POST['change']))
{

	
	 $pword = clean($_POST['pword']);
	 $pword2 = clean($_POST['pword2']);
	$opt = $_POST['opt'];
	$uname = $_SESSION['mm'];
if($pword != $pword2)
  {
	$error = "Passwords Mis-Matched. Try again..";
	  
  }
  
  else 
  {
	if(isset($pword))$newp = sha1($pword);
	else{
	 $newp =$_SESSION['pp'];}
	 mysql_query("UPDATE staff SET pword='$newp',logon='$opt' WHERE uname='$uname'");
	if(!mysql_affected_rows())$error="Error!! Server down. Please Try again.. ".mysql_error();	 
	 	 else $error="Changes Successful Made..";
  
  }
	
}


?>


<form method="post" action="caccess.php">
<h3 align="center">Review Staff Access</h3>
<hr style="border:2px;" />

<table width="70%" cellpadding="5" cellspacing="10" border="0">
<tr>
<td colspan="2" align="center" id="inf"><?php echo $error; ?></td>
</tr>
<tr>
<td><h3>User Name</h3></td>
<td><input type="text" id="newtext" name="uname"  value="<?php  echo $u; ?>" disabled /></td>
</tr>
<tr>
<td><h3>Password</h3></td>
<td><input type="password" id="newtext" name="pword" value="<?php echo $p; ?>"   /> </td>
</tr>
<tr>
<td><h3>Re-Password</h3></td>
<td><input type="password" id="newtext" name="pword2" value="<?php echo $p; ?>"   /> </td>
</tr>
<tr>
<td><h3>Allow Staff Login</h3></td>
<td><select name="opt" id="newtext">
<option value="yes">Yes</option>
<option value="no">No</option>
</select>
</td>
</tr>

<tr>
<td>&nbsp;</td>
<td><input name="change"  type="submit" value="Change" class="log_submit"  />

</table>




</form>


<?php

include_once('include/foot.php'); 

?>