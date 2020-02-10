<?php
require 'session_required.php';
require '../connection.php';
$id = $_GET['id'];
$userDetails = $jobSeeker->getJobSeekerById($id);
$jobSeeker->deleteJobSeeker($id);
$user->deleteUser($userDetails->userId);
$_SESSION['message'] = 'User deleted successfully';
header('location:members.php');
?>