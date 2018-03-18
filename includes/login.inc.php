<?php

session_start();

if(isset($_POST['submit'])){
	include 'dbh.php';
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	//Error handlers
	//Check for empty fields
	if(empty($username) ||  empty($password)){
		header("Location: ../index.php?login=empty");
		exit();
	}else{
		$sql = "SELECT * FROM users WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck < 1){
			header("Location: ../login.php?login=error1");
			exit();
		}else{
			if($row = mysqli_fetch_assoc($result)){
				$hashedPwdCheck = password_verify($password, $row['password']);
				if($hashedPwdCheck == false){
					header("Location: ../login.php?login=error");
					exit();
				}elseif($hashedPwdCheck == true){
					//Log in user
					$_SESSION['u_id'] = $row['id'];
					$_SESSION['u_username'] = $row['username'];
					$_SESSION['u_jobskill'] = $row['jobskill'];
					header("Location: ../index.php?login=success");
					exit();
				}
			}
		}
	}
	
}else{
	header("Location: ../login.php?login=error");
	exit();
}