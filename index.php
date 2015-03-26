<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/login.js"></script>
<script src="js/battle.js"></script>
<script src="js/create.js"></script>

<body>
	<div id="login-container">
		<?php include_once( 'views/login.php'); ?>
	</div>
	<div id="battle-container">
		<?php include_once( 'views/battle.php'); ?>
	</div>
	<div id="create-avatar-container">
		<?php include_once( 'views/create-avatar.php'); ?>
	</div>
</body>

</html>