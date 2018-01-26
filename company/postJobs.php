<?php
require_once('../classes/classSessionManager.php');
require_once('../classes/classCompany.php');
$session = new sessionManager();
$company = new Company($session);
if($session->isSessionExists("company_info") && !empty($session->getSessionData("company_info"))){
    $company = unserialize($session->getSessionData("company_info"));
}
if(!$company->getLoginStatus() || !$session->isSessionExists("company_info")){
    header('location:../login.php');
}
$user_name=$company->getUserName();
$email=$company->getUserEmail();
$picture = $company->getUserPicture();
?>
<!DOCTYPE html>
<html lang="en"> 
    <head> 
        <meta charset="utf-8"> 
        <meta name="description" content=""> 
        <meta name="author" content="pixelcave"> 
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0"> 
        <title>Post Jobs</title>         
        <link rel="stylesheet" href="../css/bootstrap.min.css"> 
        <link rel="stylesheet" href="../css/custom.css"> 
        <link href="../css/font-awesome.min.css" rel="stylesheet"> 
    </head>     
    <body> 
        <?php require "header.php"; ?>         
        <!-- END Site Header -->         
        <div id="page-wrappers"> 
            <!-- Section Find-Work Start -->             
            <section class="section-describe-projects"> 
                <div class="container">
                    <br>
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                            <h3>Post a Project</h3>
                            <br>
                            <!-- Account summary -->
                            <div class="panel panel-default" style="margin: 0">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                            <h3>Describe Project</h3>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                            <!--<br>
                                            <a href="" class="btn-main-link btn-sm btn-hv btn-categories-edits">
                                                <span><i class="fa fa-pencil" aria-hidden="true"></i></span>&nbsp; Edit
                                            </a>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <br>
                                    <div class="account-summary-contents">
                                        <div class="form-horizontal" method="POST" action="">
                                            <div class="row">
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                                    <div class="form-groups">
                                                        <label class="form-label">Name your project posting<span style="color:red;margin-left:5px;">*</span></label>
                                                        <input type="text" class="form-control input-types" id = "porject_name" name="porject_name" placeholder="Name of project">
                                                        <label for="porject_name" class="valid-errors">Something Wrong</label>
                                                    </div>
                                                    <br>
                                                    <div class="form-groups">
                                                        <label class="form-label">Describe the work to be done<span style="color:red;margin-left:5px;">*</span></label>
                                                        <textarea class="form-control input-types" rows="10" id="projectDetails" name="projectDetails" placeholder="Enter work description..."></textarea>
                                                        <label for="projectDetails" class="valid-errors">Something Wrong</label>
                                                        <p class="pull-right" style="margin-top:10px;">500 characters left</p>
                                                    </div>
                                                    <br><br><br>
                                                    <div class="form-groups">
                                                        <label for="input1" class="form-label">Attachments</label>
                                                        <div class="upload-drop-zone" id="drop-zone">
                                                            Just drag and drop files here
                                                        </div>
                                                        <p style="margin-top:10px;">You may attach 5 files of 100 Mb.</p>
                                                    </div>
                                                    <br>
                                                    <div class="form-groups">
                                                        <label for="input1" class="form-label">Project Category<span style="color:red;margin-left:5px;">*</span></label>
                                                        <select class="form-control input-types" name="projectCats">
                                                            <option value="1">Web Development</option>
                                                            <option value="2">Web Designing</option>
                                                            <option value="3">Mobile App Development</option>
                                                            <option value="4">Desktop Softwares</option>
                                                        </select>
                                                    </div>
                                                    <br>
                                                    <div class="form-groups">
                                                        <label for="input1" class="form-label">Skills Needed<span style="color:red;margin-left:5px;">*</span></label>
                                                        <div id="tagBox"></div><br>
                                                        <input type="text" class="form-control input-types" id="skills" name="skills" placeholder="Enter your skills">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        <br>  
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
                                            <center><button type="button" name="" class="btn btn-block btn-main-gr btn-hv btn-create-account">Post</button></center>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <br>
            </section> 
        </div>   
        <!-- End Section profile -->
        
        <!-- Footer Start -->         
        <?php require "../inc/footer.php"; ?>          
        <!-- End Footer -->         
                
        <!--<script src="../js/jquery.js"></script>-->
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/app.js"></script>
        <script src="../js/dragFiles.js"></script>
        <script>
        $(document).ready(function(){
            var i=1;
            $("#skills").keypress(function(e){
                var a = $(this).val();
            	if(e.which === 32 && a!==""){
                	$("#tagBox").append("<div class='btn btn-sm' style='margin:5px;background:#E0E0E0;'>"+a+"</div>");
                    $(this).val("");
                }else if(e.which === 32 && a===""){
                    alert("Please enter skills needed!");
                }
            });
            
            /*$(".can").click(function(){
                var b = $(this).attr("id");
                //$('.can[id="'+b+'"]').remove();
            });*/
        });
        </script>         
    </body>     
</html>