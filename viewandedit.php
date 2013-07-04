<?php include "_barebones.php"; ?>
<?php
session_start();

if (!isset($_COOKIE["Key_my_site"]) || !$_SESSION["is_admin"])
{
  header( "Location: login.php" );
}

?>

<legend>
VIEW ALL PROJECTS
</legend>

<?php

$con=mysqli_connect( "127.0.0.1", "ankit", "itsover", "hpl" );
$result = mysqli_query( $con, "SELECT * FROM `projects`" );
if ( mysqli_connect_errno() ) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
echo <<<EOF
<table class="table table-hover table-bordered">
<thead><tr>
<th> </th>
<th>PROJECT ID</th>
<th>PROJECT NAME</th>
<TH>CLIENT</TH>
<TH>CONTRACTOR</TH>
<TH>PROJECT COORDINATOR</TH>
<TH>REGIONAL OFFICE</TH>
<TH>REMARKS/STATUS</TH>
<TH>START DATE (CONTRACTOR)</TH>
<TH>END DATE (CONTRACTOR)</TH>
<TH>START DATE (CLIENT)</TH>
<TH>END DATE (CLIENT)</TH>
</tr></thead>
EOF;
echo '<form action="projectdetails.php" method="post"><tbody>';
while ( $row = mysqli_fetch_array( $result ) ) {
  $newquery = "SELECT fullname FROM `users` WHERE user_id=" . $row['project_coordinator'];
  // $newresult=mysql_query($newquery);
  // $newrow = mysql_fetch_row($newresult);
  $getname = mysqli_fetch_assoc(mysqli_query($con, $newquery));
  $fullname = $getname['fullname'];

  echo "<tr>";
  echo "<td>";
  $abcd=$row['project_id'];
  // echo $abcd;
  echo '<input type="radio" value="'. $abcd .'" name="rad">';
  echo "</td>";

  echo "<td>" . $row['project_id'] . "</td>";
  echo "<td>" . $row['project_name'] . "</td>";
  echo "<td>" . $row['client'] . "</td>";
  echo "<td>" . $row['contractor'] . "</td>";
  echo "<td>" . $fullname. "</td>";
  echo "<td>" . $row['regional_office'] . "</td>";
  echo "<td>" . $row['remarks_status'] . "</td>";
  echo "<td>" . $row['startdate_contr'] . "</td>";
  echo "<td>" . $row['enddate_contr'] . "</td>";
  echo "<td>" . $row['startdate_client'] . "</td>";
  echo "<td>" . $row['enddate_client'] . "</td>";

  echo "</tr>";

  
}
echo  '</tbody> <center><input type=submit value="View/Edit Subtasks" class="btn btn-primary" style="margin-bottom: 30px;"></center>';
echo " </form>";
echo "</table>";
setcookie( "ID_my_site", "", time()-3600 );

?>
