<?php include "_barebones.php"; ?>

<ul class="breadcrumb">
  <li><a href="login.php">Home</a><span class="divider">/</span></li>
  <li><a href="adminpanel.php">Admin Panel</a><span class="divider">/</span></li>
  <li><a href="addnewuser.php">Add new User</a><span class="divider">/</span></li>
  <li>Processing...</li>

</ul>


<?php
session_start();

if (!isset($_COOKIE["Key_my_site"]) || !$_SESSION["is_admin"])
{
  header( "Location: login.php" );
}

?>

<?php
$con=mysqli_connect("localhost","ankit","itsover","hpl");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }



$sql="INSERT INTO users (username, password, fullname, admin)
VALUES
('$_POST[username]', '$_POST[password]', '$_POST[fullname]', 0)";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo '<h2>User Successfully added!</h2><a href="adminpanel.php">Click here to go back to the Admin Panel</a>';

mysqli_close($con);
?>