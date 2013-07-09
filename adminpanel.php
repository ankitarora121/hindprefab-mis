<?php include("_barebones.php"); ?>
<ul class="breadcrumb">
	<li><a href="login.php">Home</a><span class="divider">/</span></li>
	<li class="active">Admin Panel</li>

</ul>
<?php
session_start();

if (!isset($_COOKIE["Key_my_site"]) || !$_SESSION["is_admin"])
{
	header( "Location: login.php" );
}
?>

<center>

<a href=viewandedit.php>View All Projects</a> <br>
<a href=addnewuser.php>Add New User</a> <br>
<a href=createproject.php>Create Project</a> 

</center>