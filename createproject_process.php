<?php include "_barebones.php"; ?>
<ul class="breadcrumb">
  <li><a href="login.php">Home</a><span class="divider">/</span></li>
  <li><a href="adminpanel.php">Admin Panel</a><span class="divider">/</span></li>
  <li><a href="createproject.php">Create New Project</a><span class="divider">/</span></li>
  <li class="active">Processing...</li>

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



$sql="INSERT INTO projects (project_id, project_name, client, contractor, project_coordinator, regional_office, remarks_status, startdate_contr,enddate_contr, startdate_client,enddate_client)
VALUES
('$_POST[project_id]', '$_POST[project_name]', '$_POST[client]', '$_POST[contractor]', '$_POST[project_coordinator]', '$_POST[regional_office]', '$_POST[remarks_status]', '$_POST[startdate_contr]','$_POST[enddate_contr]', '$_POST[startdate_client]','$_POST[enddate_client]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo '<h2>Record Successfully added!</h2><a href="adminpanel.php">Click here to go back to the Admin Panel</a>';

mysqli_close($con);
?>