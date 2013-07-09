<?php
	session_start();

	if ( !isset( $_COOKIE["Key_my_site"] ) ) {
		header( "Location: login.php" );
	}

?>

<html>
<head>
<link href="css/style.css" rel="stylesheet" media="screen">
<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery.gantt.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.gantt.css" />
<script language="javascript" type="text/javascript">
<!--
$(function(){
	$("#gantt01").gantt({
	'type': 'month',
	'range': 70,
	'titles': ['Name', ' ']
	});

	<?php
		$con=mysqli_connect( "127.0.0.1", "ankit", "itsover", "hpl" );
		$query1='SELECT * FROM `projectdetails` where project_id ="' . $_SESSION["viewingproject"] . '" ORDER BY planned_start';
		$result = mysqli_query( $con, $query1);
		if (!$result) {
		    printf("Error: %s\n", mysqli_error($con));
		    exit();
		}
		if ( mysqli_connect_errno() ) {
		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		while ( $row = mysqli_fetch_array( $result ) ) {
			$ps = str_replace("-","",$row['planned_start']); 
			$pf = str_replace("-","",$row['planned_finish']);
			$as = str_replace("-","",$row['actual_start']);
			$af = str_replace("-","",$row['actual_finish']);
			$n = $row['name'];
echo <<<EOD
$('#gantt01').addTask({
'titles': ['$n','Planned'],
'start_date': '$ps',
'end_date': '$pf',
'color': '#0000FF',
});

$('#gantt01').addTask({
'titles': ['','Actual'],
'start_date': '$as',
'end_date': '$af',
'color': '#FF00FF',
});
		
EOD;
		}
	?>

	

});
//-->
</script>
</head>
<body>
<img src="img/COVER.gif" id="headimg" width="100%" style="padding-left: 0px;">
<ul class="breadcrumb">
  <li><a href="login.php">Home</a><span class="divider">/</span></li>
  <li class="active">Gantt Chart</li>
</ul>
<div id="gantt01"></div>
</body>
</html>
