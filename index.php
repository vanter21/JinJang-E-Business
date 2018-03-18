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
					</header>
					<a href="#main" class="button scrolly">Learn More about the Jinjang Community</a>
					<?php
					if(isset($_SESSION['u_id'])){
						echo "You are logged in";
						echo '<form action="includes/logout.inc.php" method="POST">
						<input type="submit" name="submit" class="btn" value="Log Out" /></input></form>';
					}					 
					?>
					<p></p>
					<ul class="actions">
						<li><a href="register.php" class="button special">Register</a></li>
						<li><a href="login.php" class="button alt">Login</a></li>
					</ul>
				</div>
			</section>
<?php
	include_once 'footer.php';
?>