<?php

session_start();

if(isset($_POST['submit'])){
	
	include_once 'dbh.php';
	
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
	$amount = mysqli_real_escape_string($conn, $_POST['amount']);
	$amount = floatval($amount);
	$type = mysqli_real_escape_string($conn, $_POST['type']);
	$date = date('Y-m-d', strtotime($_POST['date']));
	$currentdate = date('Y-m-d', strtotime("now"));
	
	//Error handlers
	//Check for empty fields
	if(empty($name) ||  empty($email) || empty($address) || empty($mobile)){
		echo "<script type='text/javascript'>alert('Fill all fields!');location.href='../donate.php?pledge=empty'</script>";
		exit();
	}if(empty($amount) || $amount <= 0){
		echo "<script type='text/javascript'>alert('Enter a valid amount!');location.href='../donate.php?pledge=amount'</script>";
		exit();
		}else{
			//Insert the user into the database
			$sql = "INSERT INTO donation (name, address, email, mobile, amount, type, date, currentdate) VALUES ('$name','$address','$email','$mobile','$amount','$type','$date','$currentdate');";
			$result = mysqli_query($conn, $sql);
			echo "<script type='text/javascript'>alert('Thank you for your support!');location.href='../donate.php?pledge=success'</script>";
			exit();		
		}
} else{
	echo "<script type='text/javascript'>alert('Pledge error');location.href='../donate.php?pledge=error'</script>";
	exit();
}