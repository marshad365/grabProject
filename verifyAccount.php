<?php 
if(isset($_GET['email']) && !empty($_GET['email']) && isset($_GET['hash']) && !empty($_GET['hash']) && isset($_GET['userType']) && !empty($_GET['userType'])){
    $type = $_GET['userType'];
	$email = $_GET['email'];
	$hash = $_GET['hash'];
	if($type === md5('COMPANY')){// user is student
		require_once('classes/classCompany.php');
		$company = new Company(null);
		if($company->verifyRegistration($email, $hash)){
			echo $message = "veryfying your account.....";
			sleep(3);
			header('location:login.php');
		}else{
			echo "Key expired!";
		}
	}else if($type === md5('STUDENT')){

    }else{
		echo "Invalid Request!";
	}
}else{
	echo "Invalid Request!";
}

?>