<?php
/**
 * Created by PhpStorm.
 * User: ma_sa
 * Date: 2017-12-26
 * Time: 10:34 PM
 */
require_once ("classDatabaseManager.php");
require_once ("classProject.php");
require_once("interfaces.php");
class Company implements User{
    //company_id, company_email, company_username, company_pwd, company_name, company_dec, company_contact,
    // company_status, logo_img, vc, company_add_date, company_last_update
    private $company_id;
    private $company_email;
    private $company_username;
    private $company_pwd;
    private $company_name;
    private $company_dec;
    private $company_contact;
    private $company_status;
    private $logo_img;
    private $vc;
    private $company_add_date;
    private $company_last_update;
    private $company_login_status;
    private $sessionManager = null;
    private $sessionArray = null;
    private $project=null;
    function __construct($sessionManager){
        $this->company_id = null;
        $this->company_email = null;
        $this->company_username = null;
        $this->company_pwd = null;
        $this->company_name = null;
        $this->company_dec = null;
        $this->company_contact = null;
        $this->company_status = null;
        $this->logo_img = null;
        $this->vc = null;
        $this->company_add_date = null;
        $this->company_last_update = null;
        $this->company_login_status = false;
        $this->sessionManager = $sessionManager;
        $this->sessionArray = array();
        $this->project = new Project();
    }

    public function setUserName($uname){
        $this->company_username = $uname;
    }
    public function setName($name){
        $this->company_name = $name;
    }
    public function setUserEmail($email){
        $this->company_email = $email;
    }
    public function setUserPassword($password){
        $this->company_pwd = md5($password);
    }
    public function setDesc($desc){
        $this->company_dec = $desc;
    }
    public function setAddedDate(){
        $this->company_add_date = date('Y-m-d H:i:s', time());
    }
    public function setUserStatus($status){
        $this->company_status = $status;
    }
    public function setUserPicture($picPath){
        $this->logo_img = $picPath;
    }
    public function setUserVC($vc){
        $this->vc = $vc;
    }
    public function setUserContact($contact){
        $this->company_contact = $contact;
    }

