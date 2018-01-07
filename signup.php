<?php
require_once ('classes/classSessionManager.php');
require_once ('classes/classValidationController.php');
$isPosted = false;
if(isset($_POST['submit']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email'])){
    $isPosted = true;
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $vResult = new StdClass;
    $vc = new ValidationController();
    $vResult = $vc->validateCompanySignup($fname,$lname,$email);
    if($vResult->form_status){
        $sm = new sessionManager();
        $sm->createSession("userSignupDetails", serialize($_POST));
        header("location:createAccount.php");
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
        <title>Sign Up</title>         
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
                        <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                            <!-- Main Contents Start -->
                            <br>
                            <div class="main-box section-light create-login-panel ">
                                <h3 class="text-center">Sign Up</h3>
                                <br>
                                <form class="" method="POST" action="" id="userSignup">

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon input-types-icons"><i class="fa fa-user"></i></span>
                                                    <input type="text" class="form-control input-types" name="first_name" placeholder="First name">
                                                </div>
                                                <!--<label class="valid-errors">First Name is required</label>-->
                                                <?php if($isPosted && !$vResult->form_status){
                                                    if(!empty($vResult->fname_status)){
                                                        echo '<label for="first_name" class="valid-errors">'.$vResult->fname_status.'</label>';
                                                    }else{
                                                        echo '<label for="first_name" class="valid-errors">&nbsp;</label>';
                                                    }
                                                }else{
                                                    echo '<label for="first_name" class="valid-errors"></label>';
                                                } ?>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon input-types-icons"><i class="fa fa-user"></i></span>
                                                    <input type="text" class="form-control input-types" name="last_name" id="last_name" placeholder="Last name">
                                                </div>
                                                <!--<label class="valid-errors">Last Name is required</label>-->
                                                <?php if($isPosted && !$vResult->form_status){
                                                    if(!empty($vResult->lname_status)){
                                                        echo '<label for="last_name" class="valid-errors">'.$vResult->lname_status.'</label>';
                                                    }else{
                                                        echo '<label for="last_name" class="valid-errors">&nbsp;</label>';
                                                    }
                                                }else{
                                                    echo '<label for="last_name" class="valid-errors"></label>';
                                                }?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon input-types-icons"><i class="fa fa-envelope"></i></span>
                                            <input type="email" class="form-control input-types" name="email" id="email" placeholder="Email Address">
                                        </div>
                                        <!--<label class="valid-errors">Email is required</label>-->
                                        <?php if($isPosted && !$vResult->form_status){
                                            if(!empty($vResult->email_status)){
                                                echo '<label for="email" class="valid-errors">'.$vResult->email_status.'</label>';
                                            }else{
                                                echo '<label for="email" class="valid-errors">&nbsp;</label>';
                                            }
                                        }else{
                                            echo '<label for="email" class="valid-errors"></label>';
                                        }  ?>
                                    </div>
                                    <br>
                                    <center>
                                        <div class="form-group">
                                            <button type="submit" name="submit"  name="submit" class="btn-main-gr btn-hv btn-sign-up">Sign Up</button>
                                        </div>
                                    </center>
                                    <br>
                                    <p>Already have an account <a href="login.php" class="text-green">Login</a></p>
                                </form>
                            </div>
                            <br>
                            <!-- End Main Contents -->
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
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
                var form = $('#userSignup');
                form.validate({
                errorElement: 'label',
                    rules : {
                        first_name:{
                            required:true
                        },
                        email:{
                            required:true,
                            pattern:/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                        },
                        last_name:{
                            required:true
                        }
                    },
                    messages: {
                        first_name: {
                            required: "You must enter a first name"
                        },
                        last_name: {
                            required: "You must enter a last name"
                        },
                        email: {
                            required: "You must enter a email",
                            pattern:"You must provide a valid email!"
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