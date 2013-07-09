<?php include "_barebones.php"; ?>
<ul class="breadcrumb">
  <li><a href="login.php">Home</a><span class="divider">/</span></li>
  <li><a href="userpanel.php">User Panel</a><span class="divider">/</span></li>
  <li class="active">Manage Your Projects</li>

</ul>



<?php
session_start();

if (!isset($_COOKIE["Key_my_site"]))
{
  header( "Location: login.php" );
}

?>

<legend>
VIEW ALL PROJECTS
</legend>

<?php

$con=mysqli_connect( "127.0.0.1", "ankit", "itsover", "hpl" );
$query1="SELECT user_id FROM 'users' WHERE 'username'='" . $_SESSION['usernamesave'] . "'";
$getid = mysqli_fetch_assoc(mysqli_query($con, $query1));

echo $query1;
$result1= mysqli_query( $con, $query1);

$newquery="SELECT * FROM `projects` WHERE `project_coordinator` = '" .$getid['user_id']  . "'";
echo $newquery;
$result = mysqli_query( $con,  $newquery);

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
  echo '<td>' . $row['project_id'] . '</td>';
  echo '<td><a href="#" data-url="scripteditproject.php" data-type="text" id="project_name" data-pk="'.$row['project_name'].'"> ' . $row['project_name'] . '</a></td>';
  echo '<td><a href="#" data-url="scripteditproject.php" data-type="text" id="client" data-pk="'.$row['client'].'"> ' . $row['client'] . '</a></td>';
  echo '<td><a href="#" data-url="scripteditproject.php" data-type="text" id="contractor" data-pk="'.$row['contractor'].'"> ' . $row['contractor'] . '</a></td>';
  echo '<td>' . $fullname. '</td>';
  echo '<td><a href="#" data-url="scripteditproject.php" data-type="text" id="regional_office" data-pk="'.$row['regional_office'].'"> ' . $row['regional_office'] . '</a></td>';
  echo '<td><a href="#" data-url="scripteditproject.php" data-type="text" id="remarks_status" data-pk="'.$row['remarks_status'].'"> ' . $row['remarks_status'] . '</a></td>';
  echo '<td><a href="#" data-url="scripteditproject.php" data-type="date" id="startdate_contr" data-pk="'.$row['startdate_contr'].'"> ' . $row['startdate_contr'] . '</a></td>';
  echo '<td><a href="#" data-url="scripteditproject.php" data-type="date" id="enddate_contr" data-pk="'.$row['enddate_contr'].'"> ' . $row['enddate_contr'] . '</a></td>';
  echo '<td><a href="#" data-url="scripteditproject.php" data-type="date" id="startdate_client" data-pk="'.$row['startdate_client'].'"> ' . $row['startdate_client'] . '</a></td>';
  echo '<td><a href="#" data-url="scripteditproject.php" data-type="date" id="enddate_client" data-pk="'.$row['enddate_client'].'"> ' . $row['enddate_client'] . '</a></td>';

  echo "</tr>";

  
}
echo  '</tbody> <center style="margin-bottom:30px"><input type=submit value="View/Edit Subtasks" class="btn btn-primary" style="width:200px; margin-right:40px;"><input type="button" style="width:200px" id="enable" value="Enable/Disable Edit" class="btn"></center>';
echo " </form>";
echo "</table>";

?>



<script type="text/javascript">
$(document).ready(function(){
   $('#enable').click(function() {
     
      $('#project_name,#client,#contractor,#regional_office,#remarks_status,#startdate_contr,#enddate_contr,#startdate_client,#enddate_client').editable('toggleDisabled');
  });  
  $.fn.editable.defaults.mode = 'inline';
});
</script>