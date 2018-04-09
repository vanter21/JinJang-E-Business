<?php

session_start();

if(isset($_POST['submit'])){
	
	include_once 'dbh.php';
	
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$jobskill = mysqli_real_escape_string($conn, $_POST['jobskill']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
	$usertype = mysqli_real_escape_string($conn, $_POST['usertype']);
	
	//Error handlers
	//Check for empty fields
	if(empty($username) ||  empty($email) || empty($password) || empty($confirmpassword)){
		echo "<script type='text/javascript'>alert('Fill all fields!');location.href='../register.php?register=empty'</script>";
		exit();
	}else{
		//Check if input characters are valid
		if($_POST['jobskill'] == ''){
			echo "<script type='text/javascript'>alert('Select a job skill!');location.href='../register.php?register=skillempty'</script>";
			exit();
		}else{
			if($_POST['password']!=$_POST['confirmpassword']){
				echo "<script type='text/javascript'>alert('Password do not match!');location.href='../register.php?register=mismatch'</script>";
				exit();
			}else{
				$sql = "SELECT * FROM users WHERE username='$username'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				
				if($resultCheck > 0){
					echo "<script type='text/javascript'>alert('Username taken!');location.href='../register.php?register=usertaken'</script>";
					exit();
				} else{
					//Hashing the password
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					//Insert the user into the database
					$sql = "INSERT INTO users (username, jobskill, email, password, usertype) VALUES ('$username','$jobskill','$email','$hashedPwd','$usertype');";
					$result = mysqli_query($conn, $sql);
					echo "<script type='text/javascript'>alert('Registration success!');location.href='../index.php?register=success'</script>";
					exit();	
				}
			}
		}
	}
} else{
	echo "<script type='text/javascript'>alert('Regostration error');location.href='../register.php?register=error'</script>";
	exit();
}
