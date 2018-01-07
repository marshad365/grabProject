<?php
require_once 'interfaces.php';
require_once 'classDatabaseManager.php';
require_once 'classSessionManager.php';
	class Admin implements User{
		//private $type=1;
		private $admin_id;
		private $admin_email;
		private $admin_password;
		private $admin_name;
		private $admin_last_update;
		private $admin_added_date;
		private $admin_status;
		private $profile_pic;
		private $vc;
		private $admin_login_status;
		private $sessionManager = null;
		function __construct($sessionManager){
			$this->admin_id = null;
			$this->admin_email = null;
			$this->admin_password = null;
			$this->admin_name = null;
			$this->admin_last_update = null;
			$this->admin_added_date = null;
			$this->admin_status = null;
			$this->profile_pic = null;
			$this->vc = null;
			$this->admin_login_status = false;
			$this->sessionManager = $sessionManager;
		}
		public function setUserName($userName){
			$this->admin_name = $userName;
		}
		public function setUserEmail($email){
			$this->admin_email = $email;
		}
		public function setUserID($id){
			$this->admin_id = $id;
		}
		public function setUserPassword($password){
			$this->admin_password = md5($password);
		}
		public function setAddedDate(){
			$this->admin_added_date = date('Y-m-d H:i:s',time());
		}
		public function setUserStatus($status){
			$this->admin_status = $status;
		}
		public function setUserPicture($picPath){
			$this->profile_pic = $picPath;
		}
		public function setUserVerificationCode($vc){
			$this->vc = $vc;
		}
		/*
		$this->admin_id = $id;
		$this->admin_name = $userName;
		$this->admin_email = $email;
		$this->admin_password = $password;
		$this->admin_added_date = $dateTime;
		$this->admin_status = $status;
		$this->profile_pic = $picPath;
		$this->vc = $vc;
		$this->admin_last_update = null;
		$this->admin_login_status = null;
		*/

		/* Getters */
		public function getUserName(){
			return $this->admin_name;
		}
		public function getUserEmail(){
			return $this->admin_email;
		}
		public function getUserID(){
			return $this->admin_id;
		}
		public function getUserPassword(){
			return $this->admin_password;
		}
		public function getLastUpdated(){
			return $this->admin_last_update;
		}
		public function getAddedDate(){
			return $this->admin_added_date;
		}
		public function getUserStatus(){
			return $this->admin_status;
		}
		public function getUserPicture(){
			return $this->profile_pic;
		}
		public function getLoginStatus(){
			return $this->admin_login_status;
		}
		public function getUserVerificationCode(){
			return $this->vc;
		}
		public function userLogin($username, $password){
			$dbCon = new databaseManager();
			$query = "SELECT * FROM admin WHERE admin_email=? AND admin_password=?";
			if($data = $dbCon->executeQuery($query, array($username,$password), 'cread')[0]){
				$this->admin_login_status = true;
				$this->admin_id = $data["admin_id"];
				$this->admin_email = $data["admin_email"];
				$this->admin_password = $data["admin_password"];
				$this->admin_name = $data["admin_name"];
				$this->admin_last_update = $data["admin_last_update"];
				$this->admin_added_date = $data["admin_added_date"];
				$this->admin_status = $data["admin_status"];
				$this->profile_pic = $data["profile_pic"];
				/* vc mean verfication code */
				$this->vc = $data["vc"];
				$this->sessionManager->createSession("admin_info", serialize($this));
				header('location:login.php');
			}
		}
		public function userLogout($sessionArray){
			foreach($sessionArray as $item){
				if(true){
					return;
				}
			}
		}
		public function resetPassword($email, $password){
			$dbCon = new databaseManager();
			$query = "UPDATE admin SET admin_password=?, vc=? where admin_email=?";
			if($data = $dbCon->executeQuery($query, array($password, NULL, $email), 'update')){
				$this->farmer_vc = null;
				return true;
			}
			return false;
		}
		public function updatePasswordById($newPassword){
			$dbCon = new databaseManager();
			$query = "UPDATE admin SET admin_password=? WHERE admin_id=?";
			if($data = $dbCon->executeQuery($query, array($newPassword, $this->farmer_id), 'update')){
				$this->farmer_password = $newPassword;
				return true;
			}else{
				return false;
			}

		}
		public function isValidOldPassword($oldPwd){
			$dbCon = new databaseManager();
			$query = "SELECT count(*) as numb FROM admin WHERE admin_password=? and admin_id=?";
			if($dbCon->executeQuery($query, array($oldPwd, $this->farmer_id), 'cread')[0]['numb'] > 0){
				return true;
			}else{
				return false;
			}
		}
		public function sendPasswordRestRequest($userEmail, $hash){
			$dbCon = new databaseManager();
			/* echo "<script>alert('Message request k andar houn!')</script>"; */
			if($this->sendPasswordRestLink($userEmail, $hash)){
				//echo "<script>alert('email send ho chuka!')</script>";
				$query = "UPDATE admin set vc=? where admin_email=?";
				//echo "<script>alert('ab query chala raha hun!')</script>";
				if($dbCon->executeQuery($query, array($hash,$userEmail), 'update')){
					//echo "<script>alert('query chal gai!')</script>";
					return true;
				}else{
					//echo "<script>alert('query nhi chali!')</script>";
					return false;
				}
			}else{
				//echo "<script>alert('email send ny false return kia!')</script>";
				return false;
			}
		}
		public function sendPasswordRestLink($userEmail, $hash){
			/* echo "<script>alert('email function k andar hun!')</script>"; */
			$to      = $userEmail; // Send email to our user
			$subject = 'Drone | Password Reset'; // Give the email a subject
			$localhostmessage = '
			<br>
			We hope you are doing well!<br>
			
			<br>
			Please click this link to reset your password:<br>
			http://localhost/Drone/admin/newPassword.php?email='.$userEmail.'&hash='.$hash;

			$message = '
			<br>
			We hope you are doing well!<br>
			
			<br>
			Please click this link to reset your password:<br>
			http://dragonsoft.com.pk/drone/admin/newPassword.php?email='.$userEmail.'&hash='.$hash;
			// Our message above including the link


			$headers = 'From:info@dragonsoft.com.pk' . "\r\n"; // Set from headers
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			if(mail($to, $subject, $message, $headers)){ // Send our email
				//echo "<script>alert('email send kar dia hy!')</script>";
				return true;
			}else{
				//echo "<script>alert('email function false return kar raha hy!')</script>";
				return false;
			}
		}
		public function updateProfile(){
			$dbCon = new databaseManager();
			$query = "UPDATE admin SET admin_email=?, admin_name=?, profile_pic=? WHERE admin_id=?";
			if($data = $dbCon->executeQuery($query, array(
			    $this->admin_email,
                $this->admin_name,
                $this->profile_pic,
                $this->admin_id), 'update')){
                $this->sessionManager->updateSession("admin_info", serialize($this));
				return true;
			}else{
				return false;
			}
		}
		public function getMonthlyRegistrations(){
			$dbCon = new databaseManager();
			$result=false;
			$year = date("Y");
			$query = "SELECT COUNT(u.user_id) AS total, DATE_FORMAT(merge_date,'%c') AS month, YEAR(m.merge_date) AS year FROM (
			   SELECT ? AS merge_date
			   UNION SELECT ? AS merge_date
			   UNION SELECT ? AS merge_date
			   UNION SELECT ? AS merge_date
			   UNION SELECT ? AS merge_date
			   UNION SELECT ? AS merge_date
			   UNION SELECT ? AS merge_date
			   UNION SELECT ? AS merge_date
			   UNION SELECT ? AS merge_date
			   UNION SELECT ? AS merge_date
			   UNION SELECT ? AS merge_date
			   UNION SELECT ? AS merge_date
			  ) AS m
				LEFT JOIN pf_user u 
					   ON MONTH(m.merge_date) = MONTH(u.user_reg_date)
						  AND YEAR(m.merge_date) = YEAR(u.user_reg_date)
				GROUP BY m.merge_date
				ORDER BY MONTH(m.merge_date); ";
			if($data = $dbCon->executeQuery($query, array($year.'-01-01',$year.'-02-01',$year.'-03-01',$year.'-04-01',$year.'-05-01',$year.'-06-01',$year.'-07-01',$year.'-08-01',$year.'-09-01',$year.'-10-01',$year.'-11-01',$year.'-12-01'), 'cread')){
				$result = $data;
			}
			return $result;
		}

		public function getRandomPassword() {
			$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$pass = array(); //remember to declare $pass as an array
			$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
			for ($i = 0; $i < 8; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
			}
			return implode($pass); //turn the array into a string
		}

		public function GetGraphDataTemp(){
		   $dbCon = new databaseManager();
		   $result=false;
		   $year = date("Y");
		   $query = "SELECT MAX(u.temperature_value) AS total, DATE_FORMAT(merge_date,'%c') AS month, YEAR(m.merge_date) AS year
			 FROM (
				   SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				  ) AS m
		   LEFT JOIN sensor_data as u
			   ON MONTH(m.merge_date) = MONTH(u.upload_time)
			   AND YEAR(m.merge_date) = YEAR(u.upload_time)
		   GROUP BY m.merge_date
		   ORDER BY MONTH(m.merge_date); ";
		   if($data = $dbCon->executeQuery($query, array($year.'-01-01',$year.'-02-01',$year.'-03-01',$year.'-04-01',$year.'-05-01',$year.'-06-01',$year.'-07-01',$year.'-08-01',$year.'-09-01',$year.'-10-01',$year.'-11-01',$year.'-12-01'), 'cread')){
			$result = $data;
		   }
		   return $result;
		  }
        public function GetGraphDataHumidity(){
		   $dbCon = new databaseManager();
		   $result=false;
		   $year = date("Y");
		   $query = "SELECT MAX(u.humidity_value) AS total, DATE_FORMAT(merge_date,'%c') AS month, YEAR(m.merge_date) AS year
			 FROM (
				   SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				  ) AS m
		   LEFT JOIN sensor_data as u
			   ON MONTH(m.merge_date) = MONTH(u.upload_time)
			   AND YEAR(m.merge_date) = YEAR(u.upload_time)
		   GROUP BY m.merge_date
		   ORDER BY MONTH(m.merge_date); ";
		   if($data = $dbCon->executeQuery($query, array($year.'-01-01',$year.'-02-01',$year.'-03-01',$year.'-04-01',$year.'-05-01',$year.'-06-01',$year.'-07-01',$year.'-08-01',$year.'-09-01',$year.'-10-01',$year.'-11-01',$year.'-12-01'), 'cread')){
			$result = $data;
		   }
		   return $result;
		  }
		public function GetGraphDataLight(){
		   $dbCon = new databaseManager();
		   $result=false;
		   $year = date("Y");
		   $query = "SELECT MAX(u.light_value) AS total, DATE_FORMAT(merge_date,'%c') AS month, YEAR(m.merge_date) AS year
			 FROM (
				   SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				   UNION SELECT ? AS merge_date
				  ) AS m
		   LEFT JOIN sensor_data as u
			   ON MONTH(m.merge_date) = MONTH(u.upload_time)
			   AND YEAR(m.merge_date) = YEAR(u.upload_time)
		   GROUP BY m.merge_date
		   ORDER BY MONTH(m.merge_date); ";
		   if($data = $dbCon->executeQuery($query, array($year.'-01-01',$year.'-02-01',$year.'-03-01',$year.'-04-01',$year.'-05-01',$year.'-06-01',$year.'-07-01',$year.'-08-01',$year.'-09-01',$year.'-10-01',$year.'-11-01',$year.'-12-01'), 'cread')){
			$result = $data;
		   }
		   return $result;
		  }
		public function GetMaxValues(){
		   $dbCon = new databaseManager();
		   $result=false;
		   $year = date("Y");
		   $query = "SELECT MAX(humidity_value) as hum, MIN(humidity_value) as mhum, MAX(temperature_value) as temp, MIN(temperature_value) as mtemp FROM `sensor_data` ";
		   if($data = $dbCon->executeQuery($query, array(), 'cread')){
			$result = $data;
		   }
		   return $result;
		  }
		
	}

?>