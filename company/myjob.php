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
        <title>My job</title>         
        <link rel="stylesheet" href="../css/bootstrap.min.css"> 
        <link rel="stylesheet" href="../css/custom.css"> 
        <link href="../css/font-awesome.min.css" rel="stylesheet">
    </head>     
    <body> 
        <?php require "header.php"; ?>
        <!-- END Site Header -->         
        <div id="page-wrappers"> 
            <!-- Section Porposal -->             
            <section class="categories-section site-section-top">
                <div class="container"> 
                    
    				<div class="panel panel-default prosal-container-padding">
    				    <div class="panel-heading panel-padding post_title" >
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <h3>Postings</h3>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                    <div class="row" style="margin-top:5px;">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <a href="postJobs.php" class="btn btn-main-link-gr btn-hv pull-right" >Post a New job</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!--Postings 
							<button type="button" class="btn pull-right m1" >Rehire a freelancer </button>
							<button type="button" class="btn btn-success pull-right">Post a New job</button>-->
							
						</div>
    				    <div class="panel-body  panel-padding">
                            <div class="table-responsive">
                                <table class="table">
                					<thead>
                					    <tr>
                						    <th>JOB TITLE</th>
                						    <th>PROPOSALS</th>
    										<th>MESSAGED</th>
                						    <th>OFFERS/HIRES</th>
    										<th>STATUS</th>
                					  </tr>
                					</thead>
                					<tbody>
                					    <tr>
                    						<td><a href="" class="text-green">WEB based App, I need a web based project for my company</a></td>
                    						<td><a href="" class="text-green">6 (new 3)</a></td>
    										<td><a href="" class="text-green">1</a></td>
                    						<td>NO</td>
    										<td >public</td>
                					    </tr>
    									<tr>
                    						<td><a href="" class="text-green">Android based App</a></td>
                    						<td><a href="" class="text-green">6 (new 3)</a></td>
    										<td><a href="" class="text-green">1</a></td>
                    						<td>NO</td>
    										<td >public</td>
                					    </tr>
    									<tr>
                    						<td><a href="" class="text-green">IOS based App</a></td>
                    						<td><a href="" class="text-green">6 (new 3)</a></td>
    										<td><a href="" class="text-green">1</a></td>
                    						<td>NO</td>
    										<td >public</td>
                					    </tr>
                					   
                					</tbody>
                				</table>
                            </div>    
            			</div>
						<div class="panel-footer">
						    <a href="" ><span class="text-green">View all Job  postings</span></a> (including  filled and close jobs)
                        </div>
    				</div>
    				<br>
                	<div class="panel panel-default prosal-container-padding">
                		<div class="panel-heading panel-padding">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                    <h3>Contacts </h3>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <br>
                                    <a href="#"  style="color:green">View full  contracts lister</a>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                </div>
                            </div>
                        </div>
            			<div class="panel-body  panel-padding">
							<p>Once you hire a student ,you can view here</p>								
            			</div>
                	</div>
				</div>
			</section>
            <br>
		</div>
        <br>      
        <!-- Footer Start -->         
        <?php require "../inc/footer.php"; ?>          
        <!-- End Footer -->         
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>         
        <script src="../js/app.js"></script>
    </body>     
</html>