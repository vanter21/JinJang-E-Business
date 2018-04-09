<?php
	include_once 'header.php';
?>
		<!-- Banner -->
			<?php
				session_start();
				if(isset($_SESSION['u_id']) == true){
					header("Location: ../Assignment/index.php");
					exit();
				}	
			?>
			<section id="banner">
				<div class="inner">
					<header>
						<p></p>
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
						<div class="select-wrapper">
							<select name="jobskill" id="jobskill">
								<option value="">- Preferred Job -</option>
								<option value="babysitting">Babysitting</option>
								<option value="teaching">Teaching</option>
								<option value="cooking">Cooking</option>
								<option value="anything">Anything</option>
							</select>
						</div>
					</div>
				
					<div class="12u$">
						<input type="text" name="email"  placeholder="Email Address" />
					</div>
					<div class="12u$">
						<input type="password" name="password"  placeholder="Password" />
					</div>
					<div class="12u$">
						<input type="password" name="confirmpassword" placeholder="Confirm Password" />
					</div>
					
					
					<div class="6u 12u$(small)">
						<input type="radio" id="assist" name="usertype" value="assist" checked>
						<label for="assist">Assist the community</label>
					</div>
					<div class="6u 12u$(small)">
						<input type="radio" id="request" name="usertype" value="request">
						<label for="request">Request for help</label>
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