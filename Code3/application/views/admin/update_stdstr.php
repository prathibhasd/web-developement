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
	
	<script src="http://localhost/Code3/js/sweetalert.min.js"></script>

    <!-- Custom CSS -->
    <link href="http://localhost/Code3/css/modern-business.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom Fonts -->
    <link href="http://localhost/Code3/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

</head>
<script>

function myFunction()
{
			var id=document.getElementById("id").value;
			var pname=document.getElementById("pname").value;
			var sem=document.getElementById("sem").value;
			var str=document.getElementById("str").value;
			var dname=document.getElementById("dname").value;
			
			
				$.ajax({
									url:'update_str',
									type:"POST",
									data:{
										id: id,
										pname:pname,
										sem:sem,
										str:str,
										dname:dname
									},
									success:function(result)
									{
										swal({
											title: "Updated!",
											text: "Student Strength Details Updated Successfully!",
											icon: "success"
										}).then(function() {
											window.location = "search_std";
										});
									}
								});
				
			
			
}
 
</script>
<form method="POST" >
<div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 1">
            <div class="navbar-header">
                <a class="navbar-brand" href="dashboard.php">Online Student Feedback System for Mangalore University</a>
            </div>
            <!-- /.navbar-header -->
        </nav>

<h3><a href="<?= base_url() ?>Crud/dashboard" style="float: right;margin:15px;"><i class="fa fa-arrow-circle-left"></i> Back</a></h3>
<h3 class="page-header"><center>Update Student Strength Details</center></h3>
<div class="col-lg-8" style="margin:15px;">
<table border="0" bgcolor="#99FFCC" style="margin:30px;">
<tr>
	 <th><?php echo @$err; ?></th>
</tr>

<?php
	
foreach ($data as $row)
{

	echo "<tr>
	<td height='50' width='160'>Sl. No:  </th><th><input type='text' id='id' value='$row->sl_no' class='form-control' readonly /></th>
	</tr>";	

	echo "<tr>
	<td height='50' width='160'>Programme Name:  </th><th><input type='text' id='pname' value='$row->Pgm_name' class='form-control' readonly/></th>
	</tr>";	

	echo "<tr>
	<td height='50' width='30'>Sem:  </th><th><input type='text' id='sem' value='$row->Sem' class='form-control'/></th>
	</tr>";

	echo "<tr>
	<td height='50' width='30'>Student Strength:  </th><th><input type='text' id='str' value='$row->Std_strength' class='form-control'/></th>
	</tr>";

	foreach ($dept as $col)
	{

		echo "<tr>
		<td height='50' width='30'>Department Name:  </th><th><input type='text' id='dname' value='$col->Dept_name' class='form-control' readonly/></th>
		</tr>";

	}


}
?>
<tr>
    <td colspan="10" align="center"><button type="button" onclick="myFunction()" class="btn btn-success" id="save">Update</button></td>
 </tr>
</table>
</form>



</html>
