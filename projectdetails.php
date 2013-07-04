<?php include "_barebones.php"; ?>
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


echo <<<EOF
<legend>
PROJECT DETAILS: Project number 
EOF;
echo $_POST["rad"];
echo "</legend>";
?>

<?php

$con=mysqli_connect( "127.0.0.1", "ankit", "itsover", "hpl" );
$query1="SELECT * FROM `projectdetails` where project_id =" . $_POST["rad"] . " ORDER BY planned_start";
$result = mysqli_query( $con, $query1);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
if ( mysqli_connect_errno() ) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


echo <<<EOF
<table class="table table-hover table-bordered">
<thead><tr>
<th> </th>
<th>SNo</th>
<th>Name</th>
<th>Planned Start</th>
<th>Planned Finish</th>
<th>Actual Start</th>
<th>Actual Finish</th>
<th>Percent Completion</th>
<th>Current Status</th>
</tr></thead>
EOF;

while ( $row = mysqli_fetch_array( $result ) ) {

  echo "<tr>";
    echo "<td>";
    $sno=$row['sno'];
    echo '<input type="radio" value="'. $sno .'" name="rad">';
    echo "</td>";

    echo "<td>" . $row['sno'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['planned_start'] . "</td>";
    echo "<td>" . $row['planned_finish'] . "</td>";
    echo "<td>" . $row['actual_start'] . "</td>";
    echo "<td>" . $row['actual_finish'] . "</td>";
    echo "<td>" . $row['percent_completion'] . "</td>";
    echo "<td>" . $row['current_status'] . "</td>
  </tr>";
}
echo  '</tbody>';
echo "</table>";

?>

<legend>Add Subtasks</legend>



<form class="form-horizontal" action="projectdetails_process.php" method="post" id="details" form="from-inline">
<fieldset>

<!-- Text input-->
<div class="control-group">
    <label class="control-label" for="mock">Project ID</label>

  <div class="controls">
    <input required="" class="input-xlarge" id="mock" name="mock" type="text" value="<?php echo $_POST["rad"];?>" disabled>
    
  </div>
</div>
 <input type="hidden" name="project_id" id="project_id" value="<?php echo $_POST["rad"];?>" />


<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="name">Subtask Name</label>
  <div class="controls">
    <input required="" id="name" name="name" type="text" placeholder="" class="input-xlarge" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="planned_start">Planned Start</label>
  <div class="controls">
    <input required="" required="" id="planned_start" name="planned_start" type="text" placeholder="" class="input-xlarge datepicker" data-date-format="yyyy-mm-dd" >
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="planned_finish">Planned Finish</label>
  <div class="controls">
    <input required="" id="planned_finish" name="planned_finish" type="text" placeholder="" class="input-xlarge datepicker" data-date-format="yyyy-mm-dd" >
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="actual_start">Actual Start</label>
  <div class="controls">
    <input required="" id="actual_start" name="actual_start" type="text" placeholder="" class="input-xlarge datepicker" data-date-format="yyyy-mm-dd" >
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="actual_finish">Actual Finish</label>
  <div class="controls">
    <input required="" id="actual_finish" name="actual_finish" type="text" placeholder="" class="input-xlarge datepicker" data-date-format="yyyy-mm-dd" >
    
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="percent_completion">Percent Completion</label>
  <div class="controls">
    <input required="" id="percent_completion" name="percent_completion" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="current_status">Current Status</label>
  <div class="controls">
    <input required="" id="current_status" name="current_status" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="submit"></label>
  <div class="controls">
    <button id="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>
</div>

</fieldset>
</form>

<script type="text/javascript">
$(document).ready(function(){
  $("#details").validate({
    rules:
    {
      percent_completion:
            {
            maxlength: 3,
            number: true,
            range: [0, 100]
            },
    },

    errorClass: "help-inline"

  });
});
</script>

