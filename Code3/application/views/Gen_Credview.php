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
		<script src="http://localhost/Code3/js/sweetalert.min.js"></script>

    <!-- Custom Fonts -->
    <link href="http://localhost/Code3/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

</head>

<body>
<div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 1">
            <div class="navbar-header">
                <a class="navbar-brand" href="dashboard.php">Online Student Feedback System for Mangalore University</a>
            </div>
            <!-- /.navbar-header -->
        </nav>
<h3><a href="<?= base_url() ?>Crud/dashboard" style="float: right;margin:15px;"><i class="fa fa-arrow-circle-left"></i> Back</a></h3>
<h3 class="page-header"><center>Generate Credentials</center></h3>
<div class="col-lg-8" style="margin:15px;">


<div class="control-group form-group">
	<?php if (isset($message)) :?>
    	<div class="controls">
		<script>
        	swal({
						title: "Generated!",
						text: "Credentials Generated Successfully!",
						icon: "success"
				}).then(function() {
						window.location = "viewcredentials";
				});
				</script>
        </div>
		<?php endif; ?>
		
		<?php if (isset($error)) :?>
    	<div class="controls">
        	<script>
        	swal({
						title: "Error!",
						text: "Credentials Already Generated",
						icon: "error"
				}).then(function() {
						window.location = "gencredview";
				});
				</script>
        </div>
		<?php endif; ?>
		
		<?php if (isset($error1)) :?>
    	<div class="controls">
        	<script>
        	swal({
						title: "Error!",
						text: "Student Strength not Found",
						icon: "error"
				}).then(function() {
						window.location = "gencredview";
				});
				</script>
        </div>
		<?php endif; ?>
		
		<?php if (isset($error2)) :?>
    	<div class="controls">
        	<script>
        	swal({
						title: "Error!",
						text: "not inserted",
						icon: "error"
				}).then(function() {
						window.location = "gencredview";
				});
				</script>
        </div>
		<?php endif; ?>
   	</div>
	

	<form method="post" action="<?= base_url() ?>Crud/genUP">
	
	
<div class="control-group form-group">
    	<div class="controls">
        	<label>Campus: </label>
					<select name="myCampus" id="myCampus" class="form-control" required>
					<option value="select">Select</option>
					<?php 
					$j=1;
					foreach($data1 as $row) { ?>
					<option value="<?=$row->Campus_code?>"><?=$row->Campus_name?></option>
					<?php $j++;} ?>
					</select> 
		</div>
</div>


<div class="control-group form-group">
    	<div class="controls">
			<label>Department: </label>
			<select name="myDept" id="myDept" name="myDept" class="form-control" required>
			<option selected disabled>Select</option>
			</select> 
		</div>
</div>


<div class="control-group form-group">
    	<div class="controls">
			<label>Programme: </label>
				<select name="myPgm" id="myPgm" name="myPgm" class="form-control" required>
				<option selected disabled>Select</option>
				</select> 		
	</div>
</div>

<div class="control-group form-group">
    	<div class="controls">
			<label>Semester: </label>
					<select name="mySem" id="mySem" name="mySem" class="form-control" required>
					<Option value="">Select</option>
					<Option value="I sem">I Sem</option>
					<Option value="II sem">II Sem</option>
					<Option value="III sem">III Sem</option>
					<Option value="IV sem">IV Sem</option>
					<Option value="V sem">V Sem</option>
					<Option value="VI sem">VI Sem</option>
					</select> 
					
	</div>
</div>				
		 <div class="control-group form-group">
    	<div class="controls">
            	<input type="submit" class="btn btn-success" name="save" value="Generate">
        </div>
  	</div>

</form>
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

</script>
</html>