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


<?php 
 $i=1;		 
         foreach ($data2 as $row)  
         {  
			echo "$i.";
			echo " ".$row->Dept_name." ";?><br><?php
  
			$i++;
            
			}  
         ?>  


		

</form>
</div>
</div>
</div>
</body>
</html>