<?php
require 'session_required.php';
require '../connection.php';
$id = $_GET['id'];
$controller->deleteMessage($id);
$_SESSION['message'] = 'Message deleted successfully';
header('location:messages.php');
?>