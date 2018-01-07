<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta charset="utf-8"> 
        <meta name="description" content=""> 
        <meta name="author" content="pixelcave"> 
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0"> 
        <title>Student Search</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css"> 
        <link rel="stylesheet" href="../css/custom.css"> 
        <link href="../css/font-awesome.min.css" rel="stylesheet"> 
        <link rel="stylesheet" href="../css/findWork.css"> 
    </head>     
    <body> 
        <?php require "header.php"; ?>
        <!-- END Site Header -->         
        <div id="page-wrappers"> 
            <!-- Section Find-Work Start -->             
            <section class="section-find-work"> 
                <div class="container">
                    <br><br>
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                            
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                            
                            <div class="panel panel-default job-feeds-panel">
                                <div class="panel-heading">
                                    <h3>Search</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <div class="find-work-search-box">
                                                <form class="" method="POST" action="">
                                                    <br>
                                                    <div class="input-group">
                                                        <input type="text" name="txtSearchJobs" class="form-control find-work-search" placeholder="Search for Students">
                                                        <div class="input-group-btn">
                                                            <button class="btn color-green text-white btn-hv find-work-search-btn" type="submit" name="bntSearchJobs">
                                                                <i class="glyphicon glyphicon-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <br>
                                                <!--<a href=""class="work-adv text-green">Advanced Search</a>-->
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- Project Feeds -->
                                    <div class="job-feeds-contents">
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                <img src="../images/user-profile/user.jpg" class="img-circle" style="margin-top:8px;" alt="Profile Pic" width="70" height="70">
                                                
                                            </div>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                                <h4>Kamran Khan</h4>
                                                <p>Front-end Web Developer</p>
                                                <div class="student-details">
                                                    <span class="text-muted">University: Comsats</span>
                                                    &nbsp; | &nbsp;
                                                    
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    <span class="text-muted"> Lahore</span>
                                                    <br><br>
                                                    <p>Hi sir, my name is kamran having 3 years experience in projects.</p> 
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="invites text-center">
                                                    <a href="" class="btn-main-link-gr btn-block btn-hv">Invite To Job</a>
                                                    <a href="" class="btn-main-link btn-block btn-hv"><i class="fa fa-heart-o" aria-hidden="true"></i> Save</a>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <!-- Project Feeds -->
                                    <div class="job-feeds-contents">
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                <img src="../images/user-profile/user.jpg" class="img-circle" style="margin-top:8px;" alt="Profile Pic" width="70" height="70">
                                                
                                            </div>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                                <h4>Imran Khan</h4>
                                                <p>Back-end Web Developer</p>
                                                <div class="student-details">
                                                    <span class="text-muted">University: Comsats</span>
                                                    &nbsp; | &nbsp;
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    <span class="text-muted"> Islamabad</span>
                                                    <br><br>
                                                    <p>Hi sir, my name is imran having 3 years experience in projects.</p> 
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="text-center invites">
                                                    <a href="" class="btn-main-link-gr btn-block btn-hv">Invite To Job</a>
                                                    <a href="" class="btn-main-link btn-block btn-hv"><i class="fa fa-heart-o" aria-hidden="true"></i> Save</a>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <!-- Project Feeds -->
                                    <div class="job-feeds-contents">
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                <img src="../images/user-profile/user.jpg" class="img-circle" style="margin-top:8px;" alt="Profile Pic" width="70" height="70">
                                                
                                            </div>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                                <h4>Junais Khan</h4>
                                                <p>Front-end Web Developer</p>
                                                <div class="student-details">
                                                    <span class="text-muted">University: Comsats</span>
                                                    &nbsp; | &nbsp;
                                                    
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    <span class="text-muted"> Lahore</span>
                                                    <br><br>
                                                    <p>Hi sir, my name is junaid having 3 years experience in projects.</p> 
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="invites text-center">
                                                    <a href="" class="btn-main-link-gr btn-block btn-hv">Invite To Job</a>
                                                    <a href="" class="btn-main-link btn-block btn-hv"><i class="fa fa-heart-o" aria-hidden="true"></i> Save</a>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <!-- Project Feeds -->
                                    <div class="job-feeds-contents">
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                <img src="../images/user-profile/user.jpg" class="img-circle" style="margin-top:8px;" alt="Profile Pic" width="70" height="70">
                                                
                                            </div>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                                <h4>Ali Raza</h4>
                                                <p>Front-end Web Developer</p>
                                                <div class="student-details">
                                                    <span class="text-muted">University: Comsats</span>
                                                    &nbsp; | &nbsp;
                                                    
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    <span class="text-muted"> Lahore</span>
                                                    <br><br>
                                                    <p>Hi sir, my name is ali having 3 years experience in projects.</p> 
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="invites text-center">
                                                    <a href="" class="btn-main-link-gr btn-block btn-hv">Invite To Job</a>
                                                    <a href="" class="btn-main-link btn-block btn-hv"><i class="fa fa-heart-o" aria-hidden="true"></i> Save</a>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <!-- Project Feeds -->
                                    <div class="job-feeds-contents">
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                <img src="../images/user-profile/user.jpg" class="img-circle" style="margin-top:8px;" alt="Profile Pic" width="70" height="70">
                                                
                                            </div>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                                <h4>Kamran Khan</h4>
                                                <p>Front-end Web Developer</p>
                                                <div class="student-details">
                                                    <span class="text-muted">University: Comsats</span>
                                                    &nbsp; | &nbsp;
                                                    
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    <span class="text-muted"> Lahore</span>
                                                    <br><br>
                                                    <p>Hi sir, my name is kamran having 3 years experience in projects.</p> 
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="invites text-center">
                                                    <a href="" class="btn-main-link-gr btn-block btn-hv">Invite To Job</a>
                                                    <a href="" class="btn-main-link btn-block btn-hv"><i class="fa fa-heart-o" aria-hidden="true"></i> Save</a>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <!-- Jobs Contents -->
                                <div class="panel-footer">
                                    <br>
                                    <div class="btn-load-jobs">
                                        <center>
                                            <a type="button" name="" class="btn-main-link btn-hv">Load More Projects</a>
                                        </center>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                            <!--<div class="job-feed-profile-protion">
                                <br>
                                <div class="job-feed-porfile">
                                    <img src="images/user-profile/user.jpg" class="img-circle" alt="Profile Pic" width="30" height="30">&nbsp;
                                    <span>Kamran</span>
                                </div>    
                                <p>kamran12@gmail.com</p>
                                <p>Visibilty</p>
                                <span><i class="fa fa-lock" aria-hidden="true"></i> Locked</span>
                                <span class="text-green pull-right">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </span>
                                <p class="profile-private">private</p>
                                <br>
                                <p>Availability</p>
                                <span><i class="fa fa-clock-o" aria-hidden="true"></i> More than 30 hrs/week</span>
                                <span class="text-green pull-right">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </span>
                                <br><br>
                                <div class="job-profile-progress-box">
                                    <br>
                                    <span class="job-profile-progress-bar"></span>
                                    <span>100%</span>
                                </div>
                                <br>
                                <a href="" class="text-green">View Profile</a>
                                <br>
                            </div>-->
                            <!-- Profile End -->
                        </div>
                    </div>
                </div>
                <br>
            </section>
            <br><br> 
        </div>   
        <!-- End Section Find-Work -->  
        
        <!-- Footer Start -->         
        <?php require "../inc/footer.php"; ?>         
        <!-- End Footer -->  
               
        <!--<script src="../js/jquery.js"></script>-->         
        <script src="../js/bootstrap.min.js"></script>         
        <script src="../js/app.js"></script>         
        <script src="../js/dragFiles.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    </body>     
</html>