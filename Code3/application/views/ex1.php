<html>

<style>

</style>
<body>
	<form method="post" action="<?= base_url() ?>Crud/genUP">
<h1> Credentials Generation</h1>
<h3>Select Campus</h3>
<select name="myCampus" id="myCampus">
<?php 
$j=1;
foreach($data as $row) { ?>
<option value="<?=$row->Username?>"><?=$row->Password?></option>
<?php $j++;} ?>
</select> 
</html>