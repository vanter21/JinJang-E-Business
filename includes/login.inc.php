<?php

session_start();

if(isset($_POST['submit'])){
	include 'dbh.php';
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	//Error handlers
	//Check for empty fields
	if(empty($username) ||  empty($password)){		
		echo "<script type='text/javascript'>alert('Empty fields!');location.href='../login.php?login=empty'</script>";
		exit();
	}else{
		$sql = "SELECT * FROM users WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck < 1){
			echo "<script type='text/javascript'>alert('Incorrect username or password');location.href='../login.php?login=error'</script>";
			exit();
		}else{
			if($row = mysqli_fetch_assoc($result)){
				$hashedPwdCheck = password_verify($password, $row['password']);
				if($hashedPwdCheck == false){
					echo "<script type='text/javascript'>alert('Incorrect username or password');location.href='../login.php?login=empty'</script>";
					exit();
				}elseif($hashedPwdCheck == true){
					//Log in user
					$_SESSION['u_id'] = $row['id'];
					$_SESSION['u_username'] = $row['username'];
					$_SESSION['u_jobskill'] = $row['jobskill'];
					$_SESSION['u_email'] = $row['email'];
					$_SESSION['u_usertype'] = $row['usertype'];
					echo "<script type='text/javascript'>alert('Login success!');location.href='../index.php?login=success'</script>";
					exit();
				}
			}
		}
	}
	
}else{
	echo "<script type='text/javascript'>alert('Login error');location.href='../login.php?login=error'</script>";
	exit();
}