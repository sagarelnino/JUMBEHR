<?php
require 'session_required.php';
require '../connection.php';
$id = $_GET['id'];
$recruiterDetails = $recruiter->getRecruiterById($id);
$recruiter->deleteRecruiter($id);
$user->deleteUser($recruiterDetails->userId);
$_SESSION['message'] = 'Recruiter deleted successfully';
header('location:subscribers.php');
?>