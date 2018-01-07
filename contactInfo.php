<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta charset="utf-8"> 
        <meta name="description" content=""> 
        <meta name="author" content="pixelcave"> 
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0"> 
        <title>Contact Settings</title>         
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
                                <a href="contactInfo.php" class="list-group-item active">Contact Info</a>
                                <!--<a href="#" class="list-group-item">Profile Settings</a>-->
                                <a href="passwordSecurity.php" class="list-group-item">Password & Security</a>
                                <a href="notificationSettings.php" class="list-group-item">Notification settings</a>
                            </div>
                            <br>
                        </div>
                        <!-- Sidebar-nav End -->
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <h3>Contact Info</h3>
                            <br>
                            <div class="panel panel-default account-summary-panel">
                                 <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-6">
                                            <h3>Accounts</h3>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                            <br>
                                            <a href="" class="btn-main-link btn-sm btn-hv btn-categories-edits">
                                                <span><i class="fa fa-pencil" aria-hidden="true"></i></span>&nbsp; Edit
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <br>
                                    <div class="account-summary-contents">
                                        <br>
                                        <div class="form-horizontal" method="POST" action="">
                                            <div class="form-group">
                                                <label class="col-sm-4">First Name</label>
                                                <div class="col-sm-8">
                                                    <span>Imran</span>&nbsp; 
                                                </div>
                                            </div>
											 <div class="form-group">
                                                <label class="col-sm-4">Last Name</label>
                                                <div class="col-sm-8">
                                                    <span>Khan</span>&nbsp; 
                                                </div>
                                            </div>
											 <div class="form-group">
                                                <label class="col-sm-4">Email</label>
                                                <div class="col-sm-8">
                                                    <span>imran22@gmail.com</span>&nbsp; 
                                                </div>
                                            </div>
                                        
                                            <br>
                                            <p class="text-center"><a href="" class="text-green pull-right">Close  My Account</a></p>
                                        </div>
                                        <br>  
                                    </div>
                                </div>
                            </div>
                            <br>
                          
                            <div class="panel panel-default account-summary-panel">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-6">
                                            <h3>Location</h3>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                            <br>
                                            <a href="" class="btn-main-link btn-sm btn-hv btn-categories-edits">
                                                <span><i class="fa fa-pencil" aria-hidden="true"></i></span>&nbsp; Edit
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <br>
									<div class="account-summary-contents">
                                        <br>
                                        <div class="form-horizontal" method="POST" action="">
                                            <div class="form-group">
                                                <label class="col-sm-4">Time Zone</label>
                                                <div class="col-sm-8">
                                                    <span>UC+05:00 Islamabad ,Karachi</span>&nbsp; 
                                                </div>
                                            </div>
											 <div class="form-group">
                                                <label class="col-sm-4">Address</label>
                                                <div class="col-sm-8">
                                                    <span>Abbottabad KPK</span>&nbsp; 
                                                </div>
                                            </div>
											 <div class="form-group">
                                                <label class="col-sm-4">Phone</label>
                                                <div class="col-sm-8">
                                                    <span>923098647647</span>&nbsp; 
                                                </div>
                                            </div>
                                        
                                            <br>
                                        </div>
                                        <br>  
                                    </div>
                                    
                                </div>
                            </div>
                            <br>
                            
							<div class="panel panel-default account-summary-panel">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-9">
                                            <h3>Invoice Address (Optional)</h3>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <br>
                                    <div class="experience-level-settings">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-8 col-sm-12 col-xs-12">
                                                <div>
                                                    <p>This address will b displayed on the inovice sent to clients</p>
													<h4>Address</h4>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <br>  
                                    </div>
                                </div>
                            </div>
                            <br>
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