<?php
	include_once 'header.php';
?>
<body style="background-color:#99BCFC">
<center><h1 style="background-color:#55BCFC; padding-top:60px">Post Job</h1></center>
<div class="main" style="background-color:#033D83;padding-top:10px;margin: 0 100px 10px 100px;padding: 0 100px 0 100px">
<br><br>
<!-- Form -->
<form class="postjob" method="POST" action="includes/postjob.inc.php">
<div class="row uniform">
<!--Break-->
<div class="6u 12u$(small)">
	<input type="text" name="title" placeholder="Job Title" />
</div>
<div class="6u$ 12u$(small)">
	<div class="select-wrapper">
		<select name="jobskill" id="jobskill">
			<option value="">- Preferred Skill -</option>
			<option value="babysitting">Babysitting</option>
			<option value="teaching">Teaching</option>
			<option value="cooking">Cooking</option>
			<option value="anything">Anything</option>
		</select>
	</div>
</div>
<div class="12u$">
	<textarea style="resize:none;" name="description" rows="10" cols="20" id="JobDescription" class="textInput" placeholder="Description"></textarea>
</div>
<div class="12u$">
	<input type="text" name="address" placeholder="Address" />
</div>
<div class="12u$">
	<input type="text" name="wage" placeholder="Hourly wage" />
</div>
<div class="12u$">
	<input type="text" name="email" placeholder="Email" />
</div>
<div class="12u$">
	<input type="text" name="contact" placeholder="Contact No." />
</div>
<!-- Break -->
<div class="12u$">
	<a href="index.php" style="margin-right:10px" class="button special">Back to Homepage</a>
	<input type="submit" name="submit" class="btn" value="Register" /></input>
</div>
</div>
</form>
<br>
</div>
</body>
<?php
	include_once 'footer.php';
?>

