<?php include("_barebones.php"); ?>


<?php
if($_POST["user"] !="admin" || $_POST["password"] !="admin")
{

echo  "WRONG USERNAME/PASSWORD";
}
else
{
setcookie("user", "Alex Porter1", time()+120);
setcookie("ID_my_site","Alex Porter",time()+120);

}
?>


<a href=regis.php>Create New User</a> <br>
<a href=createproj.php>Create a new Project:</a><br>
<a href=userpanel.php> MIS </A>