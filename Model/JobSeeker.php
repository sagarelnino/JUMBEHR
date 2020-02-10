<?php
    class JobSeeker
    {
        public $db;
        public $id;
        public $userId;
        public $name;
        public $university;
        public $phone;
        public $proficiency;
        public $homeDistrict;
        public $experience;
        public $sex;
        public $image;
        public function __construct($con)
        {
            if(!isset($this->db)){
                $this->db = $con;
            }
        }
        public function isExistJobSeekerWithUserId($userId){
            $st = $this->db->prepare("SELECT * FROM jobseeker WHERE userId=:userId");
            $st->bindParam(':userId',$userId);
            $st->execute();
            if($st->rowCount()){
                return true;
            }
            return false;
        }
        public function addJobSeeker($userId,$name,$university,$department,$phone,$proficiency,$homeDistrict,$sex,$experience){
            $st = $this->db->prepare("INSERT INTO jobseeker(userId,name,university,department,phone,proficiency,homeDistrict,experience,sex) VALUES (:userId,:name,:university,:department,:phone,:proficiency,:homeDistrict,:experience,:sex)");
            $st->bindParam(':userId',$userId);
            $st->bindParam(':name',$name);
            $st->bindParam(':university',$university);
            $st->bindParam(':department',$department);
            $st->bindParam(':phone',$phone);
            $st->bindParam(':proficiency',$proficiency);
            $st->bindParam(':homeDistrict',$homeDistrict);
            $st->bindParam(':experience',$experience);
            $st->bindParam(':sex',$sex);
            $st->execute();
            return true;
        }
        public function getConfirmedUsers(){
            $status = User::USER_STATUS_APPROVED;
            $st = $this->db->prepare("SELECT jobseeker.id, jobseeker.userId, jobseeker.name, jobseeker.phone, jobseeker.proficiency, jobseeker.homeDistrict, jobseeker.university, jobseeker.experience, jobseeker.department, jobseeker.sex,jobseeker.image,user.email  FROM jobseeker INNER JOIN user ON jobseeker.userId=user.id WHERE user.status='$status' AND user.isEmailConfirmed=1");
            $st->execute();
            $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
            return $resultSet;
        }
        public function getAppliedUsers(){
            $status = User::USER_STATUS_APPLIED;
            $st = $this->db->prepare("SELECT jobseeker.id, jobseeker.userId, jobseeker.name, jobseeker.phone, jobseeker.department, jobseeker.proficiency, jobseeker.homeDistrict, jobseeker.university, jobseeker.experience, jobseeker.sex,jobseeker.image,user.email,user.paymentMethod,user.paymentNo, user.isEmailConfirmed  FROM jobseeker INNER JOIN user ON jobseeker.userId=user.id WHERE user.status='$status'");
            $st->execute();
            $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
            return $resultSet;
        }
        public function getJobSeekerById($id){
            $st = $this->db->prepare("SELECT jobseeker.id, jobseeker.userId, jobseeker.name, jobseeker.phone, jobseeker.proficiency, jobseeker.homeDistrict, jobseeker.university, jobseeker.experience, jobseeker.sex,jobseeker.image,jobseeker.bio,jobseeker.cv,jobseeker.age,jobseeker.dob,jobseeker.department,user.status,user.type,user.email,user.paymentMethod,user.paymentNo,user.created  FROM jobseeker INNER JOIN user ON jobseeker.userId=user.id WHERE jobseeker.userId=:id");
            $st->bindParam(':id',$id);
            $st->execute();
            $resultSet = $st->fetch(PDO::FETCH_OBJ);
            return $resultSet;
        }
        public function deleteJobSeeker($id){
            $st = $this->db->prepare("DELETE FROM jobseeker WHERE id=:id");
            $st->bindParam(':id',$id);
            $st->execute();
            return true;
        }
    }

?>
