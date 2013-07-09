<?php include "_barebones.php"; ?>

<ul class="breadcrumb">
  <li><a href="login.php">Home</a><span class="divider">/</span></li>
  <li><a href="adminpanel.php">Admin Panel</a><span class="divider">/</span></li>
  <li><a href="viewandedit.php">View and Edit Projects</a><span class="divider">/</span></li>
  <li class="active">Project Details</li>
</ul>

<?php
session_start();
$_SESSION["viewingproject"]=$_POST["rad"];

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

<center><button id="enable" class="btn" style="margin-bottom:20px">Enable/Disable Edit</button><br><a href="gantt.php">GANTTLOL</a></center>

<?php

$con=mysqli_connect( "127.0.0.1", "ankit", "itsover", "hpl" );
$query1='SELECT * FROM `projectdetails` where project_id ="' . $_POST["rad"] . '" ORDER BY planned_start';
$result = mysqli_query( $con, $query1);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
if ( mysqli_connect_errno() ) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


echo <<<EOF
<table class="table table-hover table-bordered" id="displaytable">
<thead><tr>
<th>Name</th>
<th>Planned Start</th>
<th>Planned Finish</th>
<th>Actual Start</th>
<th>Actual Finish</th>
<th width="10%">% Completion</th>
<th>Current Status</th>
</tr></thead>
EOF;

while ( $row = mysqli_fetch_array( $result ) ) {

  echo "<tr>";
    echo '<td><a href="#" data-url="scripteditdetails.php" data-type="text" id="name" data-pk="'.$row['sno'] . '">' . $row['name'] . '</a></td>';
    echo '<td><a href="#" data-url="scripteditdetails.php" data-type="date" id="planned_start" data-pk="'.$row['sno'] . '">' . $row['planned_start'] . '</a></td>';
    echo '<td><a href="#" data-url="scripteditdetails.php" data-type="date" id="planned_finish" data-pk="'.$row['sno'] . '">' . $row['planned_finish'] . '</a></td>';
    echo '<td><a href="#" data-url="scripteditdetails.php" data-type="date" id="actual_start" data-pk="'.$row['sno'] . '">' . $row['actual_start'] . '</a></td>';
    echo '<td><a href="#" data-url="scripteditdetails.php" data-type="date" id="actual_finish" data-pk="'.$row['sno'] . '">' . $row['actual_finish'] . '</td>';
    echo '<td><a href="#" data-url="scripteditdetails.php" data-type="text" id="percent_completion" data-pk="'.$row['sno'] . '">' . $row['percent_completion'] . '</a>%</td>';
    echo '<td><a href="#" data-url="scripteditdetails.php" data-type="text" id="current_status" data-pk="'.$row['sno'] . '">' . $row['current_status'] . '</a></td>
  </tr>';
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
    <input required="" name="name" type="text" placeholder="" class="input-xlarge" required="">
    
  </div>
</div>


<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="planned_start">Planned Start</label>
  <div class="controls">
    <input name="planned_start" type="text" placeholder="" class="input-xlarge datepicker" data-date-format="yyyy-mm-dd" >
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="planned_finish">Planned Finish</label>
  <div class="controls">
    <input name="planned_finish" type="text" placeholder="" class="input-xlarge datepicker" data-date-format="yyyy-mm-dd" >
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="actual_start">Actual Start</label>
  <div class="controls">
    <input name="actual_start" type="text" placeholder="" class="input-xlarge datepicker" data-date-format="yyyy-mm-dd" >
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="actual_finish">Actual Finish</label>
  <div class="controls">
    <input name="actual_finish" type="text" placeholder="" class="input-xlarge datepicker" data-date-format="yyyy-mm-dd" >
    
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="percent_completion">Percent Completion</label>
  <div class="controls">
    <input name="percent_completion" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="current_status">Current Status</label>
  <div class="controls">
    <input name="current_status" type="text" placeholder="" class="input-xlarge">
    
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

  // $('#name, #percent_completion, #current_status').editable({
  //   type: 'text',
  //   url: 'scripteditdetails.php'
  // });

   $('#enable').click(function() {
     
      $('#name,#planned_start,#planned_finish,#actual_finish,#actual_start,#percent_completion,#current_status').editable('toggleDisabled');

  });  
      
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
  $.fn.editable.defaults.mode = 'inline';

});
</script>

