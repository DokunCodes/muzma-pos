<?php
	session_start();
include_once('include/head.php');
error_reporting(0);
$go = mysql_query("SELECT * FROM staff");


?>


<style type="text/css">
#customers
{
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
width:90%;
border-collapse: separate;
}
#customers td, #customers th 
{
font-size:1em;
padding:3px 7px 2px 7px;
}
#customers th 
{
font-size:1.1em;
text-shadow:none;
text-align:left;
padding-top:5px;
padding-bottom:4px;
background-color:#0d0720;
color:#ffffff;
}
#customers tr.alt td 
{
color:#000000;
background-color:#E5E5E5;}
a{color:#000;}

</style>

<?php
$j=0;
 while($row=mysql_fetch_array($go))
{ echo '
<table id="customers">

  <tr>
    <th>Name</th>
    <td>'.$row['lname']." ".$row['oname'].'</td>
  </tr>
  <tr>
    <th>Sex</th>
    <td>'.$row['sex'].'</td>
  </tr>
   <tr>
    <th>Date of Birth</th>
    <td>'.$row['dob'].'</td>
  </tr>
  <tr>
    <th>Address</th>
    <td>'.$row['add'].'</td>
  </tr>
  
  <tr>
    <th>Phone</th>
    <td>'.$row['phone'].'</td>
  </tr>
  <tr>
    <th>E-mail</th>
    <td>'.$row['email'].'</td>
  </tr>
  <tr>
    <th>Next of Kin</th>
    <td>'.$row['nxtkin']." (".$row['nxtkin_phone'].")".'</td>
  </tr>
  <tr>
    <th>Next of Kin Address</th>
    <td>'.$row['nxtkin_add'].'</td>
  </tr>
  <tr>
    <th>Date Employed</th>
    <td>'.$row['date_employed'].'</td>
  </tr>
  <tr>
    <th>Username </th>
    <td>'.$row['uname'].'</td>
  </tr>
  <tr>
    <th>Last Login </th>
    <td>'.$row['t_login'].'</td>
  </tr>
  <tr>
    
	<th>&nbsp;</th>
    <td><a href="caccess.php?nn12354555655='.sha1($row['staff_id']).'">View Activity Log</a></td>
  </tr>
	
    <th>&nbsp;</th>
    <td><a href="caccess.php?nn12354555655='.sha1($row['staff_id']).'">Change Access</a></td>
  </tr>
</table>
<br />
<br />
';

$j++;

}?>


<?php
include_once('include/foot.php');

?>