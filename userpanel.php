<?php include("_barebones.php"); ?>
<?php
session_start();

if (!isset($_COOKIE["ID_my_site"]))
{
	header( "Location: login.php" );
}
?>

<center>

<a href=viewall.php>View All Projects</a> <br>
<a href=addnewuser.php>Manage Your Projects <br>


</center>