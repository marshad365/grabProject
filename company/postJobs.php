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
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <h3>Post a Project</h3>
                            <br>
                            <!-- Account summary -->
                            <div class="panel panel-default">
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
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="form-groups">
                                                        <label for="input1" class="form-label">Name your project posting</label>
                                                        <input type="text" class="form-control input-types" name="porject_name" placeholder="Name of project">
                                                    </div>
                                                    <br>
                                                    <div class="form-groups">
                                                        <label for="input1" class="form-label">Describe the work to be done</label>
                                                        <textarea class="form-control input-types" rows="3" id="projectDetails" name="projectDetails" placeholder="Enter work description..."></textarea>
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
                                                        <label for="input1" class="form-label">Project Category</label>
                                                        <select class="form-control input-types" name="projectCats">
                                                            <option value="1">Web Development</option>
                                                            <option value="2">Web Designing</option>
                                                            <option value="3">Mobile App Development</option>
                                                            <option value="4">Desktop Softwares</option>
                                                        </select>
                                                    </div>
                                                    <br>
                                                    <div class="form-groups">
                                                        <label for="input1" class="form-label">Project Time Duration</label>
                                                        <select class="form-control input-types" name="projectTime">
                                                            <option value="1">More Than 6 Months</option>
                                                            <option value="2">3 to 6 Months</option>
                                                            <option value="3">1 to 3 Months</option>
                                                            <option value="4">Less Than 1 Month</option>
                                                            <option value="5">Less Than 1 Week</option>
                                                        </select>
                                                    </div>
                                                    <br>
                                                    <div class="form-groups">
                                                        <label for="input1" class="form-label">Skills Needed</label>
                                                        <div id="tagBox"></div><br>
                                                        <input type="text" class="form-control input-types" id="skills" name="skills" placeholder="Enter your skills">
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        <br>  
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <br>
                                    <center><button type="button" name="" class="btn-main-gr btn-hv btn-create-account">Post</button></center>
                                    <br>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                        </div>
                        <!-- Profile Settings End -->
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        </div>
                        <br>
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
        <script src="../js/bootstrap.min.js"></script>         
        <script src="../js/app.js"></script>         
        <script src="../js/dragFiles.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
            var i=1;
            $("#skills").keypress(function(e){
                var a = $("#skills").val();
            	if(e.which == 13 && a!=""){
                	$("#tagBox").append("<div class='btn btn-sm' style='margin:5px;background:#E0E0E0;'>"+a+"</div>");
                    $("#skills").val("");
                }else if(e.which == 13 && a==""){
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