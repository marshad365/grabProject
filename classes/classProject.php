<?php
/**
 * Created by PhpStorm.
 * User: ma_sa
 * Date: 2018-01-25
 * Time: 11:33 AM
 */
require_once ('classDatabaseManager.php');
require_once ('classCatagory.php');
require_once ('classSkill.php');
class Project {
    //project_id, project_name, project_post_date, project_company_id, project_des, project_cat,
    // project_last_update, project_status,
    private $project_id;
    private $project_title;
    private $project_desc;
    private $project_attachments;
    private $project_catagory;
    private $project_skill;
    private $project_post_date;
    private $project_last_update;
    private $project_status;
    private $project_company_id;
    private $reqSkills;

    /**
     * Project constructor.
     */
    function  __construct() {
        $this->project_id = 0;
        $this->project_title = null;
        $this->project_desc = null;
        $this->project_attachments = array();
        $this->project_catagory = new Catagory();
        $this->project_skill = new Skill();
        $this->project_post_date = null;
        $this->project_last_update = null;
        $this->project_company_id = 0;
        $this->project_status = 1;
        $this->reqSkills = array();
    }

    /**
     * @param $id
     */
    public function setProjectId($id){
        $this->project_id = $id;
    }

    /**
     * @param $title
     */
    public function setProjectTitle($title){
        $this->project_title = $title;
    }

    /**
     * @param $desc
     */
    public function setProjectDesc($desc){
        $this->project_desc = $desc;
    }

    /**
     * @param $attachments
     */
    public function setProjectAttachments($attachments){
        $this->project_attachments = $attachments;
    }

    /**
     *
     */
    public function setProjectPostDate(){
        $this->project_post_date = date("Y-m-d H:i:s", time());
    }

    /**
     * @param $status
     */
    public function setProjectStatus($status){
        $this->project_status = $status;
    }

    /**
     * @param $id
     */
    public function setProjectCompanyId($id){
        $this->project_company_id = $id;
    }

    /**
     * @param $skills:array
     */
    public function setReqSkills($skills){
        $this->reqSkills = $skills;
    }

    /**
     * @return int
     */
    public function getProjectId(){
        return $this->project_id;
    }

    /**
     * @return null
     */
    public function getProjectTitle(){
        return $this->project_title;
    }

    /**
     * @return null
     */
    public function getProjectDesc(){
        return $this->project_desc;
    }

    /**
     * @return array
     */
    public function getProjectAttachments(){
        return $this->project_attachments;
    }

    /**
     * @return array
     */
    public function getReqSkills(){
        return $this->reqSkills;
    }

    /**
     * @return Catagory
     */
    public function getProjectCatagory(){
        return $this->project_catagory;
    }

    /**
     * @return object: Skill
     */
    public function getProjectSkill(){
        return $this->project_skill;
    }

    /**
     * @return datetime
     */
    public function getProjectPostDate(){
        return $this->project_post_date;
    }

    /**
     * @return datetime
     */
    public function getProjectLastUpdate(){
        return $this->project_last_update;
    }

    /**
     * @return int
     */
    public function getProjectStatus(){
        return $this->project_status;
    }

    /**
     * @return int
     */
    public function getProjectCompanyId(){
        return $this->project_company_id;
    }

    /**
     * @return bool
     */
    public function postProject(){
        //project_id, project_name, project_post_date, project_company_id, project_des, project_budget, project_last_update, project_status
        $dbCon = new databaseManager();
        $query = "INSERT INTO project(project_name, project_post_date, project_company_id, project_des, project_cat, 
                    project_status ) VALUES (?, ?, ?, ?, ?, ?)";
        $dbCon->startTransaction();
        $subSkillExecuted = false;
        $attachementsAdded = false;
        $reqiredSkillsAdded = false;
        if($data = $dbCon->executeQuery($query, (array($this->project_title,
            $this->project_post_date,
            $this->project_company_id,
            $this->project_desc,
            $this->project_catagory->getCatagoryId(),
            $this->project_status)), 'create')){
            $lastInsertId = $data[0]['project_id'];
            $reqiredSkillsAdded = $this->project_skill->addProjectRequiredSkills($lastInsertId, $this->reqSkills, $dbCon);
            if(!empty($this->project_attachments)){
                $subQueryAttachments = "INSERT INTO upload(projec_id, upload_date, file, status) VALUES (?, ?, ?, ?)";
                foreach ($this->project_attachments as $file){
                    if($dbCon->executeQuery($subQueryAttachments, array($lastInsertId, $file), 'create')){
                        $attachementsAdded = true;
                        continue;
                    }else{
                        $attachementsAdded = false;
                        break;
                    }
                }
            }
        }

        if($reqiredSkillsAdded && $attachementsAdded){
            $dbCon->commitTransaction();
            return true;
        }else{
            $dbCon->rollBackTransaction();
            return false;
        }
    }

    /**
     * @return array|bool|string
     */
    public function getAllProjects(){
        $dbCon = new databaseManager();
        $query = "SELECT project_id, project_name, project_post_date, project_company_id, project_des, project_cat, 
                    project_budget, project_last_update, project_status FROM project";
        if($data = $dbCon->executeQuery($query, array(0), 'sread')){
            return $data;
        }
        return false;
    }

    /**
     * @param $id
     * @return array|bool|string
     */
    public function getCompanyProjects($id){
        $dbCon = new databaseManager();
        $query = "SELECT project_id, project_name, project_post_date, project_company_id, project_des, project_cat, 
                    project_budget, project_last_update, project_status FROM  project WHERE project_company_id=?";
        if($data = $dbCon->executeQuery($query, array($id), 'cread')){
            return $data;
        }
        return false;
    }

    /**
     * @param $id
     * @return bool
     */
    public function getProjectDetails($id){
        $dbCon = new databaseManager();
        $query = "SELECT project_id AS 'ID', project_name AS 'Title', project_post_date 'Posted', 
                  project_company_id AS 'Company', project_des AS 'Desc', project_cat AS 'CatagoryID',
                  cat_title AS 'CatagoryTitle', project_budget AS 'Budget',project_last_update AS 'Updated', 
                  project_status AS 'Status' 
                  FROM  project, catagory WHERE project_id=? AND projec_cat = cat_id";
        if($data = $dbCon->executeQuery($query, array($id), 'cread')[0]){
             $this->project_id = $data['ID'];
             $this->project_title = $data['Title'];
             $this->project_post_date = $data['Posted'];
             $this->project_company_id = $data['Company'];
             $this->project_desc = $data['Desc'];
             $this->project_catagory->setCatagoryId($data['CatagoryID']);
             $this->project_catagory->setCatagoryTitle($data['CatagoryTitle']);
             $this->project_last_update = $data['Updated'];
             $this->project_status = $data['Status'];
             $this->reqSkills = $this->project_skill->getProjectRequiredSkills($data['ID']);
             return true;
        }
        return false;
    }




}