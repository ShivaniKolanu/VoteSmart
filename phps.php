<?php
if(isset($_POST['login'])) {
	// Authorisation details.
	$username = "princesshivani2000@gmail.com";
	$hash = "f56faee5ad4ef30879799b73ae022de81325c7c7124571cfb89957a927367045";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";
$name=$_POST['name'];


	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers = $_POST['num']; // A single number or a comma-seperated list of numbers
        $otp=mt_rand(10000,99999);
setcookie("otp",$otp);
	$message = "Hey " .$name." your OTP is " .$otp;
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
echo("OTP send successfully");
	curl_close($ch);
}
if(isset($_POST['ver'])) {
$verotp=$_POST['otp'];
if($verotp==$_COOKIE['otp']) {
header('location: http://localhost//submit.html');
}
else
{
echo("Wrong OTP!Please enter correctly!");
}
}
?>
<html>
<head>
<meta charset="utf-8">
<title>Online Election Commission of India</title>
<link rel="stylesheet" href="style1.css">
<script src="lol.js"></script>
</head>
<body background="1.png">
<form method="post" action="phps.php">
<center><h1>Online Election Commission of India</h1></center>
<div id="sidebar">
<div class="toggle-btn" onclick="toggleSidebar()">
<span></span>
<span></span>
<span></span>
</div>
<ul>
<li><a href="http://localhost/in.html">Home</a></li>
<li><a href="http://localhost/service.html">Services</a></li>
<li><a href="https://www.gettyimages.in/photos/india-voting?sort=mostpopular&mediatype=photography&phrase=india%20voting">Gallery</a></li>
<li><a href="http://localhost/about.html">About</a></li>
<li><a href="http://localhost/contact.html">Contact Us</a></li>
</ul>
</div>
<center><br><br><br><h1>Voting Process</h1></br></center>
<h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;STEP 1</h1>
<center>
<table align="center">
<tr>
<td>Name</td>
<td><input type="text" name="name" placeholder="Enter your name"></td>
</tr>
<tr>
<td><br><br>Phone Number</td>
<td><br><br><input type="text" name="num" placeholder="Valid!with country Code"></td>
</tr>
<tr>
<td></td>
<td><br><input type="submit" name="login" value="Send Otp"></td>
</tr>
<tr>
<td><br>Verify OTP:</td>
<td><br><input type="text" name="otp" placeholder="enter received otp"></td>
</tr>
</form>
<tr>
<td></td>
<td><br><input type="submit" name="ver" value="verify otp"></td>
</tr>
</table>
</body>
</html>