<?php
    class Recruiter
    {
        public $db;
        public $id;
        public $userId;
        public $name;
        public $phone;
        public $company;
        public $designation;
        public $university;
        public $image;
        public function __construct($con)
        {
            if(!isset($this->db)){
                $this->db = $con;
            }
        }
        public function isExistRecruiterWithUserId($userId){
            $st = $this->db->prepare("SELECT * FROM recruiter WHERE userId=:userId");
            $st->bindParam(':userId',$userId);
            $st->execute();
            if($st->rowCount()){
                return true;
            }
            return false;
        }
        public function addRecruiter($userId,$name,$phone,$company,$designation,$university){
            $st = $this->db->prepare("INSERT INTO recruiter (userId,name,phone,company,designation,university) VALUES (:userId,:name,:phone,:company,:designation,:university)");
            $st->bindParam(':userId',$userId);
            $st->bindParam(':name',$name);
            $st->bindParam(':phone',$phone);
            $st->bindParam(':company',$company);
            $st->bindParam(':designation',$designation);
            $st->bindParam(':university',$university);
            $st->execute();
            return true;
        }
        public function getRecruiters(){
            $st = $this->db->prepare("SELECT * FROM recruiter");
            $st->execute();
            $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
            return $resultSet;
        }
        public function getConfirmedRecruiters(){
            $status = User::USER_STATUS_APPROVED;
            $st = $this->db->prepare("SELECT recruiter.id, recruiter.userId, recruiter.name, recruiter.phone, recruiter.company, recruiter.designation, recruiter.university, recruiter.image, user.email FROM recruiter INNER JOIN user ON recruiter.userId=user.id WHERE user.status='$status'");
            $st->execute();
            $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
            return $resultSet;
        }
        public function getAppliedRecruiters(){
            $status = User::USER_STATUS_APPLIED;
            $st = $this->db->prepare("SELECT recruiter.id, recruiter.userId, recruiter.name, recruiter.phone, recruiter.company, recruiter.designation, recruiter.university, recruiter.image, user.email, user.paymentMethod, user.paymentNo, user.isEmailConfirmed FROM recruiter INNER JOIN user ON recruiter.userId=user.id WHERE user.status='$status'");
            $st->execute();
            $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
            return $resultSet;
        }
        public function deleteRecruiter($id){
            $st = $this->db->prepare("DELETE FROM recruiter WHERE id=:id");
            $st->bindParam(':id',$id);
            $st->execute();
            return true;
        }
        public function getRecruiterById($id){
            $st = $this->db->prepapre("SELECT * FROM recruiter WHERE id=:id");
            $st->bindParam(':id',$id);
            $st->execute();
            $resultSet = $st->fetch(PDO::FETCH_OBJ);
            return $resultSet;
        }
    }

?>
