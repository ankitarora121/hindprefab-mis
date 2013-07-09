<?php 
if (!isset($_COOKIE["Key_my_site"]) || !$_SESSION["is_admin"])
{
  header( "Location: login.php" );
}

$con=mysqli_connect("localhost","ankit","itsover","hpl");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$table = 'projectdetails';
$value = mysql_real_escape_string($_POST['value']);
$name = mysql_real_escape_string($_POST['name']);
$pk = mysql_real_escape_string($_POST['pk']);


$sql="UPDATE `$table` SET `$name` = '$value' WHERE sno = $pk";

 $File = "/var/www/hpl2/postdump.txt"; 
 $Handle = fopen($File, 'w');
 $Data = print_r($sql,TRUE);
 fwrite($Handle, $Data); 

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }


mysqli_close($con);
 ?>

 LALA