<?php
require_once ("classDatabaseManager.php");
class ValidationController{
	private $debugFlag=false;
	private $dbCon = NULL;
	function __CONSTRUCT(){
		$this->dbCon = new databaseManager();
	}
	function validatePhoneNumber($number) {
		$formats = array('###-###-####', '####-###-###','(###) ###-###', '####-####-####','(###) ###-####','(###) ####-####','##-###-####-####', '####-####', '###-###-###','#####-###-###', '###########', '##########', '#########', '############','# ### #####', '#-### #####');

		return in_array(trim(preg_replace('/[0-9]/', '#', $number)), $formats);
	}
	
	public function validateCompanyProfileUpdate(){/* Here $famer is an object of farmer class */
		$validationResult = new stdClass;
		$validationResult->fname_status = "";
		$validationResult->phone_status = "";
		$validationResult->address_status = "";
		$validationResult->form_status = false;
		if($this->debugFlag){
			var_dump($farmer);
		}
		$fname_flag=false;
		$address_flag=false;
		$phone_flag=false;
		$regex='/^[a-zA-Z][a-zA-Z ]*$/';
		
		if ((preg_match($regex, $farmer->getUserName()) === 1) && !empty($farmer->getUserName())) {
			$validationResult->fname_status = "";	
			$fname_flag = true;
		}else{
			$validationResult->fname_status = "Invalid / Empty first name!";	
			$fname_flag = false;
		}
		
		$regex='/[\pL\pN\p{Pc}\p{Pd}]+/';
		if ((preg_match($regex, $farmer->getFarmerAddress()) === 1) || empty($farmer->getFarmerAddress())) {
			$validationResult->address_status = "";	
			$address_flag = true;
		}else{
			$validationResult->address_status = "Invalid address value!";	
			$address_flag = false;
		}
		if ($this->validatePhoneNumber($farmer->getUserContact())) {
			$validationResult->phone_status = "";	
			$phone_flag = true;
		}else{
			$validationResult->phone_status = "Invalid Phone Number formate (123) 123-1234 !";	
			$phone_flag = false;
		}
		if($phone_flag && $address_flag && $fname_flag){
			$validationResult->form_status = true;
		}
		return $validationResult;
		
	}
	public function validateAdminProfile($Name, $email){
		/* testing values for variables */
		if($this->debugFlag){
			// testing variable goes here
		}
		$validationResult = new stdClass;
		$validationResult->name_status = "";
		$validationResult->email_status = "";
		$validationResult->form_status = false;
		$name_flag=false;
		$email_flag=false;
		
		$regex='/^[a-zA-Z][a-zA-Z ]*$/';
		if ((preg_match($regex, $Name) === 1) && !empty($Name)) {
			$validationResult->name_status = "";
            $name_flag = true;
		}else{
			$validationResult->name_status = "Invalid / Empty first name!";
            $name_flag = false;
		}
        $pattern_email = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
        if(!empty($email)){
            if (preg_match($pattern_email, $email) === 1) {
                $validationResult->email_status = "";
                $email_flag = true;
            }else{
                $validationResult->email_status = "Invalid/Empty Email";
                $email_flag = false;
            }
        }else{
            $validationResult->email_status = "Email must be filled!";
            $email_flag = false;
        }
		if($name_flag && $email_flag){
			$validationResult->form_status = true;
		}
		return $validationResult;
	}
	public function validateCompanySignup($fname, $lname, $email){
		if($this->debugFlag){

		}
		$validationResult = new stdClass;
		$validationResult->fname_status = "";
		$validationResult->lname_status = "";
		$validationResult->email_status = "";
		$validationResult->form_status = false;
		
		$fname_flag=false;
		$lname_flag=false;
		$email_flag=false;

		// this regex only allows text with spaces			
        if ($this->isValidName($fname)) {
			$validationResult->fname_status = "";
            $fname_flag = true;
		}else{
			$validationResult->fname_status = "Invalid or empty  first name!";
            $fname_flag = false;
		}
        if ($this->isValidName($lname)) {
            $validationResult->lname_status = "";
            $lname_flag = true;
        }else{
            $validationResult->lname_status = "Invalid or empty  second name!";
            $lname_flag = false;
        }
        if ($this->isValidEmail($email)) {
            $validationResult->email_status = "";
            $email_flag = true;
        }else{
            $validationResult->email_status = "Invalid or empty  email address!";
            $email_flag = true;
        }
		
		if($fname_flag && $lname_flag && $email_flag){
			$validationResult->form_status = true;
		}else{
			$validationResult->form_status = false;
		}
		if($validationResult->form_status){
		    if($this->isEmailExist($email, "COMPANY")){
                $email_flag = true;
                $validationResult->email_status = "Another account exists on this email!";
            }else{
                $email_flag = true;
                $validationResult->email_status = "";
            }
        }
        return $validationResult;
	}
    public function validateCompanySignupComplete($userName,$password, $agreed){
        if($this->debugFlag){

        }
        $validationResult = new stdClass;
        $validationResult->uname_status = "";
        $validationResult->agreed_status = "";
        $validationResult->password_status = "";
        $validationResult->form_status = false;

        $uname_flag=false;
        $agreed_flag=false;
        $password_flag=false;

        // this regex only allows text with spaces
        if ($this->isValidUsername($userName)) {
            $validationResult->uname_status = "";
            $uname_flag = true;
        }else{
            $validationResult->uname_status = "Invalid or empty  username!";
            $uname_flag = false;
        }
        if (!empty($password)) {
            $validationResult->password_status = "";
            $password_flag = true;
        }else{
            $validationResult->password_status = "Empty password!";
            $password_flag = true;
        }
        if($agreed == 1){
            $validationResult->agreed_status = "";
            $agreed_flag = true;
        }else{
            $validationResult->agreed_status = "You must agree to the terms and conditions";
            $agreed_flag = true;
        }

        if($uname_flag && $agreed_flag && $password_flag){
            $validationResult->form_status = true;
        }else{
            $validationResult->form_status = false;
        }
        if($validationResult->form_status){
            if($this->isUsernameExist($userName, "COMPANY")){
                $email_flag = true;
                $validationResult->email_status = "Another account exists on this username!";
            }else{
                $email_flag = true;
                $validationResult->email_status = "";
            }
        }
        return $validationResult;
    }
	public function validateResetPasswordLink($email, $hash, $userType){
		$validationResult = new stdClass;
		$validationResult->validation_status = "";
		$validationResult->form_status = false;
		$link_flag = false;
		
		if(empty($email) || empty($hash)){
			//$obj->getPassword()."<br>";
			$validationResult->validation_status = "Your link is not valid!";	
			$link_flag = false;
			/* echo "password_flage=".$password_flag."<br>"; */
		}else{
			$validationResult->validation_status = "";	
			$link_flag = true;
		}
		if($link_flag){
			$validationResult->form_status= true;
		}
		if($validationResult->form_status){
			if( $userType == "COMPANY"){
				$query = "SELECT COUNT(*) as numb from company WHERE company_email=? and vc=?";
				if($data = $this->dbCon->executeQuery($query,array($email, $hash), 'cread')){
					if($data[0]['numb']>0){
						$validationResult->form_status = true;
					}else{
						$validationResult->validation_status = "Sorry! your link for reset password has expired!";
						$validationResult->form_status = false;
					}
				}
			}else if($userType=="STUDENT"){
			    // student password reset link validation goes here
			}
		}
		return $validationResult;
	}
	public function validateUserNewPassword($newPassword, $passwordConfirm){		
		$validationResult = new stdClass;
		$validationResult->validation_status = "";
		$validationResult->form_status = false;
		$password_flag = false;
		
		if(empty($passwordConfirm) || empty($newPassword)){
			//$obj->getPassword()."<br>";
			$validationResult->validation_status = "Password must be entered";	
			$password_flag = false;
			/* echo "password_flage=".$password_flag."<br>"; */
		}else{
			if($newPassword === $passwordConfirm){
				$validationResult->validation_status = "";	
				$password_flag = true;	
			}else{
				$validationResult->validation_status = "Sorry! your password doesn't match.";	
				$password_flag = true;	
			}
		}
		if($password_flag){
			$validationResult->form_status= true;
		}
		
		return $validationResult;
	}
	public function validateUserLogin($username, $password, $userType){
		$validationResult = new stdClass;
		$validationResult->username_status = "";
		$validationResult->validation_status = "";
		$validationResult->password_status = "";
		$validationResult->form_status = false;
		$emailPattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
		
		$usernamePattern = "/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/";
		//echo "form status mein to hun";
		$username_flag = false;
		$password_flag = false;
		
		if ($this->isValidEmail($username) || $this->isValidUsername($username)) {
			$validationResult->username_status = "";	
			$username_flag = true;
			/* echo "Usernam_flage=".$username_flag."<br>"; */
		}else{
			$validationResult->username_status = "Invalid or empty username";
			$username_flag = false;
			/* echo "Usernam_flage=".$username_flag."<br>"; */
		}
		if(empty($password)){
			$validationResult->password_status = "Invalid or empty password";
			$password_flag = false;
		}else{
			$validationResult->password_status = "";	
			$password_flag = true;
		}
		
		
		if($username_flag && $password_flag  ){
			$validationResult->form_status = true;	
		}
		if($validationResult->form_status){
            switch ($userType){
				case "Admin":
					$query = "SELECT COUNT(*) AS numb from admin WHERE admin_email=? AND admin_password=?";
					if($data = $this->dbCon->executeQuery($query, array($username, $password), 'cread')){
						if($data[0]['numb']>0){						
							$validationResult->form_status = true;
						}else{
							$validationResult->validation_status = "Invalid Username or Password!";
							$validationResult->form_status = false;
						}
					}
				    break;
				case "COMPANYORSTUDENT":
                    $query = "SELECT COUNT(*) AS numb, company_status from company WHERE (company_email=? OR company_username=?) AND company_pwd=?";
                    if($data = $this->dbCon->executeQuery($query, array($username,$username, $password), 'cread')){
                        if($data[0]['numb']>0) {
                            if ($data[0]["company_status"] == 0) {
                                $validationResult->form_status = false;
                                $validationResult->validation_status = "Please activate your account first!";
                            } else if ($data[0]["company_status"] == 2) {
                                $validationResult->form_status = false;
                                $validationResult->validation_status = "Your account has been blocked!";
                            } else {
                                $validationResult->userType = "COMPANY";
                                $validationResult->form_status = true;
                            }
                        }else{
                            $query2 = "SELECT COUNT(*) AS numb, std_status from student WHERE (std_email=? OR std_username=?) AND std_password=?";
                            if($data = $this->dbCon->executeQuery($query2, array($username,$username, $password), 'cread')){
                                if($data[0]['numb']>0){
                                    if($data[0]["std_status"]==0){
                                        $validationResult->form_status = false;
                                        $validationResult->validation_status = "Please activate your account first!";
                                    }else if($data[0]["std_status"]==2){
                                        $validationResult->form_status = false;
                                        $validationResult->validation_status = "Your account has been blocked!";
                                    }else{
                                        $validationResult->userType = "STUDENT";
                                        $validationResult->form_status = true;
                                    }
                                }else{
                                    $validationResult->validation_status = "Invalid Username or Password!";
                                    $validationResult->form_status = false;
                                }
                            }
                        }

                    }
                    break;

			}
		}else{
            return $validationResult->form_status=false;
		}
        return $validationResult;
	}
	public function validPostProject($title, $desc, ){

    }
	public function validateEmail($email, $type){
		$validationResult = new stdClass;
		$validationResult->validation_status = "";
		$validationResult->form_status = false;
		$emailPattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

        $email_flag = false;
        if (!empty($email) && preg_match($emailPattern, $email) === 1) {
            $validationResult->validation_status = "";
            $email_flag = true;
        }else{
            $validationResult->validation_status = "Invalid email address!";
            $email_flag = false;
        }
		if($email_flag ){
			$validationResult->form_status = true;	
		}
		
		switch($type){
			case "Admin":
				if($validationResult->form_status){
					$query = "SELECT COUNT(*) AS numb from admin WHERE admin_email=?";
					if($data = $this->dbCon->executeQuery($query, array($email), 'cread')){
						if($data[0]['numb']>0){
							$validationResult->form_status = true;
						}else{
							$validationResult->validation_status = "Sorry! this email is not registered.";
							$validationResult->form_status = false;
						}
					}				
				}else{
					$validationResult->form_status = false;
				}
			break;
            case "STUDENT":
                //student email validation goes here
                break;

            case "COMPANY":
                if($validationResult->form_status){
                    $query = "SELECT COUNT(*) AS numb FROM company WHERE company_email=? AND company_status=?";
                    if($data = $this->dbCon->executeQuery($query, array($email,1), 'cread')){
                        if($data[0]['numb']>0){
                            $validationResult->form_status = true;
                        }else{
                            $validationResult->validation_status = "Sorry! your email is not registered with us.";
                            $validationResult->form_status = false;
                        }
                    }else{
                        $validationResult->validation_status = "Please! click on the link in email to active your account";
                        $validationResult->form_status = false;
                    }
                }else{
                    $validationResult->form_status = false;
                }
                break;
			default:
				echo "invalid user type";
			break;
		}
		
		return $validationResult;
	}
	private function isValidName($name){
        $regex='/^[a-zA-Z][a-zA-Z ]*$/';
        if ((preg_match($regex, $name) === 1) && !empty($name)) {
            return true;
        }else{
            return false;
        }
    }

