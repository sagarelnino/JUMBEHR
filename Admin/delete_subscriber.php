<?php
require 'session_required.php';
require '../connection.php';
$id = $_GET['id'];
$controller->deleteSubscriber($id);
$_SESSION['message'] = 'Subscriber deleted successfully';
header('location:subscribers.php');
?>