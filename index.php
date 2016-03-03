<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}

if(isset($_POST['btn-login']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$upass = mysql_real_escape_string($_POST['pass']);
	
	$email = trim($email);
	$upass = trim($upass);
	
	$res=mysql_query("SELECT user_id, user_name, user_pass FROM users WHERE user_email='$email'");
	$row=mysql_fetch_array($res);
	
	$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
	
	if($count == 1 && $row['user_pass']==md5($upass))
	{
		$_SESSION['user'] = $row['user_id'];
		header("Location: home.php");
	}
	else
	{
		?>
        <script>alert('Username / Password Seems Wrong !');</script>
        <?php
	}
	
}
?>
<!DOCTYPE html">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login | NetBanking</title>
<link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
  <script type="text/javascript" src="js/style.js"></script>
</head>
    
<body>
    <video autoplay  poster="bank.jpg" id="bgvid" loop>
  <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->

<source src="video/your_video.video_filetype" type="video/mp4">
</video>
<center>
<div id="login-form">
<form method="post">
   
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="email" placeholder="Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign in</button></td>
</tr>
<tr>
<td><h5>Not a member?</h5> <a href="register.php">Sign up</a></td>
</tr>
</table>
</form>
</div>
    </center><div id="polina"><button type="submit">Pause</button></div><script type="text/javascript" src="js/style.js"></script>
</body>
</html>