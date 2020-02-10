<?php
    class User
    {
        public $db;
        public $id;
        public $email;
        public $password;
        public $type;
        public $status;
        public $paymentMethod;
        public $paymentNo;
        public $token;
        public $created;
        public $updated;
        CONST USER_STATUS_APPLIED = 'User applied';
        CONST USER_STATUS_APPROVED = 'User confirmed';
        CONST USER_TYPE_JOB_SEEKER = 'job_seeker';
        CONST USER_TYPE_RECRUITER = 'recruiter';
        public function __construct($con)
        {
            if(!isset($this->db)){
                $this->db = $con;
            }
        }
        public function isExistUserWithEmail($email){
            $st = $this->db->prepare("SELECT * FROM user WHERE email=:email");
            $st->bindParam(':email',$email);
            $st->execute();
            if($st->rowCount()){
                return true;
            }
            return false;
        }
        public function isExistUserWithEmailAndPassword($email,$password){
            $st = $this->db->prepare("SELECT * FROM user WHERE email=:email AND password=:password");
            $st->bindParam(':email',$email);
            $st->bindParam(':password',$password);
            $st->execute();
            if($st->rowCount()){
                return true;
            }
            return false;
        }
        public function getUserWithEmailAndPassword($email,$password){
            $st = $this->db->prepare("SELECT * FROM user WHERE email=:email AND password=:password");
            $st->bindParam(':email',$email);
            $st->bindParam(':password',$password);
            $st->execute();
            $resultSet = $st->fetch(PDO::FETCH_OBJ);
            return $resultSet;
        }
        public function isExistUserWithToken($token){
            $st = $this->db->prepare("SELECT * FROM user WHERE token=:token");
            $st->bindParam(':token',$token);
            $st->execute();
            if($st->rowCount()){
                return true;
            }
            return false;
        }
        public function addUser($email,$password,$type,$status,$paymentMethod,$paymentNo,$token,$created){
            $st = $this->db->prepare("INSERT INTO user(email,password,type,status,paymentMethod,paymentNo,token,created) VALUES (:email,:password,:type,:status,:paymentMethod,:paymentNo,:token,:created)");
            $st->bindParam(':email',$email);
            $st->bindParam(':password',$password);
            $st->bindParam(':type',$type);
            $st->bindParam(':status',$status);
            $st->bindParam(':paymentMethod',$paymentMethod);
            $st->bindParam(':paymentNo',$paymentNo);
            $st->bindParam(':token',$token);
            $st->bindParam(':created',$created);
            $st->execute();
            $id = $this->db->lastInsertId();
            return $id;
        }
        public function getUserById($id){
            $st = $this->db->prepare("SELECT * FROM user WHERE id=:id");
            $st->bindParam(':id',$id);
            $st->execute();
            $resultSet = $st->fetch(PDO::FETCH_OBJ);
            return $resultSet;
        }
        public function addSubscriber($email,$created){
            $st = $this->db->prepare("INSERT INTO subscribers(email,created) VALUES(:email,:created)");
            $st->bindParam(':email',$email);
            $st->bindParam(':created',$created);
            $st->execute();
            return true;
        }
        public function isExistSubscriber($email){
            $st = $this->db->prepare("SELECT * FROM subscribers WHERE email=:email");
            $st->bindParam(':email',$email);
            $st->execute();
            if($st->rowCount()){
                return true;
            }
            return false;
        }
        public function isExistAdminWithEmailAndPassword($email,$password){
            $st = $this->db->prepare("SELECT * FROM admin WHERE email=:email AND password=:password");
            $st->bindParam(':email',$email);
            $st->bindParam(':password',$password);
            $st->execute();
            if($st->rowCount()){
                return true;
            }
            return false;
        }
        public function getAdminWithEmailAndPassword($email,$password){
            $st = $this->db->prepare("SELECT * FROM admin WHERE email=:email AND password=:password");
            $st->bindParam(':email',$email);
            $st->bindParam(':password',$password);
            $st->execute();
            $resultSet = $st->fetch(PDO::FETCH_OBJ);
            return $resultSet;
        }
        public function getAdmins(){
            $st = $this->db->prepare("SELECT * FROM admin");
            $st->execute();
            $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
            return $resultSet;
        }
        public function deleteAdmin($id){
            $st = $this->db->prepare("DELETE FROM admin WHERE id=:id");
            $st->bindParam(':id',$id);
            $st->execute();
            return true;
        }
        public function addAdmin($email,$password,$created){
            $st = $this->db->prepare("INSERT INTO admin(email,password,created) VALUES(:email,:password,:created)");
            $st->bindParam(':email',$email);
            $st->bindParam(':password',$password);
            $st->bindParam(':created',$created);
            $st->execute();
            return true;
        }
        public function deleteUser($id){
            $st = $this->db->prepare("DELETE FROM user WHERE id=:id");
            $st->bindParam(':id',$id);
            $st->execute();
            return true;
        }
        public function updateStatus($status,$updated,$id){
            $st = $this->db->prepare("UPDATE user SET status=:status, updated=:updated WHERE id=:id");
            $st->bindParam(':status',$status);
            $st->bindParam(':updated',$updated);
            $st->bindParam(':id',$id);
            $st->execute();
            return true;
        }
        public function getUserByEmailAndTokenAndEmailNotConfirmed($email,$token){
            $isEmailConfirmed = 0;
            $st = $this->db->prepare("SELECT * FROM user WHERE email=:email AND token=:token AND isEmailConfirmed=:isEmailConfirmed");
            $st->bindParam(':email',$email);
            $st->bindParam(':token',$token);
            $st->bindParam(':isEmailConfirmed',$isEmailConfirmed);
            $st->execute();
            $resultSet = $st->fetch(PDO::FETCH_OBJ);
            return $resultSet;
        }
        public function verifyEmail($id){
            $st = $this->db->prepare("UPDATE user SET isEmailConfirmed=1 WHERE id=:id");
            $st->bindParam(':id',$id);
            $st->execute();
            return true;
        }
        public function isUserExistWithStatusApproved($id){
            $status = User::USER_STATUS_APPROVED;
            $st = $this->db->prepare("SELECT * FROM user WHERE id=:id AND status=:status");
            $st->bindParam(':id',$id);
            $st->bindParam(':status',$status);
            $st->execute();
            if($st->rowCount()){
                return true;
            }
            return false;
        }

    }
?>
