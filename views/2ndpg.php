<!DOCTYPE HTML>
<HTML>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<body>
<div class="top_container">
    <form> 
        <label for = "status"> New Word: </label>
		<input type="text" id="new_word">
    <button id="word_botton" type="submit" value="submit">Submit</button>
    <div class="playersrdy">PLAYER 1/2</div>
    </form>
</div>    
<div class = "mid_container"> 
	<form class = "form-control form-group "> 
		<label for = "status"> Health: </label>
		<input type = "text"> </br>
		<label for = "status"> Speed: </label>
		<input type = "text"> </br>
		<label for = "status"> Damage: </label>
		<input type = "text"> </br>
		<label for = "status"> Army Size: </label>
		<input type = "text"> </br>
		
	</form>
</div> 
    
<div class="bottom_container">
    <div id="total_stat">Stat Point : #####</div>
    <div id="army_size">Army Size : #####</div>
    <button class = "btn btn-default">Random</button> 
    <button class = "btn btn-default">Ready</button> 
    </div>
</body>
</HTML>