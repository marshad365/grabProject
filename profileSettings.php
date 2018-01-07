<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta charset="utf-8"> 
        <meta name="description" content=""> 
        <meta name="author" content="pixelcave"> 
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0"> 
        <title>Profile Settings</title>         
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
                                <a href="profileSettings.php" class="list-group-item active">My Profile</a>
                                <a href="contactInfo.php" class="list-group-item">Contact Info</a>
                                <!--<a href="#" class="list-group-item">Profile Settings</a>-->
                                <a href="passwordSecurity.php" class="list-group-item">Password & Security</a>
                                <a href="notificationSettings.php" class="list-group-item">Notification settings</a>
                            </div>
                            <br>
                        </div>
                        <!-- Sidebar-nav End -->
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <h3>Profile Settings</h3>
                            <br>
                            <!-- Account summary -->
                            <div class="panel panel-default account-summary-panel">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                            <h3>My Profile</h3>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
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
                                                <label class="col-sm-4">Username</label>
                                                <div class="col-sm-8">
                                                    <p>Imran</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4">Email</label>
                                                <div class="col-sm-8">
                                                    <p>imran22@gmail.com</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4">Address</label>
                                                <div class="col-sm-8">
                                                    <p>House # 123 Abbottabad, Pakistan</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4">University</label>
                                                <div class="col-sm-8">
                                                    <p>Comsats Abbottabad</p>
                                                </div>
                                            </div>
                                            <!--<div class="form-group">
                                                <label class="col-sm-4">Profile Completeness</label>
                                                <div class="col-sm-8">
                                                    <div class="job-profile-progress-box">
                                                        <span class="main-progress-bar"></span>
                                                        <span>100%</span>
                                                    </div>
                                                </div>
                                            </div>-->
                                        </div>
                                        <br>  
                                    </div>
                                </div>
                            </div>
                            <br>
                            <!-- Profile summary -->
                            <!--<div class="panel panel-default account-summary-panel">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                                            <h3>My Profile</h3>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <br>
                                            <a href="" class="text-green">View my profile as others see it</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <br>
                                    <div class="account-summary-contents">
                                        <br>
                                        <div class="form-horizontal" method="POST" action="">
                                            <div class="form-group">
                                                <label class="col-sm-4">Visibility</label>
                                                <div class="col-sm-8">
                                                    <span>Locked Private</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4">Project Prefences <span class="text-green">&nbsp;<i class="fa fa-question" aria-hidden="true"></i></span></label>
                                                <div class="col-sm-7">
                                                    <select class="form-control input-types" name="selectCountry">
                                                        <option value="1">Both long-term and one-time projects</option>
                                                        <option value="2">Long-term projects only</option>
                                                        <option value="3">One-time projects only</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-1"></div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-sm-4">Responsiveness <span class="text-green">&nbsp;<i class="fa fa-question" aria-hidden="true"></i></span></label>
                                                <div class="col-sm-8">
                                                    <span class="text-muted">Your responsiveness will be determined In ipsum lectus, pharetra vel rutrum at, gravida sollicitudin ipsum. Nam id pharetra felis. In ipsum lectus, pharetra vel rutrum at, gravida sollicitudin ipsum.</span>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="col-sm-4">Earnings Privacy</label>
                                                <div class="col-sm-8">
                                                    <span>Want to keep your earning private?</span>
                                                    <p><a href="" class="text-green">Upgrade to a Freelancer Plus membership</a> to enable this setting.</p>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>-->
                            <!-- experience summary -->
                            <div class="panel panel-default account-summary-panel">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-9">
                                            <h3>My Skills</h3>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <br>
                                    <div class="experience-level-settings">
                                        <div class="row text-center">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="main-box">
                                                    <h4>Skills 1</h4>
                                                    <p>Starting to build experience in my field of work</p>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="main-box experience-active">
                                                    <h4>Skills 2</h4>
                                                    <p>A few years of professional experience in my field</p>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="main-box">
                                                    <h4>Skills 3</h4>
                                                    <p>Many years of professional experience doing complex projects</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <br>  
                                    </div>
                                </div>
                            </div>
                            <!--<div class="panel panel-default account-summary-panel">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-9">
                                            <h3>Experience Level</h3>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <br>
                                    <div class="experience-level-settings">
                                        <div class="row text-center">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="main-box">
                                                    <h4>Entry Level</h4>
                                                    <p>Starting to build experience in my field of work</p>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="main-box experience-active">
                                                    <h4>Intermediate</h4>
                                                    <p>A few years of professional experience in my field</p>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="main-box">
                                                    <h4>Expert</h4>
                                                    <p>Many years of professional experience doing complex projects</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <br>  
                                    </div>
                                </div>
                            </div>-->
                            <br>
                            <!-- categories summary -->
                            <!--<div class="panel panel-default account-summary-panel">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-6">
                                            <h3>Categories</h3>
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
                                    <div class="categories-summary-contents">
                                        
                                        <div class="categories-settings-details">
                                            <h4>Web, Mobile & Software Dev</h4>
                                            <p>Web Development, Mobile Development, Desktop Software Development, Ecommerce Development, Web & Mobile Design, Product Management and Other - Software Development</p>
                                        </div>
                                        <br>
                                        <div class="categories-settings-details">
                                            <h4>Design & Creative</h4>
                                            <p>Logo Design & Branding and Other - Design Creative</p>
                                        </div>
                                        <br>  
                                    </div>
                                </div>
                            </div>-->
                            <br>
                        </div>
                        <!-- Profile Settings End -->
                        <br>
                    </div>
                    <br>
                </div>
                <br>
            </section> 
        </div>   
        <!-- End Section profile -->
        
        <!-- Footer Start -->         
        <?php require "inc/footer.php"; ?>          
        <!-- End Footer -->         
                
        <script src="js/jquery.js"></script>         
        <script src="js/bootstrap.min.js"></script>         
        <script src="js/app.js"></script>         
    </body>     
</html>