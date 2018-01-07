<?php
require_once ('classes/classSessionManager.php');
$sm = new sessionManager();
if(!$sm->isSessionExists("userSignupDetails") || empty(unserialize($sm->getSessionData("userSignupDetails")))){
    die("You are on wrong page");
}
require_once('classes/classFormKey.php');
$formKey = new FormKey();
$post = false;
$invalid = false;
$registerd = false;
$emailSent= false;
$vResult = new StdClass;
$previousData = unserialize($sm->getSessionData("userSignupDetails"));
$isPosted = false;
if(isset($_POST['form_key'])){
    if ($formKey->validate($sm->getSessionData("userSignupKey"), $_POST['form_key'])){
        if(isset($_POST['submit']) && isset($_POST['password']) && isset($_POST['username']) && isset($_POST['iWantTo'])
            && isset($_POST['agreeSubmitted'])){
            $isPosted = true;
            $userName = $_POST['username'];
            $password = $_POST['password'];
            $iWantTo = $_POST['iWantTo'];
            $agreed = $_POST['agreeSubmitted'];
            $key = $_POST['form_key'];
            require_once ('classes/classValidationController.php');
            $vResult = new StdClass;
            $vc = new ValidationController();
            if($iWantTo == 0){//validate company info and add compnay
                $vResult = $vc->validateCompanySignupComplete($userName,$password, $agreed);
                if($vResult->form_status){
                    echo "<script>alert('everything normal');</script>";
                    require_once "classes/classCompany.php";
                    $company = new Company(null);
                    $name = $previousData["first_name"]. " " .$previousData["last_name"];
                    $company->setName($name);
                    $company->setUserName($userName);
                    $company->setUserEmail($previousData["email"]);
                    $company->setUserStatus(0);
                    $company->setAddedDate();
                    $company->setUserPassword($password);
                    $company->setUserVC($key);
                    if($company->registerCompany()){
                        $registerd = true;
                        if($company->sendVerificationEmail()){
                            $sm->destroySession("userSignupDetails");
                            header("veryfiyEmail.php");
                        }
                    }
                }else{
                    echo "<pre>";
                    print_r($vResult);
                    echo "</pre>";
                }
            }else if($iWantTo == 1){//validdate student info
                // TODO here
                $vResult->form_status = true;
                $vResult->uname_status="";
                $vResult->password_status="";
                $vResult->agreed_status="";
                echo "<script>alert('Student Module is not implemented yet');</script>";
            }else{
                echo "<script>alert('You must provide the user type!');</script>";
            }

        }
    }else{
        $invalid = true;
        /* echo "<h1 style='color:#fff;'>form key is Invalid</h1>"; */
    }
}
?>
<!DOCTYPE html>
<html lang="en"> 
    <head> 
        <meta charset="utf-8"> 
        <meta name="description" content=""> 
        <meta name="author" content="pixelcave"> 
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0"> 
        <title>Create Account</title>         
        <link rel="stylesheet" href="css/bootstrap.min.css"> 
        <link rel="stylesheet" href="css/custom.css"> 
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <style>
            label[class="error"]{
                font-weight: 700!important;
            }
        </style>
    </head>     
    <body> 
        <?php require "inc/header.php"; ?>         
        <!-- END Site Header -->         
        <div id="page-wrappers"> 
            <!-- Section Find-Work Start -->             
            <section class="section-create-account"> 
                <div class="container">
                    <br><br>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                            <!-- Main Contents Start -->
                            <br>
                            <div class="main-box section-light create-account-panel">
                                <center>
                                    <h3>Complete your account</h3>
                                    <h4><?php echo $previousData["email"] ?></h4>
                                </center>
                                <br>
                                <form method="POST" id="userSignupComplete">
                                    <input type='hidden' name='form_key' id='form_key' value="<?php $sm->createSession("userSignupKey", $formKey->generateKey());echo $sm->getSessionData("userSignupKey");?>" />
                                    <div class="form-group">
										<div class="input-group">
											<span class="input-group-addon input-types-icons"><i class="fa fa-user"></i></span>
											<input type="text" class="form-control input-types" id="username" name="username" placeholder="Username">
										</div>
                                        <?php if($isPosted && !$vResult->form_status){
                                            if(!empty($vResult->uname_status)){
                                                echo '<label for="username"  class="valid-errors">'.$vResult->uname_status.'</label>';
                                            }else{
                                                echo '<label for="username"  class="valid-errors">&nbsp;</label>';
                                            }
                                        }else{
                                            echo '<label for="username" class="valid-errors"></label>';
                                        } ?>
                                    </div>
                                    
                                    <div class="form-group">
										<div class="input-group">
											<span class="input-group-addon input-types-icons"><i class="glyphicon glyphicon-lock"></i></span>
											<input type="password" class="form-control input-types" id="password" name="password" placeholder="Create a password">
										</div>
                                        <?php if($isPosted && !$vResult->form_status){
                                            if(!empty($vResult->password_status)){
                                                echo '<label for="password" class="valid-errors">'.$vResult->password_status.'</label>';
                                            }else{
                                                echo '<label for="password"  class="valid-errors">&nbsp;</label>';
                                            }
                                        }else{
                                            echo '<label for="password"  class="valid-errors"></label>';
                                        } ?>
                                    </div>
                                    <h4 class="text-center">I want to</h4>
                                    <br>
                                    <div class="btn-group btn-group-justified">
                                        <input type="hidden" name="iWantTo" id="iWantTo" value="1" />
                                        <a id="hireP" class="btn btn-main-link btn-hv">Hire for a project</a>
                                        <a id="findP" class="btn btn-main-link-gr btn-hv">Find A Project</a>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <input type ="hidden" name="agreeSubmitted" id="agreeSubmitted" value="0"/>
											<label><input type="checkbox" name="agreed" id="agreed" value="" required>Yes! I understand and agree to the <a href="" class="text-green">GrabProject Terms of Service,</a> including the <a href="" class="text-green">User Agreement</a> and <a href="" class="text-green">Privacy Policy.</a></label>
                                            <?php if($isPosted && !$vResult->form_status){
                                                if(!empty($vResult->agreed_status)){
                                                    echo '<label for="agreed" style="padding-left: 0;font-weight: bold!important;margin-left: 0px;" class="valid-errors">'.$vResult->agreed_status.'</label>';
                                                }else{
                                                    echo '<label for="agreed"  class="valid-errors">&nbsp;</label>';
                                                }
                                            }else{
                                                echo '<label for="agreed" style="padding-left: 0;font-weight: bold;margin-left: 0px;" class="valid-errors"></label>';
                                            } ?>
										</div>
                                    </div>
                                    <center>
										<div class="form-group">
											<button type="submit" name="submit" class="btn-main-gr btn-hv btn-create-account">Finish</button>
										</div>
                                    </center>
                                </form>
                            </div>
                            <!-- End Main Contents -->
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
                <br>
            </section> 
        </div>   
        <!-- End Section Find-Work -->  
              
        <!-- Footer Start -->         
        <?php require "inc/footer.php"; ?>             
        <!-- End Footer -->         
                
        <script src="js/jquery.js"></script>         
        <script src="js/bootstrap.min.js"></script>         
        <script src="js/app.js"></script>
        <script src="js/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="js/jquery-validation/dist/additional-methods.min.js"></script>
        <script>
            $(function() {
                var form = $('#userSignupComplete');
                form.validate({
                    errorElement: 'label',
                    rules : {
                        username:{
                            required:true
                        },
                        password:{
                            required:true
                        },
                        agreed:{
                            required:true
                        }
                    },
                    messages: {
                        username: {
                            required: "You must enter a username"
                        },
                        password: {
                            required: "You must enter a password"
                        },
                        agreed: {
                            required: "You must agree to terms and conditions"
                        }
                    },
                    errorPlacement: function(error, element) {
                        $(element).parent().next('.valid-errors').html(error);
                    }
                });
                $("#hireP").on("click", function (e) {
                    e.preventDefault();
                    $("#iWantTo").val(0);
                    $("#findP").removeClass("btn-main-link-gr");
                    $("#findP").addClass("btn-main-link");
                    $(this).addClass("btn-main-link-gr");
                });
                $("#findP").on("click", function (e) {
                    e.preventDefault();
                    $("#iWantTo").val(1);
                    $("#hireP").removeClass("btn-main-link-gr");
                    $("#hireP").addClass("btn-main-link");
                    $(this).addClass("btn-main-link-gr");
                });
                $("#agreed").on("click",function () {
                    if($(this).is(':checked')){
                        $("#agreeSubmitted").val(1);
                    }else{
                        $("#agreeSubmitted").val(0);
                    }
                });
            });
        </script>
    </body>     
</html>