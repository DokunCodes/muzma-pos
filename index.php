<?php
	session_start();
	//echo sha1("1234");
include_once('includes/header.php');
include_once('includes/functions.php');

if(isset($_POST['login']))
{ $user = $_POST['user'];
   $pass = $_POST['pass'];
   if(!$user || !$pass)
   { $error ="Please fill the required fields!!";}
   else if(user_exist(clean($user),clean($pass))=="no"){
	   $error = "Invalid Username or Password Combination";
	   
   }
   else {
$timestamp = time();
$dat =strftime("%d/%m/%Y %H:%M:%S", $timestamp);
mysql_query("UPDATE staff SET t_login='$dat' WHERE uname='$user'");
	header('location: main.php');  
   }
	
	
} 
 

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
  <meta name="description" content="Quality, Affordable Drugs" />
<meta name="author" content="Adedokun Oluwaseyi Tosin > SeyiSkillZ" />
<meta name="Web Developer" content="Adedokun seyi Skillz 08089236423" />
        <title>Muzma Pharmacy</title>
        <link rel="icon" type="image/png" href="images/muzma.png" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
	    </head>
<body>
<div id="logo">
</div>

		<div class="wrapper">
		<div class="content">
        <div id="error"><?php echo $error; ?></div>
				<div id="form_wrapper" class="form_wrapper">
					
					<form class="login active" action="index.php" method="post">
						<h3>Login</h3>
						<div>
							<label>Username:</label>
							<input type="text"  name="user" value="<?php echo $user;?>"/>
						
						</div>
						<div>
							<label>Password:</label>
							<input type="password" name="pass" />
							
						</div>
						<div class="bottom">
						
							<input type="submit" value="Login" name="login"></input>
						<div class="clear"></div>
						</div>
					</form>
					</div>
				<div class="clear"></div>
			</div>
			</div>
			<div id="foot">
</div>
    </body>
</html>