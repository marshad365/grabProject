<?php
/**
 * Created by PhpStorm.
 * User: ma_sa
 * Date: 2018-01-25
 * Time: 10:08 PM
 */
require_once ('classDatabaseManager.php');
class Catagory {
    //cat_id, cat_title, cat_status, cat_added_date, cat_last_update
    private $cat_id;
    private $cat_title;
    private $cat_status;
    private $cat_added_date;
    private $cat_last_update;
    public function __construct() {
        $this->cat_id = 0;
        $this->cat_title = null;
        $this->cat_status = 0;
        $this->cat_added_date = null;
        $this->cat_last_update = null;
    }

    /**
     * @param $id:int
     */
    public function setCatagoryId($id){
        $this->cat_id = $id;
    }

    /**
     * @param $title:string
     */
    public function setCatagoryTitle($title){
        $this->cat_title = $title;
    }

    /**
     * @param $status:int
     */
    public function setCatagoryStatus($status){
        $this->cat_status = $status;
    }
    public function setCatagoryAddedDate(){
        $this->cat_added_date = date('Y-m-d H:i:s', time());
    }

    /**
     * @return int
     */
    public function getCatagoryId(){
        return $this->cat_id;
    }

    /**
     * @return string
     */
    public function getCatagoryTitle(){
        return $this->cat_title;
    }

    /**
     * @return int
     */
    public function getCatagoryStatus(){
        return $this->cat_status;
    }

    /**
     * @return dateTime
     */
    public function getCatagoryAddedDate(){
        return $this->cat_added_date;
    }

    /**
     * @return datetime
     */
    public function getCatagoryLastUpdate(){
        return $this->cat_last_update;
    }

    /**
     * @return bool
     */
    public function addCatagory(){
        $dbCon = new databaseManager();
        $query = "INSERT INTO catagory(cat_title, cat_status, cat_added_date) VALUES (?, ?, ?)";
        if($data = $dbCon->executeQuery($query, array(
            $this->cat_title, $this->cat_status, $this->cat_added_date
        ), 'create')){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @return bool
     */
    public function updateCatagory(){
        $dbCon = new databaseManager();
        $query = "UPDATE catagory SET cat_title=?, cat_status=? WHERE cat_id=?";
        if($data = $dbCon->executeQuery($query, array(
            $this->cat_title, $this->cat_status, $this->cat_id
        ), 'update')){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @return bool
     */
    public function deleteCatagory(){
        $dbCon = new databaseManager();
        $query = "DELETE FROM catagory WHERE cat_id=?";
        if($data = $dbCon->executeQuery($query, array($this->cat_id), 'delete')){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @return array|bool|string
     */
    public function getAllCatagories(){
        $dbCon = new databaseManager();
        $query = "SELECT cat_id AS 'ID', cat_title AS 'Title', cat_status AS 'Status', 
                  cat_added_date AS 'ADDED', cat_last_update AS 'UPDATED' FROM catagory";
        if($data = $dbCon->executeQuery($query, array(0), 'sread')){
            return $data;
        }else{
            return false;
        }
    }



}