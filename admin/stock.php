<?php
	session_start();
include_once('include/head.php');
error_reporting(0);

?>
<form name="form1" />
<input type="hidden" name="command" />
    <input type="hidden" name="pid" />
<table width="105%" cellpadding="10" cellspacing="10" border=0>
<tr>
<th align="left">S/N</th>
<th align="left">Product Name</th>
<th align="left">Bar Code</th>
<th align="left">Cost Price(N)</th>
<th align="left">Selling Price(N)</th>
<th align="left">Profit(N)</th>
<th align="left">Stock Quantity</th>
<th align="left">Remove</th>
<th align="left">Update</th>
</tr>
<?php
include('page.php');

 if(isset($resu))
        {
$j=1;
while($res = mysql_fetch_array($resu))
{ 
$profit = $res['s_price'] - $res['c_price'];
echo"
<tr>
<td>".$j."</td>
<td><b>".$res['name']."</b></td>
<td>".$res['serial_code']."</td>
<td align='center'>".$res['c_price']."</td>
<td align='center'>".$res['s_price']."</td>
<td align='center'>".$profit."</td>
<td align='center'>".$res['qty']."</td>
<td align='center'><a href='javascript:del(".$res['p_id'].")'><img src='../images/button_delete.gif' alt='Remove' /></a></td>
<td align='center' id='edit'><a href='update.php?ff=".sha1($res['p_id'])."'><img src='../images/orangeArrow3.png' alt='update' /></a></td>
</tr>";

$j++;}?>
</table>



</form>

 <div id="pagination">
        <div id="pagiCount">
            <?php
                if(isset($pages))
                {  
                    if($pages > 1)        
                    {    if($cur_page > $num_links)     ///////////to take to page 1 //////////
                        {   $dir = "first";
                            echo '<span id="prev"> <a href="'.$_SERVER['PHP_SELF'].'?page='.(1).'">'.$dir.'</a> </span>';
                        }
                       if($cur_page > 1) 
                        {
                            $dir = "prev";
                            echo '<span id="prev"> <a href="'.$_SERVER['PHP_SELF'].'?page='.($cur_page-1).'">'.$dir.'</a> </span>';
                        }                 
                        
                        for($x=$start ; $x<=$end ;$x++)
                        {
                            
                            echo ($x == $cur_page) ? '<strong>'.$x.'</strong> ':'<a href="'.$_SERVER['PHP_SELF'].'?page='.$x.'">'.$x.'</a> ';
                        }
                        if($cur_page < $pages )
                        {   $dir = "next";
                            echo '<span id="next"> <a href="'.$_SERVER['PHP_SELF'].'?page='.($cur_page+1).'">'.$dir.'</a> </span>';
                        }
                        if($cur_page < ($pages-$num_links) )
                        {   $dir = "last";
                       
                            echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$pages.'">'.$dir.'</a> '; 
                        }   
                    }
                }
            ?>
        </div>
    </div>




    <?php 
	
		}
  
	include_once('include/foot.php'); 
	 ?>





