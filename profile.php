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

<h4>Username: <?= $_SESSION['u_username'] ?></h4>
<h4>Email: <?= $_SESSION['u_email'] ?></h4>
<?php 
	if($_SESSION['u_usertype'] == 'assist'){
		?>
<h4>Job skill: <?= $_SESSION['u_jobskill'] ?></h4>
<h4>Jobs taken: </h4>
<table class="data-table">
		<thead>
			<tr>
				<th>Job ID</th>
				<th>Job Title</th>
				<th>Hourly Wage(RM)</th>
				<th>Job Posted By</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$sql = "SELECT * FROM acceptedjobs WHERE username='$username'";
		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($query))
		{
			echo'<tr>
					<td>'.$row['jobid'].'</td>
					<td>'.$row['title'].'</td>
					<td>'.$row['wage'].'</td>
					<td>'.$row['postuser'].'</td>
				<tr>';
		}?>
		</tbody>
		<tfoot>
		</tfoot>
		</table>
<?php
}else{?>
<h4>Preferred Job skill: <?= $_SESSION['u_jobskill'] ?></h4>
<h4>Jobs posted: </h4>
<table class="data-table">
		<thead>
			<tr>
				<th>Job ID</th>
				<th>Job Title</th>
				<th>Hourly Wage (RM)</th>
				<th>Job Accepted By</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$sql = "SELECT * FROM jobs WHERE postuser='$username'";
		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($query))
		{
			echo'<tr>
					<td>'.$row['id'].'</td>
					<td>'.$row['title'].'</td>
					<td>'.$row['wage'].'</td>
					<td>'.$row['accepteduser'].'</td>
				<tr>';
		}?>
		</tbody>
		<tfoot>
		</tfoot>
		</table>
		
<?php
}
?>
<a href="index.php" class="button special">Return to homepage</a>
<a href="edit.php" class="button">Edit profile</a>
<p></p>
<br>
</div>
</body>

<?php
	include_once 'footer.php';
?>