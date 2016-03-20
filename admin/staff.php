<?php
	session_start();
include_once('include/head.php');
error_reporting(0);
if(isset($_POST['add']))
{
	
	$lname =clean($_POST['lname']);
	$oname =clean($_POST['oname']);
	$sex = clean($_POST['sex']);
	$dofb = clean($_POST['dob']);
	$addr= clean($_POST['addr']);
	$phones = clean($_POST['phone']);
	$email = clean($_POST['mail']);
	$nxtkin = clean($_POST['nxt']); 
	$nxtaddr = clean($_POST['nxtaddr']);
	$nxtphone = clean($_POST['nxtphone']);
	$date_emp = clean($_POST['d_emp']);
	$user = clean($_POST['user']);
	$pword =  sha1(clean($_POST['pword']));
	$pword2 = sha1(clean($_POST['pword2']));

	
	
	 if(!$lname || !$oname || !$sex || !$dofb|| !$addr || !$phones || !$email || !$nxtkin 
	 || !$nxtaddr || !$nxtphone || !$date_emp || !$user ||!$pword || !$pword2   ){
			$error="Please fill the required field(s)";
		} elseif (phone_exist($phones,$email)=="yes")
		{
			
			$error=" User Already Exist ";}
			 elseif ($pword != $pword2)
		{
			
			$error="Passwords Mis-Matched..";}
		else{
			if(isset($_FILES['pic']['name'])){
				$dir="uploads/";
				$filename=$_FILES['pic']['name'];
				$tempfile=$_FILES['pic']['tmp_name'];
				$image=$dir.$filename;
				$move=move_uploaded_file($tempfile,$image);
			}else{
				$image="uploads/default.png";
			}
			$ins=mysql_query("
INSERT INTO staff VALUES('null','$lname','$oname','$sex','$dofb','$addr','$phones','$email','$nxtkin','$nxtaddr','$nxtphone','$date_emp','$user','$pword','yes','null','$image')");
	

			if($ins){
				$error="$lname $oname,  have been succesfully registered. Thank you.";
				$lname=""; $oname=""; $email=""; $nxtkin=""; $dofb="";$nxtphone="";$nxtaddr="";$date_emp=""; $user="";$addr="";$phones="";
			}else{
				$error="Oops, an error occured during registration". mysql_error();
			}
		}

}












?>
 
<h3 align="center">Add a Staff</h3>
<hr style="border:2px;" />

<form action="staff.php" method="post" enctype="multipart/form-data">
<table width="90%" border="0" cellspacing="10" cellpadding="10">
<tr>
<td colspan="2" align="center" id="inf"><?php echo $error; ?></td>
</tr>
<tr>
    <td><h3>Last Name</h3></td>
    <td><input type="text" name="lname" value="<?php echo $lname;?>" id="newtext"  /> </td>
  </tr>
   <tr>
    <td><h3>Other Name</h3></td>
    <td><input type="text" name="oname" value="<?php echo $oname;?>" id="newtext"  /> </td>
  </tr>
   <tr>
    <td><h3>Sex</h3></td>
    <td><input type="radio" name="sex" value="Male"/> Male &nbsp;<input type="radio" name="sex" value="Female"/> Female</td>
  </tr>
  
   <tr>
    <td><h3>Date of Birth</h3></td>
    <td><input type="text" name="dob" value="<?php echo $dofb;?>" id="newtext" /> </td>
  </tr>
  <tr>
    <td><h3>Address</h3></td>
    <td><textarea cols="43" rows="6" name="addr" draggable="false"><?php echo $addr;?></textarea></td>
  </tr>
   <tr>
    <td><h3>Phone No</h3></td>
    <td><input type="text" name="phone" value="<?php echo $phones;?>" id="newtext"  /> </td>
  </tr>
   <tr>
    <td><h3>Email</h3></td>
    <td><input type="text" name="mail" value="<?php echo $email;?>" id="newtext" /></td>
  </tr>
  
  <tr>
    <td><h3>Next of kin</h3></td>
    <td><input type="text" name="nxt" value="<?php echo $nxtkin;?>" id="newtext" /></td>
  </tr>
  <tr>
    <td><h3>Next of kin Address</h3></td>
     <td><textarea cols="43" rows="6" name="nxtaddr" draggable="false"><?php echo $nxtaddr;?></textarea></td>
  </tr>
   <tr>
    <td><h3>Next of Kin Phone No</h3></td>
    <td><input type="text" name="nxtphone" value="<?php echo $nxtphone;?>" id="newtext"  /> </td>
  </tr>
  <tr>
    <td><h3>Date Employed</h3></td>
    <td><input type="text" name="d_emp" value="<?php echo $date_emp;?>" id="newtext"/></td>
  </tr> 
  <tr>
    <td><h3>Username</h3></td>
    <td><input type="text" name="user" value="<?php echo $user;?>" id="newtext"  /></td>
  </tr>
  
  <tr>
    <td><h3>Password</h3></td>
    <td><input type="password" name="pword" value="" id="newtext"/></td>
  </tr>
  <tr>
    <td><h3>Re-Password</h3></td>
    <td><input type="password" name="pword2" value="" id="newtext"/></td>
  </tr>
  <tr>
        <td><h3>Picture</h3> </td>
        <td><label>
          <input name="pic" type="file" class="pic"   id="newtext" value="" />
        </label></td>
      </tr>
    
  
    <tr>
    <td>&nbsp;</td>
    <td><label>
<input name="add" type="submit" class="log_submit" value="Add Staff"/>
  </label></td>
  </tr>
</table>


</form>






<?php
include_once('include/foot.php');

?>