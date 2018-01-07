<?php
require_once('classes/classSessionManager.php');
$session = new sessionManager();
require_once 'classes/classCompany.php';
require_once 'classes/classDatabaseManager.php';
$company = new Company($session);
if($session->isSessionExists("company_info")){
    $company = unserialize($session->getSessionData("company_info"));
}else if($session->isSessionExists("student_info")){

}
if($company->getLoginStatus() && $session->isSessionExists("company_info")){
    header('location:company/myjob.php');
}else if(true){

}
require_once('classes/classFormKey.php');
require_once 'classes/classValidationController.php';
$vResult = new StdClass;
$formKey = new FormKey();
$isPosted = false;
$invalid = false;
if(isset($_POST['form_key'])){
    if ($formKey->validate($session->getSessionData("login_form_key"), $_POST['form_key'])){
        $invalid = false;
        if(isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password'])){
            $isPosted = true;
            $uname=$_POST['username'];
            $password=md5($_POST['password']);
            $vc = new ValidationController();
            $vResult = $vc->validateUserLogin($uname, $password, "COMPANYORSTUDENT");
            if($vResult->form_status){
                if($vResult->userType=="COMPANY"){
                    $company->userLogin($uname, $password);
                }else if($vResult->userType=="STUDENT"){
                    //TODO
                }else{
                    echo "Invalid user type";
                }
            }
        }else{
            $invalid = true;
        }
    }else{
        $invalid = true;
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
        <title>Login</title>         
        <link rel="stylesheet" href="css/bootstrap.min.css"> 
        <link rel="stylesheet" href="css/custom.css"> 
        <link href="css/font-awesome.min.css" rel="stylesheet"> 
    </head>     
    <body> 
        <?php require "inc/header.php"; ?>         
        <!-- END Site Header -->         
        <div id="page-wrappers"> 
            <!-- Section Find-Work Start -->             
            <section class="section-create-account"> 
                <div class="container">
                    <br>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <!-- Main Contents Start -->
                            <br>
                            <div class="main-box section-light create-login-panel ">
                                <h3 class="text-center">Login</h3>
                                <br>
                                <form class="" method="POST" action="" id="userLogin">
                                    <input type='hidden' name='form_key' id='form_key' value="<?php
                                    $session->createSession("login_form_key", $formKey->generateKey());
                                    echo $session->getSessionData("login_form_key");?>" />
									<div class="form-group">
                                        <?php if($isPosted && !$vResult->form_status){
                                            if(!empty($vResult->validation_status)){
                                                echo '<label class="valid-errors">'.$vResult->validation_status.'</label>';
                                            }
                                        }?>
										<div class="input-group">
											<span class="input-group-addon input-types-icons"><i class="fa fa-user"></i></span>
											<input type="text" class="form-control input-types" name="username" id="username" placeholder="Username">
										</div>
                                        <?php if($isPosted && !$vResult->form_status){
                                            if(!empty($vResult->username_status)){
                                                echo '<label for="username" class="valid-errors">'.$vResult->username_status.'</label>';
                                            }else{
                                                echo '<label for="username" class="valid-errors">&nbsp;</label>';
                                            }
                                        }else{
                                            echo '<label for="username" class="valid-errors"></label>';
                                        }?>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon input-types-icons"><i class="glyphicon glyphicon-lock"></i></span>
											<input type="password" class="form-control input-types" name="password" id="password" placeholder="Create a password">
										</div>
                                        <?php if($isPosted && !$vResult->form_status){
                                            if(!empty($vResult->password_status)){
                                                echo '<label for="last_name" class="valid-errors">'.$vResult->password_status.'</label>';
                                            }else{
                                                echo '<label for="last_name" class="valid-errors">&nbsp;</label>';
                                            }
                                        }else{
                                            echo '<label for="last_name" class="valid-errors"></label>';
                                        }?>
                                        <a href="" style="float:right" class="text-green">Forgot Password?</a>
                                    </div>
                                    <br>
                                    <center>
										<div class="form-group">
											<!--<a href="" name="btn_login" class="btn-main-link-gr btn-block btn-hv btn-login">Login</a>-->
											<button type="submit" name="submit" id="submit" class="btn-main-gr btn-block btn-hv btn-login">Login</button>
										</div>
									</center>
                                </form>
                                <p class="text-center text-muted"><p>New to GrabProject <a href="signup.php" class="text-green">Sign Up</a></p>
                                <!--<center><a href="signup.html" class="btn-main-link btn-hv btn-block">Sign up</a></center>-->
                            </div>
                            <br>
                            <!-- End Main Contents -->
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                        </div>
                    </div>
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
                var form = $('#userLogin');
                form.validate({
                    errorElement: 'label',
                    rules : {
                        username:{
                            required:true
                        },
                        password:{
                            required:true
                        }
                    },
                    messages: {
                        username: {
                            required: "You must enter a valid username/email"
                        },
                        password: {
                            required: "You must enter a password"
                        }
                    },
                    errorPlacement: function(error, element) {
                        $(element).parent().next('.valid-errors').html(error);
                    }
                });
            });
        </script>
    </body>     
</html>