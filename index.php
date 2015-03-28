<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<link rel = 'stylesheet' href = 'animate.css'>
<link href='http://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/login.js"></script>
<script src="js/battle.js"></script>
<script src="js/create.js"></script>
<script src="js/getRequest.js"></script>
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
    <div id="pre-game-container">  
		<?php include_once( 'views/preGame.php'); ?>
	</div>
	<div id="game-board-container">
		<?php include_once( 'views/gameBoard.php'); ?>
	</div>
	<div id="winner-container">
		<?php include_once( 'views/winner.php'); ?>
	</div> 
</body>

</html>