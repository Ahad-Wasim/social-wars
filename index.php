<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<link rel = 'stylesheet' href = 'views/temp/css/animate.css'>
<link href='http://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/login.js"></script>
<script src="js/battle.js"></script>
<script src="js/create.js"></script>


	

	<style>
		*{
			font-family: 'Orbitron', sans-serif;
		}
		body{
			background: url('http://4.bp.blogspot.com/-Y6bxhFuK13s/UZx6gVxe7PI/AAAAAAAAAHo/nfC_u2c3dv8/s640/EndCredits2560x1600-16bit.jpg');
			
			color:#17E021;
		}
		.main_header{
			border:1px solid black;
			text-align: center;
			color:white;
		}

		.container{
			border:1px solid black;
		}

		.player1{
			border:1px solid rgb(17, 45, 46);

		}

		.first_player_contents{
			border:1px solid red;
		}

		.player2{
			border:1px solid blue;
		}

		.second_player_contents{
			border:1px solid red;
		}
		
		.dice{
			border:1px solid red;
			text-align: center;
		}

		#player1_image{
			height:35vh;
			width:100%;
			
		}

		#player2_image{
			height:35vh;
			width:100%;	
		}

		.round_number{
			border:1px solid white;
			text-align: center;
		}

		.winner{
			background:#626262;
			border: 10px dashed #17E021;
			display:inline-block;
		}

		.winner h1{
			text-align: center;
			height:200px;
			width:100%;
			vertical-align: center;
			text-shadow: 2px 2px black;
			position: relative;
  			top: 50%;
		    transform: translateY(30%);

  			
		}



	</style>


	
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
	<div id="login-container">
		<?php include_once( 'views/temp/page3.php'); ?>
	</div>
	<div id="login-container">
		<?php include_once( 'views/temp/winner.php'); ?>
	</div>
	
</body>

</html>