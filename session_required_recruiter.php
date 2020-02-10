<?php 
session_start();
require_once 'connection.php';
if(empty($_SESSION['id'])){
    if(!$user->isUserExistWithStatusApproved($_SESSION['id'])){
        if(!$recruiter->isExistRecruiterWithUserId($_SESSION['id'])){
            header("location:index.php");
        }
    }
}
?>