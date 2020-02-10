<?php
require 'session_required.php';
require '../connection.php';
$id = $_GET['id'];
$controller->deleteEvent($id);
$_SESSION['message'] = 'Event deleted successfully';
header('location:events.php');
?>