<?php
/**
 * Created by PhpStorm.
 * User: ma_sa
 * Date: 2017-12-26
 * Time: 10:31 PM
 */
interface User{
    /* Setters */
    public function setUserName($name);
    public function setUserEmail($email);
    public function setUserPassword($password);
    public function setAddedDate();
    public function setUserStatus($status);
    public function setUserContact($contact);
    public function setUserPicture($picPath);
    public function setUserVC($vc);

    /* Getters */
    public function getUserName();
    public function getUserEmail();
    public function getUserID();
    public function getUserPassword();
    public function getLastUpdated();
    public function getAddedDate();
    public function getUserContact();
    public function getUserStatus();
    public function getUserPicture();
    public function getUserVC();

    /* Common Functions */
    public function userLogin($username, $password);
    public function userLogout();
    public function updateProfile();
    public function resetPassword($email, $password);
    public function updatePasswordById($newPassword);
    public function sendPasswordRestRequest($email, $password);
    public function sendPasswordRestLink($email, $password);
    public function isValidOldPassword($oldPwd);
}