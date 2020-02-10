<?php
require 'session_required.php';
require '../connection.php';
$id = $_GET['id'];
$controller->deleteNotice($id);
$_SESSION['message'] = 'Notice deleted successfully';
header('location:notices.php');
?>