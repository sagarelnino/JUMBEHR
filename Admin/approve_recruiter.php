<?php
require 'session_required.php';
require '../connection.php';
$id = $_GET['id'];
$status = User::USER_STATUS_APPROVED;
$updated = date('Y-m-d H:i:s');
$user->updateStatus($status,$updated,$id);
$_SESSION['message'] = 'USer approved successfully';
header('location:recruiters.php');
?>