<?php 
session_start();
require_once 'connection.php';
if(empty($_SESSION['id'])){
    if(!$user->isUserExistWithStatusApproved($_SESSION['id'])){
        if(!$jobSeeker->isExistJobSeekerWithUserId($_SESSION['id'])){
            header("location:index.php");
        }
    }
}
?>