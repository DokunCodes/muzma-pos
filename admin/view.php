<?php
	session_start();
include_once('include/head.php');
error_reporting(0);
 $timestamp = time();
$date2 = shorty($timestamp);

if(isset($_POST['sub']))
{
	$mon = $_POST['month'];
	
}


?>
<div id="mon">

<form action="view.php" method="post">
<select name="month" size="1">
<option value="Jan"> January</option>
<option value="Feb"> February</option>
<option value="Mar"> March</option>
<option value="Apr"> April</option>
<option value="May"> May</option>
<option value="Jun"> June</option>
<option value="Jul"> July</option>
<option value="Aug"> August</option>
<option value="Sep"> September</option>
<option value="Oct"> October</option>
<option value="Nov"> November</option>
<option value="Dec"> December</option>
</select>
<input type="submit" name="sub" class="log_submit" value="Check" />
</form>

</div>


<?php

echo "<div id='printable2'><br />";
echo"<h3>Update Report For: ".$date2."</h3>";
?>
<br />
<table width="100%" cellpadding="10" cellspacing="10" border=0>
<tr>

<th align="left">Item Name</th>
<th align="left">Quantity</th>
<th align="left">Date Updated</th>
</tr>
<?php
$nme = mysql_query("SELECT * FROM report WHERE date LIKE '%$mon%' ORDER BY pro_name");
while($rows = mysql_fetch_array($nme))
{ $pname = $rows['pro_name'];
$qty = $rows['qty'];
$date= $rows['date'];
echo"
<tr>
<td>".$pname."</td>
<td>".$qty."</td>
<td>".$date."</td>

</tr>

";

}?>

</table>


<?php

 ?>
 
 <a href="javascript:onclick(window.print())" id="non-printable"> Print Report</a>
 <?php
include_once('include/foot.php'); 

?>