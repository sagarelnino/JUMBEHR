<?php
class Controller
{
    public $db;
    public function __construct($con)
    {
        if(!isset($this->db)){
            $this->db = $con;
        }
    }
    public function isExistJobSeekerWithUserId($userId){
        $st = $this->db->prepare("SELECT * FROM jobSeeker WHERE userId=:userId");
        $st->bindParam(':userId',$userId);
        $st->execute();
        if($st->rowCount()){
            return true;
        }
        return false;
    }
    public function getCommittee(){
        $st = $this->db->prepare("SELECT * FROM committee");
        $st->execute();
        $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function getHonorarium(){
        $st = $this->db->prepare("SELECT * FROM committee");
        $st->execute();
        $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function getFounderMembers(){
        $st = $this->db->prepare("SELECT * FROM founder");
        $st->execute();
        $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function getAllMessages(){
        $st = $this->db->prepare("SELECT * FROM messages");
        $st->execute();
        $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function addMessage($name,$email,$phone,$message,$created){
        $st = $this->db->prepare("INSERT INTO messages(name,email,phone,message,created) VALUES(:name,:email,:phone,:message,:created)");
        $st->bindParam(':name',$name);
        $st->bindParam(':email',$email);
        $st->bindParam(':phone',$phone);
        $st->bindParam(':message',$message);
        $st->bindParam(':created',$created);
        $st->execute();
        return true;
    }
    public function deleteMessage($id){
        $st = $this->db->prepare("DELETE FROM messages WHERE id=:id");
        $st->bindParam(':id',$id);
        $st->execute();
        return true;
    }
    public function getAllSubscribers(){
        $st = $this->db->prepare("SELECT * FROM subscribers");
        $st->execute();
        $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function deleteSubscriber($id){
        $st = $this->db->prepare("DELETE FROM subscribers WHERE id=:id");
        $st->bindParam(':id',$id);
        $st->execute();
        return true;
    }
    public function getAllEvents(){
        $st = $this->db->prepare("SELECT * FROM events");
        $st->execute();
        $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function getEventById($id){
        $st = $this->db->prepare("SELECT * FROM events WHERE id=:id");
        $st->bindParam(':id',$id);
        $st->execute();
        $resultSet = $st->fetch(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function deleteEvent($id){
        $st = $this->db->prepare("DELETE FROM events WHERE id=:id");
        $st->bindParam(':id',$id);
        $st->execute();
        return true;
    }
    public function addEvent($title,$eventDate,$image,$description,$created){
        $st = $this->db->prepare("INSERT INTO events(title,eventDate,image,description,created) VALUES(:title,:eventDate,:image,:description,:created)");
        $st->bindParam(':title',$title);
        $st->bindParam(':eventDate',$eventDate);
        $st->bindParam(':image',$image);
        $st->bindParam(':description',$description);
        $st->bindParam(':created',$created);
        $st->execute();
        return true;
    }
    public function getFutureEvents($date){
        $st = $this->db->prepare("SELECT * FROM events WHERE eventDate>:date OR eventDate=:date");
        $st->bindParam(':date',$date);
        $st->execute();
        $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function getPastEvents($date){
        $st = $this->db->prepare("SELECT * FROM events WHERE eventDate<:date");
        $st->bindParam(':date',$date);
        $st->execute();
        $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
        return $resultSet;
    }

    public function getAllNotices(){
        $st = $this->db->prepare("SELECT * FROM notice ORDER BY created DESC");
        $st->execute();
        $resultSet = $st->fetchAll(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function getNoticeById($id){
        $st = $this->db->prepare("SELECT * FROM notice WHERE id=:id");
        $st->bindParam(':id',$id);
        $st->execute();
        $resultSet = $st->fetch(PDO::FETCH_OBJ);
        return $resultSet;
    }
    public function deleteNotice($id){
        $st = $this->db->prepare("DELETE FROM notice WHERE id=:id");
        $st->bindParam(':id',$id);
        $st->execute();
        return true;
    }
    public function addNotice($notice,$created){
        $st = $this->db->prepare("INSERT INTO notice(notice,created) VALUES (:notice,:created)");
        $st->bindParam(':notice',$notice);
        $st->bindParam(':created',$created);
        $st->execute();
        return true;
    }
    public static function dd($var){
        die('died'.'<pre>'.print_r($var, true));
    }

}

?>
