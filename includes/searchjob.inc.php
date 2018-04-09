<?php

session_start();

if(isset($_POST['submit'])){
	
	include_once 'dbh.php';
	
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$wage = mysqli_real_escape_string($conn, $_POST['wage']);
	$wage = floatval($wage);
	
	//Error handlers
	//Check for empty fields
	if(empty($title)){
		echo "<script type='text/javascript'>alert('Fill all fields!');location.href='../searchjob.php?postjob=empty'</script>";
		exit();
	}else{
		//Insert the user into the database
		$username = $_SESSION['u_username'];	
		$sql = "INSERT INTO acceptedjobs (username, title, wage) VALUES ('$username','$title','$wage');";
		$result = mysqli_query($conn, $sql);
		
		$sql = "UPDATE jobs SET available=false WHERE title='$title'";
		$result = mysqli_query($conn, $sql);
		echo "<script type='text/javascript'>alert('Job chosen!');location.href='../index.php?searchjob=success'</script>";
		exit();	
	}
	
} else{
	echo "<script type='text/javascript'>alert('Accept job error');location.href='../searchjob.php?postjob=error'</script>";
	exit();
}