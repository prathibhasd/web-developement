<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Online Student Feedback System for Mangalore University</title>
	
	<!-- Bootstrap Core CSS -->
    <link href="http://localhost/Code3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://localhost/Code3/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://localhost/Code3/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

</head>


<div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 1">
            <div class="navbar-header">
                <a class="navbar-brand" href="dashboard.php">Online Student Feedback System for Mangalore University</a>
            </div>
            <!-- /.navbar-header -->
        </nav>

<h3><a href="<?= base_url() ?>Crud/dashboard" style="float: right;margin:15px;"><i class="fa fa-arrow-circle-left"></i> Back</a></h3>
<h3 class="page-header"><center>Manage Faculty</center></h3>
<div class="col-lg-8" style="margin:15px;">

<form method="post" action="<?= base_url() ?>Crud/manage_faculty">

<div class="control-group form-group">
    	<div class="controls">
        	<label>Select Campus Name</label>
<select name="myCampus" id="myCampus" class="form-control" required>
<option value="select">Select</option>
<?php 
$j=1;
foreach($campus as $row) { ?>
<option value="<?=$row->Campus_code?>"><?=$row->Campus_name?></option>
<?php $j++;} ?>
</select> 

</div></div>

<div class="control-group form-group">
    	<div class="controls">
        	<label>Select Department Name</label>
<select name="myDept" id="myDept" name="myDept" class="form-control" required>
<option selected disabled>Select</option>
</select> 
<br>

<br><br><br>
</div></div>

<select style="display:none" name="myPgm" id="myPgm" name="myPgm">
<option selected disabled>Select</option>
</select> 

<br><br>
		<div class="control-group form-group">
    	<div class="controls">
            	<input type="submit" class="btn btn-success" name="save" value="Search">
        </div>
  	</div>

</form>
</div>
</div>
</div>
</body>

<script>
$('#myCampus').on('change',function()
{
	var campus=this.value;
	//console.log(campus);
	$.ajax({
		url:'deptget',
		type:"POST",
		data:{
			Campus_code: campus
		},
		success:function(result)
		{
			$('#myDept').html(result);
			//console.log(result);
		}
	})
});

$('#myDept').on('change',function()
{	
	var campus=$('#myCampus').val();
	var dept=this.value;
	//console.log(campus);
	$.ajax({
		url:'pgmget',
		type:"POST",
		data:{
			Campus_code: campus,
			Dept_code: dept
		},
		success:function(result)
		{
			$('#myPgm').html(result);
			//console.log(result);
		}
	})
});


$('#type').on('change',function()
{	
	var type=this.value;
	//console.log(type);
	if(type=="Guest Faculty")
	{
		
		$("#myPgm").show();
	}
	else
	{
		$("#myPgm").hide();
	}
	
});

</script>
</html>