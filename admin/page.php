<?php
 $show = mysql_query("SELECT * FROM product ORDER BY name Asc ");
 $total_rows = mysql_num_rows($show);
 error_reporting(0);
 
 
  $base_url = 'https://localhost/muzma/Admin_muzma_pharmacy/';
  $per_page = 20;                           //number of results to shown per page 
  $num_links = 8;                           // how many links you want to show
  $total_rows = $total_rows; 
  $cur_page = 1;                  

 if(isset($_GET['page']))
    {
      $cur_page = $_GET['page'];
      $cur_page = ($cur_page < 1)? 1 : $cur_page;            //if page no. in url is less then 1 or -ve
    }
	
	$offset = ($cur_page-1)*$per_page;                //setting offset
   
    $pages = ceil($total_rows/$per_page);              // no of page to be created
	 $start = (($cur_page - $num_links) > 0) ? ($cur_page - ($num_links - 1)) : 1;
    $end   = (($cur_page + $num_links) < $pages) ? ($cur_page + $num_links) : $pages;
	$resu = mysql_query("SELECT * FROM product LIMIT ".$per_page." OFFSET ".$offset);














?>