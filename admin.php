<?php
if($_POST["user"] !="user" || $_POST["password"] !="user")
{

echo  "WRONG USERNAME/PASSWORD";
}
else
{
setcookie("user", "Alex Porter1", time()+120);
setcookie("ID_my_site","Alex Porter",time()+120);
echo "<a href=regis.php>Create New User</a> <br>";
echo "Create a new Project";
echo "<a href=userpanel.php> MIS </A>";
}
?>