<?php include "_barebones.php"; ?>
<ul class="breadcrumb">
  <li><a href="login.php">Home</a><span class="divider">/</span></li>
  <li><a href="adminpanel.php">Admin Panel</a><span class="divider">/</span></li>
  <li><a href="viewandedit.php">View and Edit Projects</a><span class="divider">/</span></li>
  <li><a href="projectdetails.php">Project Details</a><span class="divider">/</span></li>
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


$sql="INSERT INTO projectdetails (project_id, name, planned_start, planned_finish, actual_start, actual_finish, percent_completion, current_status)
VALUES
('$_POST[project_id]', '$_POST[name]', '$_POST[planned_start]', '$_POST[planned_finish]', '$_POST[actual_start]', '$_POST[actual_finish]', '$_POST[percent_completion]', '$_POST[current_status]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo <<<EOF
<h2>Record Successfully added!</h2>
<form action="adminpanel.php">
    <input type="submit" value="Admin Panel" class="btn btn-success">
</form>
<form action="projectdetails.php" method="POST">
<input type="hidden" name="rad" id="rad" value="$_POST[project_id]" />
<input type="submit" value="Add another subtask" class="btn btn-primary">
</form>
EOF;

mysqli_close($con);
?>