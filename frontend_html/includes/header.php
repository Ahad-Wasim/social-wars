
<div class="jumbotron">
	<div id="headerContainer">
	<div class = "row">
		<div class="col-sm-2">

<!--		<img id="headerImg" src="./images/sj_sharks.jpg" alt = "logo is under construction" > -->
		
		</div>

		<div class="col-sm-7" id="nav-wrapper" data-spy="affix" data-offset-top=300">
			<div id="nav" class="navbar">
				<div class="navbar-inner">
					<button href="#hideForm" class="btn btn-navbar btn-primary" data-toggle="collapse" data-target=".nav-collapse">Show Menu</button>

					<div style="display:inline-block" class="mediaNoShow">

					</div>

					<div class="nav-collapse collapse">
						<ul class="nav navbar-nav collapse navbar-collapse">
							<li>
								<a href="#">Home</a>
							</li>
							<li>
								<a href="./pages/Register.php">Register</a>
							</li>
							<li>
								<a href="./pages/logout.php">Logout</a>
							</li>

							<li>
								<a href="./login.php">Login</a>
							</li>

							<li>
								<a href="#">Contact</a>
							</li>
						</ul>
					</div>
				</div><!-- navbar-inner -->

				<div id="hideForm" class="nav-collapse collapse">
					<form class="form-inline" action="pages/login.php" method="post">
						<div class="form-group">
							<input name="username" type="text" placeholder="user name"> <input name="password" type="password"
							placeholder="password">
						</div><button name="auth_btn" class="btn btn-default">Sign in</button>
					</form>
				</div>
			</div><!-- navbar -->
		</div>

		<div class="col-sm-3 logPage">
			
				<?php 
				
				include('includes/logPage.php');
				?>
			
		</div>
		</div>

	</div>
</div>

