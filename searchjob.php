<?php
	include_once 'header.php';
	include_once 'includes/dbh.php';
	$sql = 'SELECT * FROM jobs';
	$query = mysqli_query($conn, $sql)
?>

<body style="background-color:#99BCFC">
<center><h1 style="background-color:#55BCFC; padding-top:60px">Search Job</h1></center>
<div class="main" style="background-color:#033D83;margin: 60px 100px 10px 100px;padding: 0 100px 0 100px">
	<br>
	<h1>All Jobs</h1>
	<table class="data-table">
		<thead>
			<tr>
				<th>No</th>
				<th>Job Title</th>
				<th>Preferred Job Skill</th>
				<th>Description</th>
				<th>Address</th>
				<th>Wage</th>
				<th>Email</th>
				<th>Contact</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$id = 1;
		while($row = mysqli_fetch_array($query))
			if($row['available'] == true)
		{
			echo'<tr>
					<td>'.$id.'</td>
					<td>'.$row['title'].'</td>
					<td>'.$row['jobskill'].'</td>
					<td>'.$row['description'].'</td>
					<td>'.$row['address'].'</td>
					<td>'.$row['wage'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['contact'].'</td>
				<tr>';
			$id++;
		}?>
		</tbody>
		<tfoot>
		</tfoot>
		</table>
		<form class="register" method="POST" action="includes/searchjob.inc.php">
		<div class="12u$">
			<input type="text" name="title" placeholder="Copy & Paste Job Title here" />
		</div>
		<br>
		<a href="index.php" style="margin-right:10px" class="button special">Back to Homepage</a>
		<input type="submit" name="submit" class="btn" value="Choose job" /></input>
		</form>
		<br>
</div>
<br>
</body>
<?php
	include_once 'footer.php';
?>

