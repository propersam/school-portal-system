<!DOCTYPE>
<html>
<head>
    <title>School Fees Reminder</title>
    <style type="text/css">
    	h2{
    		border-bottom: solid 1px #ccc;
    		color: #60aee4;
    	}
    	.msg{
    		background-color: #efefef;
    		padding: 8px;
    	}
    </style>
</head>
 
<body>
<h2>Ecopillars' School Fees Reminder</h2>

<p class="msg">{{ $_POST['message'] }}</p>

<h3>Child Details: </h3>

<p><span style="font-weight: bold;">Child Name: </span> {{ $_POST['student']['firstname'] . ' ' . $_POST['student']['preferredname'] . ' ' . $_POST['student']['lastname'] }}</p>

 <!-- {{ print_r($_POST) }} -->
</body>
 
</html>