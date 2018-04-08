<?php
	include_once 'header.php';
?>
<html>

<body style="background-color:#99BCFC">
<center><h1 style="background-color:#55BCFC; padding-top:60px">Donations</h1></center>
<div class="main" style="background-color:#033D83;margin: 0 100px 10px 100px;padding-left:100px; padding-right:100px">
<br><br>

<div id="donatenow">
<center><h3>Donate Now!</h3></center>
<img src="images/donation1.jpg" alt="Donation1" width="300" height="200" style="float:left;margin: 10px 80px 0 80px">
<img src="images/volunteer2.jpg" alt="Volunteer2" width="300" height="200" style="clear:both;margin: 10px 0 0 50px"><br>
<br>
<h4>AGN Bank Details</h4>

</div>
<div id="pledge">
<center><h3>Make a pledge</h3></center>
<form class="pledge" method="POST" action="includes/pledge.inc.php">
<div class="row uniform">
<!--Break-->
	<div class="12u$">
		<input type="text" name="name" placeholder="Full Name" />
	</div>
	<div class="12u$">
		<input type="text" name="address" placeholder="Address" />
	</div>
	<div class="12u$">
		<input type="text" name="email" placeholder="Email Address" />
	</div>
	<div class="12u$">
		<input type="text" name="mobile" placeholder="Mobile No" />
	</div>	
	<div class="6u 12u$(small)">
		<input type="radio" id="quantum" name="type" value="quantum" checked>
		<label for="quantum">Quantum pledged (one time payment)</label>
	</div>
	<div class="6u 12u$(small)">
		<input type="radio" id="monthly" name="type" value="monthly">
		<label for="monthly">Monthly payment</label>
	</div>
	<div class="12u$">
		<p>Date to be delivered: <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" /></p>
	</div>
	<!-- Break -->
	<div class="12u$">
		<center><input type="submit" name="submit" class="btn" value="Confirm" /></input></center>
	</div>
</div>
</form>
</div>
<br>
</body>
</html>
</div>
<?php
	include_once 'footer.php';
?>
