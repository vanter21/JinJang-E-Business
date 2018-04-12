<?php
	include_once 'header.php';
?>
		<!-- Banner -->
			<?php
				if(isset($_SESSION['u_id']) == true){
					header("Location: ../Assignment/index.php");
					exit();
				}	
			?>
			<section id="banner">
				<div class="inner">
					<header>
						<p></p>
						<h2>Jinjang Utara Community Project For the Poor</h2>
						<p>Impact a life, transform a community.</p>
						<h4>Log In</h4>
					</header>
					<!-- Form -->
				<form method="POST" action="includes/login.inc.php">
				<div class="row uniform">
					<!--Break-->
					<div class="12u$">
						<input type="text" name="username"  value="" placeholder="Username" />
					</div>
					<div class="12u$">
						<input type="password" name="password" value="" placeholder="Password" />
					</div>

					<h5>Not yet registered? <a href ="register.php"> Sign Up</a></h5>
					<!-- Break -->
					<div class="12u$">
						<input type="submit" name="submit" class="btn" value="Login" /></input>
					</div>
				</div>
				</form>
				
			</section>
<?php
	include_once 'footer.php';
?>