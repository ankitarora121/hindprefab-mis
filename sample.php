<html>
<head>
<script language="javascript" type="text/javascript" src="jquery.js"></script>
<script language="javascript" type="text/javascript" src="jquery.gantt.js"></script>
<link rel="stylesheet" type="text/css" href="jquery.gantt.css" />

<script language="javascript" type="text/javascript">
<!--
$(function(){
	$("#gantt01").gantt({
	'type': 'month',
	'range': 50,
	'titles': ['Name', 'Type']
	});

	$('#gantt01').addTask({
	'titles': ['Layout Mapping','Planned'],
	'start_date': '20130731',
	'end_date': '20140813',
	'color': '#0000FF',
	});

	$('#gantt01').addTask({
	'titles': ['','Actual'],
	'start_date': '20130931',
	'end_date': '20141013',
	'color': '#FF00FF',
	});

});
//-->
</script>
</head>
<body>
<div id="gantt01"></div>
</body>
</html>
