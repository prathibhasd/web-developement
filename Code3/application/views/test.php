<html>
<head>
<link rel="stylesheet" type="text/css" href="http://localhost/Code3/css/util.css">
<link rel="stylesheet" type="text/css" href="http://localhost/Code3/css/main.css">
</head>
<style>

</style>


<body>
<div class="limiter">	
<div class="container-login100">
<div class="wrap-login100">

	<form method="post" action="<?= base_url() ?>Crud/deptcheck">
<h1>Details of Credentials</h1>
<h3>Select Campus</h3>
<select name="myCampus" id="myCampus">
<option value="select">Select</option>
<?php 
$j=1;
foreach($data1 as $row) { ?>
<option value="<?=$row->Campus_code?>"><?=$row->Campus_name?></option>
<?php $j++;} ?>
</select> 

		 <input type="submit" name="save" value="Check"/>

</form>
</div>
</div>
</div>
</body>
</html>