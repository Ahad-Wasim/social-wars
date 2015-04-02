var totalStats = 0;

$('document').ready(function(){
    
    var $submitButton = $('#word_button');
    var $loginBtn = $('#login_button');
    var $totalStat = $('#total_stat');
    var $armySize = $('#army_size');
    //var $randomizer = $('#random_button');
    var $readyToPlay = $('#ready_button');
    
    //$('#battle-container').hide();
    $loginBtn.click(function(){
        
        var data = {username: 'test2', password: 'lol'};
        $loginBtn.attr('disabled', true);
        
        $.ajax({
            url: 'action/login.php',
            data: data,
            method: 'post',
            dataType: 'json',
            cache: false,
            success: function(){
                console.log("login called");
            }
        });
    });
    
    $submitButton.click(function(e){
        var searchString = $('#new_word').val();
        players = [];
        
        $('#new_word').attr('disabled', true);
        $submitButton.attr('disabled', true);

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
        
        $readyToPlay.attr('disabled', true);
        $("#health_input").attr('disabled', true);
        $("#speed_input").attr('disabled', true);
        $("#damage_input").attr('disabled', true);
        
        $.ajax({
            url: 'action/playerReady.php',
            method: 'post',
            data: players[0],
            dataType: 'json',
            cache: false,
            success: function(data){
                if(data.success){
                    console.log("ready suc:", data.player);
                    players[0] = data.player;
                    console.log("Ready to play - Players:", players);
                    gameReady();
                }else{
                    console.log("ready fail:", data);
                }
            }
        })
    });
    
    function gameReady(){
        console.log("gameReady called");
        
        $.ajax({
            url: 'action/gameReady.php',
            method: 'post',
            dataType: 'json',
            cache: false,
            success: function(data){
                console.log("Game ready:", data);
                if(data.success){
                    players[1] = data.opponent;
                    if(data.gameOwner){
                        startGame();
                    }else{
                        setTimeout(getGameData, 2000);
                        //getGameData();
                    }
                    //$(".battlepg_border").fadeOut();
                    setTimeout(function(){firstRound()}, 3000);
                }else{
                    setTimeout(gameReady, 3000);
                    console.log("gameReady fail ... Waiting on other players...Hopefully");
                }
            }
        });
    }

    
    function checkForOp(){
        
        console.log("checking for opponent",players);
        
        $.ajax({
            url: 'action/get_opponent_obj.php',
            method: 'post',
            dataType: 'json',
            cache: false,
            success: function(data){
                if(data.success){
                    console.log()
                    players.push(data.player.playerObj);
                    console.log("players after ",players);
                    //console.log("data.player.playerObj",data.player.playerObj);
                    getStatPoints();
                }else{
                    console.log("Check for Op Fail: " + data);
                    setTimeout(checkForOp, 2000);
                }
            }
        });//end ajax
    } //end checkForOp
    
    function getStatPoints(){
        
        totalStats = getTotalStats(players[0], players[1]);
        $totalStat.text("Stat Points Remaining: " + totalStats);
        $('#random_button').attr('disabled', false);
        
    } //end getStatPoints
}); //end of document.ready

    
    function startGame(){
        
        $.ajax({
            url: 'action/startGame.php',
            method: 'post',
            dataType: 'json',
            cache: false,
            success: function(data){
                console.log("game outcome:", data);
                gameResult = data.results;
                console.log("Start game called, Result:", gameResult);
            }
        });
    }

    function getGameData(){
        
        $.ajax({
            url: 'action/getOutcome.php',
            method: 'post',
            dataType: 'json',
            cache: false,
            success: function(data){
                gameResult = data.results;
                console.log("getGameData returned info:", gameResult);
            }
        })
    }