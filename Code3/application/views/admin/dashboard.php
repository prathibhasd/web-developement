
<!DOCTYPE html>
<html lang="en">

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
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


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

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard">Online Student Feedback System for Mangalore University</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li><a href="change_pass"><i class="fa fa-gear fa-fw"></i>Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="index"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
						
						<li>
                            <a href="#"><i class="fa fa-university"></i> Campus<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                
								 <li>
                                    <a href="add_campus"><i class="fa fa-plus fa-fw"></i> Add Campus</a>
                                 </li>
								 <li>
                                    <a href="manage_campus"><i class="fa fa-eye"></i> Manage Campus</a>
                                </li> 
                                       
							</ul>
                        </li>
						
						<li>
						
                            <a href="#"><i class="fa fa-university"></i> Department<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add_dept"><i class="fa fa-plus fa-fw"></i> Add Department</a>
                                </li>
								 <li>
                                    <a href="manage_dept"><i class="fa fa-eye"></i> Manage Department </a>
                                </li>                           
							</ul>
						</li>
						
						<li>
							<a href="#"><i class="fa fa-university"></i> Programme<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add_pgm"><i class="fa fa-plus fa-fw"></i> Add Programme</a>
                                </li>
								 <li>
                                    <a href="search_pgm"><i class="fa fa-eye"></i> Manage Programme </a>
                                </li>                           
							</ul>
						</li>
						
						<li>
                            <a href="#"><i class="fa fa-university"></i> Course<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add_course"><i class="fa fa-plus fa-fw"></i> Add Course</a>
                                </li>
								 <li>
                                    <a href="search_course"><i class="fa fa-eye"></i> Manage Course</a>
                                </li>                           
							</ul>
						</li>
                        
						<li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Faculty<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add_faculty"><i class="fa fa-plus fa-fw"></i> Add Faculty</a>
                                </li>
								 <li>
                                    <a href="search_faculty"><i class="fa fa-eye"></i> Manage faculty</a>
                                </li>                           
							</ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
						
						<li>
                            <a href="#"><i class='fas fa-user-graduate'></i> Student<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                
								 <li>
                                    <a href="add_studentstr"><i class="fa fa-plus fa-fw"></i> Add Student Strength</a>
                                </li> 
                                <li>
                                    <a href="search_std"><i class="fa fa-eye"></i> Manage Student Strength</a>
                                </li> 
							             
							</ul>
                        </li>

                        
						
						<li>
						 <a href="#"><i class='fas fa-key'></i> Credentials<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="gencredview"><i class="fa fa-plus fa-fw"></i> Generate Credentials</a>
                                </li>
								 <li>
                                    <a href="viewcredentials"><i class="fa fa-eye"></i> View Credentials</a>
                                </li>                           
							</ul>
						</li>
	
							<!-- feedback-->
							<li>
							 <a href="#"><i class="fa fa-user fa-book"></i> Feedback Report<span class="fa arrow"></span></a>
							   <ul class="nav nav-second-level">
								<li><a href="QS1report"><i class="fa fa-eye"></i> Questionnaire 1</a></li>
								<li><a href="QS2report"><i class="fa fa-eye"></i> Questionnaire 2</a></li>
								<li><a href="QS3report"><i class="fa fa-eye"></i> Questionnaire 3</a></li>        
							  </ul>
						   </li>
							<!--feedback end-->
						
				        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                   
                	<?php 
								@$id=$_GET['id'];
								@$info=$_GET['info'];
								if($info!="")
								{
									
								}
								else
								{
								include('dashboard_home.php');
								}
							
							
							?>
				
				</div>
                <!-- /.col-lg-12 -->
            </div>
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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
