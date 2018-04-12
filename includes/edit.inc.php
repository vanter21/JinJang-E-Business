<?php

session_start();

if(isset($_POST['submit'])){
	
	include_once 'dbh.php';
	
	$newusername = mysqli_real_escape_string($conn, $_POST['newusername']);
	$newemail = mysqli_real_escape_string($conn, $_POST['newemail']);
	$newjobskill = mysqli_real_escape_string($conn, $_POST['newjobskill']);
	$newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);
	$newconfirmpassword = mysqli_real_escape_string($conn, $_POST['newconfirmpassword']);
	$id = $_SESSION['u_id'];
	
	//Error handlers
	//Check if inputs are empty
	if(!empty($newusername)){
		$sql = "SELECT * FROM users WHERE username='$newusername'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck > 0){
			echo "<script type='text/javascript'>alert('Username taken!');location.href='../profile.php?profile=usertaken'</script>";
			exit();
		}else{
			$sql = "UPDATE users SET username = '".$newusername."' WHERE id = '".$id."' ";
			$result = mysqli_query($conn, $sql);
			$_SESSION['u_username'] = $newusername;
			echo "<script type='text/javascript'>alert('Update success!');location.href='../profile.php?profile=success'</script>";
			exit();			
		}
		echo "<script type='text/javascript'>alert('Update error!');location.href='../profile.php?profile=error'</script>";
		exit();
	}
	if(!empty($newemail)){
		$sql = "SELECT * FROM users WHERE email='$newemail'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck > 0){
			echo "<script type='text/javascript'>alert('Email already in use!');location.href='../profile.php?profile=emailtaken'</script>";
			exit();
		}else{
			$sql = "UPDATE users SET email = '".$newemail."' WHERE id = '".$id."' ";
			$result = mysqli_query($conn, $sql);
			$_SESSION['u_email'] = $newemail;
			echo "<script type='text/javascript'>alert('Update success!');location.href='../profile.php?profile=success'</script>";
			exit();			
		}
		echo "<script type='text/javascript'>alert('Update error!');location.href='../profile.php?profile=error'</script>";
		exit();
	}
	if(!empty($newpassword)){
		if($_POST['newpassword']!=$_POST['newconfirmpassword']){
			echo "<script type='text/javascript'>alert('Password do not match!');location.href='../profile.php?profile=mismatch'</script>";
			exit();
		}else{
			//Hashing the password
			$hashedPwd = password_hash($newpassword, PASSWORD_DEFAULT);
			//Update user password
			$sql = "UPDATE users SET password = '".$hashedPwd."' WHERE id = '".$id."' ";
			$result = mysqli_query($conn, $sql);
			echo "<script type='text/javascript'>alert('Update success!');location.href='../profile.php?update=success'</script>";
			exit();	
		}
		echo "<script type='text/javascript'>alert('Update error!');location.href='../profile.php?profile=error'</script>";
		exit();
	}	
	if(!$_POST['newjobskill'] == ''){
		$sql = "UPDATE users SET jobskill = '".$newjobskill."' WHERE id = '".$id."' ";
		$result = mysqli_query($conn, $sql);
		$_SESSION['u_jobskill'] = $newjobskill;
		echo "<script type='text/javascript'>alert('Update success!');location.href='../profile.php?profile=success'</script>";
		exit();
	}
	echo "<script type='text/javascript'>alert('Nothing to update');location.href='../profile.php?profile=empty'</script>";
	exit();
} else{
	echo "<script type='text/javascript'>alert('Edit profile error');location.href='../profile.php?edit=error'</script>";
	exit();
}
