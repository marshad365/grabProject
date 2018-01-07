<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta charset="utf-8"> 
        <meta name="description" content=""> 
        <meta name="author" content="pixelcave"> 
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0"> 
        <title>Notification Settings</title>         
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
                                <a href="passwordSecurity.php" class="list-group-item">Password & Security</a>
                                <a href="notificationSettings.php" class="list-group-item active">Notification settings</a>
                            </div>
                            <br>
                        </div>
                        <!-- Sidebar-nav End -->
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <h3>Notification Settings</h3>
                            <br>
                            <div class="panel panel-default notification-settings-panel">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                            <h3>Messages</h3>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="notification-settings-contents">
                                        <h4>Desktop</h4>
                                        <br>
                                        <div class="form-horizontal" method="POST" action="">
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <p>Show notifications for:</p>
                                                    <select class="form-control input-types" name="selectActivity">
                                                        <option value="1">All activity</option>
                                                        <option value="2">China</option>
                                                        <option value="3">UK</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-1">
                                                </div>
                                                <div class="col-sm-7">
                                                    <br>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="remember_me" value="">Also play a sound</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <p>Increment message counter for:</p>
                                                    <select class="form-control input-types" name="selectActivity">
                                                        <option value="1">All activity</option>
                                                        <option value="2">China</option>
                                                        <option value="3">UK</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-8">
                                                </div>
                                            </div>
                                            <br>
                                        </div>  
                                    </div>
                                    
                                    <div class="notification-settings-contents">
                                        <h4>Mobile</h4>
                                        <br>
                                        <div class="form-horizontal" method="POST" action="">
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <p>Send push notifications for:</p>
                                                    <select class="form-control input-types" name="selectActivity">
                                                        <option value="1">All activity</option>
                                                        <option value="2">China</option>
                                                        <option value="3">UK</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-1">
                                                </div>
                                                <div class="col-sm-7">
                                                    <br>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="remember_me" value="">Also play a sound</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <p>Increment message counter for:</p>
                                                    <select class="form-control input-types" name="selectActivity">
                                                        <option value="1">All activity</option>
                                                        <option value="2">China</option>
                                                        <option value="3">UK</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-8">
                                                </div>
                                            </div>
                                            <br>
                                        </div> 
                                    </div>
                                    
                                    <div class="notification-settings-contents">
                                        <h4>Email</h4>
                                        <br>
                                        <div class="form-horizontal" method="POST" action="">
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <p>Send an email with unread activity for:</p>
                                                    <select class="form-control input-types" name="selectActivity">
                                                        <option value="1">All activity</option>
                                                        <option value="2">Some</option>
                                                        <option value="3">Some</option>
                                                    </select>
                                                    <br>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="remember_me" value="">Only send offline or idle</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                </div>
                                                <div class="col-sm-4">
                                                    <p>&nbsp;</p>
                                                    <select class="form-control input-types" name="selectActivity">
                                                        <option value="1">Every 15 Minutes</option>
                                                        <option value="2">20</option>
                                                        <option value="3">30</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <br>
                            <!-- Email Settings -->
                            <div class="panel panel-default account-summary-panel">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <h3>Other Grab Project Email Updates</h3>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <br>
                                    <!--<div class="notification-settings-contents">
                                        <p>Send email notification to a****abc@gmail.com when...</p>
                                        <br>
                                        <div class="form-horizontal" method="POST" action="">
                                            <div class="form-group">
                                                <div class="col-sm-7">
                                                    <h4>Recruiting</h4>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p>Recieve recruiting emails for:</p>
                                                    <select class="form-control input-types" name="selectJobs">
                                                        <option value="1">Only Jobs I Posted</option>
                                                        <option value="2">All Jobs</option>
                                                        <option value="3">Some Jobs</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-1"></div>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">A job is posted or modified</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">A proposal is recieved</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">An interview is accepted or offer is declined or modified</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">An interview or offer is declined or wihtdrawn</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">A job posting will expire soon</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">A job posting expired</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">No interviews have been initiated</label>
                                            </div>
                                        </div>
                                        <br> 
                                        <br> 
                                    </div>-->
                                    
                                    <!--<div class="notification-settings-contents">
                                        
                                        <div class="form-horizontal" method="POST" action="">
                                            <div class="form-group">
                                                <div class="col-sm-7">
                                                    <h4>Freelancer and Agency Proposals</h4>
                                                </div>
                                                <div class="col-sm-4">
                                                </div>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">A proposal is submitted</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">An interview is initiated</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">An offer or interview invitation is recieved</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">An offer or interview invitation is wihtdrawn</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">A proposal is rejected</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">A job I applied to is modified or canceled</label>
                                            </div>
                                        </div>
                                        <br><br> 
                                    </div>-->
                                    
                                    <!--<div class="notification-settings-contents">
                                        <div class="form-horizontal" method="POST" action="">
                                            <div class="form-group">
                                                <div class="col-sm-7">
                                                    <h4>Contracts</h4>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p>Recieve contract emails for:</p>
                                                    <select class="form-control input-types" name="selectJobs">
                                                        <option value="1">Only Freelancers I Hired</option>
                                                        <option value="2">All Freelancers</option>
                                                        <option value="3">Some Freelancers</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-1"></div>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">A hire is made or a contract begins</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">Time logging begins</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">A contract ends</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">A timelog is ready for review</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">Feedback changes are made</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">Daily snapshot of time recorded by your freelancers</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">Weekly billing digest</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">A contract is going to be automatically paused</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">Other contract related messages</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">Payment receipts and other financial related emails</label>
                                            </div>
                                        </div>
                                        <br><br> 
                                    </div>-->
                                    
                                    <!--<div class="notification-settings-contents">
                                        <div class="form-horizontal" method="POST" action="">
                                            <div class="form-group">
                                                <div class="col-sm-7">
                                                    <h4>Groups & Inivitations</h4>
                                                </div>
                                                <div class="col-sm-4">
                                                </div>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">Group membership events occur</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">Someone forwards me a freelancer's profile</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">Somenone sends me an invitation</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">Team access is revoked</label>
                                            </div>
                                        </div> 
                                        <br>
                                        <br>
                                    </div>-->
                                    
                                    <!--<div class="notification-settings-contents">
                                        <div class="form-horizontal" method="POST" action="">
                                            <div class="form-group">
                                                <div class="col-sm-7">
                                                    <h4>Miscellaneous</h4>
                                                </div>
                                                <div class="col-sm-4">
                                                </div>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">GrabProject has a tip to help me start</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">Notify me of GrabProject events happening in my local area</label>
                                            </div>
                                        </div> 
                                        <br><br>
                                    </div>-->
                                    
                                    <div class="notification-settings-contents">
                                        <div class="form-horizontal" method="POST" action="">
                                            <div class="form-group">
                                                <div class="col-sm-7">
                                                    <h4>Job Recommendations</h4>
                                                </div>
                                                <div class="col-sm-4">
                                                </div>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="" value="">GrabProject has job recommentions for me</label>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <div class="col-sm-1">
                                                </div>
                                                <div class="col-sm-4">
                                                    <select class="form-control input-types" name="selectJobs">
                                                        <option value="1">Daily</option>
                                                        <option value="2">Weekly</option>
                                                        <option value="3">Monthly</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-1"></div>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <br>
                            
                            <br>
                        </div>
                        <!-- Notofication Settings End -->
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