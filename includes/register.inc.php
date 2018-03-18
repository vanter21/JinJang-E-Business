<?php

session_start();

if(isset($_POST['submit'])){
	
	include_once 'dbh.php';
	
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$jobskill = mysqli_real_escape_string($conn, $_POST['jobskill']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
	
	//Error handlers
	//Check for empty fields
	if(empty($username) || empty($jobskill) || empty($password) || empty($confirmpassword)){
		header("Location: ../register.php?register=empty");
		exit();
	}else{
		//Check if input characters are valid
		if(!preg_match("/^[a-zA-Z]*$/", $jobskill)){
			header("Location: ../register.php?register=invalid");
			exit();
		}else{
			if($_POST['password']!=$_POST['confirmpassword']){
				header("Location: ../register.php?register=incorrectpassword");
				exit();
			}else{
				$sql = "SELECT * FROM users WHERE username='$username'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				
				if($resultCheck > 0){
					header("Location: ../register.php?register=usertaken");
					exit();
				} else{
					//Hashing the password
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					//Insert the user into the database
					$sql = "INSERT INTO users (username, jobskill, password) VALUES ('$username','$jobskill','$hashedPwd');";
					$result = mysqli_query($conn, $sql);
					header("Location: ../index.php?register=success");
					exit();	
				}
			}
		}
	}
} else{
	header("Location: ../register.php");
	exit();
}
