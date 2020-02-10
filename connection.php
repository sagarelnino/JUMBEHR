<?php
	require 'Model/User.php';
	require 'Model/Recruiter.php';
	require 'Model/JobSeeker.php';
	require 'Model/Function.php';
	try{
		$con=new PDO("mysql:host=localhost;dbname=jumb","root","");
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		$user = new User($con);
		$recruiter = new Recruiter($con);
		$jobSeeker = new JobSeeker($con);
		$controller = new Controller($con);
	}
	catch(PDOException $e) {
			 echo $e->getMessage();
    }
?>