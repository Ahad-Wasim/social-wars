var totalStats = 0;

$('document').ready(function(){
    
    var $submitButton = $('#word_button');
    var $loginBtn = $('#login_button');
    var $totalStat = $('#total_stat');
    var $armySize = $('#army_size');
    var $randomizer = $('#random_button');
    var $readyToPlay = $('#ready_button');
    
    
    $loginBtn.click(function(){
        
        var data = {username: 'test2', password: 'lol'};
        
        $.ajax({
            url: 'action/login.php',
            data: data,
            method: 'post',
            dataType: 'json',
            cache: false,
            success: function(){
                console.log("login called");
            }
        })
    });
    
    $submitButton.click(function(e){
        var searchString = $('#new_word').val();

        var defer = Q.defer();
        createPlayer(searchString).then(function() {
            players[0].army = createArmy(players[0]);
            send_player_to_server(players[0]);
            console.log("player 0's army ",players[0]);
            $armySize.html('Your Army: ' + players[0].army);
            checkForOp();
        });//end createPlayer
        
    });//end submit button
    
    $readyToPlay.click(function(){
        
        $.ajax({
            url: 'action/gameReady.php',
            method: 'post',
            dataType: 'json',
            cache: false,
            success: function(data){
                if(data.success){
                    
                }
            }
        })
    });
    
    function checkForOp(){
        
        console.log("checking for opponent",players);
        
        $.ajax({
            url: 'action/get_opponent_obj.php',
            method: 'post',
            dataType: 'json',
            cache: false,
            success: function(data){
                if(data.success){
                    //console.log("Check for Op: " , data);
                    console.log("players before ",players);
                    players.push(data.player.playerObj);
                    console.log("players after ",players);
                    //console.log("data.player.playerObj",data.player.playerObj);
                    getStatPoints();
                }else{
                    console.log("Check for Op Fail: " + data);
                    //setTimeout(checkForOp, 2000);
                }
            }
        });//end ajax
    } //end checkForOp
    
    function getStatPoints(){
        
        totalStats = getTotalStats(players[0], players[1]);
        $totalStat.text("Stat Points Remaining: " + totalStats);
        
    } //end getStatPoints
}); //end of document.ready