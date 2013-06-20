<html>
<body>
<img src="cover.gif" width="100%">
<h1>
VIEW ALL PROJECTS
</H1>
<?php
if (isset($_COOKIE["ID_my_site"]))
{
$con=mysqli_connect("127.0.0.1","root","","HPL");
$result = mysqli_query($con,"SELECT * FROM `projects` LIMIT 0, 30 ");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  echo "<table border='1'>
<tr>
<th>PROJECT NUMBER</th>
<th>PROJECT NAME</th>
<TH>CLIENT</TH>
<TH>CONTRACTOR</TH>
<TH>PROJECT COORDINATOR</TH>
<TH>REGIONAL OFFICE</TH>
<TH>REMARKS</TH>
</tr>";
echo "<form action=details.php method=post>";
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['PROJECT NUMBER'] . "</td>";
  echo "<td>" . $row['PROJECT NAME'] . "</td>";
  echo "<td>" . $row['CLIENT'] . "</td>";
  echo "<td>" . $row['CONTRACTOR'] . "</td>";
  echo "<td>" . $row['PROJECT COORDINATOR'] . "</td>";
  echo "<td>" . $row['REGIONAL OFFICE'] . "</td>";
  echo "<td>" . $row['REMARKS/STATUS'] . "</td>";
  echo "<td>";
  $abcd=$row['PROJECT NUMBER'];
  //echo "Details";
  echo "<input type='checkbox' value=$abcd name=$abcd>";
  echo "</td>";
  }
 echo " <input type=submit value=SUBMIT>";
echo " </form>";
echo "</table>";
setcookie("ID_my_site", "", time()-3600);
}
else
{
echo "session expired";
echo"
<a href=user.php> Click Here to Login Again</a>
";
}
?>