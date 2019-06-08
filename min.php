<?php
if(isset($_POST['login'])) {
	// Authorisation details.
	$username = "princesshivani2000@gmail.com";
	$hash = "f56faee5ad4ef30879799b73ae022de81325c7c7124571cfb89957a927367045";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "1";
$name=$_POST['name'];


	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers = $_POST['num']; // A single number or a comma-seperated list of numbers
        $otp=mt_rand(100000,999999);
setcookie("otp",$otp);
	$message = "Hey ".$name." your OTP is ".$otp;
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
echo("logged in successfully");
}
else
{
echo("otp wrong");
}
}
?>
<html>
<head>
<meta charset="utf-8">
<title>Online Election Commission of India</title>
</head>
<body>
<form method="post" action="min.php">
<center><h1>Online Election Commission of India</h1></center>
<table align="center">
<tr>
<td>Name</td>
<td><input type="text" name="name" placeholder="Enter your name"></td>
</tr>
<tr>
<td>Phone Number</td>
<td><input type="text" name="num" placeholder="Valid!with country Code"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="login" value="Send Otp"></td>
</tr>
<tr>
<td>Verify OTP:</td>
<td><input type="text" name="otp" placeholder="enter received otp"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="ver" value="verify otp"></td>
</tr>
</table>
</form>
</body>
</html>