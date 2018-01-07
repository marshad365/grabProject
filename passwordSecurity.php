<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta charset="utf-8"> 
        <meta name="description" content=""> 
        <meta name="author" content="pixelcave"> 
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0"> 
        <title>password And Security</title>         
        <link rel="stylesheet" href="css/bootstrap.min.css"> 
        <link rel="stylesheet" href="css/custom.css"> 
        <link href="css/font-awesome.min.css" rel="stylesheet"> 
    </head>     
    <body> 
        <?php require "inc/header.php"; ?>         
        <!-- END Site Header -->         
        <div id="page-wrappers"> 
            <!-- Section Find-Work Start -->             
            <section class="section-find-work"> 
                <div class="container">
                    <br>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <!-- Sidebar-nav -->
                            <br>
                            <h4>User Settings</h4>
                            <div class="list-group sidebar-options">
                                <a href="profileSettings.php" class="list-group-item">My Profile</a>
                                <a href="contactInfo.php" class="list-group-item">Contact Info</a>
                                <!--<a href="#" class="list-group-item">Profile Settings</a>-->
                                <a href="passwordSecurity.php" class="list-group-item active">Password & Security</a>
                                <a href="notificationSettings.php" class="list-group-item">Notification settings</a>
                            </div>
                            <br>
                        </div>
                        <!-- Sidebar-nav End -->
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <h3>Password & Security</h3>
                            <br>
                            <div class="panel panel-default account-summary-panel">
                                 <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-6">
                                            <h3>Password</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <br>
                                    <div class="account-summary-contents">
                                        <br>
                                        <div class="form-horizontal" method="POST" action="">
                                            <div class="form-group">
                                               <label><i class="fa fa-check-circle-o" style="color:green;margin-left:30px;" aria-hidden="true"></i>
													Password has been set</label><br>
												<div class="col-sm-8">
													<span style="margin-left:30px;">Choose a strong, unique password that's at least 10 characters long.</span>&nbsp;
												</div>
												<div class="col-sm-4">
													<a href="" class="btn-main-link btn-sm btn-hv btn-categories-edits pull-right">
														<span><i class="fa fa-pencil" aria-hidden="true"></i></span>&nbsp; Edit
													</a>
                                                </div>   
                                            </div>
                                            <br>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                          
                            <div class="panel panel-default account-summary-panel">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-6">
                                            <h3>Two-Step Verification</h3>
                                            <span>help protact your account by anabling extra layers of security</span>
                                        </div>
										
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <br>
									<div class="account-summary-contents">
                                        <br>
										<h4 style="margin-left:30px;">Security Question</h4>
										<label><i class="fa fa-check-circle-o" style="color:green;margin-left:30px;" aria-hidden="true"></i>
													Security question has been enabled</label><br>
												<div class="col-sm-8">
													<span style="margin-left:30px;">Confrim your identity with a question only you know the answer</span>&nbsp;
												</div>
										<div class="col-sm-4">
													<a href="" class="btn-main-link btn-sm btn-hv btn-categories-edits pull-right">
														<span><i class="fa fa-pencil" aria-hidden="true"></i></span>&nbsp; Edit
													</a>
                                                </div>		
                                        
                                        <br>  
                                    </div>
                                    
                                </div>
                            </div>
                            <br>
                        </div>
                        <!-- Contact info end -->
                        <br>
                    </div>
                    <br>
                </div>
                <br>
            </section> 
        </div>   
        <!-- End Section Contact info -->  
        		      
        <!-- Footer Start -->         
        <?php require "inc/footer.php"; ?>         
        <!-- End Footer --> 
                
        <script src="js/jquery.js"></script>         
        <script src="js/bootstrap.min.js"></script>         
        <script src="js/app.js"></script>                  
    </body>     
</html>