<?php
require 'session_required.php';
require '../connection.php';
$id = $_GET['id'];
$user->deleteAdmin($id);
$_SESSION['message'] = 'Admin deleted successfully';
header('location:admins.php');
?>