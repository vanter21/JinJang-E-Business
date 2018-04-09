<?php

session_start();

if(isset($_POST['submit'])){
	
	include_once 'dbh.php';
	
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$jobskill = mysqli_real_escape_string($conn, $_POST['jobskill']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$wage = mysqli_real_escape_string($conn, $_POST['wage']);
	$wage = floatval($wage);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$contact = mysqli_real_escape_string($conn, $_POST['contact']);
	
	//Error handlers
	//Check for empty fields
	if(empty($title) ||  empty($jobskill) || empty($address) || empty($description) || empty($wage) || empty($email) || empty($contact)){
		echo "<script type='text/javascript'>alert('Fill all fields!');location.href='../postjob.php?postjob=empty'</script>";
		exit();
	}else{
		//Check if input characters are valid
		if($_POST['jobskill'] == ''){
			echo "<script type='text/javascript'>alert('Select a job skill!');location.href='../postjob.php?postjob=skillempty'</script>";
			exit();
		}else{
			//Insert the user into the database
			$sql = "INSERT INTO jobs (title, jobskill, description, address, wage, email, contact, available) VALUES ('$title','$jobskill','$description','$address','$wage','$email','$contact',true);";
			$result = mysqli_query($conn, $sql);
			echo "<script type='text/javascript'>alert('Job posted!');location.href='../index.php?postjob=success'</script>";
			exit();	
		}
	}
} else{
	echo "<script type='text/javascript'>alert('Post job error');location.href='../postjob.php?postjob=error'</script>";
	exit();
}