<?php

session_start();

if(isset($_POST['submit'])){
	
	include_once 'dbh.php';
	
	$jobid = mysqli_real_escape_string($conn, $_POST['jobid']);
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$wage = mysqli_real_escape_string($conn, $_POST['wage']);
	$wage = floatval($wage);
	$username = $_SESSION['u_username'];
	
	//Error handlers
	if(empty($jobid)){
		echo "<script type='text/javascript'>alert('Enter a Job ID!');location.href='../searchjob.php?choosejob=empty'</script>";
		exit();
	}else{
		//Insert the user into the database
		$username = $_SESSION['u_username'];
		$sql = 'SELECT * FROM jobs';
		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($query))
			if($row['id'] == $jobid)
		{
			$title = $row['title'];
			$wage = $row['wage'];
			$postuser = $row['postuser'];
		}
		
		$sql = "INSERT INTO acceptedjobs (jobid, username, title, wage, postuser) VALUES ('$jobid', '$username','$title','$wage','$postuser');";
		$result = mysqli_query($conn, $sql);
		
		$sql = "UPDATE jobs SET available=false WHERE id='$jobid'";
		$result = mysqli_query($conn, $sql);
		$sql = "UPDATE jobs SET accepteduser='".$username."' WHERE id='$jobid'";
		$result = mysqli_query($conn, $sql);
		echo "<script type='text/javascript'>alert('Job chosen!');location.href='../index.php?choosejob=success'</script>";
		exit();	
	}
	
} else{
	echo "<script type='text/javascript'>alert('Accept job error');location.href='../searchjob.php?choosejob=error'</script>";
	exit();
}