<html>
<head>
<link rel="stylesheet" type="text/css" href="http://localhost/Code3/css/util.css">
<link rel="stylesheet" type="text/css" href="http://localhost/Code3/css/main.css">
</head>
<style>

</style>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>

<body>
<div class="limiter">	
<div class="container-login100">
<div class="wrap-login100">

	<form method="post" action="<?= base_url() ?>Crud/genUP">
<h1> Credentials Generation</h1>
<h3>Select Campus</h3>
<select name="myCampus" id="myCampus">
<?php 
$j=1;
foreach($data1 as $row) { 
$ccode=$row->Campus_code;
?>
<option value="<?=$row->Campus_code?>"><?=$row->Campus_name?></option>
<?php $j++;} ?>
</select> 

<h3>Select Department</h3>
<select name="myDept" id="myDept">
<?php 
$j=1;
foreach($data2 as $row) { ?>
<option value="<?=$row->Dept_code?>"><?=$row->Dept_name?></option>
<?php $j++;} ?>
</select> 
<br>
<h3>Select Programme</h3>
<select name="myPgm" id="myPgm">
<?php 
$j=1;
foreach($data3 as $row) { ?>
<option value="<?=$row->Pgm_code?>"><?=$row->Pgm_name?></option>
<?php $j++;} ?>
</select> 

<h3>Select Semester</h3>
<select name="mySem" id="mySem">
<Option value="II sem">II Sem</option>
<Option value="IV sem">IV Sem</option>
<Option value="VI sem">VI Sem</option>
</select> 
		 <input type="submit" name="save" value="Generate"/>

</form>
</div>
</div>
</div>
</body>
</html>