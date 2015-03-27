<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/login.js"></script>
<script src="js/battle.js"></script>
<script src="js/create.js"></script>
<script src="js/getRequest.js"></script>

<style>
    
.top_container {
    border: 1px solid #8C8C8C;
    height: 100px;
    width: 600px;
}

.playersrdy {
    position: relative;
    float: right;
    border: 1px solid red;
}

#new_word {
    position: relative;
    
}
.mid_container {
      width: 600px;
      height: 150px;
      border: 1px dashed #800;
}
.bottom_container {
    width: 600px;
    border: 1px solid black;
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
	<div id="create-avatar-container">
		<?php include_once( 'views/create-avatar.php'); ?>
	</div>
    <div id="">
		<?php include_once( 'views/2ndpg.php'); ?>
	</div>
</body>

</html>