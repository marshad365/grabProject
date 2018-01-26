<?php
/**
 * Created by PhpStorm.
 * User: ma_sa
 * Date: 2018-01-25
 * Time: 10:08 PM
 */
require_once ('classDatabaseManager.php');
class Skill {
    //sk_id, skill_title, skill_status, skill_added_date, skill_last_update
    private $sk_id;
    private $skill_title;
    private $skill_status;
    private $skill_added_date;
    private $skill_last_update;
    public function __construct() {
        $this->sk_id = 0;
        $this->skill_title = null;
        $this->skill_status = 0;
        $this->skill_added_date = null;
        $this->skill_last_update = null;
    }

    public function setSkillID($id){
        $this->sk_id = $id;
    }
    public function setSkillTitle($title){
        $this->skill_title = $title;
    }
    public function setSkillStatus($status){
        $this->skill_status = $status;
    }
    public function setSkillAddedDate(){
        $this->skill_added_date = date('Y-m-d H:i:s', time());
    }

    /**
     * @return int
     */
    public function getSkillID(){
        return $this->sk_id;
    }

    /**
     * @return string
     */
    public function getSkillTitle(){
        return $this->skill_title;
    }

    /**
     * @return int
     */
    public function getSkillStatus() {
        return $this->skill_status;
    }

    /**
     * @return null
     */
    public function getSkillAddedDate() {
        return $this->skill_added_date;
    }

    /**
     * @return null
     */
    public function getSkillLastUpdate() {
        return $this->skill_last_update;
    }

    public function addSkill(){
        $dbCon = new databaseManager();
        $query = "INSERT INTO skill(skill_title, skill_status, skill_added_date) VALUES (?, ?, ?)";
        if($data = $dbCon->executeQuery($query, array(
            $this->skill_title, $this->skill_status, $this->skill_added_date
        ), 'create')){
            return true;
        }else{
            return false;
        }
    }

    public function updateSkill(){
        $dbCon = new databaseManager();
        $query = "UPDATE skill SET skill_title=?, skill_status=? WHERE sk_id=?";
        if($data = $dbCon->executeQuery($query, array(
            $this->skill_title, $this->skill_status, $this->sk_id
        ), 'update')){
            return true;
        }else{
            return false;
        }
    }

    public function deleteSkill(){
        $dbCon = new databaseManager();
        $query = "DELETE FROM skill WHERE sk_id=?";
        if($data = $dbCon->executeQuery($query, array($this->sk_id), 'delete')){
            return true;
        }else{
            return false;
        }
    }

    public function getAllSkills(){
        $dbCon = new databaseManager();
        $query = "SELECT sk_id AS 'ID', skill_title AS 'Title', skill_status AS 'Status', 
                  skill_added_date AS 'ADDED', skill_last_update AS 'UPDATED' FROM skill";
        if($data = $dbCon->executeQuery($query, array(0), 'sread')){
            return $data;
        }else{
            return false;
        }
    }

    public function getProjectRequiredSkills($projectID){
        $dbCon = new databaseManager();
        $query = "SELECT skill_id AS 'ID', skill_title AS 'Title' FROM skill, req_skill 
                  WHERE project_id = ? AND skill_id = sk_id";
        if($data = $dbCon->executeQuery($query, array($projectID), 'cread')){
            return $data;
        }else{
            return false;
        }
    }

    public function getStudentSkills($studentID){
        $dbCon = new databaseManager();
        $query = "SELECT skill_id AS 'ID', skill_title AS 'Title' FROM skill, skill_std 
                  WHERE std_id = ? AND skill_id = sk_id";
        if($data = $dbCon->executeQuery($query, array($studentID), 'cread')){
            return $data;
        }else{
            return false;
        }
    }
}