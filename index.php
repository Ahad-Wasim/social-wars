<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/login.js"></script>
<script src="js/battle.js"></script>
<script src="js/create.js"></script>


<style> 

.loginPageSolo{
	width: 40vw;
}

.form_fight_panel{
	border: 1px solid red;
	background: lightgrey;
}
</style> 
<body>
	
	<input type="text" id="battleInput">
	<button type="submit" class="submit">Submit</button>

	<div id="login-container">
		<?php include_once( 'views/login.php'); ?>
	</div>
	<div id="battle-container">
		<?php include_once( 'views/battle.php'); ?>
	</div>
	<div id="status-container">
		<?php include_once( 'views/battleStatus.php'); ?>
	</div>
	<div id="create-avatar-container">
		<?php include_once( 'views/create-avatar.php'); ?>
	</div>
</body>

</html>