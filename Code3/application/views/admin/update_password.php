
<?php
extract($_POST);

if(isset($update_password))
{
	
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
	
	
	$que=mysqli_query($conn,"select pass from admin");
	$row=mysqli_fetch_array($que);
    $pass=$row['pass'];
	if($op!=$pass)
		{
		$err="<font color='red'>You Enterd wrong old password</font>";
		}
		
	elseif($np!=$cp)
		{
		$err="<font color='red'>New Password and confirm password must be same</font>";
		}
	else
	{
		mysqli_query($conn,"update admin set pass='$cp'");
		
		$err="<font color='green'>Password have been Changed successfully !!</font>";
	}

}

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://localhost/Code3/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="http://localhost/Code3/css/metisMenu.min.css" rel="stylesheet">

    
    <!-- Custom CSS -->
    <link href="http://localhost/Code3/css/sb-admin-2.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Custom Fonts -->
    <link href="http://localhost/Code3/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    

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
<h3 class="page-header"><center>Change Password</center></h3>
<div class="col-lg-8" style="margin:15px;">
<form method="post">
<table border="0" bgcolor="" style="margin:70px;">
<tr>
	 <th><?php echo @$err; ?></th>
</tr>
	
<tr>
	<th height="87">Old Password:  
    <input type="password" name="op" value="" placeholder="enter your old password" class="form-control" required/></th>
</tr>
	
<tr>
	<th height="93">New Password:
    <input type="password" name="np" value="" placeholder="enter your new password" class="form-control"  required/><br /></th>
</tr>
 
<tr>
	<th height="87">Confirm Password:
    <input type="password" name="cp" value=""  placeholder="re-enter your new password" class="form-control" required/><br /></th>
</tr>
<tr>
	<th rowspan="2"><input type="submit" value="Update Password" name="update_password" class="btn btn-success"/></th>
</tr>
</table>
</form>
