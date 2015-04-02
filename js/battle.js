var gameResult, totalRounds, player1, player2;
var gameRound = 0;

$(document).ready(function(){
    
    $('body').on('click', '#roll-dice', function(){
        updateBoard();
    });
});

function updateBoard(){
    var container = $('#battle-container');
    var roundHeader = container.find('h1');
    var p1Roll = $('#p1-roll');
    var p2Roll = $('#p2-roll');
    var outcome = $('#round-outcome');
    var p1Health = $('#p1-health');
    var p2Health = $('#p2-health');
    
    if(gameRound < gameResult.length){
        var round = gameResult[gameRound];
        
        updatePlayers(round);
        roundHeader.html("Round: " + (gameRound+1));
        p1Roll.html(player1.dice);
        p2Roll.html(player2.dice);
        
        if(player1.dice > player2.dice){
            outcome.html("Player 1 delt " + round.damage + " to player 2");
        }else{
            outcome.html("Player 2 delt " + round.damage + " to player 1");
        }
        
        p1Health.html(player1.health);
        p2Health.html(player2.health);
        
        if(gameRound == gameResult.length-1){
           $('#roll-dice').attr('disabled', true);
           setTimeout(gameOver, 5000); 
           return;
        }
        
    }else{
        console.log("This should never be seen");
    }
    gameRound++;
}

function gameOver(){
    $('#battle-container').html('');
    var done = $("<h1>Game Over</h1");
    
    done.appendTo('body').hide().fadeIn();
}

function updatePlayers(round){
    
    if(round != undefined){
        players[0]['dice'] = round.pdice;
        players[0]['health'] = round.phealth;
        
        players[1]['dice'] = round.odice;
        players[1]['health'] = round.ohealth;
    }
    
    if(players[0].position == 1){
        player1 = players[0];
        player2 = players[1];
    }else{
        player1 = players[1];
        player2 = players[0];
    }
}

function firstRound(){
    $('#stat-page').hide();
    
    updatePlayers();
    
    var container = $('#battle-container');
    
    var roundNum = $('<h1>Round: ' + gameRound + ' </h1>');
    var diceInfo = $("<h3>Player 1 rolled: <span id='p1-roll'>0</span> Player 2 rolled: <span id='p2-roll'>0</span> </h3>");
    var roundInfo = $("<h3 id='round-outcome'>Ready to play? Roll dice!</h3>");
    var rollDice = $("<button type='button' id='roll-dice'>Roll Dice</button>");
    
    roundNum.appendTo(container);
    diceInfo.appendTo(container);
    roundInfo.appendTo(container);
    
    buildPlayerArea(player1);
    buildPlayerArea(player2);
    
    rollDice.appendTo(container);
}

function buildPlayerArea(player){
    
    var info = [];
    var stats = [];
    var id = "p" + player.position + "-";
    
    var container = $('#battle-container');
    info.push($('<h2>' + player.tweets[0] + '</h2>'));
    info.push($('<img src=' + player.url + " alt='Player " + player.position + "' >"));
    var statList = $("<ul></ul>");
    stats.push($("<li>Health: <span id='"+id+"health' >" + player.health + "</span></li>"));
    stats.push($("<li>Atack: <span id='"+id+"attack' >" + player.attack + "</span></li>"));
    stats.push($("<li>Army: <span id='"+id+"army' >" + player.army + "</span></li>"));
    
    info[0].appendTo(container);
    info[1].appendTo(container);
    
    for(var i=0; i<stats.length; i++){
        stats[i].appendTo(container);
    }
    
    container.appendTo('#battle-container');
}