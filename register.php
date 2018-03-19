<?php
	include_once 'header.php';
?>
		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<header>
						<p></p>
						<h2>Jinjang Utara Community Project For the Poor</h2>
						<p>Impact a life, transform a community.</p>
						<h4>Register Now!</h4>
					</header>
					<!-- Form -->
				<form class="register" method="POST" action="includes/register.inc.php">
				<div class="row uniform">
					<!--Break-->
					<div class="6u 12u$(small)">
						<input type="text" name="username" placeholder="Username" />
					</div>
					<div class="6u$ 12u$(small)">
						<input type="text" name="jobskill"  placeholder="Job Skill" />
					</div>
					<div class="12u$">
						<input type="password" name="password"  placeholder="Password" />
					</div>
					<div class="12u$">
						<input type="password" name="confirmpassword" placeholder="Confirm Password" />
					</div>
					<h5>Already registered? <a href ="login.php"> Sign In</a></h5>
					<!-- Break -->
					<div class="12u$">
						<input type="submit" name="submit" class="btn" value="Register" /></input>
					</div>
				</div>
				</form>
				</div>
			</section>
<?php
	include_once 'footer.php';
?>