    /* Getters */
    public function getUserName(){
        return $this->company_username;
    }
    public function getName(){
        return $this->company_name;
    }
    public function getUserEmail(){
        return $this->company_email;
    }
    public function getUserID(){
        return $this->company_id;
    }
    public function getUserPassword(){
        return $this->company_pwd;
    }
    public function getDesc(){
        return $this->company_dec;
    }
    public function getLastUpdated(){
        return $this->company_last_update;
    }
    public function getAddedDate(){
        return date('Y:m:d', strtotime($this->company_add_date));
    }
    public function getUserStatus(){
        return $this->company_status;
    }
    public function getUserPicture(){
        return $this->logo_img;
    }
    public function getUserVC(){
        return $this->vc;
    }
    public function getUserContact(){
        return $this->company_contact;
    }
    public function getLoginStatus(){
        return $this->company_login_status;
    }
    public function addToSession($name){
        $this->sessionArray[] = $name;
    }
    public function getCompanyProject() {
        return $this->project;
    }
    /* Common Functions */
    public function registerCompany(){
        echo "<script>alert('everything normal');</script>";
        $dbCon = new databaseManager();
        echo "<script>alert('".$this->company_email."\n".$this->company_name."\n".
            $this->company_pwd."\n".$this->company_status."\n".
            $this->company_username."\n".$this->vc."\n".
            "');</script>";
        $query = "INSERT INTO company(company_name,company_email,company_username,company_pwd, company_status, company_add_date,vc)
                   VALUES (?,?,?,?,?,?,?)";
        if($data = $dbCon->executeQuery($query, array(
            $this->company_name,
            $this->company_email,
            $this->company_username,
            $this->company_pwd,
            $this->company_status,
            $this->company_add_date,
            $this->vc,
        ), 'create')){
            return true;
        }else{
            return false;
        }
    }
    public function userLogin($username, $password){
        $dbCon = new databaseManager();
        $query = "SELECT * FROM company WHERE (company_email=? OR company_username = ?) AND company_pwd=?";
        if($data = $dbCon->executeQuery($query, array($username,$username,$password), 'cread')[0]){
            $this->company_login_status = true;
            $this->company_id = $data["company_id"];
            $this->company_email = $data["company_email"];
            $this->company_username = $data["company_username"];
            $this->company_pwd = $data["company_pwd"];
            $this->company_name = $data["company_name"];
            $this->company_dec = $data["company_dec"];
            $this->company_last_update = $data["company_last_update"];
            $this->company_add_date = $data["company_add_date"];
            $this->company_status = $data["company_status"];
            $this->logo_img = $data["logo_img"];
            $this->company_contact = $data["company_contact"];
            $this->vc = $data["vc"];
            $this->sessionManager->createSession("company_info", serialize($this));
            $this->sessionArray[] = "company_info";
            header('location:login.php');
        }
    }
    public function userLogout(){
        foreach($this->sessionArray as $item){
            if(isset($_SESSION[$item])){
                $_SESSION[$item] = NULL;
                unset($_SESSION[$item]);
            }
        }
    }
    public function updateProfile(){
        $dbCon = new databaseManager();
        $query = "UPDATE company SET company_email=?,company_contact=?, company_name=?, logo_img=? WHERE company_id=?";
        if($data = $dbCon->executeQuery($query, array(
            $this->company_email,
            $this->company_contact,
            $this->company_name,
            $this->logo_img,
            $this->company_id), 'update')){
            $this->sessionManager->updateSession("company_info", serialize($this));
            return true;
        }else{
            return false;
        }
    }
    public function resetPassword($email, $password){
        $dbCon = new databaseManager();
        $query = "UPDATE company SET company_pwd=?, vc=? where company_email=?";
        if($data = $dbCon->executeQuery($query, array($password, NULL, $email), 'update')){
            $this->vc = null;
            return true;
        }
        return false;
    }
    public function updatePasswordById($newPassword){
        $dbCon = new databaseManager();
        $query = "UPDATE company SET company_pwd=? WHERE company_id=?";
        if($data = $dbCon->executeQuery($query, array($newPassword, $this->company_id), 'update')){
            $this->company_pwd = $newPassword;
            return true;
        }else{
            return false;
        }

    }
    public function sendPasswordRestRequest($email, $hash){
        $dbCon = new databaseManager();
        /* echo "<script>alert('Message request k andar houn!')</script>"; */
        if($this->sendPasswordRestLink($email, $hash)){
            //echo "<script>alert('email send ho chuka!')</script>";
            $query = "UPDATE company set vc=? where company_email=?";
            //echo "<script>alert('ab query chala raha hun!')</script>";
            if($dbCon->executeQuery($query, array($hash,$email), 'update')){
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

    public function isValidOldPassword($oldPwd){
        $dbCon = new databaseManager();
        $query = "SELECT count(*) as numb FROM company WHERE company_pwd=? and company_id=?";
        if($dbCon->executeQuery($query, array($oldPwd, $this->company_id), 'cread')[0]['numb'] > 0){
            return true;
        }else{
            return false;
        }
    }
    public function sendPasswordRestLink($userEmail, $hash){
        /* echo "<script>alert('email function k andar hun!')</script>"; */
        $to      = $userEmail; // Send email to our user
        $subject = 'Grab A Project | Password Reset'; // Give the email a subject
        $message = '
			<br>
			We hope you are doing well!<br>
			
			<br>
			Please click this link to reset your password:<br>
			http://localhost/grabproject/company/newPassword.php?email='.$userEmail.'&hash='.$hash;
        // Our message above including the link


        $headers = 'From:info@gap.com' . "\r\n"; // Set from headers
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
    public function sendVerificationEmail(){
        $subject = 'Signup | Verification'; // Give the email a subject
        $message = '
        <!doctype html>
        <html>
            <head>
                
            </head>
            <body>
                <p>
                    Thanks for signing up!<br>
                    Your account has been created, you can login using your credentials after you have activated your 
                    account by pressing the url below.<br>
                    <br>------------------------<br>
                    <br>
                    Please click this link to activate your account:<br><br><br>
                    <a style="background:dodgerblue;padding: 10px;text-decoration: none;border:2px solid white;color:white;font-weight:bold;" href="http://localhost/grabproject/verifyAccount.php?email='.$this->company_email.'&hash='
                    .$this->vc.'&userType='.md5("COMPANY").'">Activate Account</a>   
                </p>
            </body>
        </html>';
        $headers = 'From:noreply@grabaproject.com' . "\r\n"; // Set from headers
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        if(mail($this->company_email, $subject, $message, $headers)){ // Send our email
            return true;
        }else{
            return false;
        }

    }
    public function verifyRegistration($email, $hash){
        $dbCon = new databaseManager;
        $query = "SELECT count(*) AS num FROM company WHERE company_email=? AND vc=?";
        if($data = $dbCon->executeQuery($query,array($email, $hash), 'cread')){
            if($data[0]['num'] > 0){
                $query = "UPDATE company SET company_status=?, vc=? WHERE company_email=? AND vc=? AND company_status=?";
                if($data=$dbCon->executeQuery($query, array(1,'', $email, $hash, 0), 'update')){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }

    }


}