<?php
	session_start();
	include_once 'header.php';
	include_once 'includes/dbh.php';
	$username = $_SESSION['u_username'];
?>

<body style="background-color:#99BCFC">
<center><h1 style="background-color:#55BCFC; padding-top:60px">Profile</h1></center>
<div class="main" style="background-color:#3f6798;margin: 0 100px 10px 100px;padding: 0 100px 0 100px">
<br><br>

<form class="edit" method="POST" action="includes/edit.inc.php">
<h4>Current Username: <?= $_SESSION['u_username'] ?></h4>
<div class="12u$">
	<input type="text" name="newusername"  placeholder="New Username" />
</div>
<br>
<h4>Current Email: <?= $_SESSION['u_email'] ?></h4>
<div class="12u$">
	<input type="text" name="newemail"  placeholder="New Email" />
</div>
<br>
<h4>New password:</h4>
<div class="12u$">
	<input type="password" name="newpassword"  placeholder="New Password" />
</div>
<br>
<div class="12u$">
	<input type="password" name="newconfirmpassword" placeholder="Confirm Password" />
</div>
<br>
<?php 
	if($_SESSION['u_usertype'] == 'assist'){
		?>
<h4>Current Job skill: <?= $_SESSION['u_jobskill'] ?></h4>
<div class="6u$ 12u$(small)">
	<div class="select-wrapper">
		<select name="newjobskill" id="jobskill">
			<option value="">- Change Job Skill -</option>
			<option value="babysitting">Babysitting</option>
			<option value="teaching">Teaching</option>
			<option value="cooking">Cooking</option>
			<option value="anything">Anything</option>
		</select>
	</div>
</div>
<br>
<?php
}else{?>
<h4>Preferred Job skill: <?= $_SESSION['u_jobskill'] ?></h4>
<div class="6u$ 12u$(small)">
	<div class="select-wrapper">
		<select name="newjobskill" id="jobskill">
			<option value="">- Preferred Job Skill -</option>
			<option value="babysitting">Babysitting</option>
			<option value="teaching">Teaching</option>
			<option value="cooking">Cooking</option>
			<option value="anything">Anything</option>
		</select>
	</div>
</div>
<br>
<?php
}
?>
<a href="index.php" class="button special">Return to homepage</a>
<input type="submit" name="submit" class="btn" value="Update Profile" /></input>
<p></p>
<br>
</div>
</body>

<?php
	include_once 'footer.php';
?>