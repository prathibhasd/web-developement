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

<div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 1">
            <div class="navbar-header">
                <a class="navbar-brand" href="dashboard.php">Online Student Feedback System for Mangalore University</a>
            </div>
            <!-- /.navbar-header -->
        </nav>
<h3><a href="<?= base_url() ?>Crud/dashboard" style="float: right;margin:15px;"><i class="fa fa-arrow-circle-left"></i> Back</a></h3>

<h3 class="page-header"><center>Add Programme</center></h3>
<div class="col-lg-8" style="margin:15px;">
	<form method="post" action='<?= base_url() ?>Crud/insert_pgm'>
	
	<div class="control-group form-group">
    	<?php if (isset($message)) :?>
    	<div class="controls">
		<script>
        	swal({
						title: "Inserted!",
						text: "Programme Details Inserted Successfully!",
						icon: "success"
				}).then(function() {
						window.location = "search_pgm";
				});
				</script>
        </div>
		<?php endif; ?>
		
		<?php if (isset($error)) :?>
    	<div class="controls">
        	<script>
        	swal({
						title: "Error!",
						text: "Programme Details Alredy Exists!",
						icon: "error"
				}).then(function() {
						window.location = "add_pgm";
				});
				</script>
        </div>
		<?php endif; ?>
   	</div>
	
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Campus Name</label>
				<select name="fcampus" id="fcampus" class="form-control" required>
					<option value="">Select</option>
						<?php 
							$j=1;
								foreach($cdata as $row) { ?>
								<option value="<?=$row->Campus_code?>"><?=$row->Campus_name?></option>
						<?php $j++;} ?>
					</select>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Department Name</label>
					<select name="dname" id="dname" class="form-control" required>
					<option value="">Select</option>
					<option></option>
					<option></option>
					</select>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Enter Programme Code</label>
            	<input type="text" name="pcode"  placeholder="ex: CS, EC, CM" pattern="^[a-zA-Z]*$" title="Valid characters: Uppercase Letters and No Space" id="pcode" class="form-control" required>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Enter Programme Name</label>
            	<input type="text" name="pname"  pattern="^[a-zA-Z ()]*$" title="Valid characters: Alphabets, and ()" placeholder="ex: MSc Computer Science, MA Economics, Master of Commerce (Mcom)" id="pname" class="form-control" required>
        </div>
    </div>
	
	
	<div class="control-group form-group">
    	<div class="controls">
            	<input type="submit" class="btn btn-success" name="save" value="Add New Programme">
        </div>
  	</div>
	</form>


</div>

<script>

$('#fcampus').on('change',function()
{
	var campus=this.value;
	console.log(campus);
	$.ajax({
		url:'deptget',
		type:"POST",
		data:{
			Campus_code: campus
		},
		success:function(result)
		{
			$('#dname').html(result);
			//console.log(result);
		}
	})
});


</script>
</html>