	private function isValidEmail($email){
        $emailPattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
        if (!empty($email) && preg_match($emailPattern, $email) === 1) {
            return true;
        }else{
            return false;
        }
    }
    public function isValidPassword($pwd1, $pwd2){
	    if($pwd1 === $pwd2){
	        return true;
        }else{
	        return false;
        }
    }
    private function isEmailExist($email,$type){
	    $result = false;
        switch($type){
            case "STUDENT":
                //student email validation goes here
                break;

            case "COMPANY":
                $query = "SELECT COUNT(*) AS numb FROM company WHERE company_email=? AND company_status=?";
                if($data = $this->dbCon->executeQuery($query, array($email,1), 'cread')){
                    if($data[0]['numb']>0){
                        $result = true;
                    }else{
                        $result = true;
                    }
                }else{
                    $result = true;
                }
                break;
            default:
                echo "invalid user type";
                break;
        }
        return $result;
    }
    private function isUsernameExist($email,$type){
        $result = false;
        switch($type){
            case "STUDENT":
                //student email validation goes here
                break;

            case "COMPANY":
                $query = "SELECT COUNT(*) AS numb FROM company WHERE company_username=? AND company_status=?";
                if($data = $this->dbCon->executeQuery($query, array($email,1), 'cread')){
                    if($data[0]['numb']>0){
                        $result = true;
                    }else{
                        $result = true;
                    }
                }else{
                    $result = true;
                }
                break;
            default:
                echo "invalid user type";
                break;
        }
        return $result;
    }
    private function isValidUsername($uName){
        $usernamePattern = "/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/";
        if (!empty($uName) && (preg_match($usernamePattern, $uName) === 1)) {
            return true;
        }else{
            return false;
        }
    }
    private function isCompany($username, $password){
        $query = "SELECT COUNT(*) AS numb, company_status from company WHERE (company_email=? OR company_username=?) AND company_pwd=?";
        if($data = $this->dbCon->executeQuery($query, array($username,$username, $password), 'cread')){
            if($data[0]['numb']>0){
                if($data[0]["company_status"]==0){
                    /*$validationResult->form_status = false;
                    $validationResult->validation_status = "Please activate your account first!";*/
                    return "NOTACTIVATED";
                }else{
                    if($this->isBlocked($username, $password, "COMPANY")){
                        /*$validationResult->form_status = false;
                        $validationResult->validation_status = "Your account has been blocked!";*/
                        return "BLOCKED";
                    }else{
                        /*$validationResult->form_status = true;*/
                        return "ISCOMPANY";
                    }
                }
            }else{
                /*$validationResult->validation_status = "Invalid Username or Password!";
                $validationResult->form_status = false;*/
                return "NOTCOMPANY";
            }
        }
    }
    private function isStudent($username, $password){
        $query = "SELECT COUNT(*) AS numb, std_status from student WHERE (std_email=? OR std_username=?) AND std_password=?";
        if($data = $this->dbCon->executeQuery($query, array($username,$username, $password), 'cread')){
            if($data[0]['numb']>0){
                if($data[0]["std_status"]==0){
                    /*$validationResult->form_status = false;
                    $validationResult->validation_status = "Please activate your account first!";*/
                    return "NOTACTIVATED";
                }else{
                    if($this->isBlocked($username, $password, "STUDENT")){
                        /*$validationResult->form_status = false;
                        $validationResult->validation_status = "Your account has been blocked!";*/
                        return "BLOCKED";
                    }else{
                        /*$validationResult->form_status = true;*/
                        return "ISSTUDENT";
                    }
                }
            }else{
                /*$validationResult->validation_status = "Invalid Username or Password!";
                $validationResult->form_status = false;*/
                return "NOTSTUDENT";
            }
        }
    }
}

?>