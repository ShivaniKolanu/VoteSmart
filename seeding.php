<?php
$vid=$_POST["VoterId"];
$uid=$_POST['AadhaarNumber'];

$conn=mysqli_connect("localhost","root","","hack");

  if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   else{
   $sql = "INSERT INTO seeding VALUES ('$uid','$vid')";
   if ($conn->query($sql) === TRUE) {
    echo "seeded successfully\n";
   } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

  }   
 $conn->close();
 header('location: http://localhost//phpotp.php');
?>