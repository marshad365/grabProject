<?php
/**
 * Created by PhpStorm.
 * User: ma_sa
 * Date: 2018-01-25
 * Time: 11:33 AM
 */
require_once ('classDatabaseManager.php');
class Project {
    //project_id, project_name, project_post_date, project_company_id, project_des, project_budget, project_last_update, project_status
    private $project_id;
    private $project_title;
    private $project_desc;
    private $project_attachments;
    private $project_catagory;
    private $project_skills;
    private $project_post_date;
    private $project_last_update;
    private $project_status;
    private $project_company_id;

    function  __construct() {
        $this->project_id = 0;
        $this->project_title = null;
        $this->project_desc = null;
        $this->project_attachments = array();
        $this->project_catagory = 0;
        $this->project_skills = array();
        $this->project_post_date = null;
        $this->project_last_update = null;
        $this->project_company_id = 0;
        $this->project_status = 1;
    }

    public function setProjectId($id){
        $this->project_id = $id;
    }
    public function setProjectTitle($title){
        $this->project_title = $title;
    }
    public function setProjectDesc($desc){
        $this->project_desc = $desc;
    }
    public function setProjectAttachments($attachments){
        $this->project_attachments = $attachments;
    }
    public function setProjectCatagory($catagory){
        $this->project_catagory = $catagory;
    }
    public function setProjectSkills($skills){
        $this->project_skills = $skills;
    }
    public function setProjectPostDate(){
        $this->project_post_date = date("Y-m-d H:i:s", time());
    }
    public function setProjectStatus($status){
        $this->project_status = $status;
    }
    public function setProjectCompanyId($id){
        $this->project_company_id = $id;
    }
    public function getProjectId(){
        return $this->project_id;
    }
    public function getProjectTitle(){
        return $this->project_title;
    }
    public function getProjectDesc(){
        return $this->project_desc;
    }
    public function getProjectAttachments(){
        return $this->project_attachments;
    }
    public function getProjectCatagory(){
        return $this->project_catagory;
    }
    public function getProjectSkills(){
        return $this->project_skills;
    }
    public function getProjectPostDate(){
        return $this->project_post_date;
    }
    public function getProjectLastUpdate(){
        return $this->project_last_update;
    }
    public function getProjectStatus(){
        return $this->project_status;
    }
    public function getProjectCompanyId(){
        return $this->project_company_id;
    }
    public function postProject(){
        //project_id, project_name, project_post_date, project_company_id, project_des, project_budget, project_last_update, project_status
        $dbCon = new databaseManager();
        $query = "INSERT INTO project(project_name, project_post_date, project_company_id, project_des, project_status ) 
                  VALUES (?, ?, ?, ?, ?)";
        $dbCon->startTransaction();
        $subSkillExecuted = false;
        $subAttachementsExecuted = false;
        if($data = $dbCon->executeQuery($query, (array($this->project_title,
            $this->project_post_date,
            $this->project_company_id,
            $this->project_desc,
            $this->project_status)), 'create')){
            $lastInsertId = $data[0]['project_id'];
            if(!empty($this->project_skills)){
                $subQuerySkills = "INSERT INTO req_skill(project_id, skill_id) VALUES (?, ?)";
                foreach ($this->project_skills as $skill){
                    if($dbCon->executeQuery($subQuerySkills, array($lastInsertId, $skill), 'create')){
                        $subSkillExecuted = true;
                        continue;
                    }else{
                        $subSkillExecuted = false;
                        break;
                    }
                }
            }
            if(!empty($this->project_attachments)){
                $subQueryAttachments = "INSERT INTO upload(projec_id, upload_date, file, status) VALUES (?, ?, ?, ?)";
                foreach ($this->project_attachments as $file){
                    if($dbCon->executeQuery($subQueryAttachments, array($lastInsertId, $file), 'create')){
                        $subAttachementsExecuted = true;
                        continue;
                    }else{
                        $subAttachementsExecuted = false;
                        break;
                    }
                }
            }
        }

        if($subSkillExecuted && $subAttachementsExecuted){
            $dbCon->commitTransaction();
        }else{
            $dbCon->rollBackTransaction();
        }
    }

    public function getAllProjects(){
        $dbCon = new databaseManager();
        $query = "SELECT project_id, project_name, project_post_date, project_company_id, project_des, 
                    project_budget, project_last_update, project_status FROM project";
        if($data = $dbCon->executeQuery($query, array(0), 'sread')){
            return $data;
        }
        return false;
    }

    public function getCompanyProjects($id){
        $dbCon = new databaseManager();
        $query = "SELECT project_id, project_name, project_post_date, project_company_id, project_des, 
                    project_budget, project_last_update, project_status FROM  project WHERE project_company_id=?";
        if($data = $dbCon->executeQuery($query, array($id), 'cread')){
            return $data[0];
        }
        return false;
    }


}