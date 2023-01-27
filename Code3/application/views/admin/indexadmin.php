<?php
	
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://localhost/Code3/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="http://localhost/Code3/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://localhost/Code3/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://localhost/Code3/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action='<?= base_url() ?>Crud/adminlogin'>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="uname" id="uname" type="text" autofocus required placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="pass" id="pass" type="password" required>
                                </div>
                                
                                
								<div class="form-group">
                                    <input name="login" type="submit" value="Login" class="btn btn-lg btn-success btn-block">
                                </div>
								
								<?php
									echo $this->session->flashdata("error");
								?>
								
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="http://localhost/Code3/css/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://localhost/Code3/css/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="http://localhost/Code3/css/metisMenu.min.js"></script>

  
    <!-- Custom Theme JavaScript -->
    <script src="http://localhost/Code3/css/sb-admin-2.js"></script>


</body>

</html>
