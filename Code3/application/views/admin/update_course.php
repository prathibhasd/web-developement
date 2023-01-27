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
<script>

function myFunction()
{
			var id=document.getElementById("id").value;
			var ccode=document.getElementById("ccode").value;
			var cname=document.getElementById("cname").value;
			var pname=document.getElementById("pname").value;
			var dname=document.getElementById("dname").value;
			var campcode=document.getElementById("campcode").value;
			
				$.ajax({
									url:'update_course',
									type:"POST",
									data:{
										pid: id,
										crcode:ccode,
										crname:cname,
										pname:pname,
										dname:dname,
										ccode:campcode
										
									},
									success:function(result)
									{
										//console.log(result);
										swal({
											title: "Updated!",
											text: "Course Details Updated Successfully!",
											icon: "success"
										}).then(function() {
											window.location = "search_course";
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
<h3 class="page-header"><center>Update Course Details</center></h3>
<div class="col-lg-8" style="margin:15px;">
<table border="0" bgcolor="#99FFCC" style="margin:30px;">
<tr>
	 <th><?php echo @$err; ?></th>
</tr>

<?php
	
foreach ($data as $row)
{

echo "<tr>
<td height='50' width='160'>Course No:  </th><th><input type='text' id='id' value='$row->C_no' class='form-control' readonly /></th>
</tr>";	

echo "<tr>
<td height='50' width='160'>Course Code:  </th><th><input type='text' id='ccode' value='$row->course_code' class='form-control' /></th>
</tr>";	

echo "<tr>
<td height='50' width='160'>Course Name:  </th><th><input type='text' id='cname' value='$row->course_name' class='form-control'/></th>
</tr>";	

echo "<tr>
<td height='50' width='30'>Programme Name:  </th><th><input type='text' id='pname' value='$row->programme_name' class='form-control' readonly/></th>
</tr>";

foreach($dept as $col)
{

echo "<tr>
<td height='50' width='30'>Department Name:  </th><th><input type='text' id='dname' value='$col->Dept_name' class='form-control' readonly /></th>
</tr>";

}

echo "<tr>
<td height='50' width='30'>Campus_code:  </th><th><input type='text' id='campcode' value='$row->campus_code' class='form-control' readonly /></th>
</tr>";

}
?>
<tr>
    <td colspan="10" align="center"><button type="button" onclick="myFunction()" class="btn btn-success" id="save">Update</button></td>
 </tr>
</table>
</form>



</html>
