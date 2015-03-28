<!DOCTYPE html>
<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="../js/main.js"></script>
<script src="../js/login.js"></script>
<script src="../js/battle.js"></script>
<script src="../js/create.js"></script>
<style>
	.bottom_container {
		margin-top: 10%;
	}
</style>
<body>
<div class="top_container">
    <form> 
        <label for = "status"> New Word: </label>
		<input type="text" id="new_word">
    <button id="word_button" type="submit" value="submit">Submit</button>
    <div class="playersrdy">PLAYER 1/2</div>
    </form>
</div>    
<div class = "mid_container"> 
	<form class = "form-control form-group" id="stats"> 
		<label for = "health"> Health: </label>
		<input type = "text" id="health" name="health"> </br>
		<label for = "speed"> Speed: </label>
		<input type = "text" id="speed" name="speed"> </br>
		<label for = "attack"> Attack: </label>
		<input type = "text" id="attack" name="attack"> </br>
	</form>
</div> 
    
<div class="bottom_container">
    <div id="total_stat">Stat Point : #####</div>
    <label for="army">Army Size:</label>
    <div id="army_size" name="army">500000</div>
    <button class = "btn btn-default">Random</button> 
    <button class = "btn btn-default" id="ready_button">Ready</button> 
</div>
</body>
</html>