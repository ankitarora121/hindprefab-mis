<?php include("_barebones.php");?>
<ul class="breadcrumb">
	<li><a href="login.php">Home</a><span class="divider">/</span></li>
	<li class="active">User Panel</li>

</ul>

<?php
// session_start();

if (!isset($_COOKIE["Key_my_site"]))
{
	header( "Location: login.php" );
}
?>

<center>

<a href=viewall.php>View All Projects</a> <br>
<a href=manageyourproject.php>Manage Your Projects </a><br>




</center>